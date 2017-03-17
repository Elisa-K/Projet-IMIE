<link rel="stylesheet" href="web/css/bootstrap.css"><!--css bootstrap-->
<link rel="stylesheet" href="web/css/style.css"><!--notre style-->
<?php
include_once('library/PDOFactory.php');
include_once('models/entities/formation.php');
include_once('models/entities/statut.php');
include_once('models/entities/campusimie.php');
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