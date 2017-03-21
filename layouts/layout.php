<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>IMIE | Ecole de la filière du numérique</title>
</head>
<body>
	<div class="container">
		<div class="header">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<button type="button" class="navbar-toggle toggle-nav collapsed" id="btn-navi" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar" style="background-color:white"></span>
							<span class="icon-bar" style="background-color:white"></span>
							<span class="icon-bar" style="background-color:white"></span>
						</button>
						<img src="web/img/logo_imie.png" class="logo" alt="logo imie"/>
					</div>
					<div class="collapse navbar-collapse col-xs-12 col-sm-12 col-md-12 col-lg-12" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">	
							<li class="li-nav" onmouseover="this.style.background='#48B9C7';this.style.borderRadius='10px 0 0 10px'" onmouseout="this.style.background='';this.style.color='';"><a href="./index.php">Accueil</a></li>
							<li class="li-nav" onmouseover="this.style.background='#E5324B';" onmouseout="this.style.background='';this.style.color='';"><a href="https://imie-ecole-informatique.fr/formations">Formations</a></li>
							<li class="li-nav" onmouseover="this.style.background='#FDB515';" onmouseout="this.style.background='';this.style.color='';"><a href="./index.php?action=agenda">Agenda</a></li>
							<li class="li-nav" onmouseover="this.style.background='#48B9C7';" onmouseout="this.style.background='';this.style.color='';"><a href="./index.php?action=candidater">Candidater</a></li>
							<li class="li-nav" onmouseover="this.style.background='#E5324B';this.style.borderRadius='0 10px 10px 0'" onmouseout="this.style.background='';this.style.color='';"><a href="">Contact</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>
<!--fin header-->
<!--debut vue afficher-->
	<div class="container">
		<?php include($vueAAfficher);?>
	</div>
<!--fin vue afficher-->
	<footer class="footer">
		<div class="container">
			<div class="row main-footer">
				<div class="list-footer col-lg-6">
					<ul>
						<li><a class="text-muted" href="">Mentions légales</a></li>
						<li><a class="text-muted" href="">Contact</a></li>
						<li><a class="text-muted" href="">Plan du site</a></li>
						<li><a class="text-muted" href="./admin/index.php">ADMIN</a></li>
					</ul>
				</div>
				<div class="col-lg-6 text-footer">
					<p class="text-muted">copyright© IMIE | Développement et Webdesign ACTANCE - Agence</p>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>