<?php
require_once 'styles.html';


require_once 'menu.html';

require_once 'connection.php';
 		$sql ="SELECT * FROM cars WHERE sn = '".$_GET['ref']."'";

 		$select = mysqli_query($con,$sql);
 		if ($select)
 		{
 			$row=mysqli_fetch_array($select)
?>


                
<form action="up.php?ref=<?=$_GET['ref']?>" method="POST">
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="img/am.jfif" alt="LOgo"/>
                        <h3>Welcome back to updating platform</h3>
                        <p class="fa fa-bell"> You are free to update car's registered information</p>
                    </div>
                    <div class="col-md-9 register-right">

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Make car's info look clear</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            Car name:
                                            <input type="text" class="form-control" placeholder="car's manufacturer or name" name="name" value="<?=$row['cname'];?>" required />
                                        </div>
                                        <div class="form-group">
                                            Car cost:
                                            <input type="text" class="form-control" placeholder="Cots, eg:2000" name="cost" value="<?=$row['cost'];?>" required />
                                        </div>
                                        <div class="form-group">
                                            Car color:
                                            <input type="text" class="form-control" placeholder="color" name="color" value="<?=$row['color'];?>" required />
                                        </div>
                                        <div class="form-group">
                                            Location:
                                            <input type="text" class="form-control"  placeholder="Location" name="location" value="<?=$row['location'];?>" required  />
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl"> 
                                            <!-- -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            Manufactured date:
                                            <input type="date" class="form-control" placeholder="manufactured date" max="<?=date('d-m-Y')?>" name="mdate" value="<?=$row['mdate'];?>" required />
                                        </div>
                                        <div class="form-group">
                                            Car type:<?php
                                      
                                            	function auto()
                                            	{
                                            		?>
                                            <select  class="form-control" name="type" required>
                                            	<option selected>Automatic</option>
                                                <option>Manual</option>
                                            </select>
                                            		<?php
                                            	}
                                            	function manu()
                                            	{
                                            		?>
                                            <select  class="form-control" name="type" required>
                                                <option>Automatic</option>
                                                <option selected>Manual</option>
                                            </select>
                                            		<?php
                                            	}
                                            	$type = ($row['type']=="Automatic") ? auto() : manu() ;
                                            	?>
                                        </div>
                                        <div class="form-group">
                                                <button type="submit" class="btn btn-outline-success fa fa-paper-plane" name="send"> Update</button>
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            </div>
            <?php
        }
        ?>