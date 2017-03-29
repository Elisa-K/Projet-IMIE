
<link rel="stylesheet" href="web/css/bootstrap.css"><!--css bootstrap-->
<link rel="stylesheet" href="web/css/style.css">

<link rel="stylesheet" href="web/css/colorbox.css"><!--notre style-->
<link rel="stylesheet" href="web/css/slick.css">
<?php
include_once('library/PDOFactory.php');
include_once('models/entities/fichecontact.php');
include_once('models/entities/formation.php');
include_once('models/entities/statut.php');
include_once('models/entities/campusimie.php');
include_once('models/repositories/ContactRepository.php');
include_once('models/repositories/FormationRepository.php');
include_once('models/repositories/StatutRepository.php');
include_once('models/repositories/CampusRepository.php');


$pdo = PDOFactory::getMysqlConnection();

if (isset($_REQUEST['action'])) {
	$action = $_REQUEST['action'];
} else {
	$action = null;
}

switch ($action) {

	case "candidater":
		$statutRepo = new StatutRepository();
		$listStatut = $statutRepo -> getAll($pdo);
		
		$formationRepo = new FormationRepository();
		$listFormation = $formationRepo -> getAll($pdo);
		
		$campusRepo = new CampusRepository();
		$listCampus = $campusRepo -> getAll($pdo);
		
		$vueAAfficher = "views/candidater.php";
		break;



	case "addContact":

		$contact = new FicheContact();
		$contact->setCivilite($_POST["civ"]);
		$contact->setNom($_POST["nom"]);
		$contact->setPrenom($_POST["prenom"]);
		$contact->setDateNaissance($_POST["date_naissance"]);
		$contact->setTel($_POST["tel"]);
		$contact->setEmail($_POST["email"]);
		$contact->setStatut($_POST["situation"]);
		$contact->setOrigineScolaire($_POST["nom_formation"]);
		$contact->setEtabOrigine($_POST["nom_etab"]);
		$contact->setDiplomeObtenu($_POST["nom_diplome"]);
		$contact->setDisponibilite($_POST["dispo"]);
		$contact->setSouhait1($_POST["formation1"]);
		$contact->setSouhait2($_POST["formation2"]);
		$contact->setSouhait3($_POST["formation3"]);
		$contact->setSite($_POST["campus"]);
		$contact->setInfoImie($_POST["info_imie"]);


		$message = $contact->save($pdo, $_POST["formation2"], $_POST["formation3"]);

		$statutRepo = new StatutRepository();
		$listStatut = $statutRepo -> getAll($pdo);
		
		$formationRepo = new FormationRepository();
		$listFormation = $formationRepo -> getAll($pdo);
		
		$campusRepo = new CampusRepository();
		$listCampus = $campusRepo -> getAll($pdo);

		$vueAAfficher = "views/candidater.php";
		break;

	case "agenda":
		
		$vueAAfficher = "views/calendrier.php";
		break;
	
	case "contact":
	
		$vueAAfficher = "views/contact.php";
		break;
	
	
	default:
			$vueAAfficher = "views/accueil.php";
		break;
	}




















//layout.php TOUJOURS a la fin
include_once('layouts/layout.php');
?>

<script src="web/js/jquery-3.1.1.min.js"></script>
<script src="web/js/bootstrap.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="web/js/java.js"></script>
<script src="web/js/jquery.colorbox.js"></script>
<script src="web/js/slick.min.js"></script>