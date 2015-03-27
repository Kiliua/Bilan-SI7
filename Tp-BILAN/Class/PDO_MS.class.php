<?php
class PDO_MS {
	private $connexion;
	
	public function connexion() {
		$PARAM_hote = 'localhost';
		$PARAM_nom_bd= 'Camping';
		$PARAM_utilisateur = 'root';
		$PARAM_mot_passe = '';
		try {
		$this->connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
	
		}
	catch (Exception $e) {
			die ("impossible de se connecter : " .$e->getMessage());
			
		}
		
		
	}
	public function __get($propriete) {
		switch ($propriete) {
			case 'connexion' : {
				return $this->connexion;
				break;
			}				

		}
	}	
	
}

