<div class="row">
<form id="msform" action="./index.php" method="POST">
            <label><?php if(isset($message)) echo $message ?></label>
	<ul id="progressbar">
		<li class="active">Informations personnelles</li>
		<li>Situation en cours</li>
		<li>Formation</li>
	</ul>

        <fieldset>
			<div class="row format-form">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<label for="civ" id="civ_civ">&lt Civilité /&gt <em>*</em> :</label>
					<br>
					<div class="civilite">
					<input name="civ" id="civ1" type="radio" onclick="verifCiv()" value="1">Monsieur
					<input name="civ" id="civ2" type="radio" onclick="verifCiv()" value="2">Madame
					</div>
					<br>
					<label for="nom">&lt Nom /&gt <em>*</em> :</label>
					<br>
					<input type="text" name="nom" id="nom" onblur="verifNom(this)"/>
					<br>
					<label for="prenom">&lt Prénom /&gt <em>*</em> :</label>
					<br>
					<input type="text" name="prenom" id="prenom" onblur="verifPrenom(this)"/>
					<br>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<label for="date_naissance">&lt Date de naissance /&gt <em>*</em> :</label>
					<br>
					<input type="date" name="date_naissance" id="date_naissance" onblur="verifNais(this)"/>
					<br>
					<label for="tel">&lt Téléphone /&gt <em>*</em> :</label>
					<br>
					<input type="tel" name="tel" id="tel" onblur="verifTel(this)"/>
					<br>
					<label for="email">&lt E-mail /&gt <em>*</em> :</label>
					<br>
					<input type="text" name="email" id="email" onblur="verifEmail(this)"/>
					<br>
				</div>
			</diV>
			<input type="button" name="next" class="next action-button" onclick="verifPage1()" value="Suivant"/>
		</fieldset>
		<fieldset>
			<div class="row format-form">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<label for="situation">&lt Situation /&gt <em>*</em> :</label>
					<br>
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
					<label for="nom">&lt Dernier diplôme obtenu /&gt <em>*</em> :</label>
					<br>
					<input type="text" name="nom_diplome" id="nom_diplome" onblur="verifDiplo(this)"/>
					<br>
					<label for="dispo" id="dispo_dispo">&lt Disponibilité /&gt <em>*</em> :</label>
					<br>
					<input name="dispo" id="dispo1" type="radio" value="Immédiate" onclick="afficherAutre()">Immédiate
					<br>
					<input name="dispo" id="dispo2" type="radio" value="Après la formation en cours" onclick="afficherAutre()">Après la formation en cours
					<br>
					<input name="dispo" id="dispo3" type="radio" onclick="afficherAutre()">Autre
					<input id="autre" type="text" name="dispo" style="display: none;">
				</div>
			</div>
			<input type="button" name="previous" class="previous action-button" value="Précédent" />
			<input type="button" name="next" class="next action-button" value="Suivant" onclick="verifPage2()"/>
        </fieldset>
		<fieldset>
			<div class="row format-form">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 formation-css">
					<label for="souhaitFor1">&lt Souhait Formation 1 /&gt <em>*</em> :</label>
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
					<label for="campus" style="margin-bottom: 0px" id="camp_camp">&lt Campus &gt <em>*</em> :</label>
					<br>
						<div class="row" style="padding: 0px">
					<?php foreach ($listCampus as $campus) { ?>
						<div class="col-lg-6">
						<input type="radio" name="campus" id="camp" onclick="verifCamp()" value=<?php echo $campus->getId()?>><?php echo $campus->getNom(); ?>
						</div>
					<?php } ?>
						</div>
					<br>
					<label for="info_imie">&lt Je connais l'IMIE &gt :</label>
					<select name="info_imie">
						<option value="site internet">Site internet</option>
						<option value="evenement">Evénement</option>
						<option value="affichage">Affichage</option>
						<option value="presse">Presse</option>
						<option value="radio">Radio</option>
						<option value="cio/lycee">CIO/Lycée</option>
						<option value="entreprise">Entreprise</option>
						<option value="parents">Parents</option>
						<option value="amis/bouche a oreille">Amis/bouche à oreille</option>
					</select>
					
				</div>
			</div>
			<input type="button" name="previous" class="previous action-button" value="Précédent" />
			<input id="SaveAccount" type="button" value="Envoyer" onclick="submitContact()"/>
            <input type="hidden" name="action" value="addContact">
		</fieldset>

            

</form>
</div>
<div class="row">
<div class="col-sm-12"><p>* indique un champ obligatoire</p></div>
</div>