 <link href="./web/css/login.css" rel="stylesheet"/>
			<div class="col-lg-12">

				<div class="login-page">
					<img src="./web/img/logo_imie.png">
	  				<div class="form">
	   					 <form action='./index.php' method="POST" class="login-form">
			
							<label>Bienvenue</label>
						    <input type="text" name ="mail" placeholder="e-mail"/>
						    <input type="password" name="mdp" placeholder="mot de passe"/>
							<input type="checkbox" name="">Se souvenir de moi</input>

							<input class="connexion" type="submit" value="Connexion"/>
							<label><?php if(isset($message)) echo $message ?></label>
							<input type="hidden" name="action" value="verifLogin"/>

	    				</form>
	  				</div>
				</div>
			</div>



