<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['userSession']))
{
 header("Location: login.php");
}


if(isset($_POST['btn-submit']))
{
	$complaint = (trim($_POST['complaint']));
	$issue = trim($_POST['subIssue']);
	$loc= trim($_POST['loc']);
	$specific_loc= trim($_POST['address']);
	$desc= trim($_POST['desc']);
	$s="";
	$s.="PWD".rand(10000,100000);
	
	$query = $MySQLi_CON->query("INSERT INTO complaints(comp_id,user_id,comp_type,sub_type,description,loc,addr,status,assigned_to) VALUES('$s', '".$_SESSION['userSession']."',$complaint,$issue,'$desc','$loc','$specific_loc','IN_PROGRESS','0')");
	
	if($query === TRUE){
		$query = $MySQLi_CON->query("SELECT comp_id FROM complaints WHERE user_id='".$_SESSION['userSession']."' ORDER BY Time DESC LIMIT 1");
		$row=mysqli_fetch_array($query);
		//echo $row[0];
		header("Location: thankyou.php?comp=".$row[0]);
	}else{
		echo "Error: " . $query . "<br>" . $MySQLi_CON->error;
	}

	$MySQLi_CON->close();
	
}
?><!DOCTYPE html>
<html>
	<head>
		<title>Citizen Services</title>
		<link rel="shortcut icon" href="./assets/img/logo.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
		<script src="./assets/js/jquery.min.js"></script>
		<script src="./assets/js/bootstrap.min.js"></script>
		<script type= "text/javascript" src = "./assets/js/cs.js"></script>
		<script type= "text/javascript" src = "./assets/js/loc.js"></script>
		<link rel="stylesheet" href="./assets/css/style.css">
		<style>.btn:hover {
			    background-color: #BDBDB5;
			} .btn:active {
			    background-color: #BDB0B0;
			}
		</style>
		
	</head>
	<body>
		<ul class="nav nav-pills" role="tablist" style="background-color:rgba(63,84,191,0.3);margin:5%;border-radius:5px;">
			<li><a href="home.php"><img src="./assets/img/logo.png" width="15px" title="Citizen Services" alt="" />&nbsp;Home</a></li>
			<li><a href="complaint.php">Complaints Analysis</a></li>
			<li><a href="status.php">Complaint Status</a></li>
			<li style="float:right;"><a href="logout.php?logout='bye'" style="text-decoration:none;">Logout</a></li>
			<li style="float:right;"><a href="others.php">Other Useful Links</a></li>
		</ul>
		
		<div class="container">
			<div class=" col-md-offset-2 col-md-8 col-md-offset-2" style="background-color:rgba(239, 235, 229,0.5);border-radius:10px;padding-bottom:5%;font-size:15px;">
				<h2>Free India</h2><hr />
				<form method="POST">	
					<div class="col-md-offset-1 col-md-4">	
						Select Issue/Complaint
					</div><div class="col-md-1">:</div><div class="col-md-4">	
							<select id="complaint" name ="complaint" style="width:100%;"></select>
					</div><br /><br />
					<div class="col-md-offset-1 col-md-4">	
						Select Sub-Issue
					</div><div class="col-md-1">:</div><div class="col-md-4">	
							<select name ="subIssue" id ="subIssue" style="width:100%;"></select>
					</div>
					<script language="javascript">
						populateIssues("complaint", "subIssue");
					</script><br /><br />
					<div class="col-md-offset-1 col-md-4">	
						Description of issue
					</div><div class="col-md-1">:</div><div class="col-md-4">	
							<textarea name="desc" rows="3" id="desc" placeholder="Description of the issue.." style="width:100%;"></textarea>
					</div><br /><br />
					<div class="col-md-offset-1 col-md-4">	
						Select Location
					</div><div class="col-md-1">:</div><div class="col-md-4">	
							<select name ="loc" id ="loc" style="width:100%;"></select>
					</div>
					<script language="javascript">
						populateLoc("loc");
					</script><br /><br /><br />
					<div class="col-md-offset-1 col-md-4">	
						Specific Address
					</div><div class="col-md-1">:</div><div class="col-md-4">	
							<input type="text" name="address" id="address" style="width:100%;" />
					</div><br />
					<div class="text-center"><br /><br />
						<button  type="submit" class="btn"  name="btn-submit">Submit Issue/Complaint</button>
					</div>
				</form>
					
			</div>
		</div>
	</body>
</html>

