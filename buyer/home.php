<?php
session_start();

if (!isset($_SESSION['user_id']))
{
  header('Location:../');
}
$sql = 'SELECT * FROM cars WHERE quantity!=0';
$statement = $connection->prepare($sql);
$statement->execute();
$cars = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php foreach($cars as $car): ?>

  <div style="display: inline-block;" class="shadow-lg col-sm-3 card">

    <img src="../img/<?= $car->image; ?>" class="col-sm-10 ml-2 mt-2" style="height: 200px">
    <br>

  <?= $car->type; ?> 
  <?= $car->cname; ?> from 
  <?= $car->location; ?> 

  Color: <?= $car->color; ?>
  Manufactured: 
  <?= $car->mdate; ?>
Cost: <?= $car->cost; ?>$
 
<a href="?page=cart&cid=<?= $car->sn; ?>" class="btn btn-outline-danger fa fa-shopping-cart"> Buy</a>
</div>

        <?php endforeach;    ?>
