<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['userSession']))
{
 header("Location: login.php");
 exit;
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Free India | Analysis</title>
		<link rel="shortcut icon" href="./assets/img/logo.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
		<script src="./assets/js/jquery.min.js"></script>
		<script src="./assets/js/bootstrap.min.js"></script>
		<script type= "text/javascript" src = "./assets/js/cs.js"></script>
		<link rel="stylesheet" href="./assets/css/style.css">
		
		
	</head>
	<body>
		<ul class="nav nav-pills" role="tablist" style="background-color:rgba(63,84,191,0.3);margin:5%;border-radius:5px;">
			<li><a href="home.php"><img src="./assets/img/logo.png" width="15px" title="Citizen Services" alt="" />&nbsp;Home</a></li>
			<li><a href="complaint.php">Complaints Analysis</a></li>
			<li><a href="status.php">Complaint Status</a></li>
			<li style="float:right;"><a href="logout.php?logout='bye'" style="text-decoration:none;">Logout</a></li>
			<li style="float:right;"><a href="others.php">Other Useful Links</a></li>
		</ul>
		
		<div  class="col-md-offset-2 col-md-8 col-md-offset-2 text-center" style="background-color:rgba(239, 235, 229,0.5);border-radius:10px;padding-bottom:5%;font-size:15px;">
					
		</div>
	</body>
</html>

