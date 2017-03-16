<?php

class FicheContact {

		protected $id;
		protected $numeroine;
		protected $civilite;
		protected $nom;
		protected $prenom;
		protected $nomJf;
		protected $dateNaissance;
		protected $lieuNaissance;
		protected $deptNaissance;
		protected $nationalite;
		protected $adresse;
		protected $cp;
		protected $ville;
		protected $pays;
		protected $tel1;
		protected $tel2;
		protected $email;
		protected $emailConfirmation;
		protected $origineScolaire;
		protected $diplomeObtenu;
		protected $etabOrigine;
		protected $annee;
		protected $statut;
		protected $site;
		protected $souhait1;
		protected $souhait2;
		protected $souhait3;
		protected $observation;
		protected $reorientation;
		protected $dateCreation;


		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function getNumeroIne() {
			return $this->numeroIne;
		}
		public function setNumeroIne($numero_ine) {
			$this->numeroIne = $numeroIne;
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
		public function getNomJf() {
			return $this->nomJf;
		}
		public function setNomJf($nomJf) {
			$this->nomJf = $nomJf;
		}
		public function getDateNaissance() {
			return $this->dateNaissance;
		}
		public function setDateNaissance($dateNaissance) {
			$this->dateNaissance = $dateNaissance;
		}
		public function getLieuNaissance() {
			return $this->lieuNaissance;
		}
		public function setLieuNaissance($lieuNaissance) {
			$this->lieuNaissance = $lieuNaissance;
		}
		public function getDeptNaissance() {
			return $this->deptNaissance;
		}
		public function setDeptNaissance($debtNaissance) {
			$this->deptNaissance;
		}
		public function getNationalite() {
			return $this->nationalite;
		}
		public function setNationalite($nationalite) {
			$this->nationalite = $nationalite;
		}
		public function getAdresse() {
			return $this->adresse;
		}
		public function setAdresse($adresse) {
			$this->adresse = $adresse;
		}
		public function getCp() {
			return $this->cp;
		}
		public function setCp($cp) {
			$this->cp = $cp;
		}
		public function getVille() {
			return $this->ville;
		}
		public function setVille($ville) {
			$this->ville = $ville;
		}
		public function getPays() {
			return $this->pays;
		}
		public function setPays($pays) {
			$this->pays = $pays;
		}
		public function getTel1() {
			return $this->tel1;
		}
		public function setTel1($tel1) {
			$this->tel1 = $tel1;
		}
		public function getTel2() {
			return $this->tel2;
		}
		public function setTel2($tel2) {
			$this->tel2 = $tel2;
		}
		public function getEmail() {
			return $this->email;
		}
		public function setEmail($email) {
			$this->email = $email;
		}
		public function getEmailConfirmation() {
			return $this->emailConfirmation;
		}
		public function setEmailConfirmation($emailConfirmation) {
			$this->emailConfirmation = $emailConfirmation;
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
		public function getAnnee() {
			return $this->annee;
		}
		public function setAnnee($annee) {
			$this->annee = $annee;
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
			return $this->souhait1;
		}
		public function setSouhait2($souhait2) {
			$this->souhait2 = $souhait2;
		}
		public function getSouhait3() {
			return $this->souhait1;
		}
		public function setSouhait3($souhait3) {
			$this->souhait3 = $souhait3;
		}
		public function getObservation() {
			return $this->observation;
		}
		public function setObservation($observation) {
			$this->observation = $observation;
		}
		public function getReorientation() {
			return $this->reorientation;
		}
		public function setReorientation($reorientation) {
			$this->reorientation = $reorientation;
		}
		public function getDateCreation() {
			return $this->dateCreation;
		}
		public function setDateCreation($dateCreation) {
			$this->dateCreation = $dateCreation;
		}

	}