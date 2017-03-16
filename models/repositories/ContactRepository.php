<?php

//Les objets repository permettent de récupérer des enregistrements en base de données

  class ContactRepository
  {

    //Récupère les clients en base de données
    public function getAll($pdo){

      //Effectuer la requête en bbd pour récupérer la
      $req = $pdo->query("SELECT id, civilite, nom, prenom, email, tel1, id_campus_imie, id_formation1, date_naissance, date_creation FROM fiche_contact");

      $req->setFetchMode(PDO::FETCH_OBJ);

      //Boucler sur tous les enregistrements récupérés grâce à votre requête SELECT
      // 1 -  instancier un objet client
      // 2 -  lui hydrater ses attributs avec les valeurs récupérés en bdd
      // 3 -  pour chaque onjet client instanciés et hydratés, les ajouter dans un tableau
      // 4 - retourner ensuite ce tableau avec l'instruction return;

      $listContact = array();

      while ($obj = $req->fetch()){

        $idCampus = $obj->id_campus_imie;
        $idFormation = $obj->id_formation1;

        $res = $pdo->query("SELECT nom FROM campus_imie WHERE id =" . $idCampus);
          $res->setFetchMode(PDO::FETCH_OBJ);
          $obj2 = $res->fetch();
          $obj3 = $obj2->nom;

        $res2 = $pdo->query("SELECT nom FROM formation WHERE id =" . $idFormation);
          $res2->setFetchMode(PDO::FETCH_OBJ);
          $obj4 = $res2->fetch();
          $obj5 = $obj4->nom;

        $contact = new FicheContact();
        $contact->setId($obj->id);
        $contact->setCivilite($obj->civilite);
        $contact->setPrenom($obj->prenom);
        $contact->setDateNaissance($obj->date_naissance);
        $contact->setDateCreation($obj->date_creation);
        $contact->setNom($obj->nom);
        $contact->setEmail($obj->email);
        $contact->setTel1($obj->tel1);
        $contact->setSite($obj3);
        $contact->setSouhait1($obj5);


        $listContact[] = $contact;


      }

      return $listContact;
    }

    public function getNb($pdo){

    $req = $pdo->query("SELECT count(id) FROM fiche_contact");
  $resultat = $req->fetch();

    return $resultat ;
    }
  }