   <!-- Bootstrap core CSS     -->
    <link href="web/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="web/css/demo.css" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
<?php
session_start();

include_once('../library/PDOFactory.php');
include_once('../models/entities/admin.php');
include_once('../models/repositories/AdminRepository.php');

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
			$_SESSION['prenom'] = $admin->getPrenom();
			$_SESSION['mdp'] = $admin->getMdp();
			$_SESSION['id'] = $admin->getId();

	
			//On prépare la vue à afficher avec les données dont elle a besoin
			header ('location:dashboard.php');
			exit();
		} else {
				$message = "Identifiants invalides !";
				$vue = "views/login.php";
			}
		break;

		

	default:
		if(empty($_SESSION['mail']) && empty($_SESSION['mdp'])) {
			$vue = "views/login.php";
		} else {
			$_SESSION = array();
			session_destroy();
			$vue = "views/login.php";

			break;
		}

}













//layout.php TOUJOURS a la fin

		include_once('layouts/layoutLogin.php');
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
	<script src="web/js/demo.js">
	</script>
