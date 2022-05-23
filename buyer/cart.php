<?php
session_start();
if (!isset($_SESSION['user_id']))
{
	header('Location:../');
}

require '../db.php';

$buyer =$_SESSION['user_id'];

$crid=$_GET['cid'];

$sql = 'SELECT * FROM cars  WHERE sn = :car_id';
$ps = $connection->prepare($sql);
$ps->execute([':car_id'=>$crid]);
$cars=$ps->fetchAll(PDO::FETCH_OBJ);
foreach($cars as $car):

	?>
	<form action="" method="POST">
	<div class=" -4 col-sm-5 shadow">


		<input type="hidden" name="user" class="form-control" value="<?=$buyer?>">
		<input type="hidden" name="seller" class="form-control" value="0">
		<input type="hidden" name="car" class="form-control" value="<?=$crid?>">
		<input type="hidden" name="date" class="form-control" value="<?=date('Y-m-d')?>">
		<input type="hidden" name="time" class="form-control" value="<?=date('H:i:s')?>">

		<p>You selcted <b><?=$car->cname?></b>  (*Available in stock: <?=$car->quantity?>) </p>


			<img src="../img/<?=$car->image;?>" class="car col-sm-12">
		


		<span ><i class="text-warning fa fa-hand-point-right">   Color:  </i><?=$car->color;?></span> ,
		<span ><i class="text-warning fa fa-hand-point-right">   Type :  </i><?=$car->type;?></span>,
		<span ><i class="text-warning fa fa-hand-point-right">   Cost :  </i><?=$car->cost;?>$</span>,
		<span ><i class="text-warning fa fa-hand-point-right d-inline"> Quantity: </i>
		<input type="number" name="quantity" class="form-control d-inline col-sm-2" min="1"  max="<?=$car->quantity;?>" value="1">
		<input type="hidden" name="totalQ" value="<?=$car->quantity;?>">
		</span>

		<button type="submit" class="btn btn-outline-danger col-sm-4" name="buy">Buy</button>

	</div>

</form>


<?php
endforeach;

if (isset($_POST['buy'])) {
	$user=$_POST['user'];
	$seller=$_POST['seller'];
	$car=$_POST['car'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$quantity=$_POST['quantity'];
	$sql ='INSERT INTO bought SET buyer=:buyer, seller=:seller, car=:car, quantity=:quantity, date=:date, time=:time';
	$data=[':buyer'=>$user,':seller'=>$seller,':car'=>$car,':quantity'=>$quantity,':date'=>$date,':time'=>$time];
	$prepare = $connection->prepare($sql);
	if ($prepare->execute($data))
	{
		$sql = "UPDATE cars SET quantity =:quantity WHERE sn=:sn";
		$total =$_POST['totalQ'];
		$newQtty = $total - $quantity;
		$data =[':quantity'=>$newQtty,':sn'=>$car];
		$ps=$connection->prepare($sql);
		$ps->execute($data);
				
		
		?><script type="text/javascript">alert('Buying went well, Go account to check you result');
		location.href="?page=home";
		</script><?php

	}
	

}

?>