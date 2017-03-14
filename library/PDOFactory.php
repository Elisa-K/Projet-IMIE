<?php

  class PDOFactory
  {
    public static function getMysqlConnection()
    {
      $db = new PDO('mysql:host=localhost;dbname=projet_imie', 'root', 'root');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $db;
    }
  }
