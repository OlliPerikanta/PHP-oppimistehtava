<?php
require_once "tarkistus.php";

class ilmoitusPDO {
	private $db;
	private $lkm;
	
	function __construct($dsn = "mysql:host=localhost;dbname=a1500916", $user = "root", $password = "salainen") {
		// Ota yhteys kantaan
		$this->db = new PDO ( $dsn, $user, $password );
		
		// Virheiden jäljitys kehitysaikana
		$this->db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		
		// MySQL injection estoon (paramerit sidotaan PHP:ssä ennen SQL-palvelimelle lähettämistä)
		$this->db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );
		
		// Tulosrivien määrä
		$this->lkm = 0;
	}
	
	// Metodi palauttaa tulosrivien määrän
	function getLkm() {
		return $this->lkm;
	}
    
	
	public function listaa() {
		$sql = "SELECT id, rekkari, aika, paivamaara, email, kommentti
		        FROM ilmoitus";
        
             

		
		// Valmistellaan lause
		if (! $stmt = $this->db->prepare ( $sql )) {
			$virhe = $this->db->errorInfo ();
			
			throw new PDOException ( $virhe [2], $virhe [1] );
		}
		
		// Ajetaan lauseke
		if (! $stmt->execute ()) {
			$virhe = $stmt->errorInfo ();
			
			throw new PDOException ( $virhe [2], $virhe [1] );
		}
		
		// Käsittellään hakulausekkeen tulos
		$tulos = array ();
		
		// Pyydetään haun tuloksista kukin rivi kerrallaan
		while ( $row = $stmt->fetchObject () ) {
			// Tehdään tietokannasta haetusta rivistä leffa-luokan olio
			$ilmoitus = new Ilmoitus ();
			
			$ilmoitus->setId ( $row->id );
			$ilmoitus->setRegistration ( utf8_encode ( $row->rekkari ) );
			$ilmoitus->setKello ( utf8_encode ( $row->aika ) );
			$ilmoitus->setPaivamaara ( utf8_encode ( $row->paivamaara ) );
			$ilmoitus->setEmail ( $row->email );
			$ilmoitus->setInformation ( utf8_encode ( $row->kommentti ) );
			
			
			// Laitetaan olio tulos taulukkoon (olio-taulukkoon)
			$tulos [] = $ilmoitus;
		}
        
    
        
        
        
		
		$this->lkm = $stmt->rowCount ();
		
		return $tulos;
	}
	
	public function haeIlmoitus($rekkari) {
		$sql = "SELECT id, rekkari, aika, paivamaara, email, kommentti
		        FROM ilmoitus
				WHERE rekkari = :rekkari";
		
		// Valmistellaan lause, prepare on PDO-luokan metodeja
		if (! $stmt = $this->db->prepare ( $sql )) {
			$virhe = $this->db->errorInfo ();
			throw new PDOException ( $virhe [2], $virhe [1] );
		}
		
		// Sidotaan parametrit
		$stmt->bindValue ( ":rekkari", $rekkari, PDO::PARAM_INT );
		
		// Ajetaan lauseke
		if (! $stmt->execute ()) {
			$virhe = $stmt->errorInfo ();
			
			if ($virhe [0] == "HY093") {
				$virhe [2] = "Invalid parameter";
			}
			
			throw new PDOException ( $virhe [2], $virhe [1] );
		}
		
		// Käsittellään hakulausekkeen tulos
		$tulos = array ();
		
		while ( $row = $stmt->fetchObject () ) {
			// Tehdään tietokannasta haetusta rivistä leffa-luokan olio
			$ilmoitus = new Ilmoitus ();
			
			$ilmoitus->setId ( $row->id );
			$ilmoitus->setRegistration ( utf8_encode ( $row->registration ) );
			$ilmoitus->setKello ( utf8_encode ( $row->kello ) );
			$ilmoitus->setPaivamaara ( utf8_encode ( $row->paivamaara ) );
			$ilmoitus->setEmail ( $row->email );
			$ilmoitus->setInformation ( utf8_encode ( $row->information ) );
			
			
			// Laitetaan olio tulos taulukkoon (olio-taulukkoon)
			$tulos [] = $ilmoitus;
		}
		
		$this->lkm = $stmt->rowCount ();
		return $tulos;
	}
	
	function lisaaIlmoitus($ilmoitus) {

		$sql = "insert into ilmoitus (rekkari, aika, paivamaara, email, kommentti)
		        values (:rekkari, :aika, :paivamaara, :email, :kommentti)";
		
		// Valmistellaan SQL-lause
		if (! $stmt = $this->db->prepare ( $sql )) {
			$virhe = $this->db->errorInfo ();
			throw new PDOException ( $virhe [2], $virhe [1] );
		}
		
		// Parametrien sidonta
		$stmt->bindValue ( ":rekkari", utf8_decode ( $ilmoitus->getRegistration () ), PDO::PARAM_STR );
        $stmt->bindValue ( ":aika", utf8_decode ( $ilmoitus->getKello () ), PDO::PARAM_STR );
        $stmt->bindValue ( ":paivamaara", utf8_decode ( $ilmoitus->getPaivamaara () ), PDO::PARAM_STR );
        $stmt->bindValue ( ":email", utf8_decode ( $ilmoitus->getEmail () ), PDO::PARAM_STR );
        $stmt->bindValue ( ":kommentti", utf8_decode ( $ilmoitus->getInformation () ), PDO::PARAM_STR );
		
		// Jotta id:n saa lisäyksestä, täytyy laittaa tapahtumankäsittely päälle
		$this->db->beginTransaction();
		
		// Suoritetaan SQL-lause (insert)
		if (! $stmt->execute ()) {
			$virhe = $stmt->errorInfo ();
			
			if ($virhe [0] == "HY093") {
				$virhe [2] = "Invalid parameter";
			}
			 
			// Perutaan tapahtuma
			$this->db->rollBack();
			
			throw new PDOException ( $virhe [2], $virhe [1] );
		}
	 	
		$this->lkm = 1;
		
		// id täytyy ottaa talteen ennen tapahtuman päättymistä
		$id = $this->db->lastInsertId ();
		
		$this->db->commit();
		
		// Palautetaan lisätyn ilmoituksen id
		return $id;
	}
}
?>
