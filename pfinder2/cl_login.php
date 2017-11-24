<?php
include('loginheader.php');

if (isset($_POST['cl_login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (DB::query('SELECT username FROM cl_users WHERE username=:username', array(':username'=>$username))) {

				if (password_verify($password, DB::query('SELECT password FROM cl_users WHERE username=:username', array(':username'=>$username))[0]
					['password'])) {
						
						$cstrong = True;
						$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
						$cl_userid = DB::query('SELECT id FROM cl_users WHERE username=:username', array(':username'=>$username))[0]['id'];
						DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :st_userid, :cl_userid)', array(':token'=>sha1($token), ':st_userid'=>NULL, ':cl_userid'=>$cl_userid));

						setcookie("PFID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
						setcookie("PFID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
						header ("location: cl_profile.php?username=$username");

				} else {
						echo 'Incorrect Password!';
				}

		} else {
				echo'User not registered!';
		}
	}

?>
<div class="table">
		<table>
			<tr>
				<td width="57%" valign="top">
				</td>
				<td width="43%" valign="top">
				<h2>Clients Sign in Here</h2>
				<form action="cl_login.php" method="post">
					<input class="StyleTxtField" type="text" name="username" value="" placeholder="Username..."><p />
					<input class="StyleTxtField" type="password" name="password" value="" placeholder="Password..."><p />
					<input type="submit" name="cl_login" value="Sign In!">
				</form>					
				</td>
			</tr>
		</table>
	</div>
