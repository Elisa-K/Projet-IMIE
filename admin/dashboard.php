<link href="web/css/bootstrap.min.css" rel="stylesheet" />
<link href="web/css/material-dashboard.css" rel="stylesheet"/>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>


<?php
session_start();
include_once('../library/PDOFactory.php');
include_once('../models/entities/admin.php');
include_once('../models/entities/fichecontact.php');
include_once('../models/entities/formation.php');
include_once('../models/entities/campusimie.php');
include_once('../models/entities/statut.php');
include_once('../models/repositories/ContactRepository.php');
include_once('../models/repositories/FormationRepository.php');
include_once('../models/repositories/CampusRepository.php');
include_once('../models/repositories/StatutRepository.php');


$pdo = PDOFactory::getMysqlConnection();

if (isset($_REQUEST['action'])) {
	$action = $_REQUEST['action'];

} else {
	$action = null;

}

switch ($action) {

/*Déconnexion*/
	case "disconnect":
		$_SESSION = array();
		session_destroy();
		header ('location:index.php');
		exit();
	break;

/*Tableau Liste Fiches Contact*/
	case "listContact":
			if(!empty($_SESSION['mail'])) {
			$contactRepo = new ContactRepository();
			$listContact = $contactRepo -> getAll($pdo);
			$nbFiches = $contactRepo -> getNb($pdo);

			$vueAAfficher = "views/listContact.php";

		}else {
			header ('location:index.php');
			exit();
		}
	break;

/*Edition d'une fiche contact*/
	case "formEditContact":
		if(!empty($_SESSION['mail'])) {

			$contactRepo = new ContactRepository();
			$id = $_GET['id'];
			$contact = $contactRepo->getOneById($pdo, $id);

			$campusRepo = new CampusRepository();
			$listCampus = $campusRepo -> getAll($pdo);

			$formationRepo = new FormationRepository();
			$listFormation = $formationRepo -> getAll($pdo);

			$vueAAfficher = "views/formEditContact.php";
		}else {
			header ('location:index.php');
			exit();
		}
	break;

/*Fonction mise à jour de la fiche*/	
	case "updateContact":
		if(!empty($_SESSION['mail'])) {
			$contact = new FicheContact();
		    $contact->setId($_POST['id']);
		    $contact->setCivilite($_POST['civ']);
		    $contact->setNom($_POST['nom']);
		    $contact->setPrenom($_POST['prenom']);
		    $contact->setDateNaissance($_POST['dateNaissance']);
		    $contact->setSouhait1($_POST['formation1']);
		    $contact->setSouhait2($_POST['formation2']);
		    $contact->setSouhait3($_POST['formation3']);
		    $contact->setSite($_POST['campus']);
		    $contact->setEmail($_POST['email']);
		    $contact->setTel($_POST['tel']);


			$message = $contact->save($pdo, $_POST["formation2"], $_POST["formation3"]);

			$contactRepo = new ContactRepository();
			$id = $_POST['id'];
			$contact = $contactRepo->getOneById($pdo, $id);

			$campusRepo = new CampusRepository();
			$listCampus = $campusRepo -> getAll($pdo);

			$formationRepo = new FormationRepository();
			$listFormation = $formationRepo -> getAll($pdo);

			$vueAAfficher = "views/formEditContact.php";
		}else {
			header ('location:index.php');
			exit();
		}
	break;

/*Supprimer une ou pluseurs fiches*/	
 	case "deleteContact":

	if(!empty($_SESSION['mail'])) {

		if(isset($_POST['tabId']) && !empty($_POST['tabId']) ){

			for($i=0; $i<COUNT($_POST['tabId']);$i++){
				$id = $_POST['tabId'][$i];
				$contact = new FicheContact();
				$contact->setId($id);
				$message = $contact->delete($pdo, $id);
			}
		}else{
			$message = "Veuillez sélectionner une ou plusieurs fiches";
		
		}
		$contactRepo = new ContactRepository();
		$listContact = $contactRepo->getAll($pdo);

		$nbFiches = $contactRepo -> getNb($pdo);
		$vueAAfficher = "views/listContact.php";
	}else {
			header ('location:index.php');
			exit();
	}

 	break;

/*Exporter une ou plusieurs fiches au format .csv*/	
 	case "export":

	if(!empty($_SESSION['mail'])) {
		if(isset($_POST['tabId']) && !empty($_POST['tabId']) ){
			$tabId = $_POST['tabId'];
			$id = implode(",", $tabId);
			
			$contactRepo = new ContactRepository();
			$exportContact = $contactRepo -> export($pdo, $id);

			$contactRepo = new ContactRepository();
			$listContact = $contactRepo -> getAll($pdo);
			$nbFiches = $contactRepo -> getNb($pdo);

			$message = "L'exportation a été réalisé avec succès !";
			$vueAAfficher = "views/listContact.php";

		}else{
			$contactRepo = new ContactRepository();
			$listContact = $contactRepo -> getAll($pdo);
			$nbFiches = $contactRepo -> getNb($pdo);
			$message = "Veuillez sélectionner une ou plusieurs fiches";
			$vueAAfficher = "views/listContact.php";
		}
		}else {
			header ('location:index.php');
			exit();
		}
	break;

/*Exporter une ou plusieurs fiches au format .csv et l'envoyer par email*/	
 	case "mailExport":

	if(!empty($_SESSION['mail'])) {
		if(isset($_POST['tabId']) && !empty($_POST['tabId']) ){
			$tabId = $_POST['tabId'];
			$id = implode(",", $tabId);
			
			$contactRepo = new ContactRepository();
			$exportContact = $contactRepo -> export($pdo, $id);
			$exportContact = $contactRepo -> sendMail();

			$contactRepo = new ContactRepository();
			$listContact = $contactRepo -> getAll($pdo);
			$nbFiches = $contactRepo -> getNb($pdo);

			$message = "L'exportation a été réalisé avec succès !";
			$vueAAfficher = "views/listContact.php";

		}else{
			$contactRepo = new ContactRepository();
			$listContact = $contactRepo -> getAll($pdo);
			$nbFiches = $contactRepo -> getNb($pdo);
			$message = "Veuillez sélectionner une ou plusieurs fiches";
			$vueAAfficher = "views/listContact.php";
			}
		}else {
			header ('location:index.php');
			exit();
		}
	break;

/*formulaire nouvel administrateur*/		
	case "signin":

		if(!empty($_SESSION['mail'])) {
			$vueAAfficher = "views/formAddAdmin.php";
		}else {
			header ('location:index.php');
			exit();
		}
	break;

/*Ajouter un nouvel administrateur*/	
	case "addAdmin":
		if(!empty($_SESSION['mail'])) {
			if($_POST['mdp'] == $_POST['mdp2']){


			$admin = new Admin();
			$admin -> setNom($_POST['nom']);
			$admin -> setPrenom($_POST['prenom']);
			$admin -> setMail($_POST['email']);
			$admin -> setMdp($_POST['mdp']);

			$message = $admin->save($pdo);
			$vueAAfficher = "views/formAddAdmin.php";

			}else{
				$message2 = "Mots de passe non identiques !";
				$vueAAfficher = "views/formAddAdmin.php";
			}
		}else {
			header ('location:index.php');
			exit();
		}
	break;

/*formulaire recherche de fiche*/	
	case "recherche":
		if(!empty($_SESSION['mail'])) {

			$campusRepo = new CampusRepository();
			$listCampus = $campusRepo -> getAll($pdo);

			$formationRepo = new FormationRepository();
			$listFormation = $formationRepo -> getAll($pdo);

			$vueAAfficher = "views/recherche.php";
		}else {
			header ('location:index.php');
			exit();
		}
	break;
/*formulaire recherche de fiche -> résultat de la recherche*/	
	case "resultatRecherche":
		if(!empty($_SESSION['mail'])) {
			if(!empty($_POST["nom"]) || !empty($_POST["prenom"]) || !empty($_POST["naissance"]) || !empty($_POST["creation"]) || !empty($_POST["campus"]) || !empty($_POST["formation1"]) ){

		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$naissance = $_POST["naissance"];
		$creation = $_POST["creation"];
		$campus = $_POST["campus"];
		$formation1 = $_POST["formation1"];

		$contactRepo = new ContactRepository();
		$listContact = $contactRepo->search($pdo, $nom, $prenom, $naissance, $creation, $campus, $formation1);

		$campusRepo = new CampusRepository();
		$listCampus = $campusRepo -> getAll($pdo);

		$formationRepo = new FormationRepository();
		$listFormation = $formationRepo -> getAll($pdo);
		$vueAAfficher = "views/recherche.php";
			}else {
				header ('location:index.php');
				exit();
			}
		}
	break;
	
	default:
		if(empty($_SESSION['mail'])) {
			$vue = "views/login.php";
		} else {
			$contactRepo = new ContactRepository();
			$listContact = $contactRepo -> getAll($pdo);
			$nbFiches = $contactRepo -> getNb($pdo);
			$vueAAfficher = "views/listContact.php";
			break;
		}

}













//layout.php TOUJOURS a la fin
		
			include_once('layouts/layout.php');
	

?>
	<!--   Core JS Files   -->

	<script src="web/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="web/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="web/js/material.min.js" type="text/javascript"></script>




	<!--  Notifications Plugin    -->
	<script src="web/js/bootstrap-notify.js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="web/js/material-dashboard.js"></script>

	<script src="web/js/java.js"></script>

<script type="text/javascript" src="web/js/jquery-latest.js"></script> 
<script type="text/javascript" src="web/js/jquery.tablesorter.js"></script> 

	<script type="text/javascript">
	    $(document).ready(function() 
    { 
        $("#table").tablesorter( {sortList: [[0,0], [1,0]]} ); 
    } 
); 
    	$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();

    	});


	</script>
