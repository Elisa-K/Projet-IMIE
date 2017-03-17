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