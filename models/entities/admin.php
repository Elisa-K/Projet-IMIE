<?php
	
class Admin {

		protected $id;
		protected $mail;
		protected $mdp;
		protected $nom;
		protected $prenom;

public function save($pdo){

try{
	$stmt = $pdo->prepare('INSERT INTO admin (login, mdp, nom, prenom) VALUES (:email, :mdp, :nom, :prenom)');

	$stmt->bindParam(':email', $this->mail, PDO::PARAM_STR);
    $stmt->bindParam(':mdp', $this->mdp, PDO::PARAM_STR);
    $stmt->bindParam(':nom', $this->nom, PDO::PARAM_STR);
    $stmt->bindParam(':prenom', $this->prenom, PDO::PARAM_STR);

    $stmt->execute();


    $message = "Votre nouvel administrateur a été enregistré avec succès";
      return $message;

}catch(PDOException $e){

      $message = "Votre enregistrement a échoué, en voici la raison : " . $e->getMessage();
      return $message;

}


}
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