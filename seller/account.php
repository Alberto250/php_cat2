<?php
session_start();
if (!isset($_SESSION['user_id']))
{
	header('Location:../');

}
?>
<center>
<div class="d-inline-block col-sm-3 pl-2 card ml-2 shadow-lg" style="top:0px; margin-right: 0">
	<h3>Information detail</h3>	
	<hr class="text-success">
	<?php
	include('../db.php');
	$sql ="SELECT * FROM users WHERE id=:id";
	$ps=$connection->prepare($sql);
	$ps->execute([':id'=>$_SESSION['user_id']]);
	$detail=$ps->fetch(PDO::FETCH_OBJ);
	?>
	<div id="infoDis"">

	 <b>Fist name: </b> <?=$detail->fname;?><br>
	 <b>Last name: </b> <?=$detail->lname;?><br>
	 <b>Email:   </b> <?=$detail->username;?><br>
	 <b>Password</b> *****<br>
	 <button class="btn rounded-pill btn-outline-success float-right fa fa-edit shadow-lg" onclick="document.getElementById('infoDis').style.display='none';document.getElementById('infoEdit').style.display='block';"> edit</button>
	 </div>
	 
	<div id="infoEdit" style="display:none">
		<form action="" method="POST">
			<table>
				<tr>
					<td>Fist name:</td>
					<td><input type="text" name="fname" class="form-control" value="<?=$detail->fname;?>" required></td>
				</tr>

				<tr>
					<td>Last name:</td>
					<td><input type="text" name="lname" class="form-control" value="<?=$detail->lname;?>" required></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="email" name="email" class="form-control" value="<?=$detail->username;?>" required></td>
				</tr>
				
				<tr>
					<td>New password:</td>
					<td><input type="pasword" name="newp" class="form-control" ></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
	 <button type="submit" class="btn rounded-pill btn-outline-success float-right fa fa-save shadow-lg" name="info"> Apply</button>
	 </td>
				</tr>


			</table>
		</form></div>

</div>





<br>
<div>

</div>
	
<?php
if (isset($_POST['addBal']))
{
	$balance =$_POST['balance'];
	$newBalance =$_POST['newB'];
	$Total =$balance + $newBalance;
	$query ='UPDATE balance SET balance =:total WHERE user_id =:uid';
	$data =[':total'=>$Total, 'uid'=>$_SESSION['user_id']];
	$prep =$connection->prepare($query);
	$prep->execute($data);
	?>
	<script type="text/javascript">
		alert('Balance added, \n Reload the page to see the new balance')
	</script>
	<?php


}
if (isset($_POST['info']))
{
	$fname =$_POST['fname'];
	$lname =$_POST['lname'];
	$email =$_POST['email'];
	$newp =$_POST['newp'];
	$query ='UPDATE users SET fname =:fname,lname =:lname,username =:email,password =:newp WHERE id =:uid';
	$data =[':fname'=>$fname,':lname'=>$lname,':email'=>$email,':newp'=>$newp, 'uid'=>$_SESSION['user_id']];
	$prep =$connection->prepare($query);
	$prep->execute($data);
	?>
	<script type="text/javascript">
		alert('Info changed, \n Reload')
	</script>
	<?php


}
?>