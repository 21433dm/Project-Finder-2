<?php
include('classes/Login.php');
include ('header.php');

if (!st_Login::stIsLoggedIn()) {
		if (!cl_Login::clIsLoggedIn()) {
			header ("location: index.php");
		}
	}

if(isset($_POST['confirm'])) {

		DB::query('DELETE FROM login_tokens WHERE st_userid=:st_userid OR cl_userid=:cl_userid', array(':st_userid'=>st_Login::stIsLoggedIn(), ':cl_userid'=>cl_Login::clIsLoggedIn()));
			
		} else {
				if(isset($_COOKIE['PFID'])) {
						DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['PFID'])));
				}
				
		}
				setcookie('PFID', '', time()-3600);
				setcookie('PFID_', '', time()-3600);
				
?>
<h2>Logout of your account?</h2>
<p>Are you sure you'd like to logout?</p>
<form action="cl_logout.php" method="post">
		<input type="submit" name="confirm" value="Confirm">
</form>