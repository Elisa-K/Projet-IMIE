<div class="row">
  <div class="col-md-12">
 <a href="./dashboard.php?action=export"><input type="button" value="Exporter"></a>

    <div class="card">
      <div class="card-header" data-background-color="purple">
        <h4 class="title">Listes Contacts</h4>
          <p class="category">Il y a <?php echo $nbFiches[0]; ?> fiches</p>
      </div>
<div class="card-content table-responsive">

<table class="table">
  <thead class="text-primary">
    <th>Export</th>
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
    <th>Supprimer</th>
  </thead>
  <tbody>
    <?php
    foreach ($listContact as $contact) {
      echo '<tr>';
      echo '<td><input type="checkbox"></input></td>';
      echo '<td>' . $contact->getDateCreation() . '</td>';
      echo '<td>' . $contact->getCivilite() . '</td>';
      echo '<td>' . $contact->getNom() . '</td>';
      echo '<td>' . $contact->getPrenom() . '</td>';
      echo '<td>' . $contact->getDateNaissance() . '</td>';      
      echo '<td>' . $contact->getSite() . '</td>';
      echo '<td>' . $contact->getSouhait1() . '</td>';
      echo '<td>' . $contact->getEmail() . '</td>';
      echo '<td>' . $contact->getTel() . '</td>';
      echo '<td><a href="./dashboard.php?action=formEditContact&id=' . $contact->getId() . '""><i class="material-icons">create</i></a></td>';
      echo '<td><a href="./dashboard.php?action=deleteContact&id=' . $contact->getId() . '"><i class="material-icons">clear</i></a></td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>

</div>
</div>
  <input type="button" value="Exporter">
</div>
</div>