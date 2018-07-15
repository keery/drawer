<?php
namespace Controllers;

use Module\Entity\Image;
use Module\Entity\RelUserArticle;


class AjaxController {
    
	//Route appelé en ajax pour l'upload des fichiers
	public function uploadFilesAction() {
		if ($this->isXmlHttpRequest())
        {
            if (isset($_POST["data_base64"], $_POST['id_entity'], $_POST['entity'])) 
            {
                $dossier = $_POST['dossier_upload'] != ""  ? $_POST['dossier_upload'] : $this->getParameter('img_upload');
                $extensions = array('png', 'jpg', 'jpeg', 'gif', 'svg');
                $base64 = $_POST['data_base64'];
                $entity = $_POST['entity'];
                $id_entity = $_POST['id_entity'];

                $expl_dataURL = explode(',', $base64);
                $type_data = $expl_dataURL[0];
                $dataURL = $expl_dataURL[1];

                preg_match("#data\:(image|application)\/(jpeg|png|gif|pdf);base64#", $type_data, $matches);
                $type = $matches[2];

                if (isset($type) && in_array($type, $extensions)) 
                {
                    $nom_fichier = uniqid().".".$type;
                    $img = new Image();
                    $img->setSrc($nom_fichier);
                    $img->setId_article($_POST['id_entity']);

                    if ($id_entity != '') 
                    {
                        if ($entity = $entity::findOneBy(['id' => $id_entity])) 
                        {
                            if (method_exists($entity, 'addImage')) $entity->addImage($img);
                            else $entity->setImage($img);                                

                            // $entity->save();
                            $response['entity'] = true;
                        }
                        else echo json_encode("Entité introuvable");
                        
                    }
                    else $response['entity'] = false;

                    $dataURL = str_replace(" ", "+", $dataURL);
                    $dataURL = base64_decode($dataURL);

                    if(!file_exists($dossier."/".$nom_fichier))
                    {
                        file_put_contents($dossier."/".$nom_fichier, $dataURL);
                        
                        $response['id_file'] = $img->save();
                        $response['state'] = true;

                        echo json_encode($response);
                    }
                }
                else echo json_encode("L'extension du fichier est incorrect");
            }
            else  echo json_encode("Problème lors du téléchargement du fichier");
        }
        else echo json_encode("Type de requête invalide");            
    }
    
    private function isXmlHttpRequest() {
        return $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }
    
    public function likeAction($request) {
        $data['state'] = false;
        if ($this->isXmlHttpRequest() && isset($request['id'], $request['type'], $_SESSION[PREFIX."user"]['id']))
        {
            if(!$rel = RelUserArticle::findOneBy(['id_article' => $request['id'], 'id_user' => $_SESSION[PREFIX."user"]['id']])) {
                $rel = new RelUserArticle();
            }
            $data['id'] = $rel->getId();
            // if($request['type'] == "delete") RelUserArticle::delete($rel->getId());
            if($request['type'] == "delete") $request['type'] = "unvote";
            $rel->setId_article($request['id']);
            $rel->setId_user($_SESSION[PREFIX."user"]['id']);
            $rel->setVote($request['type']);
            $rel->save();

            $data['state'] = true;
        }
        echo json_encode($data);
    }

    public function editeurImgAction($request)
    {
        if ($this->isXmlHttpRequest() && isset($_POST["data_base64"]))
        {
            $dossier = 'assets/img/upload';
            $extensions = array('png', 'jpg', 'jpeg', 'gif', 'svg');
            $base64 = $_POST['data_base64'];

            $expl_dataURL = explode(',', $base64);
            $type_data = $expl_dataURL[0];
            $dataURL = $expl_dataURL[1];

            preg_match("#data\:(image|application)\/(jpeg|png|gif|pdf);base64#", $type_data, $matches);
            $type = $matches[2];

            if (isset($type) && in_array($type, $extensions)) 
            {
                $nom_fichier = uniqid().".".$type;

                $dataURL = str_replace(" ", "+", $dataURL);
                $dataURL = base64_decode($dataURL);

                if(!file_exists($dossier."/".$nom_fichier))
                {
                    file_put_contents($dossier."/".$nom_fichier, $dataURL);


                    $response['state'] = true;
                    $response['nom_fichier'] = $nom_fichier;

                    echo json_encode($response);
                }
                else
                {
                    echo json_encode("Le fichier éxiste déjà");
                }
            }
            else
            {
                echo json_encode("L'extension du fichier est incorrect");
            }
        }
        else
        {
            echo json_encode("Type de requête invalide");            
        }
    }

    public function deleteImgAction($request)
    {
        $id = (int) $request['id'];


        if ($this->isXmlHttpRequest() && is_int($id) && $id > 0)
        {
            if ($img = Image::findOneBy(['id' => $id])) 
            {
                $fichier = "assets/img/upload/".$img->getSrc();

                if (file_exists($fichier)) 
                {
                    unlink($fichier);
                }
                Image::delete($id);
                
                $response['state'] = true;
                echo json_encode($response); 
            }
            else  echo json_encode("Aucune correspondance en BDD");            
        }
        else echo json_encode("Type de requête invalide");            
    }
}