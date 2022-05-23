

<?php

session_start();
require_once 'styles.html';
require_once 'db.php';
$user1 = $_POST['uname'];
$pass1 = $_POST['psw'];
$data = [':user' =>$user1,':pass' =>$pass1];
$sql = 'SELECT * FROM users WHERE username =:user and password = :pass';
$statement = $connection->prepare($sql);
$statement->execute($data);
$users = $statement->fetch(PDO::FETCH_ASSOC);

if($statement->rowCount())
{
  $_SESSION['user_id'] = $users['id'];
  switch ($users['type']) {
    case 0:
    header('Location:seller');
      break;
    
    case 1:
    header('Location:buyer?page=home');    
      break;
  }
}
else
{
  ?>
  <span class="alert alert-sm alert-info text-danger fa fa-bell">Login credential fail, Try again</span>
  <?php
}
?>
