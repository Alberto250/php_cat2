

<?php
require '../db.php';
if(isset($_POST['addCar']))
{
  $cname = $_POST['cname'];
  $type = $_POST['ctype'];
  $cost =  $_POST['cost'];
  $quantity = $_POST['quantity'];
  $color =  $_POST['color'];
  $location = $_POST['location'];
  $mdate =date("Y-m-d");
  $type=$_POST['ctype'];
  $image =  basename($_FILES['image']['name']);
  $target_dir="../img/";
  $target_file=$target_dir.basename($_FILES['image']['name']);


  $data =[':cname'=>$cname,':cost'=>$cost,':quantity'=>$quantity,':color'=>$color,':location'=>$location,':mdate'=>$mdate,':type'=>$type,':image'=>$image];

    $sql ='INSERT INTO cars SET cname =:cname, cost=:cost, quantity =:quantity, color =:color, location=:location,  mdate=:mdate,type=:type,image=:image';
    $prepare = $connection->prepare($sql);
    if($prepare->execute($data))
    {
      move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
      ?>
      <script type="text/javascript">
      document.getElementById('register').style.display='none';
      alert('car added');
      </script><?php
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
<body onload="document.getElementById('register').style.display='block'">



<div id="register" class="modal">

  <form class="modal-content1 animate card col-sm-5" action="" method="POST" enctype="multipart/form-data" >
    <div class="imgcontainer">
      <span onclick="document.getElementById('register').style.display='none'" class="close" title="Close Modal">&times;</span>


cname
cost
quantity
color
location
mdate
type
image
  <center>Add new  car</center>
    </div>
    <hr>

    <br>
    <div class="row register-form">
      <div class="col-md-5 ml-5">
        <div class="form-group">
         Car name: ex:BMW<sup class="text-danger">*</sup><br>
          <input type="text" class="col-sm-12 shadow-lg form-control" name="cname" required>
        </div>
        <div class="form-group">
         Car type: <sup class="text-danger">*</sup><br>
         <select name="ctype" class="col-sm-12 shadow-lg form-control" required>
           <option selected value="Automatic">Automatic</option>
           <option value="Manual">Manual</option>

         </select>
        </div>

        <div class="form-group">
          COST(in dollars($)):<sup class="text-danger">*</sup><br>
            <input type="number" class="shadow-lg form-control" name="cost" required>
        </div>

        <div class="form-group">
          Quantity<sup class="text-danger">*</sup><br>
         <input type="number" class="col-sm shadow-lg form-control" name="quantity" required>
        </div>

      </div>

      <div class="col-md-5">
        <div class="form-group">
          Color:<sup class="text-danger">*</sup><br>
          <input type="text" class="col-sm-12 shadow-lg form-control" name="color" required>
        </div>
        <div class="form-group">
          Location:<sup class="text-danger">*</sup><br>
          <input type="text" class="col-sm-12 shadow-lg form-control" name="location" required>
        </div>

        <div class="form-group">
          Add car's image:<sup class="text-danger">*</sup><br>
          <input type="file" class="col-sm-12 shadow-lg form-control" name="image" id="image" accept="image/*" required>
        </div>

        <div class="form-group">

          <br>
          
        <button type="submit" class="btn btn-outline-success col-sm-12 fa fa-paper-plane"  name="addCar"> Register</button>
          </div>
      </div>

      <div class="col-md-4">

        

      </div>
    </div>
  </form>
</div>



</body>