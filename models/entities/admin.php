<?php
	
	class Admin {

		protected $id;
		protected $mail;
		protected $mdp;
		protected $nom;
		protected $prenom;


		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function getMail() {
			return $this->mail;
		}
		public function setMail($mail) {
			$this->mail = $mail;
		}
		public function getMdp() {
			return $this->mdp;		
		}
		public function setMdp($mdp) {
			$this->mdp = $mdp;
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
	}