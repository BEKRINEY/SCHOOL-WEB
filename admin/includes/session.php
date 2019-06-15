<?php 
$title="web Platform";	
session_start();
	if(! isset($_SESSION['SID'])){
		header("location: index.php");
	}
	
?>