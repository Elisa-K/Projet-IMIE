<div class="row">
  <div class="col-md-12">
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
      echo '<td>' . $contact->getTel1() . '</td>';
      echo '<td><a href="./index.php?action=formEditContact&id=' . $contact->getId() . '"">Editer</a></td>';
      echo '<td><a href="./index.php?action=deleteContact&id=' . $contact->getId() . '">Supprimer</a></td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
</div>
</div>
</div>
</div>