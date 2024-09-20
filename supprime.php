<?php
     include("main.php");

     if(!empty($_GET["id"])){
          $query="delete from clients where idclient=:id";
          $objsup=$pdo->prepare($query);
          $objsup->execute(["id"=>$_GET["id"]]);
          $objsup->closeCursor();
          header("Location:clients.php");
     }

?>