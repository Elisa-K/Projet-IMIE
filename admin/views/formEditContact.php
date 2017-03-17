	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                <div class= "col-md-1"></div>
	                    <div class="col-md-10">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Editer le contact</h4>
	                            </div>
	                            <div class="card-content">
	                                <form>
	                                    <div class="row">
	                                        <div class="col-md-1">
												<div class="form-group label-floating">
													<label class="control-label">Civilité</label>
													<input type="text" class="form-control" name="civ" value="<?php echo $contact->getCivilite() ?>">
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Nom</label>
													<input type="text" class="form-control" name="nom" value="<?php echo $contact->getNom() ?>" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Prenom</label>
													<input type="text" class="form-control" name="prenom" value="<?php echo $contact->getPrenom() ?>">
												</div>
	                                        </div>
	                                       	<div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Date de Naissance</label>
													<input type="date" class="form-control" name="date_naissance" value="<?php echo $contact->getDateNaissance() ?>">
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Email</label>
													<input type="email" class="form-control" name="email" value="<?php echo $contact->getEmail() ?>">
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Téléphone</label>
													<input type="text" class="form-control" name="tel" value="<?php echo $contact->getTel() ?>">
												</div>
	                                        </div>
	                                       <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Souhait Campus</label>
													<select class="form-control" name="campus" >
													<option><?php echo $contact->getSite()->getNom() ?></option>
													<?php foreach ($listCampus as $campus ) { ?>
													        <option value=<?php echo $campus->getId()?>>
															      <?php echo $campus->getNom(); ?>
															</option>
													<?php } ?>
													</select>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                       <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Souhait Formation 1</label>
													<select class="form-control" name="formation1" >
													<option><?php echo $contact->getSouhait1()->getNom() ?></option>
													<?php foreach ($listFormation as $formation) { ?>
													        <option value=<?php echo $formation->getId()?>>
															      <?php echo $formation->getNom(); ?>
															</option>
													<?php } ?>
													</select>
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Souhait Formation 2</label>
													<select class="form-control" name="formation2" >
													<option><?php echo $contact->getSouhait2()->getNom() ?></option>
													<?php foreach ($listFormation as $formation) { ?>
													        <option value=<?php echo $formation->getId()?>>
															      <?php echo $formation->getNom(); ?>
															</option>
													<?php } ?>
													</select>
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Souhait Formation 3</label>
													<select class="form-control" name="formation3" >
													<option><?php echo $contact->getSouhait3()->getNom() ?></option>
													<?php foreach ($listFormation as $formation) { ?>
													        <option value=<?php echo $formation->getId()?>>
															      <?php echo $formation->getNom(); ?>
															</option>
													<?php } ?>
													</select>
												</div>
	                                        </div>
	                                    </div>
	                                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>