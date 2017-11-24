<?php
include ('header.php');
include ('classes/Login.php');

if (cl_Login::clIsLoggedIn()) {
				
			if(isset($_POST['changepass'])) {

			$oldpass = $_POST['oldpass'];
            $newpass = $_POST['newpass'];
            $newconfirm = $_POST['newconfirm'];
            $userid = cl_Login::clIsLoggedIn();

            if (password_verify($oldpass, DB::query('SELECT password FROM cl_users WHERE id=:cl_userid', array(':cl_userid'=>$userid))[0]['password'])) {
                        if ($newpass == $newconfirm) {
                                if (strlen($newpass) >= 6 && strlen($newpass) <= 60) {
                                        DB::query('UPDATE cl_users SET password=:newpass WHERE id=:cl_userid', array(':newpass'=>password_hash($newpass, PASSWORD_BCRYPT), ':cl_userid'=>$userid));
                                        header ("location: cl_profile.php?username=$username");
                                }
                        } else {
                                echo 'Passwords don\'t match!';
                        }
                } else {
                        echo 'Incorrect old password!';
                }

		}

} else {
		die('Not logged in!');
}

?>
<div class="table">
		<table>
			<tr>
				<td width="57%" valign="top">
				</td>
				<td width="43%" valign="top">
				<h2>Change your password</h2>
				<form action="cl_change_pass.php" method="post">
				<input class="StyleTxtField" type="password" name="oldpass" value="" placeholder="Current password..."><p />
				<input class="StyleTxtField" type="password" name="newpass" value="" placeholder="New password..."><p />
				<input class="StyleTxtField" type="password" name="newconfirm" value="" placeholder="Confirm password..."><p />
				<input type="submit" name="changepass" value="Change password...">
</form>