<?php
include ('header.php');
include ('classes/Login.php');

if (st_Login::stIsLoggedIn()) {
				
			if(isset($_POST['changepass'])) {

			$oldpass = $_POST['oldpass'];
            $newpass = $_POST['newpass'];
            $newconfirm = $_POST['newconfirm'];
            $userid = st_Login::stIsLoggedIn();

            if (password_verify($oldpass, DB::query('SELECT password FROM st_users WHERE id=:st_userid', array(':st_userid'=>$userid))[0]['password'])) {
                        if ($newpass == $newconfirm) {
                                if (strlen($newpass) >= 6 && strlen($newpass) <= 60) {
                                        DB::query('UPDATE st_users SET password=:newpass WHERE id=:st_userid', array(':newpass'=>password_hash($newpass, PASSWORD_BCRYPT), ':st_userid'=>$userid));
                                        header ("location: st_profile.php?username=$username");
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
				<form action="st_change_pass.php" method="post">
				<input class="StyleTxtField" type="password" name="oldpass" value="" placeholder="Current password..."><p />
				<input class="StyleTxtField" type="password" name="newpass" value="" placeholder="New password..."><p />
				<input class="StyleTxtField" type="password" name="newconfirm" value="" placeholder="Confirm password..."><p />
				<input type="submit" name="changepass" value="Change password...">
</form>