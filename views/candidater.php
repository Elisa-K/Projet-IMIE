<div class="row">
<form id="msform" action="./index.php" method="POST">
	<ul id="progressbar">
		<li class="active">Information personnelle</li>
		<li>Situatuin en cours</li>
		<li>Formation</li>
	</ul>

        <fieldset>
			<div class="row format-form">
				<legend>Information personnelle</legend>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<label for="civ">&lt Civilité /&gt :</label>
					<input name="civ" type="radio" value="1">Monsieur
					<input name="civ" type="radio" value="2">Madame
					<br>
					<label for="nom">&lt Nom /&gt :</label>
					<br>
					<input type="text" name="nom"/>
					<br>
					<label for="prenom">&lt Prénom /&gt :</label>
					<br>
					<input type="text" name="prenom"/>
					<br>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<label for="date_naissance">&lt Date de naissance /&gt :</label>
					<br>
					<input type="date" name="date_naissance"/>
					<br>
					<label for="tel">&lt Téléphone /&gt :</label>
					<br>
					<input type="number" name="tel"/>
					<br>
					<label for="email">&lt E-mail /&gt :</label>
					<br>
					<input type="text" name="email"/>
					<br>
				</div>
			</diV>
			<input type="button" name="next" class="next action-button" value="Next" />
		</fieldset>
		<fieldset>
			<div class="row format-form">
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
					<br>
					<input type="text" name="nom_formation"/>
					<br>
					<label for="nom">&lt Dans quel établissement /&gt :</label>
					<br>
					<input type="text" name="nom_etab"/>
					<br>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<label for="nom">&lt Dernier diplôme obtenu /&gt :</label>
					<br>
					<input type="text" name="nom_diplome"/>
					<br>
					<label for="dispo">&lt Disponibilité /&gt :</label>
					<br>
					<input name="dispo" type="radio" value="Immédiate">Immédiate
					<br>
					<input name="dispo" type="radio" value="Après la formation en cours">Après la formation en cours
					<br>
					<input name="dispo" type="radio" value="Autre">Autre
				</div>
			</div>
			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
		<fieldset>
			<div class="row format-form">
				<legend>Formation</legend>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 formation-css">
					<label for="souhaitFor1">&lt Souhait Formation 1 /&gt :</label>
					<select name="formation1">
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
					<label for="campus" style="margin-bottom: 0px">&lt Campus &gt :</label>
					<br>
						<div class="row" style="padding: 0px">
					<?php foreach ($listCampus as $campus) { ?>
						<div class="col-lg-6">
						<input type="radio" name="campus" value=<?php echo $campus->getId()?>><?php echo $campus->getNom(); ?>
						</div>
					<?php } ?>
						</div>
				</div>
			</div>
			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input id="SaveAccount" type="submit" value="Submit form" />
            <input type="hidden" name="action" value="addContact">
		</fieldset>

            
            <label><?php if(isset($message)) echo $message ?></label>
</form>
</div>