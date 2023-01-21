<?php

class database{

   public $pdo;

   public function __construct(){
    $this->pdo=new PDO('mysql:server=localhost;dbname=users','root','');
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   }

   public function getAll(){ 
      $statement=$this->pdo->query("select * from user"); 
      $statement->execute();
      return $statement->fetchAll(PDO::FETCH_ASSOC);
   }

   public function getUser($id){ 
      $statement=$this->pdo->query("select * from user where id=$id"); 
      $statement->execute();
      return $statement->fetch(PDO::FETCH_ASSOC);
   }
}

return new database();