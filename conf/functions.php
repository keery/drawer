<?php
    use Module\Router\Router;
    use Module\PHPMailer\PHPMailer;
    use Module\PHPMailer\Exception;

	function path($routeName, $params=null)
	{
		$router = new Router();
        return DIRECTORY.DS.$router->routeHandler($routeName, $params);
	}
	function redirectToRoute($route, $params=null) {
		header('Location: '.path($route, $params));
    }
    
    function date_publication($date) {
        $date = date_create($date);
        return "Publié le ".date_format($date, "d/m/Y") . " à ".date_format($date, "H:i");
    }

    function renderImg($img, $class=null) {
        $HTML = '<img src="'.UPLOAD.$img->getSrc().'"';
        if(!empty($img->getAlt())) $HTML .= " alt='".$img->getAlt()."'";
        if(!empty($img->getTitle())) $HTML .= " alt='".$img->getTitle()."'";
        if($class) $HTLM .= " class='".$class."'";
        $HTML .= " />";
        return $HTML;
    }

	function request_is($type) {
		return $type == $_SERVER['REQUEST_METHOD'];
    }

	function isGranted($role) {
        return (isset($_SESSION[PREFIX."user"]['role'], ROLES[$_SESSION[PREFIX."user"]['role']]) && array_key_exists($role, ROLES)) && ($_SESSION[PREFIX."user"]['role'] === $role || in_array($role, ROLES[$_SESSION[PREFIX."user"]['role']]));
	}

	function format_date($date, $format) {
		return date_format(date_create($date), $format);
	}

	function getNotifs($key) {
		if(isset($_SESSION['notifs'][$key])) {
			$notifs = $_SESSION['notifs'][$key];
			unset($_SESSION['notifs'][$key]);
		}
		else $notifs = [];

		return $notifs;
	}
	
	function addNotif($notif, $key) {
		if(is_array($notif)) {
			foreach ($notif as $n) {
				$_SESSION['notifs'][$key][] = $n;
			}
		}
		else $_SESSION['notifs'][$key][] = $notif;
	}

	function getCurrentUrl() {
		return $_SERVER['CURRENT_ROUTE']['name'].(!empty($_SERVER['QUERY_STRING']) ? "?" : '' ).$_SERVER['QUERY_STRING'];
	}

	function articleTimeAgo($date)
    {
        // Pour le décalage horraire.
        date_default_timezone_set("Europe/Paris");
        // Je prend la date de l'objet article via l'accesseur
        $time_ago = strtotime($date);
        $current_time = time();
        // je calcule la différence avec la date actuelle
        $time_difference = $current_time - $time_ago;

        $seconds = $time_difference;
        $minutes      = round($seconds / 60 );           // value 60 is seconds
        $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec
        $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;
        $weeks          = round($seconds / 604800);          // 7*24*60*60;
        $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60
        $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60
        if($seconds <= 60) return "Ajouté à l'instant";
        else if($minutes <=60)
        {
            if($minutes==1) return "Il y a une minute";
            else return "Il y a ".$minutes." minutes.";
        }
        else if($hours <=24)
        {
            if($hours==1) return "Il y a une heure";
            else return "Il y a ".$hours." heures";
        }
        else if($days <= 7)
        {
            if($days==1) return "Ajouté hier";
            else return "Il y a ".$days." jours.";
        }
        else if($weeks <= 4.3) //4.3 == 52/12
        {
            if($weeks==1)  return "Ajouté il y'a une semaine";
            else return "Il y a ".$weeks." semaines";
        }
        else if($months <=12)
        {
            if($months==1) return "Ajouté il y'a un mois";
            else return "Il y a ".$months." mois";
        }
        else
        {
            if($years==1) return "Ajouté il y'a un an";
            else return "Il y a ".$years." ans";
        }
    }

    function truncate($text, $length = 100, $ending = '...', $exact = false, $considerHtml = true)
    {
        if ($considerHtml) {
            // if the plain text is shorter than the maximum length, return the whole text
            if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
                return $text;
            }
            // splits all html-tags to scanable lines
            preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
            $total_length = strlen($ending);
            $open_tags = array();
            $truncate = '';
            foreach ($lines as $line_matchings) {
                // if there is any html-tag in this line, handle it and add it (uncounted) to the output
                if (!empty($line_matchings[1])) {
                // if it's an "empty element" with or without xhtml-conform closing slash
                    if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
                        // do nothing
                    // if tag is a closing tag
                    } elseif (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
                        // delete tag from $open_tags list
                        $pos = array_search($tag_matchings[1], $open_tags);
                        if ($pos !== false) {
                            unset($open_tags[$pos]);
                        }
                    // if tag is an opening tag
                    } elseif (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
                        // add tag to the beginning of $open_tags list
                        array_unshift($open_tags, strtolower($tag_matchings[1]));
                    }
                    // add html-tag to $truncate'd text
                    $truncate .= $line_matchings[1];
                }
                // calculate the length of the plain text part of the line; handle entities as one character
                $content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
                if ($total_length + $content_length > $length) {
                    // the number of characters which are left
                    $left = $length - $total_length;
                    $entities_length = 0;
                    // search for html entities
                    if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
                        // calculate the real length of all entities in the legal range
                        foreach ($entities[0] as $entity) {
                            if ($entity[1] + 1 - $entities_length <= $left) {
                                $left--;
                                $entities_length += strlen($entity[0]);
                            } else {
                                // no more characters left
                                break;
                            }
                        }
                    }
                    $truncate .= mb_substr($line_matchings[2], 0, $left + $entities_length);
                    // maximum lenght is reached, so get off the loop
                    break;
                } else {
                    $truncate .= $line_matchings[2];
                    $total_length += $content_length;
                }
                // if the maximum length is reached, get off the loop
                if ($total_length >= $length) {
                    break;
                }
            }
        } else {
            if (strlen($text) <= $length) {
                return $text;
            } else {
                $truncate = mb_substr($text, 0, $length - strlen($ending));
            }
        }

        // if the words shouldn't be cut in the middle...
        if (!$exact) {
            if ($considerHtml){
                preg_match('/^((<.*?>)*)(.*)/', $truncate, $matches);
                $truncate = $matches[3];
            }
            // ...search the last occurrence of a space...
            $spacepos = strrpos($truncate, ' ');
            if ($spacepos > 0) {
                // ...and cut the text in this position
                $truncate = mb_substr($truncate, 0, $spacepos);
            }
            if ($considerHtml){
                $truncate = $matches[1] . $truncate;
            }
        }
        if ($considerHtml) {
            // close all unclosed html-tags
            foreach ($open_tags as $tag) {
                $truncate .= '</' . $tag . '>';
            }
        }
        // add the defined ending to the text
        $truncate .= $ending;
        return $truncate;
    }

    function chaine_encode($text)
    {
        if(is_array($text)) $text = serialize($text);
		if( !function_exists('mcrypt_encrypt') )return rawurlencode(trim(base64_encode($text)));

		$SALT = "NZp2Y5oshDLF8eJCUamVxG6k";
        return rawurlencode(trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $SALT, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)))));
    }

    function chaine_decode($text)
    {
		if( !function_exists('mcrypt_encrypt') )return base64_decode(rawurldecode($text));

        $SALT = "NZp2Y5oshDLF8eJCUamVxG6k";
		return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $SALT, base64_decode(rawurldecode($text)), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }

    function sortObjects(&$objects, $func) {
        return usort($objects, function($a, $b) use ($func)
        {
            return strcmp($a->$func(), $b->$func());
        });
    }

    function removeAccents($str) {
        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ', 'Ά', 'ά', 'Έ', 'έ', 'Ό', 'ό', 'Ώ', 'ώ', 'Ί', 'ί', 'ϊ', 'ΐ', 'Ύ', 'ύ', 'ϋ', 'ΰ', 'Ή', 'ή');
        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', 'Α', 'α', 'Ε', 'ε', 'Ο', 'ο', 'Ω', 'ω', 'Ι', 'ι', 'ι', 'ι', 'Υ', 'υ', 'υ', 'υ', 'Η', 'η');
        return str_replace($a, $b, $str);
    }

    function convertToUrl($string) {
        return strtolower(preg_replace('/[^a-z0-9]/i', '-', removeAccents($string)));
    }
    function sendMail($destinataire, $titre, $body) {

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'guillaumesnault@gmail.com';                 // SMTP username
            $mail->Password = 'guigui91';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->CharSet = 'UTF-8';
            
            //Recipients
            $mail->setFrom('guillaumesnault@gmail.com', 'Creative Drawer');

            if(is_array($destinataire)) {
                foreach ($destinataire as  $dest) {
                    $mail->addAddress($dest);
                }

            }
            else $mail->addAddress($destinataire);     // Add a recipient
            
            // $body = utf8_encode($body);
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $titre;
            $mail->Body    = $body;
            $mail->AltBody = $body;
        
            $mail->send();
            return "Message bien envoyé";
        } catch (Exception $e) {
            return "Le mail n'a pas pu être envoyé,". $mail->ErrorInfo;
        }
    }
 ?>