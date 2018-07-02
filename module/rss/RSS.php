<?php 

namespace Module\Rss;
use Module\Erreur\Erreur;
use DomDocument;

class Rss
{
	private $xml_file;
	private $name;
	private $root;

	public function __construct($name="rss.xml",$version="1.0")
	{
        if($name != "rss.xml") {
            $ext = pathinfo("rss.xml", PATHINFO_EXTENSION);
            if($ext != "xml") throw new Erreur("Le fichier doit être au format XML");
        }
		$xml_file = new DOMDocument($version);
        $root = $xml_file->createElement("rss"); // création de l'élément
        $root->setAttribute("version", "2.0"); // on lui ajoute un attribut
        $root = $xml_file->appendChild($root); // on l'insère dans le nœud parent (ici root, qui est "rss")
        $this->xml_file = $xml_file;
        $this->name = $name;
        $this->root = $root;

        // $channel = $xml_file->createElement("channel");
        // $channel = $root->appendChild($channel);
                
        // $desc = $xml_file->createElement("description");
        // $desc = $channel->appendChild($desc);
        // $text_desc = $xml_file->createTextNode("Partage de connaissances en tous genres"); // on insère du texte entre les balises <description></description>
        // $text_desc = $desc->appendChild($text_desc);

        // $link = $xml_file->createElement("link");
        // $link = $channel->appendChild($link);
        // $text_link = $xml_file->createTextNode("http://www.bougiemind.info");
        // $text_link = $link->appendChild($text_link);

        // $title = $xml_file->createElement("title");
        // $title = $channel->appendChild($title);
        // $text_title = $xml_file->createTextNode("Bougie'S mind");
        // $text_title = $title->appendChild($text_title);
    }

    public function addElement($tag, $text="", $container=null) {
        $xml_file = $this->xml_file;
        
        $elem = $xml_file->createElement($tag);

        if(!$container) $container = $this->root;
        
        $elem = $container->appendChild($elem);
        $text_desc = $xml_file->createTextNode($text); // on insère du texte entre les balises <description></description>
        $text_desc = $elem->appendChild($text_desc);

        return $elem;
    }
    
    public function generate() {
        $this->xml_file->preserveWhiteSpace = false;
        $this->xml_file->formatOutput = true;
        $this->xml_file->save($this->name);
    }
}
?>