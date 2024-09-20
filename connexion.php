<?php
     class connexion extends PDO{
          const HOST="localhost";
          const DB="gestioncommands";
          const USER="root";
          const PWD="";

          public function __construct()
          {
               try{
                    parent::__construct("mysql:dbname=".self::DB.";host=".self::HOST,self::USER,self::PWD);
                    
               } catch(PDOException $e){
                    echo $e->getMessage()." ".$e->getFile()." ".$e->getLine();
               }
          }


     }
?>