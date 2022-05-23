<?php

require 'styles.html';

require '../db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>buy car</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<button class="navbar-toggler" type="button" data-togle="collapse" aria-expanded ="flse" aria-label="Toggle navigation" data-target="#navbarSupportedContent" aria-controls ="navbarSupportedContent">
		<span class="navbar-toogler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a href="?page=home">
					<span class="fa fa-home"> Home</span>
				</a>
			</li>


			<li class="nav-item active pl-4">
				<a href="?page=history">
					<i class="fa fa-money-bill-alt"> </i> History
				</a>
			</li>

			 <li class="nav-item active pl-4">
				<a href="?page=account">
					<span class="fa fa-tools"> Account</span>
				</a>
			</li>

			 <i class="pl-4">
			 	<li class="nav-item pl-4">
			 		<a href="?page=logout">
			 			<span class=" text-danger fa fa-power-off"></span> Logout
			 		</a>
			 	</li>
			 </i>
			
		</ul>

		
	</div>
	
</nav>
</body>
</html>