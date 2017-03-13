   <!-- Bootstrap core CSS     -->
    <link href="web/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="web/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="web/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
<?php

include_once('../library/PDOFactory.php');

















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

<?php



















//layout.php TOUJOURS a la fin
include_once('layouts/layout.php');
?>