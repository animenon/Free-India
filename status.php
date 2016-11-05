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
		<title>Free India | Complaint Status</title>
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
		
		
		<div class="col-md-offset-2 col-md-8 col-md-offset-2" id="test" style="background-color:rgba(239, 235, 229,0.5);border-radius:10px;padding-bottom:5%;font-size:15px;">
		  <form action="status_check.php" method="POST">
			<h3>Check your complaint status</h3><hr />
			<div class="col-md-offset-2 col-md-3" style="font-size:20px;">	
				Complaint Number:
			</div>
			<div class="col-md-4 text-left">	
			<input type="text" name="comp_no" style="width:100%;" placeholder="Enter your complaint number" />
			</div>			
			<br /><br />
			
			<div class="text-center"><br /><button type="submit" id="compCheck" name="check" class="btn btn-primary">Check</button></div>
		  </form>
		</div>
		
	</body>
</html>

