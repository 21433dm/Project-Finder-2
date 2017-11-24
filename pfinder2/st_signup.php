<?php
include('header.php');

if (isset($_POST['signup'])) {
		$username = $_POST['username'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		
		if (!DB::query('SELECT username FROM st_users WHERE username=:username', array(':username'=>$username))) {

				if(strlen($username) >= 3 && strlen($username) <= 32) {

						if (preg_match('/[a-zA-Z0-9_]+/', $username)) {

								if(strlen($password) >= 6 && strlen($password) <= 60) {

										if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

												if(!DB::query('SELECT email FROM st_users WHERE email=:email', array(':email'=>$email))) {

											DB::query('INSERT INTO st_users VALUES (\'\', :username, :fname, :lname, :password, :email)', array(':username'=>$username, ':fname'=>$fname, ':lname'=>$lname, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email));
												header("location: st_login.php");
											} else {
												echo 'Email in use!';
											}

										} else {
												echo 'Invalid email!';
										}
								} else {
										echo 'Invalid password!';
								}
								} else {
										echo 'Invalid username!';
								}
						} else {
								echo 'Invalid username!';
						}
				} else {
						echo 'User already exists!';
				}

}

?>

<div class="table">
		<table>
			<tr>
				<td width="57%" valign="top">
				</td>
				<td width="43%" valign="top">
					<h2>Sign Up!</h2>
					<form action="st_signup.php" method="post">
						<input class="StyleTxtField" type="text" name="username" value="" placeholder="Student number..."><p />
						<input class="StyleTxtField" type="text" name="fname" value="" placeholder="First name..."><p />
						<input class="StyleTxtField" type="text" name="lname" value="" placeholder="Last name..."><p />
						<input class="StyleTxtField" type="password" name="password" value="" placeholder="Password..."><p />
						<input class="StyleTxtField" type="text" name="email" value="" placeholder="someone@somesite.com..."><p />
						<input type="submit" name="signup" value="Sign Up!">
					</form>
				</td>
			</tr>
		</table>
	</div>