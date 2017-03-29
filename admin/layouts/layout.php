<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Tableau de Bord - IMIE</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

</head>

<body>

	<div class="wrapper">

	    <div class="sidebar" data-image="./web/img/sidebar-3.jpg">

			<div class="logo">
				<img src="./web/img/logo_imie.png" class="simple-text">
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li>
	                    <a href="./dashboard.php?action=listContact" class="btn-menu2">
	                        <i class="material-icons">content_paste</i>
	                        <p>Fiches Contacts</p>
	                    </a>
	                </li>
	               	<li>
	                    <a href="./dashboard.php?action=recherche" class="btn-menu3">
	                        <i class="material-icons">search</i>
	                        <p>Recherche</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="./dashboard.php?action=signin" class="btn-menu4">
	                        <i class="material-icons">person</i>
	                        <p>Nouvel Administrateur</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="./dashboard.php?action=disconnect" class="btn-menu6">
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
									<li><a href="./dashboard.php?action=disconnect" <i class="fa fa-sign-out"></i>Déconnexion</a></li>
								</ul>
							</li>
						</ul>

					
					</div>
				</div>
			</nav>

			<div class="content">
				<div class="container-fluid">
      				<?php include($vueAAfficher); ?>

      			</div>
			</div>

			<footer class="footer">
				<div class="container-fluid">

					<p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script> made with love <3
					</p>
				</div>
			</footer>


</body>


</html>
