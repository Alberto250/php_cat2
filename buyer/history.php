<?php
session_start();

if (!isset($_SESSION['user_id']))
{
	header('Location:../');
}

require '../db.php';

$user0 =$_SESSION['user_id'];



$sql = 'SELECT cars.cname,cars.cost,cars.color,bought.date,bought.time,bought.quantity FROM cars  JOIN bought ON bought.car=cars.sn  WHERE buyer = :u_id order by id desc';
$ps = $connection->prepare($sql);
$ps->execute([':u_id'=>$user0]);
$res=$ps->fetchAll(PDO::FETCH_OBJ);
?>
	<div class=" ml-4 col-sm-11 shadow">
		<table class="table table-bordered">
			<tt><h3 class="text-secondart">History about marking made (buy)</h3></tt>
			<tr>
				<th>#</th>
				<th>date (time)</th>
				<th>Car-mark</th>
				<th>Color</th>
				<th>cost/u</th>
				<th>Quantity</th>
				<th>Total cost</th>
			</tr>
			<?php
			$i=1;
foreach($res as $row):
	

	?>

<tr>
	<td><?=$i?></td>
	<td><?=$row->date." (".$row->time.")"?></td>
	<td><?=$row->cname?></td>
	<td><?=$row->color?></td>
	<td><?=$row->cost?>$</td>
	<td><?=$row->quantity?></td>
	<td><?=$row->cost*$row->quantity?> $</td>
</tr>

<?php
$i++;
endforeach;

?>
</table>
<br>
	</div>