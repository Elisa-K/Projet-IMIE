<?php

class FicheContact {

		protected $id;
		protected $civilite;
		protected $nom;
		protected $prenom;
		protected $dateNaissance;
		protected $tel;
		protected $email;
		protected $origineScolaire;
		protected $diplomeObtenu;
		protected $etabOrigine;
		protected $statut;
		protected $site;
		protected $souhait1;
		protected $souhait2;
		protected $souhait3;
		protected $infoImie;
		protected $dateCreation;
		protected $disponibilite;

public function save($pdo, $formation2, $formation3) {
    
    if($this->id) {
      //appeler la bonne méthode
      $message = $this->update($pdo, $formation2, $formation3);
      return $message;
    } else {
      $message = $this->insert($pdo, $formation2, $formation3);
      return $message;
    }
  }
private function update($pdo, $formation2, $formation3) {

    try {

    if(empty($formation2)){
    	$stmt = $pdo->prepare('UPDATE fiche_contact SET civilite = :civ, nom = :nom, prenom = :prenom, date_naissance = :dateNaissance, id_formation = :formation1, id_formation_1 = NULL, id_formation_2 = NULL, id_campus_imie = :campus, email = :email, tel = :tel WHERE id = :id');

    $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
      $stmt->bindParam(':civ', $this->civilite, PDO::PARAM_INT);
      $stmt->bindParam(':nom', $this->nom, PDO::PARAM_STR);
      $stmt->bindParam(':prenom', $this->prenom, PDO::PARAM_STR);
      $stmt->bindParam(':dateNaissance', $this->dateNaissance, PDO::PARAM_STR);
      $stmt->bindParam(':formation1', $this->souhait1, PDO::PARAM_INT);
      $stmt->bindParam(':campus', $this->site, PDO::PARAM_INT);
      $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
      $stmt->bindParam(':tel', $this->tel, PDO::PARAM_INT);

    }elseif (empty($formation3)){

      $stmt = $pdo->prepare('UPDATE fiche_contact SET civilite = :civ, nom = :nom, prenom = :prenom, date_naissance = :dateNaissance, id_formation = :formation1, id_formation_1 = :formation2, id_formation_2 = NULL, id_campus_imie = :campus, email = :email, tel = :tel WHERE id = :id');

      $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
      $stmt->bindParam(':civ', $this->civilite, PDO::PARAM_INT);
      $stmt->bindParam(':nom', $this->nom, PDO::PARAM_STR);
      $stmt->bindParam(':prenom', $this->prenom, PDO::PARAM_STR);
      $stmt->bindParam(':dateNaissance', $this->dateNaissance, PDO::PARAM_STR);
      $stmt->bindParam(':formation1', $this->souhait1, PDO::PARAM_INT);
      $stmt->bindParam(':formation2', $this->souhait2, PDO::PARAM_INT);
      $stmt->bindParam(':campus', $this->site, PDO::PARAM_INT);
      $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
      $stmt->bindParam(':tel', $this->tel, PDO::PARAM_INT);

    }else{

      $stmt = $pdo->prepare('UPDATE fiche_contact SET civilite = :civ, nom = :nom, prenom = :prenom, date_naissance = :dateNaissance, id_formation = :formation1, id_formation_1 = :formation2, id_formation_2 = :formation3, id_campus_imie = :campus, email = :email, tel = :tel WHERE id = :id');


      $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
      $stmt->bindParam(':civ', $this->civilite, PDO::PARAM_INT);
      $stmt->bindParam(':nom', $this->nom, PDO::PARAM_STR);
      $stmt->bindParam(':prenom', $this->prenom, PDO::PARAM_STR);
      $stmt->bindParam(':dateNaissance', $this->dateNaissance, PDO::PARAM_STR);
      $stmt->bindParam(':formation1', $this->souhait1, PDO::PARAM_INT);
      $stmt->bindParam(':formation2', $this->souhait2, PDO::PARAM_INT);
      $stmt->bindParam(':formation3', $this->souhait3, PDO::PARAM_INT);
      $stmt->bindParam(':campus', $this->site, PDO::PARAM_INT);
      $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
      $stmt->bindParam(':tel', $this->tel, PDO::PARAM_INT);


	}



      $stmt->execute();


      return "Le contact a été mis à jour avec succès";
      return $message;
    }
    catch(PDOException $e) {
      return "Votre mise à jour a échoué, en voici la raison : " . $e->getMessage();
      return $message;
    }
  }

   public function delete($pdo, $id) {

    try{
    		
    			$stmt = $pdo->prepare('DELETE FROM fiche_contact WHERE id = ' .$id);
      			$stmt->bindParam($id, $this->id, PDO::PARAM_INT);
      			
      			$stmt->execute();

    		


      return "Le(s) contact(s) a/ont bien été supprimé(s).";
    }
    catch(PDOException $e) {
      return "Votre suppression a échoué, en voici la raison : " . $e->getMessage();
    }
  }
  private function insert($pdo, $formation2, $formation3) {

    try {
if(empty($formation2)){
      $stmt = $pdo->prepare('INSERT INTO fiche_contact (civilite, nom, prenom, date_naissance, id_formation, id_formation_1, id_formation_2, id_campus_imie, email, tel, id_statut, formation, etab_origine, info_imie, diplome_obtenu, disponibilite, date_formulaire) VALUES (:civ, :nom, :prenom, :date_naissance, :formation1, NULL, NULL, :campus, :email, :tel, :statut, :nom_formation, :nom_etab, :info_imie, :nom_diplome, :dispo, NOW() )');

      $stmt->bindParam(':civ', $this->civilite, PDO::PARAM_INT);
      $stmt->bindParam(':nom', $this->nom, PDO::PARAM_STR);
      $stmt->bindParam(':prenom', $this->prenom, PDO::PARAM_STR);
      $stmt->bindParam(':date_naissance', $this->dateNaissance, PDO::PARAM_STR);
      $stmt->bindParam(':formation1', $this->souhait1, PDO::PARAM_INT);
      $stmt->bindParam(':campus', $this->site, PDO::PARAM_INT);
      $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
      $stmt->bindParam(':tel', $this->tel, PDO::PARAM_INT);
      $stmt->bindParam(':statut', $this->statut, PDO::PARAM_INT);
      $stmt->bindParam(':nom_formation', $this->origineScolaire, PDO::PARAM_STR);
      $stmt->bindParam(':nom_etab', $this->etabOrigine, PDO::PARAM_STR);
	  $stmt->bindParam(':info_imie', $this->infoImie, PDO::PARAM_STR);
      $stmt->bindParam(':nom_diplome', $this->diplomeObtenu, PDO::PARAM_STR);
      $stmt->bindParam(':dispo', $this->disponibilite, PDO::PARAM_STR);

}elseif (empty($formation3)){

	  $stmt = $pdo->prepare('INSERT INTO fiche_contact (civilite, nom, prenom, date_naissance, id_formation, id_formation_1, id_formation_2, id_campus_imie, email, tel, id_statut, formation, etab_origine, info_imie, diplome_obtenu, disponibilite, date_formulaire) VALUES (:civ, :nom, :prenom, :date_naissance, :formation1, :formation2, NULL, :campus, :email, :tel, :statut, :nom_formation, :nom_etab, :info_imie, :nom_diplome, :dispo, NOW() )');

      $stmt->bindParam(':civ', $this->civilite, PDO::PARAM_INT);
      $stmt->bindParam(':nom', $this->nom, PDO::PARAM_STR);
      $stmt->bindParam(':prenom', $this->prenom, PDO::PARAM_STR);
      $stmt->bindParam(':date_naissance', $this->dateNaissance, PDO::PARAM_STR);
      $stmt->bindParam(':formation1', $this->souhait1, PDO::PARAM_INT);
      $stmt->bindParam(':formation2', $this->souhait2, PDO::PARAM_INT);
      $stmt->bindParam(':campus', $this->site, PDO::PARAM_INT);
      $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
      $stmt->bindParam(':tel', $this->tel, PDO::PARAM_INT);
      $stmt->bindParam(':statut', $this->statut, PDO::PARAM_INT);
      $stmt->bindParam(':nom_formation', $this->origineScolaire, PDO::PARAM_STR);
      $stmt->bindParam(':nom_etab', $this->etabOrigine, PDO::PARAM_STR);
	  $stmt->bindParam(':info_imie', $this->infoImie, PDO::PARAM_STR);
      $stmt->bindParam(':nom_diplome', $this->diplomeObtenu, PDO::PARAM_STR);
      $stmt->bindParam(':dispo', $this->disponibilite, PDO::PARAM_STR);
}else{
	$stmt = $pdo->prepare('INSERT INTO fiche_contact (civilite, nom, prenom, date_naissance, id_formation, id_formation_1, id_formation_2, id_campus_imie, email, tel, id_statut, formation, etab_origine, info_imie, diplome_obtenu, disponibilite, date_formulaire) VALUES (:civ, :nom, :prenom, :date_naissance, :formation1, :formation2, :formation3, :campus, :email, :tel, :statut, :nom_formation, :nom_etab, :info_imie, :nom_diplome, :dispo, NOW() )');

      $stmt->bindParam(':civ', $this->civilite, PDO::PARAM_INT);
      $stmt->bindParam(':nom', $this->nom, PDO::PARAM_STR);
      $stmt->bindParam(':prenom', $this->prenom, PDO::PARAM_STR);
      $stmt->bindParam(':date_naissance', $this->dateNaissance, PDO::PARAM_STR);
      $stmt->bindParam(':formation1', $this->souhait1, PDO::PARAM_INT);
      $stmt->bindParam(':formation2', $this->souhait2, PDO::PARAM_INT);
      $stmt->bindParam(':formation3', $this->souhait2, PDO::PARAM_INT);
      $stmt->bindParam(':campus', $this->site, PDO::PARAM_INT);
      $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
      $stmt->bindParam(':tel', $this->tel, PDO::PARAM_INT);
      $stmt->bindParam(':statut', $this->statut, PDO::PARAM_INT);
      $stmt->bindParam(':nom_formation', $this->origineScolaire, PDO::PARAM_STR);
      $stmt->bindParam(':nom_etab', $this->etabOrigine, PDO::PARAM_STR);
	  $stmt->bindParam(':info_imie', $this->infoImie, PDO::PARAM_STR);
      $stmt->bindParam(':nom_diplome', $this->diplomeObtenu, PDO::PARAM_STR);
      $stmt->bindParam(':dispo', $this->disponibilite, PDO::PARAM_STR);

}
      $stmt->execute();


     $message = "Votre Fiche Contact a été enregistré avec succès";
      return $message;
    }
    catch(PDOException $e) {
      return "Votre enregistrement a échoué, en voici la raison : " . $e->getMessage();
      return $message;
    }

  }

		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}

		public function getCivilite() {
			return $this->civilite;		
		}
		public function setCivilite($civilite) {
			$this->civilite = $civilite;
		}
		public function getNom() {
			return $this->nom;
		}
		public function setNom($nom) {
			$this->nom = $nom;
		}
		public function getPrenom() {
			return $this->prenom;
		}
		public function setPrenom($prenom) {
			$this->prenom = $prenom;
		}
		public function getDateNaissance() {
			return $this->dateNaissance;
		}
		public function setDateNaissance($dateNaissance) {
			$this->dateNaissance = $dateNaissance;
		}
		public function getTel() {
			return $this->tel;
		}
		public function setTel($tel) {
			$this->tel = $tel;
		}
		public function getEmail() {
			return $this->email;
		}
		public function setEmail($email) {
			$this->email = $email;
		}
		public function getOrigineScolaire() {
			return $this->origineScolaire;
		}
		public function setOrigineScolaire($origineScolaire) {
			$this->origineScolaire = $origineScolaire;
		}
		public function getDiplomeObtenu() {
			return $this->diplomeObtenu;
		}
		public function setDiplomeObtenu($diplomeObtenu) {
			$this->diplomeObtenu = $diplomeObtenu;
		}
		public function getEtabOrigine() {
			return $this->etabOrigine;
		}
		public function setEtabOrigine($etabOrigine) {
			$this->etabOrigine = $etabOrigine;
		}
		public function getStatut() {
			return $this->statut;
		}
		public function setStatut($statut) {
			$this->statut = $statut;
		}
		public function getSite() {
			return $this->site;
		}
		public function setSite($site) {
			$this->site = $site;
		}
		public function getSouhait1() {
			return $this->souhait1;
		}
		public function setSouhait1($souhait1) {
			$this->souhait1 = $souhait1;
		}
		public function getSouhait2() {
			return $this->souhait2;
		}
		public function setSouhait2($souhait2) {
			$this->souhait2 = $souhait2;
		}
		public function getSouhait3() {
			return $this->souhait3;
		}
		public function setSouhait3($souhait3) {
			$this->souhait3 = $souhait3;
		}
		public function getInfoImie() {
			return $this->infoImie;
		}
		public function setInfoImie($infoImie) {
			$this->infoImie = $infoImie;
		}
		public function getDateCreation() {
			return $this->dateCreation;
		}
		public function setDateCreation($dateCreation) {
			$this->dateCreation = $dateCreation;
		}
		public function getDisponibilite() {
			return $this->disponibilite;
		}
		public function setDisponibilite($disponibilite) {
			$this->disponibilite = $disponibilite;
		}

	}