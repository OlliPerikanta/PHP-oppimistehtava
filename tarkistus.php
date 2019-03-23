<?php
class Ilmoitus {  
	private static $virhelista = array (
			- 1 => "Something went wrong",
			0 => "",
			6 => "Car registration number field can not be empty",
			2 => "Use only Finnish car license plate numbers",
			3 => "There is an error on the license plate",
            4 => "The license plate is too short to be Finnish car liecense plate",
            5 => "The license plate is too long to be Finnish car liecense plate",
			11 => "Insert valid email",
            12 => "Email address can not be empty",
			21 => "Please, leave the information of reservation",
			22 => "Please, use valid characters",
			32 => "Date can not be empty",
            33 => "Date is in wrong format. Must be -> DD.MM.YYYY",
			34 => "The date is in the past",
			42 => "Clock time field can not be empty",
			43 => "Select time between 08:00 - 15:59 and enter it in the right format"
	);

	public static function getError($virhekoodi) {
		if (isset ( self::$virhelista [$virhekoodi] ))
			return self::$virhelista [$virhekoodi];

		return self::$virhelista [- 1];
	}

	private $registration;
	private $kello;
    private $paivamaara;
    private $email;
    private $information;
    private $id;
	

	function __construct($registration = "", $kello = "", $paivamaara = "", $email = "", $information = "", $id = 0) {
		$this->registration = trim ( mb_convert_case ( $registration, MB_CASE_TITLE, "UTF-8" ) );
        $this->kello = trim ( mb_convert_case ( $kello, MB_CASE_TITLE, "UTF-8" ) );
        $this->paivamaara = trim ( mb_convert_case ( $paivamaara, MB_CASE_TITLE, "UTF-8" ) );
        $this->email = trim ( $email );
        $this->information = trim ( mb_convert_case ( $information, MB_CASE_TITLE, "UTF-8" ) );
        $this->id = $id;
       
	}
    
    
     ///////////////////////////////////// REKISTERIKILPI /////////////////////////////////////

	public function setRegistration($registration) {
		$this->registration = trim ( $registration );
	}

	public function getRegistration() {
		return $this->registration;
	}
    

	public function checkRegistration($required = true, $min = 7, $max = 7) {

		if ($required == true && strlen ( $this->registration ) == 0) {
			return 6;
		}
        
           if (strlen ( $this->registration ) < $min) {
			return 4;
		}

		if (strlen ( $this->registration ) > $max) {
			return 5;
		}

		if (! preg_match ( "/^[a-zåäöA-ZÅÄÖ]{3}[\-]\d{3}$/", $this->registration )) {
			return 2;
		}
        
          if ($this->registration[strlen($this->registration)-1] == "-") {
            return 3;
        }
    
		return 0;
	}
    
    
     ///////////////////////////////////// KELLONAIKA /////////////////////////////////////

	public function setKello($kello) {
		$this->kello = trim ( $kello );
	}

	public function getKello() {
		return $this->kello;
	}
    

	public function checkKello($required = true) {
	

		if ($required == true && strlen ( $this->kello ) == 0) {
			return 42;
		}

		if (! preg_match ( "/^(08|09|10|11|12|13|14|15):([0-5][0-9])$/", $this->kello )) {
			return 43;
		}

		return 0;
	}
    
    
      ///////////////////////////////////// PAIVAMAARA /////////////////////////////////////
    
    public function setPaivamaara($paivamaara) {
		$this->paivamaara = trim ( $paivamaara );
	}

	public function getPaivamaara() {
		return $this->paivamaara;
	}
    
    public function checkPaivamaara($required = true ) {
        
        
        
		if ($required == true && strlen ( $this->paivamaara ) == 0) {
			return 32;
		}
        
         if (! preg_match ( "/^([0-9]{2})\\.([0-9]{2})\\.([0-9]{4})$/", $this->paivamaara )) {
			return 33;
		}
       
        
        $aika = time();
        
        $nykypaiva = date("j.m.Y", $aika);
        
        
        if(strtotime($nykypaiva) > strtotime($this->paivamaara)){
                return 34;
            }

		return 0;
	}
    
    ///////////////////////////////////// EMAIL /////////////////////////////////////
    
    
	public function setEmail($email) {
		$this->email = trim ( $email );
	}

	public function getEmail() {
		return $this->email;
	}

	public function checkEmail($required = true) {
        
           if ($required == true && strlen ( $this->email ) == 0) {
			return 12;
		}
        
		if (! preg_match ( "/[a-zA-Z0-9.-]+@[a-zA-Z0-9]+\\.[a-z]{2,7}?/", $this->email )) {
			return 11;
		}
        
		return 0;
	}
    
    
   
    
    ///////////////////////////////////// TEKSTIKENTTÄ /////////////////////////////////////
    
    public function setInformation($information){
        $this->information = trim ( $information );
    }
    
    public function getInformation() {
        return $this->information;
    }
    
    public function checkInformation($required = true) {
        
        
        if(! preg_match("/[a-zA-Z0-9.-]/", $this->information)){
    
            return 21;
  }
             
        return 0;
    }
    
    
    public function setId($id) {
		$this->id = trim ( $id );
	}

	public function getId() {
		return $this->id;
	}

}
?>
