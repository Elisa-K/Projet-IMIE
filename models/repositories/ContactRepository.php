<?php

//Les objets repository permettent de récupérer des enregistrements en base de données

  class ContactRepository
  {

    public function getAll($pdo){

     
      $req = $pdo->query("SELECT id, civilite, nom, prenom, email, tel, id_campus_imie, id_formation, DATE_FORMAT(date_naissance, GET_FORMAT(DATE, 'EUR')) AS dateNaissance, DATE_FORMAT(date_formulaire, GET_FORMAT(DATE, 'EUR')) AS dateFormulaire FROM fiche_contact");

      $req->setFetchMode(PDO::FETCH_OBJ);


      $listContact = array();

      while ($obj = $req->fetch()){

        $idCampus = $obj->id_campus_imie;
        $idFormation = $obj->id_formation;



        $res = $pdo->query("SELECT nom FROM campus_imie WHERE id =".$idCampus);

          $res->setFetchMode(PDO::FETCH_OBJ);
          $obj2 = $res->fetch();
          $obj3 = $obj2->nom;

        $res2 = $pdo->query("SELECT nom FROM formation WHERE id =".$idFormation);
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

    $req = $pdo->prepare("SELECT count(id) FROM fiche_contact");
	$req->execute();
    $resultat = $req->fetch();

    return $resultat ;
    }


 public function getOneById($pdo, $id) {


    $resultat = $pdo->query('SELECT f.id, f.civilite, f.nom, f.prenom, f.date_naissance, f.id_formation, f.id_formation_1, f.id_formation_2, f.id_campus_imie, f.email, f.tel, c.nom AS cnom, fo1.nom AS fonom, fo2.nom as fo2nom, fo3.nom as fo3nom FROM fiche_contact f INNER JOIN campus_imie c ON f.id_campus_imie = c.id LEFT JOIN formation fo1 ON f.id_formation = fo1.id LEFT JOIN formation fo2 ON f.id_formation_1 = fo2.id LEFT JOIN formation fo3 ON f.id_formation_2 = fo3.id WHERE f.id = '.$id);
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

    public function homonyme($pdo, $nom, $prenom, $date_naissance){

      $resultat = $pdo->query('SELECT COUNT(id) FROM fiche_contact WHERE nom = "'.$nom.'" AND prenom = "'.$prenom.'" AND date_naissance = "'.$date_naissance.'"');

      $doublon = $resultat->fetch();

      return $doublon;

      
    }
    public function export($pdo, $id){
  
try {
$resultat = $pdo->prepare('SELECT f.civilite, f.nom, f.prenom, f.tel, f.email, f.date_naissance, f.diplome_obtenu, f.date_formulaire, c.code_campus, fo1.code_formation AS souhait1, fo2.code_formation AS souhait2, fo3.code_formation AS souhait3, f.etab_origine, f.disponibilite FROM fiche_contact f LEFT JOIN campus_imie c ON f.id_campus_imie = c.id LEFT JOIN formation fo1 ON f.id_formation = fo1.id LEFT JOIN formation fo2 ON f.id_formation_1 = fo2.id LEFT JOIN formation fo3 ON f.id_formation_2 = fo3.id WHERE f.id IN (' .$id.')');
$resultat->execute();
  $date = date('d-m-Y');
  $heure =date('H-i');
  $objDate =''.$date.'-'.$heure.'';

  $chemin = '.././export/export-'.$objDate.'.csv';


  $fp = fopen("$chemin", "w+");

  $colonnes =["Y_identifant_site; Y_identifant_site2; Y_identifant_site3; identifiant_statut; Y_identifiant_annee; Y_Civilite_de_candidat; Y_Nom_de_candidat; ine_candidat; Y_Prenom_de_candidat; Nom_de_jeune_fille; Y_Nationalite_du_candidat; Y_1ère_ligne_de_l’adresse_«_courrier_»; 2ème_ligne_de_l’adresse_«_courrier_»; 3ème_ligne_de_l’adresse_«_courrier_»; 4ème_ligne_de_l’adresse_«_courrier_»; Y_Code_postal_de_l’adresse_«_courrier_»; Y_Ville_de_l’adresse_«_courrier_»; Pays_de_l’adresse_«_courrier_»; Y_Telephone_1_de_l’adresse_«_courrier_»; Telephone_2_de_l’adresse_«_courrier_»; Y_Email_de_l’adresse_«_courrier_»; cilivite_resp_legal; nom_resp_legal; prenom_resp_legal; 1ère_ligne_de_l’adresse_«_courrier_»; 2ème_ligne_de_l’adresse_«_courrier_»; 3ème_ligne_de_l’adresse_«_courrier_»; 4ème_ligne_de_l’adresse_«_courrier_»; Code_postal_de_l’adresse_«_courrier_»; Ville_de_l’adresse_«_courrier_»; Pays_de_l’adresse_«_courrier_»; Telephone_1_de_l’adresse_«_courrier_»; Telephone_2_de_l’adresse_«_courrier_»; Email_de_l’adresse_«_courrier_»; Y_date_naissance_candidat; Y_lieu_naiss_candidat; Y_departement_naiss_candidat; Y_premier_souhait; deuxieme_souhait; troisieme_souhait; Y_origine_scolaire; Y_dernier_diplome; etablissement_origine; date_saisie_formulaire; url_cv_candidat; url_lettre_motiv_candidat; observation; rp1; rp2; rp3; rp1_obs; rp2_obs; rp3_obs"];

  foreach($colonnes as $entetes){

    fprintf($fp, chr(0xEF).chr(0xBB).chr(0xBF));
    fputs($fp, "$entetes;");
  }

  fputs($fp, "\n");

  while($result = $resultat->fetch()){

    $a = $result['code_campus'];
    $b = $result['civilite'];
    $c = $result['nom'];    
    $d = $result['prenom'];
    $e = $result['tel'];
    $f = $result['email'];
    $g = $result['date_naissance'];
    $h = $result['souhait1'];
    $i = $result['souhait2'];
    $j = $result['souhait3'];
    $k = $result['diplome_obtenu'];
    $l = $result['etab_origine'];
    $m = $result['date_formulaire'];
    $n = $result['disponibilite'];

    fputs($fp,"$a;;;;;$b;$c;;$d;;;;;;;;;;$e;;$f;;;;;;;;;;;;;;$g;;;$h;$i;$j;;$k;$l;$m;;;;;;;$n;;;\n");

  }
  fclose($fp);
  $resultat->closeCursor();

  $message3 = "L'exportation à été réalisé avec succés !";
  return $message3;
}    catch(PDOException $e) {
      return "Votre exportation a échoué, en voici la raison : " . $e->getMessage();
      return $message3;
    }
}
public function sendMail(){


$mail = 'elisaklein66@gmail.com'; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui présentent des bogues.
{
  $passage_ligne = "\r\n";
}
else
{
  $passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Ci-joint l'export des fiches contacts";
$message_html = "<html><head></head><body>Ci-joint l'export des fiches contacts</body></html>";
//==========
 
//=====Lecture et mise en forme de la pièce jointe.
  $date = date('d-m-Y');
  $heure =date('H-i');
  $objDate =''.$date.'-'.$heure.'';

  $chemin = '.././export/export-'.$objDate.'.csv';

$fichier   = fopen($chemin, "r");
$attachement = fread($fichier, filesize($fichier));
$attachement = chunk_split(base64_encode($attachement));
fclose($fichier);
//==========
 
//=====Création de la boundary.
$boundary = "-----=".md5(rand());
$boundary_alt = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "Export csv fiches contacts";
//=========
 
//=====Création du header de l'e-mail.
$header = "From: \"WeaponsB\"<weaponsb@mail.fr>".$passage_ligne;
$header.= "Reply-to: \"WeaponsB\" <weaponsb@mail.fr>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
 
$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
 
//=====Ajout du message au format HTML.
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
 
//=====On ferme la boundary alternative.
$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
//==========
 
 
 
$message.= $passage_ligne."--".$boundary.$passage_ligne;
 
//=====Ajout de la pièce jointe.
$message.= "Content-Type: text/csv; name=\"export.csv\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
$message.= "Content-Disposition: attachment; filename=\"export.csv\"".$passage_ligne;
$message.= $passage_ligne.$attachement.$passage_ligne.$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne; 
//========== 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
 


 

}

public function search($pdo, $nom, $prenom, $naissance, $creation, $campus, $formation1){

$req = 'SELECT id, civilite, nom, prenom, email, tel, id_campus_imie, id_formation, DATE_FORMAT(date_naissance, GET_FORMAT(DATE, "EUR")) AS dateNaissance, DATE_FORMAT(date_formulaire, GET_FORMAT(DATE, "EUR")) AS dateFormulaire FROM fiche_contact WHERE ';



if ($nom) $req .= 'nom LIKE "%'.$nom.'%" AND ';
if ($prenom) $req .= 'prenom LIKE "%'.$prenom.'%" AND ';
if ($naissance) $req .= 'YEAR(date_naissance)='.$naissance.' AND ';
if ($creation) $req .= 'date_formulaire ="'.$creation.'" AND ';
if ($campus) $req .= 'id_campus_imie ='.$campus.' AND ';
if ($formation1) $req .= 'id_formation ='.$formation1.' AND ';


$req = substr($req, 0, strlen($req)-5);
$nbLigneAffectees = $pdo->query($req);


$nbLigneAffectees->setFetchMode(PDO::FETCH_OBJ);

$listContact = array();

      while ($obj = $nbLigneAffectees->fetch()){

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

}