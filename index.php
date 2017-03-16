<link rel="stylesheet" href="web/css/bootstrap.css"><!--css bootstrap-->
<link rel="stylesheet" href="web/css/style.css"><!--notre style-->
<?php
include_once('library/PDOFactory.php');


$pdo = PDOFactory::getMysqlConnection();

if (isset($_REQUEST['action'])) {
	$action = $_REQUEST['action'];
} else {
	$action = null;
}

switch ($action) {

	default:
			$vueAAfficher = "views/accueil.php";
	break;
	}




















//layout.php TOUJOURS a la fin
include_once('layouts/layout.php');
?>
<script src="web/js/jquery-3.1.1.min.js"></script>
<script src="web/js/bootstrap.js"></script>
<script src="web/js/java.js"></script>