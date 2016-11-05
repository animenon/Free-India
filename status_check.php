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
		<div class="text-center">
		<h3>Complaint Status</h3>
		
		<div class="text-left">
		<?php
			$comp_id = $MySQLi_CON->real_escape_string(trim($_POST['comp_no']));
	
	$query = $MySQLi_CON->query("SELECT * FROM complaints WHERE comp_id='$comp_id'");
	$row=$query->fetch_array();

	echo "<br /><div class='col-md-offset-3 col-md-3'>User ID: </div><div class='col-md-4 text-left'>".$row['user_id'];
	echo "</div><br /><div class='col-md-offset-3 col-md-3'>Complaint type: </div><div class='col-md-4 text-left'>".$row['comp_type'];
	echo "</div><br /><div class='col-md-offset-3 col-md-3'>Complaint Desription: </div><div class='col-md-4 text-left'>".$row['description'];
	echo "</div><br /><div class='col-md-offset-3 col-md-3'>Status: </div><div class='col-md-4 text-left'>".$row['status']."</div>";
		?>
		</div>
		<br /><br />
		
		</div>
		<div class="col-md-12 text-center"><br /><a href="./status.php" class="btn btn-primary">Back</a></div>
		</div>
		
	</body>
</html>

