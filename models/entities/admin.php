<?php
	
	class Admin {

		protected $id;
		protected $login;
		protected $mdp;
		protected $nom;
		protected $prenom;


		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function getLogin() {
			return $this->login;
		}
		public function setLogin($login) {
			$this->login = $login;
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
		public function setPrenom() {
			$this->prenom = $prenom;
		}
	}