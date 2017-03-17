<?php

//Les objets repository permettent de récupérer des enregistrements en base de données

  class ContactRepository
  {

    //Récupère les clients en base de données
    public function getAll($pdo){

      //Effectuer la requête en bbd pour récupérer la
      $req = $pdo->query("SELECT id, civilite, nom, prenom, email, tel, id_campus_imie, id_formation, DATE_FORMAT(date_naissance, GET_FORMAT(DATE, 'EUR')) AS dateNaissance, DATE_FORMAT(date_formulaire, GET_FORMAT(DATE, 'EUR')) AS dateFormulaire FROM fiche_contact");

      $req->setFetchMode(PDO::FETCH_OBJ);

      //Boucler sur tous les enregistrements récupérés grâce à votre requête SELECT
      // 1 -  instancier un objet client
      // 2 -  lui hydrater ses attributs avec les valeurs récupérés en bdd
      // 3 -  pour chaque onjet client instanciés et hydratés, les ajouter dans un tableau
      // 4 - retourner ensuite ce tableau avec l'instruction return;

      $listContact = array();

      while ($obj = $req->fetch()){

        $idCampus = $obj->id_campus_imie;
        $idFormation = $obj->id_formation;



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
        $contact->setDateNaissance($obj->dateNaissance);
        $contact->setDateCreation($obj->dateFormulaire);
        $contact->setNom($obj->nom);
        $contact->setEmail($obj->email);
        $contact->setTel($obj->tel);
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


 public function getOneById($pdo, $id) {


    $resultat = $pdo->query('SELECT id, civilite, nom, prenom, date_naissance, id_formation, id_formation_1, id_formation_2, id_campus_imie, email, tel FROM fiche_contact WHERE id = ' . $id);

    $resultat->setFetchMode(PDO::FETCH_OBJ);

    $obj = $resultat->fetch();


    $contact = new FicheContact();
    $contact->setId($obj->id);
    $contact->setCivilite($obj->civilite);
    $contact->setNom($obj->nom);
    $contact->setPrenom($obj->prenom);
    $contact->setDateNaissance($obj->date_naissance);
    $contact->setSouhait1($obj->id_formation);
    $contact->setSouhait2($obj->id_formation_1);
    $contact->setSouhait3($obj->id_formation_2);
    $contact->setSite($obj->id_campus_imie);
    $contact->setEmail($obj->email);
    $contact->setTel($obj->tel);


    return $contact;
  }
    public function export($pdo){

}
}