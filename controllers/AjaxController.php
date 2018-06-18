<?php
namespace Controllers;

use Module\Entity\Image;


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