<?php
include('classes/db.php');

$username = $_GET['username'];

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Project Finder</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
		<div class="headerMenu">
			<div class="wrapper"><?php echo $username ?>'s Project Finder Profile
			<div id="menu">
				<a href="st_change_pass.php"><input type="submit" name="change_pass" value="Change Password" /></a>
				<a href="st_logout.php"><input type="submit" name="signout" value="Sign out" /></a>
			</div>
			</div>
		</div>