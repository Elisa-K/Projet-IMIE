<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Tableau de Bord - IMIE</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
       <!-- Bootstrap core CSS     -->
    <link href="../web/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="../web/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../web/css/demo.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

 
</head>

<body>

	<div class="wrapper">

	    <div class="sidebar">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<img src="../web/img/logo_imie.png" class="simple-text">
				<label>Bonjour <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']?></label>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li>
	                    <a href="">
	                        <i class="material-icons">home</i>
	                        <p>Accueil</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="">
	                        <i class="material-icons">content_paste</i>
	                        <p>Tableau Fiches Contacts</p>
	                    </a>
	                </li>
	               	<li>
	                    <a href="">
	                        <i class="material-icons">search</i>
	                        <p>Recherche</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="">
	                        <i class="material-icons">person</i>
	                        <p>Nouvel Administrateur</p>
	                    </a>
	                </li>
					<li>
	                    <a href="">
	                        <i class="material-icons">file_upload</i>
	                        <p>Exporter</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="">
	                        <i class="fa fa-sign-out"></i>
	                        <p>Déconnexion</p>
	                    </a>
	                </li>
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
				<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<label>Bienvenue <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']?></label>
									<i class="material-icons">person</i>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#" <i class="fa fa-sign-out"></i>Déconnexion</a></li>
								</ul>
							</li>
						</ul>

					
					</div>
				</div>
			</nav>

			<div class="content">
				<div class="container-fluid">
      				<?php include($vueAAfficher); ?>

			<footer class="footer">
				<div class="container-fluid">

					<p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script> made with love <3
					</p>
				</div>
			</footer>
		</div>
	</div>

</body>


</html>
