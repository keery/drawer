<?php
namespace Module\Form;

class Validator {
    
    private $rules;
    private $object;
    private $errors = [];

    public function __construct($rules, $object) {
        $this->rules = $rules;
        $this->object = $object;
    }

    public function verify() {
        $object = $this->object;
        $state = true;
        foreach ($this->rules as $key => $rule) {

            $f = 'get'.ucfirst(strtolower($key));
            $value = $object->$f();
            foreach ($rule as $keyRule => $critere) {
                $this->$keyRule($value, $critere);
            }
        }
    }

    public static function maxLength($string, $length){
        if(strlen(trim($string))<=$length) {            
            return true;
        }
        $this->errors[] = "La taille doit être inférieur à ".$length;
        return false;
	}

	public static function minLength($string, $length){
        if(strlen($string)>=$length) {
            return true;
        }
        $this->errors[] = "La taille doit être supérieur à ".$length;
        return false;
	}

	public function maxNum($num, $length){
        if($num<=$length) {
            return true;
        }
        $this->errors[] = "Le chiffre doit être inférieur à ".$length;
        return false;
	}

	public function minNum($num, $length){
        if($num>=$length) {
            return true;
        }
        $this->errors[] = "Le chiffre doit être supérieur à ".$length;
        return false;
	}

	public static function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        $this->errors[] = "Le format de l'email n'est pas valide";
        return false; 
	}

	public static function checkPwd($pwd){
        if(strlen($pwd)>=6 && 
        strlen($pwd)<=32 && 
		preg_match("/[a-z]/", $pwd) && 
		preg_match("/[A-Z]/", $pwd) && 
		preg_match("/[0-9]/", $pwd)) {
            return true;
        }
        $this->errors[] = "Mot de passe incorrect(Maj, Min, Chiffre, entre 6 et 32)";
        return false;
	}

	public static function checkNumber($number){
        if(is_numeric(trim($number))) {
            return true;
        }
        $this->errors[] = "Chiffre requis";
        return false;
	}
}