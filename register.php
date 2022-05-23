

<?php
require 'db.php';
if(isset($_POST['regis']) && ($_POST['password']==$_POST['password1']))
{


  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email =  $_POST['email'];
  $pass1 = $_POST['password'];

  $data =[':fname'=>  $fname,':lname'=>$lname,':username'=>$email,':password'=>$pass1,':type'=>1];
    $sql ="INSERT INTO users SET fname =:fname, lname=:lname, username =:username, password =:password, type=:type";
  $prepare = $connection->prepare($sql);
  if($prepare->execute($data))
  { 

    ?>
    <span class="alert alert-sm alert-success">Your acount created, <button type="button" class="btn btn-info"  onclick="document.getElementById('id01').style.display='block'">Login</button> to start buying</span>
    <?php
  }
  else
  {
    ?>
    <span class="alert alert-sm alert-danger">Your acount not created, <button type="button" class="btn btn-info"  onclick="document.getElementById('id01').style.display='block'">Register</button> to start buying</span>
    <?php

  }



}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}



/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}


.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content1 {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 55%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>



<div id="register" class="modal">

  <form class="modal-content1 animate card col-sm-5" action="" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('register').style.display='none'" class="close" title="Close Modal">&times;</span>
      
  <center>Register</center>
    </div>
    <hr>

    <br>
    <div class="row register-form">
      <div class="col-md-5 ml-5">
        <div class="form-group">
          First name:<sup class="text-danger">*</sup><br>
          <input type="text" class="col-sm-12 shadow-lg form-control" name="fname" required>
        </div>

        <div class="form-group">
          Last name:<sup class="text-danger">*</sup><br>
            <input class="shadow-lg form-control" name="lname" required>
        </div>

        <div class="form-group">
          Email:<sup class="text-danger">*</sup><br>
         <input type="text" class="col-sm shadow-lg form-control" name="email" required>
        </div>

      </div>

      <div class="col-md-5">
        <div class="form-group">
          Password:<sup class="text-danger">*</sup><br>
          <input type="password" class="col-sm-12 shadow-lg form-control" name="password" required>
        </div>
        <div class="form-group">
          Password (confirm):<sup class="text-danger">*</sup><br>
          <input type="password" class="col-sm-12 shadow-lg form-control" name="password1" required>
        </div>
        <div class="form-group">

          <br>
          
        <button type="submit" class="btn btn-outline-success col-sm-12 fa fa-paper-plane"  name="regis"> Register</button>
          </div>
      </div>

      <div class="col-md-4">

        

      </div>
    </div>
  </form>
</div>



</body>
