

<?php
require_once 'styles.html';
require_once 'db.php';
require_once 'login.php';
require_once 'register.php';
?>
<p>
  <button class="btn btn-outline-info " onclick="document.getElementById('id01').style.display='block'">Signin</button>          Buy car online
  <button class="btn btn-outline-info float-right" onclick="document.getElementById('register').style.display='block'">Signup</button>
</p>
<?php
$sql = 'SELECT * FROM cars';
$statement = $connection->prepare($sql);
$statement->execute();
$cars = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php foreach($cars as $car): ?>

  <div style="display: inline-block;" class="shadow-lg col-sm-3">

    <img src="img/<?= $car->image; ?>" class="col-sm-10 ml-2 mt-2" style="height: 200px">
    <br>

  <?= $car->type; ?> 
  <?= $car->cname; ?> from 
  <?= $car->location; ?> 

  Color: <?= $car->color; ?>
  Manufactured: 
  <?= $car->mdate; ?>
Cost: <?= $car->cost; ?>$
</div>

        <?php endforeach; ?>