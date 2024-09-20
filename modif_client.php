<?php
ob_start();
     $client=true;
     include_once("header.php");
     include_once("main.php");
     if(!empty($_POST)){
          $query="update clients set nom=:nom, ville=:ville, telephone=:telephone where idclient=:id";
          $pdostmt=$pdo->prepare($query);
          $pdostmt->execute(["nom"=>$_POST["inputnom"],"ville"=>$_POST["inputville"],"telephone"=>$_POST["inputphone"],"id"=>$_POST["myid"]]);
          $pdostmt->closeCursor();
          header("Location:clients.php");
     }
     if(!empty($_GET["id"])){
          $query="select * from clients where idclient=:id";
          $pdostmt=$pdo->prepare($query);
          $pdostmt->execute(["id"=>$_GET["id"]]);
         
          while($row=$pdostmt->fetch(PDO::FETCH_ASSOC)):
     ?>
     <h1 class="mt-5">Modifier un client</h1>
     <form class="row g-3" method="POST">
          <input type="hidden" name="myid" value="<?php echo $row["idclient"] ?>">
          <div class="col-md-6">
               <label for="inputnom" class="form-label">Nom(s)</label>
               <input type="text" class="form-control" id="inputnom" name="inputnom" value="<?php echo $row["nom"] ?>" required>
          </div>
          <div class="col-md-6">
               <label for="inputville" class="form-label">Ville</label>
               <input type="text" class="form-control" id="inputvile" name="inputville" value="<?php echo $row["ville"] ?>" required>
          </div>
          <div class="col-12">
               <label for="inputphone" class="form-label">Téléphone</label>
               <input type="tel" class="form-control" id="inputphone" name="inputphone" value="<?php echo $row["telephone"] ?>" required>
          </div>
          
          <div class="col-12">
               <button type="submit" class="btn btn-primary">Modifier</button>
          </div>
     </form>

     </div>
     </main>
<?php 
     endwhile; 
     $pdostmt->closeCursor();
     ob_end_flush();
     }
 ?>
<?php
     include_once("footer.php")
?>
