
<?php

class page_base
{
	
	private $titre;
	private $style=array('complement','principal','secondaire');
	private $corps;
	private $page;
	private $connexion;
	private $PDO;

	
	
	public function __construct($p) //Constructeur de la page base
	{
		$this->page = $p;		
		$this->PDO=New PDO_MS();
		$this->PDO->connexion("Camping");
		$this->connexion=$this->PDO->connexion;
	}
	

	/******** Gestion des setters  *******************/
	public function __set($propriete, $valeur)
	{
		switch ($propriete) {
			case 'style' : {
				$this->style[count($this->style)+1] = $valeur;
				break;
			}			
			case 'corps' : {
				$this->corps = $valeur;
				break;
			}
			case 'parametre' : {
				$this->parametre = $valeur;
				break;
			}
		}
	}
	
	/******** Gestion du titre  *******************/
	private function affiche_titre()
	{
		echo utf8_encode($this->titre);
	}
 
	
	/*************Gestion des styles *********************/
	private function affiche_style()
	{
		foreach ($this->style as $s) {
			echo "<link rel='stylesheet' href='styles/".$s.".css' />\n";
		}
	}
	
	

	/************** Affichage du pied de la page ***************************/
	private function affiche_footer()
	{	
		?>		
			<br />  <!-- saut de ligne  -->

				<p id='pied'>  <!-- pied de page  -->
					copyright Camping l'Escargot - R&eacute;alis&eacute; par Dev'Web - <a href="#">Mentions l&eacute;gales</a>
				</p>
				
			</div> <!-- fin du div contenu --> 			
		<?php
	}
	
	/************** Affichage du pied du corps ***************************/	
	private function affiche_corps()
	{
		?> <div id="contenu"> <?php
		 echo utf8_encode($this->corps);	
 		?> </div> <?php
	}		
	
	/************** Affichage du pied de la nav ***************************/
	private function affiche_nav()
	{                                    
		?>  
        <div id="conteneurmenu">  <!-- menu apparaissant � gauche de la page -->
				<ul>
					<li><a href="index.html">Accueil</a></li>
					<li><a href="le_camping.html">le camping</a></li>
					<li><a href="activites.html">les activit&eacute;s</a></li>
                    <li><a href="bungalows.html">les bungalows</a></li>
                    <li><a href="Reservation.php">les résérvations</a></li>
					<li><a href="tarifs.html">Tarifs</a></li>
				</ul>
			</div>  <!-- fin du div conteneurmenu  -->  
          <?php
	}
	
	/************** Affichage du pied du header ***************************/
	private function affiche_header() {
	?>	
		<a href="index.html"><img alt="logo du camping" src="image/logo_camping.jpg" class="gauche" /></a>   <!-- permet de revenir � la page index en cliquant sur le logo du camping  -->
			<img alt="label qualite" src="image/camping_qualite.jpg" class="droite" />
		<div id="entete">  <!-- bandeau en haut de la page -->
				<p>Bienvenue au camping l'Escargot</p>
			</div>  <!-- fin du div entete -->
	<?php 	
	}

	
	/************** Gestion des dates  ***************************/
	public function AfficheDate($daterecu) // RECU : 2014-12-31 ENVOI : 31/12/2014
	{ 										
		$date = (string)$daterecu;
		$vretour = substr($date,8,2).'/'.substr($date,5,2).'/'.substr($date,0,4);
		return $vretour;
	}
	
	public function envoiMysqlDate($daterecu) // RECU : 31/12/2014 ENVOI : 2014-12-31
	{ 
	
		$dateA = str_replace('/', '-', $daterecu);
		$vretour = date('Y-m-d', strtotime($dateA));
		//$vretour = '2015-01-23';
		/*
		 * $date = DateTime::createFromFormat('d/m/Y', "24/04/2012");
			echo $date->format('Y-m-d');
		*/
		return $vretour;
	}
	
	
	/********** Affichage de la page *******/
	/*
	 * <link rel="stylesheet" href="STYLES/jquery-ui.css">
	 * <link rel="stylesheet" href="STYLES/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8">
	*/
	public function affiche() {	
	?>         
			<!DOCTYPE html>
			 	

   
 		
			<head>
		<!-- titre de la page -->
    	<title>Camping l'Escargot  - H&ocirc;tellerie de Plein-Air - Accueil</title>
		
		<!-- balise m�ta pr�cisant le jeu de caract�re utilis� -->
      	<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
		
		<!-- Int�gration de la feuille de style -->
		<link rel="stylesheet" type="text/css" href="style/principal.css" />
   	
					<title>
						Camping
					</title>
					
					 
					 
					 		<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
							<script src="js/languages/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
							<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

							
							<script src="js/jquery-ui.js"></script>
							
							
							<script type="text/javascript" src="js/searchabledroplist/jquery.searchabledropdown-1.0.8.min.js"></script>
							<script type="text/javascript">
								$(document).ready(function() {
									
									$('#listeclients').searchable();
								});						
								jQuery(document).ready(function(){
   											$( ".datepicker" ).datepicker();	
   	   										jQuery("form").validationEngine();   	   										
								});
   									
							</script>
					
					<?php 
						$this->affiche_style(); 
					?>
				</head>
				<div id="conteneur">
				<header>
				
				<?php 
				
				$this->affiche_header();				
				?>				
				</header>
				<body>				
				<div id="centre">
				<?php
				$this->affiche_nav();
				
				$this->affiche_corps();
				
				?>
				</div>				
				</body>	
				</div>			
				<footer>
				<?php 
				$this->affiche_footer();
				?>				
				</footer>
			</html>
		<?php
	}
	
		
	}
	

?>
