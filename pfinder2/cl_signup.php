<?php
include('header.php');

if (isset($_POST['signup'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$company = $_POST['company'];
		$address1 = $_POST['address1'];
		$address2 = $_POST['address2'];
		$postcode = $_POST['postcode'];
		$city = $_POST['city'];
		$county = $_POST['county'];
		$tel = $_POST['tel'];
		
		if (!DB::query('SELECT username FROM cl_users WHERE username=:username', array(':username'=>$username))) {

				if(strlen($username) >= 3 && strlen($username) <= 32) {

						if (preg_match('/[a-zA-Z0-9_]+/', $username)) {

								if(strlen($password) >= 6 && strlen($password) <= 60) {

										if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

												if(!DB::query('SELECT email FROM cl_users WHERE email=:email', array(':email'=>$email))) {

											DB::query('INSERT INTO cl_users VALUES (\'\', :username, :password, :email, :company, :address1, :address2, :postcode, :city, :county, :tel)', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email, ':company'=>$company, ':address1'=>$address1, ':address2'=>$address2, ':postcode'=>$postcode, ':city'=>$city, ':county'=>$county, ':tel'=>$tel));
												header("location: cl_login.php");
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
					<form action="cl_signup.php" method="post">
						<input class="StyleTxtField" type="text" name="username" value="" placeholder="Username..."><p />
						<input class="StyleTxtField" type="password" name="password" value="" placeholder="Password..."><p />
						<input class="StyleTxtField" type="text" name="email" value="" placeholder="someone@somesite.com..."><p />
						<input class="StyleTxtField" type="text" name="company" value="" placeholder="Company name..."><p />
						<input class="StyleTxtField" type="text" name="address1" value="" placeholder="Address..."><p />
						<input class="StyleTxtField" type="text" name="address2" value="" placeholder="Address..."><p />
						<input class="StyleTxtField" type="text" name="postcode" value="" placeholder="Postcode..."><p />
						<input class="StyleTxtField" type="text" name="city" value="" placeholder="City..."><p />
						<input class="StyleTxtField" type="text" name="county" value="" placeholder="County..."><p />
						<input class="StyleTxtField" type="text" name="tel" value="" placeholder="Tel no..."><p />
						<input type="submit" name="signup" value="Sign Up!">
					</form>
				</td>
			</tr>
		</table>
	</div>