<?php
 $link = $_GET['id'];
 
 switch($link) 
 {
 	case 1 :
	include "pages/tableSensor.php";
	break;
 	case 2 :
	include "pages/chart.php";
	break;
}
?>