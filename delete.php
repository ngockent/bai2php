<?php 
	include 'connect.php';
	$id = $_GET['id'];
	$query ="delete from customer where Id = '$id'";
	$exe = mysqli_query($con,$query);
	if($exe){
		header('location:detail.php');
	}
 ?>