<?php


require 'header-buyer.php';

if (isset($_GET['page'])) 
{
	switch ($_GET['page']) {

		case 'home':
			include_once 'home.php';
			break;
		case 'cart':
			include_once 'cart.php';
			break;
		case 'history':
			include_once 'history.php';
			break;
		case 'account':
			include_once 'account.php';
			break;
		case 'logout':
			include_once 'logout.php';
			break;
		
	}
}
?>
