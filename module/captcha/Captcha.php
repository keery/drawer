<?php
    header('Content-type: image/png');


    class Captcha {
        private $nbChar;
        private $fond;
        private $width;
        private $height;
        private $fonts = [];

        const CHARS = "abcdefghijklmnopqrstuvwxyz0123456789";

        public function __construct($width=500, $height=50) {
            $this->width = $width;
            $this->height = $height;
            $this->nbChar = rand(-8,-6);
            $this->fond = imagecreate($width, $height);
            $white = imagecolorallocate($this->fond, rand(150,255), rand(150,255), rand(150,255));
            $this->fonts = glob('../../fonts/*.ttf'); 
        }

        private function getRandomFont() {
            return $this->fonts[array_rand($this->fonts)];
        }

        public function setNbChar($nb) {
            $this->nbChar = $nb;
        }

        private function getRandomChar() {
            $chars = str_shuffle(Captcha::CHARS);
            return substr($chars, $this->nbChar) ;
        }

        private function generateRandomShape() {
            for($i = 0; $i < rand(3,6); $i++) {
                $color = imagecolorallocate($this->fond, rand(0,150), rand(0,150), rand(0,150));
                $x1 = rand(0, $this->width);
                $x2 = rand(0, $this->width);
                $y1 = rand(0, $this->height);
                $y2 = rand(0, $this->height);
        
                switch( rand(0,2) ) {
                    case 0:
                        imageline($this->fond, $x1, $y1, $x2, $y2, $color);
                        break;
                    case 1:
                        imageellipse($this->fond, $x1, $y1, $x2, $y2, $color);
                        break;
                    case 2:
                        imagerectangle($this->fond, $x1, $y1, $x2, $y2, $color);
                        break;
                }
            }        
        }

        public function generate() {
            $chars = $this->generateRandomShape();
            $chars = $this->getRandomChar();
            $fond = $this->fond;
            $length = strlen($chars);
            $sliceWidth = $this->width / $length;
            $decallage = 15;

            $this->generateRandomShape();

            for ( $i = 0; $i < $length; $i++ ) {

                $char = $chars[$i];
                $angle = rand(-30, 30);

                $color = imagecolorallocate($this->fond, rand(0,150), rand(0,150), rand(0,150));
                imagettftext($fond, 30, $angle, $decallage, 40, $color, $this->getRandomFont(), $char);
                $decallage += $sliceWidth;

            }

            imagepng($fond);
        }
    }
 
    $captcha = new Captcha();
    $captcha->generate();