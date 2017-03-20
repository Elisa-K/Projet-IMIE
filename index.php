<link rel="stylesheet" href="web/css/bootstrap.css"><!--css bootstrap-->
<link rel="stylesheet" href="web/css/style.css"><!--notre style-->
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
		$dateNaissance = $_POST["date_naissance"];

		$objDate = DateTime::createFromFormat('d/m/Y', $dateNaissance);
		$dateNaissance = $objDate->format("Y-m-d");

		$contact->setDateNaissance($dateNaissance);
		$contact->setTel($_POST["tel"]);
		$contact->setEmail($_POST["email"]);
		$contact->setStatut($_POST["situation"]);
		$contact->setOrigineScolaire($_POST["nom_formation"]);
		$contact->setEtabOrigine($_POST["nom_etab"]);
		$contact->setDiplomeObtenu($_POST["nom_diplome"]);
		$contact->setDisponibilite($_POST["dispo"]);
		$contact->setSouhait1($_POST["souhaitFor1"]);
		$contact->setSouhait2($_POST["souhaitFor2"]);
		$contact->setSouhait3($_POST["souhaitFor3"]);
		$contact->setCampus($_POST["campus"]);


		//On prépare la vue à afficher ensuite
		$message = $contact->save($pdo);
		$vueAAfficher = "views/formAddClient.php";
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
<script type="text/javascript" src="web/js/formToWizard.js"></script>
<script src="web/js/java.js"></script>