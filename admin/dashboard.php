   <!-- Bootstrap core CSS     -->
    <link href="web/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="web/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="web/css/demo.css" rel="stylesheet"/>


    <!--     Fonts and icons     -->
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

	case "verifLogin":
		$adminRepo = new AdminRepository();
		$admin = $adminRepo->getAdmin($pdo, $_POST['mail'], $_POST['mdp']);

		if($admin) {
			$_SESSION['mail'] = $admin->getMail();
			$_SESSION['nom'] = $admin->getNom();
			$_SESSION['mdp'] = $admin->getMdp();
			$_SESSION['prenom'] = $admin->getPrenom();
			$_SESSION['id'] = $admin->getId();
			//On prépare la vue à afficher avec les données dont elle a besoin
			$vueAAfficher = "views/home.php";
		} else {
				$message = "Identifiants invalides !";
				$vue = "views/login.php";
			}
		break;

	case "disconnect":
		$_SESSION = array();
		session_destroy();
		header ('location:index.php');
		exit();
		break;



	case "listContact":
			if(!empty($_SESSION['mail'])) {
			$contactRepo = new ContactRepository();
			$listContact = $contactRepo -> getAll($pdo);
			$nbFiches = $contactRepo -> getNb($pdo);

			$vueAAfficher = "views/listContact.php";

		}
		break;

	case "export":
	if(!empty($_SESSION['mail'])) {
			$contactRepo = new ContactRepository();
			$export = $contactRepo -> export($pdo);

			$vueAAfficher = "views/listContact.php";
		}
	break;

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


			$message = $contact->save($pdo);

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

	case "signin":
		if(!empty($_SESSION['mail'])) {
			$vueAAfficher = "views/signin.php";
		}else {
			header ('location:index.php');
			exit();
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

	<!--  Charts Plugin -->
	<script src="web/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="web/js/bootstrap-notify.js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="web/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="web/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();

    	});
	</script>
