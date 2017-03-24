
<div class="row">
  <div class="col-md-12">


    <div class="card">
      <div class="card-header" data-background-color="purple">
        <h4 class="title">Recherche</h4>
      </div>
<div class="card-content table-responsive">
<form  action="./dashboard.php" method="post">

      <div class="row">
        <div class="col-md-2">
            <div class="form-group label-floating">
              <label class="control-label">Nom</label>
              <input type="text" class="form-control" name="nom">
            </div>
          </div>
        <div class="col-md-2">
            <div class="form-group label-floating">
              <label class="control-label">Prenom</label>
              <input type="text" class="form-control" name="prenom">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group label-floating">
              <label class="control-label">Année de Naissance</label>
              <input type="text" class="form-control" name="naissance">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group label-floating">
              <label class="control-label">Date Création Fiche</label>
              <input type="date" class="form-control" name="creation">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group label-floating">
              <label class="control-label">Souhait Campus</label>
              <select class="form-control" name="campus" >
                <option></option>
                  <?php foreach ($listCampus as $campus) { ?>
                    <option value=<?php echo $campus->getId()?>>
                        <?php echo $campus->getNom(); ?>
                    </option>
                  <?php } ?>
              </select>
            </div>
        </div> 
        <div class="col-md-2">
            <div class="form-group label-floating">
              <label class="control-label">Souhait Formation</label>
                  <select class="form-control" name="formation1" >
                      <option></option>
                        <?php foreach ($listFormation as $formation) { ?>
                             <option value=<?php echo $formation->getId()?>>
                                <?php echo $formation->getNom(); ?>
                              </option>
                        <?php } ?>
                  </select>
            </div>
        </div>          
      </div>


<div class="row">
  <div class="col-md-10"></div>
    <div class="col-md-2">
        <input type="hidden" name="action" value="resultatRecherche">
        <input type="submit" value="Rechercher" class="btn btn-default btn-round">
    </div>
</div>          
          

</form>
</div>
</div>

</div>
</div>
<?php 
if(isset($listContact)) {
  if(COUNT($listContact)>0){ ?>

  <div class="row">
  <div class="col-md-12">


    <div class="card">
      <div class="card-header" data-background-color="purple">
        <h4 class="title">Listes Contacts</h4>
          <p class="category"><?php echo COUNT($listContact) ?> fiches</p>
      </div>
<div class="card-content table-responsive">
<form  action="./dashboard.php" method="post">
<input type="hidden" name="action">

    <input type="submit" value="Tout sélectionner" class="btn btn-default btn-round">

    <input type="submit" value="Supprimer" onclick="this.form.action.value='deleteContact';this.form.submit();" class="btn btn-default btn-round">

    <input type="submit" value="Exporter" onclick="this.form.action.value='export';this.form.submit();" class="btn btn-default btn-round">


<table class="table" id="table">
 

  <thead class="text-primary">
    <th></th>
    <th>Date Création <i class="material-icons">swap_vert</i></th>
    <th>Civilité <i class="material-icons">swap_vert</i></th>
    <th>Nom <i class="material-icons">swap_vert</i></th>
    <th>Prénom <i class="material-icons">swap_vert</i></th>
    <th>Date de Naissance <i class="material-icons">swap_vert</i></th>
    <th>Souhait Campus <i class="material-icons">swap_vert</i></th>
    <th>Souhait Formation <i class="material-icons">swap_vert</i></th>
    <th>Mail <i class="material-icons">swap_vert</i></th>
    <th>Téléphone <i class="material-icons">swap_vert</i></th>
    <th>Editer</th>
  </thead>
  <tbody>
    <?php
  
    foreach ($listContact as $contact) {
      echo '<tr>';
      echo '<td><label><input type="checkbox"  name="tabId[]" value=' . $contact->getId() .'></input></label></td>';
      echo '<td>' . $contact->getDateCreation() . '</td>';
      if($contact->getCivilite() ==1){            
        echo '<td>Mr</td>';
      }else{
          echo '<td>Mme</td>';
        }

      echo '<td>' . $contact->getNom() . '</td>';
      echo '<td>' . $contact->getPrenom() . '</td>';
      echo '<td>' . $contact->getDateNaissance() . '</td>';      
      echo '<td>' . $contact->getSite() . '</td>';
      echo '<td>' . $contact->getSouhait1() . '</td>';
      echo '<td>' . $contact->getEmail() . '</td>';
      echo '<td>' . $contact->getTel() . '</td>';
      echo '<td><a href="./dashboard.php?action=formEditContact&id=' . $contact->getId() . '""><i class="material-icons">create</i></a></td>';

      echo '</tr>';
    }
    ?>
  </tbody>
 <label><?php if(isset($message)) echo $message ?></label>



</table>

</form>
</div>
</div>

</div>
</div>

 <?php } } ?>




