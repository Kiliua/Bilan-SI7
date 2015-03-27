<?php

class Page_Reservation extends page_base {	
	private $connexion;
	private $PDO;

	public function __construct($p) {
		parent::__construct($p);
		$this->PDO=New PDO_MS();
		$this->PDO->connexion("Camping");
		$this->connexion=$this->PDO->connexion;
		
	}
	
	public function Creation_Reservation_1()
	{
		$vretour="
				<p>  
				<form method='POST' action='Reservation.php'>";
		$req = "Select IDCLIENT,NOMC,PRENOMC From client order by NOMC";
		$res = $this->connexion->query($req);
		

	if(isset($res)){
		 $vretour= $vretour."
						<select name='listeclients' style='width:60%;'><option value=''></option>";
				while ($donnees = $res->fetch(PDO::FETCH_OBJ)) {					
					$vretour= $vretour.'<option value=' . $donnees->IDCLIENT . '>'. $donnees->IDCLIENT .' - ' . $donnees->NOMC . '- ' . $donnees->PRENOMC . '</option>';
					
					} 
					$vretour=$vretour."</select><br>";
					$vretour=$vretour."<input type='button' class='submit' value='Retour'>";
					$vretour=$vretour."<input type='submit' class='submit' value='Suivant'></form></p>";
					return $vretour;
	}
		
	}
	
}