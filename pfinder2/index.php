<?php
include('header.php');

if (isset($_POST['submit'])) {
	if (isset($_POST['student'])) {
		header ("location: st_signup.php");
	} else {
		if (isset($_POST['client'])) {
		header ("location: cl_signup.php");
	}
}
}
?>
<script type="text/javascript">
function KeepCount() {

var NewCount = 0

if (document.choose.student.checked)
{NewCount = NewCount + 1}

if (document.choose.client.checked)
{NewCount = NewCount + 1}

if (NewCount == 2)
{
alert('Pick Just One Please')
document.choose; return false;
}
} 
</script>
<div class="table">
		<table>
			<tr>
				<td width="60%" valign="top">
					<h2>Join Us Today!</h2>
				</td>
				<td width="60%" valign="top">
					<h2>Are you a:</h2>
					<form action="index.php" name="choose" method="post">
					<input class="StyleTextField" type="checkbox" name="student" onClick="return KeepCount()" />&nbsp Student looking for a project?<br><br>
					<input class="StyleTextField" type="checkbox" name="client" onClick="return KeepCount()" />&nbsp Client with a project proposal?<br><br>
					<input type="submit" name="submit" value="Sign Up!" />
			</tr>
					
<br>
