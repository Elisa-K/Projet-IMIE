<?php

//Les objets repository permettent de récupérer des enregistrements en base de données

  class CampusRepository
  {

    //Récupère les clients en base de données
    public function getAll($pdo){

      //Effectuer la requête en bbd pour récupérer la
      $req = $pdo->query("SELECT id, nom FROM campus_imie ORDER BY nom");

      $req->setFetchMode(PDO::FETCH_OBJ);

      //Boucler sur tous les enregistrements récupérés grâce à votre requête SELECT
      // 1 -  instancier un objet client
      // 2 -  lui hydrater ses attributs avec les valeurs récupérés en bdd
      // 3 -  pour chaque onjet client instanciés et hydratés, les ajouter dans un tableau
      // 4 - retourner ensuite ce tableau avec l'instruction return;

      $listStatut = array();

      while ($obj = $req->fetch()){

        $statut = new Campus();
        $statut->setId($obj->id);
        $statut->setNom($obj->nom);


        $listStatut[] = $statut;


      }

      return $liststatut;
    }
  }