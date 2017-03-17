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


    $resultat = $pdo->query('SELECT f.id, f.civilite, f.nom, f.prenom, f.date_naissance, f.id_formation, f.id_formation_1, f.id_formation_2, f.id_campus_imie, f.email, f.tel, c.nom AS cnom, fo1.nom AS fonom, fo2.nom as fo2nom, fo3.nom as fo3nom FROM fiche_contact f INNER JOIN campus_imie c ON f.id_campus_imie = c.id LEFT JOIN formation fo1 ON f.id_formation = fo1.id LEFT JOIN formation fo2 ON f.id_formation_1 = fo2.id LEFT JOIN formation fo3 ON f.id_formation_2 = fo3.id WHERE f.id = ' . $id);

    $resultat->setFetchMode(PDO::FETCH_OBJ);

    $obj = $resultat->fetch();

    $campus = new Campus();
    $campus->setId($obj->id_campus_imie);
    $campus->setNom($obj->cnom);

    $formation1 = new Formation();
    $formation1->setId($obj->id_formation);
    $formation1->setNom($obj->fonom);

    $formation2 = new Formation();
    $formation2->setId($obj->id_formation_1);
    $formation2->setNom($obj->fo2nom);

    $formation3 = new Formation();
    $formation3->setId($obj->id_formation_2);
    $formation3->setNom($obj->fo3nom);

    $contact = new FicheContact();
    $contact->setId($obj->id);
    $contact->setCivilite($obj->civilite);
    $contact->setNom($obj->nom);
    $contact->setPrenom($obj->prenom);
    $contact->setDateNaissance($obj->date_naissance);
    $contact->setSouhait1($formation1);
    $contact->setSouhait2($formation2);
    $contact->setSouhait3($formation3);
    $contact->setSite($campus);
    $contact->setEmail($obj->email);
    $contact->setTel($obj->tel);


    return $contact;
  }
    public function export($pdo){

}
}