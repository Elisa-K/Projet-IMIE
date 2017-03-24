<div class="row">
  <div class="col-md-12">


    <div class="card">
      <div class="card-header" data-background-color="purple">
        <h4 class="title">Listes Contacts</h4>
          <p class="category"><?php echo $nbFiches[0]; ?> fiches</p>
      </div>
<div class="card-content table-responsive">
<form  action="./dashboard.php" method="post">
<input type="hidden" name="action">

    <input type="submit" value="select" id="selectAll" class="btn btn-default btn-round" onclick="do_this()">

    <input type="submit" value="Supprimer" onclick="this.form.action.value='deleteContact';this.form.submit();" class="btn btn-default btn-round">

    <input type="submit" value="Exporter" onclick="this.form.action.value='export';this.form.submit();" class="btn btn-default btn-round">


<table class="table">
 

  <thead class="text-primary">
    <th></th>
    <th>Date Création</th>
    <th>Civilité</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Date de Naissance</th>
    <th>Souhait Campus</th>
    <th>Souhait Formation</th>
    <th>Mail</th>
    <th>Téléphone</th>
    <th>Editer</th>
  </thead>
  <tbody>
    <?php
  
    foreach ($listContact as $contact) {
      echo '<tr>';
      echo '<td><div class="checkbox"><label><input type="checkbox" class="check" name="tabId[]" value=' . $contact->getId() .'></input></label></div></td>';
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
  <label><?php if(isset($message3)) echo $message3 ?></label>
</table>

</form>
</div>
</div>
  <input type="button" value="Exporter">
</div>
</div>