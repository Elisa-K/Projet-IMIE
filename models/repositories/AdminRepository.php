<?php

  class AdminRepository
  {

    public function getAdmin($pdo, $mail, $mdp) {


  		$resultat = $pdo->prepare('SELECT id, nom, prenom, mail, mdp FROM admin WHERE mail = :mail AND mdp = :mdp');

  		$resultat->bindParam(':mail', $mail, PDO::PARAM_STR);
  		$resultat->bindParam(':mdp', $mdp, PDO::PARAM_STR);
  		$resultat->setFetchMode(PDO::FETCH_OBJ);

  		$resultat->execute();

  		$obj = $resultat->fetch();

  		if(empty($obj)) {
  			return null;
  		} else {
  			$admin = new Admin();
  			$admin->setId($obj->id);
  			$admin->setNom($obj->nom);
  			$admin->setPrenom($obj->prenom);
  			$admin->setMail($obj->mail);
  			$admin->setMdp($obj->mdp);

  			return $admin;
  		}

  	}

  }
