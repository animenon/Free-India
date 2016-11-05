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
		<title>Free India | Complaint Analysis</title>
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
		
		<div  class="col-md-offset-2 col-md-8 col-md-offset-2" style="background-color:rgba(239, 235, 229,0.5);border-radius:10px;padding-bottom:5%;font-size:15px;">
			
			<?php
				echo "<h3>Complaints Analysis<br /></h3><hr /><div class='col-md-6'><br />";
				$query = $MySQLi_CON->query("SELECT COUNT(comp_id) FROM complaints");
				$row=mysqli_fetch_array($query);
				echo "<b>Total number of complaints received : ".$row[0]."</b><br /><br />";				
				
				$query = $MySQLi_CON->query("SELECT COUNT(comp_id) FROM complaints where status='RESOLVED'");
				$row=mysqli_fetch_array($query);
				echo "<b>Total number of complaints resolved : ".$row[0]."</b><br /><br />";	
				
				$query = $MySQLi_CON->query("SELECT COUNT(comp_id) FROM complaints where status='ASSIGNED'");
				$row=mysqli_fetch_array($query);
				echo "<b>Total number of complaints assigned : ".$row[0]."</b><br /><br />";
				
				$query = $MySQLi_CON->query("SELECT COUNT(comp_id) FROM complaints where status='IN_PROGRESS'");
				$row=mysqli_fetch_array($query);
				echo "<b>Total number of complaints in progress : ".$row[0]."</b><br /><br />";	
			
			?>
			</div>
			<div class="col-md-6">
				<div id="chartContainer" style="height: 200px; width: 100%;"></div>
			</div>
		</div>
	</body>
<script type="text/javascript">
	window.onload = function () {
		var chart = new CanvasJS.Chart("chartContainer", {
			title: {
				text: "Analysis Chart"
			},
			data: [{
				type: "column",
				dataPoints: [
					{ y: 9, label: "Recieved" },
					{ y: 1, label: "Resolved" },
					{ y: 4, label: "Assigned" },
					{ y: 4, label: "In Progress" },
				]
			}]
		});
		chart.render();
	}
</script>

<script src="./assets/js/canvasjs.min.js"></script>

</html>

