<form id="SignupForm" action="./index.php" method="POST">
        <fieldset>
			<div class="row">
				<legend>Information personnelle</legend>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<label for="civ">&lt Civilité /&gt :</label>
					<input name="civ" type="radio" value="1">Monsieur
					<input name="civ" type="radio" value="2">Madame
					<br>
					<label for="nom">&lt Nom /&gt :</label>
					<input type="text" name="nom"/>
					<br>
					<label for="prenom">&lt Prénom /&gt :</label>
					<input type="text" name="prenom"/>
					<br>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<label for="date_naissance">&lt Date de naissance /&gt :</label>
					<input type="date" name="date_naissance"/>
					<br>
					<label for="tel">&lt Téléphone /&gt :</label>
					<input type="number" name="tel"/>
					<br>
					<label for="email">&lt E-mail /&gt :</label>
					<input type="text" name="email"/>
					<br>
				</div>
			</diV>
		</fieldset>
		<fieldset>
			<div class="row">
				<legend>Situation en cours</legend>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<label for="situation">&lt Situation /&gt :</label>
					<select name="situation">
						<?php foreach ($listStatut as $statut) { ?>
								<option value=<?php echo $statut->getId()?>>
									  <?php echo $statut->getNom(); ?>
								</option>
						<?php } ?>
					</select>
					<br>
					<label for="nom">&lt Si formation en cours, laquelle /&gt :</label>
					<input type="text" name="nom_formation"/>
					<br>
					<label for="nom">&lt Dans quel établissement /&gt :</label>
					<input type="text" name="nom_etab"/>
					<br>
					<label for="nom">&lt Dernier diplôme obtenu /&gt :</label>
					<input type="text" name="nom_diplome"/>
					<br>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<label for="dispo">&lt Disponibilité /&gt :</label>
					<br>
					<input name="dispo" type="radio" value="Immédiate">Immédiate
					<br>
					<input name="dispo" type="radio" value="Après la formation en cours">Après la formation en cours
					<br>
					<input name="dispo" type="radio" value="Autre">Autre
				</div>
			</div>
        </fieldset>
		<fieldset>
			<div class="row">
				<legend>Formation</legend>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<label for="souhaitFor1">&lt Souhait Formation 1 /&gt :</label>
					<select name="formation1">
								<option value=""></option>
						<?php foreach ($listFormation as $formation) { ?>
								<option value=<?php echo $formation->getId()?>>
									  <?php echo $formation->getNom(); ?>
								</option>
						<?php } ?>
					</select>
					<br>
					<label for="souhaitFor2">&lt Souhait Formation 2 /&gt :</label>
					<select name="formation2">
								<option value=""></option>
						<?php foreach ($listFormation as $formation) { ?>
								<option value=<?php echo $formation->getId()?>>
									  <?php echo $formation->getNom(); ?>
								</option>
						<?php } ?>
					</select>
					<br>
					<label for="souhaitFor3">&lt Souhait Formation 3 /&gt :</label>
					<select name="formation3">
								<option value=""></option>
						<?php foreach ($listFormation as $formation) { ?>
								<option value=<?php echo $formation->getId()?>>
									  <?php echo $formation->getNom(); ?>
								</option>
						<?php } ?>
					</select>
					<br>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<label for="campus">&lt Campus &gt :</label>
					<br>
						<div class="row">
					<?php foreach ($listCampus as $campus) { ?>
						<div class="col-lg-6">
						<input type="radio" name="campus" value=<?php echo $campus->getId()?>><?php echo $campus->getNom(); ?>
						</div>
					<?php } ?>
						</div>
				</div>
			</div>
		</fieldset>

            <input id="SaveAccount" type="submit" value="Submit form" />
            <input type="hidden" name="action" value="addContact">
            <label><?php if(isset($message)) echo $message ?></label>
		
</form>