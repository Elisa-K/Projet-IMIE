<link href="../web/css/login.css" rel="stylesheet"/>


<div class="login-page">
  <div class="form">
    <form action='./index.php' method="POST" class="login-form">
      <input type="text" placeholder="e-mail"/>
      <input type="password" placeholder="mot de passe"/>
      <label><input type="checkbox"/>Se souvenir de moi</label>

	<input class="connexion" type="submit" value="Connexion"/>
	<label><?php if(isset($message)) echo $message ?></label>
	<input type="hidden" name="action" value="verifLogin"/>
    </form>
  </div>
</div>




