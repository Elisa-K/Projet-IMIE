<link href="../web/css/login.css" rel="stylesheet"/>
<link href="../web/css/bootstrap.min.css" rel="stylesheet" />

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="login-page">
					<img src="../web/img/logo_imie.png">
	  				<div class="form">
	   					 <form action='./index.php' method="POST" class="login-form">
			
							<label>Bienvenue</label>
						    <input type="text" placeholder="e-mail"/>
						    <input type="password" placeholder="mot de passe"/>

							<input class="connexion" type="submit" value="Connexion"/>
							<label><?php if(isset($message)) echo $message ?></label>
							<input type="hidden" name="action" value="verifLogin"/>

	    				</form>
	  				</div>
				</div>
			</div>
		</div>
	</div>

