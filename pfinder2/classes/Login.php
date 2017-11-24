<?php

class st_Login {

		public static function stIsLoggedIn() {

		if (isset($_COOKIE['PFID'])) {
				if (DB::query('SELECT st_userid FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['PFID'])))) {
						$st_userid = DB::query('SELECT st_userid FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['PFID'])))[0]
						['st_userid'];

						if(isset($_COOKIE['PFID_'])) {
								return $st_userid;	
						} else {
							$cstrong = True;
							$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
							DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :st_userid, \'\')', array(':token'=>sha1($token), ':st_userid'=>$st_userid));
							DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($token)));

							setcookie("PFID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
							setcookie("PFID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

							return $st_userid;

						}
						
				}

		}

		return false;
}

}

class cl_Login {

		public static function clIsLoggedIn() {

		if (isset($_COOKIE['PFID'])) {
				if (DB::query('SELECT cl_userid FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['PFID'])))) {
						$cl_userid = DB::query('SELECT cl_userid FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['PFID'])))[0]
						['cl_userid'];

						if(isset($_COOKIE['PFID_'])) {
								return $cl_userid;	
						} else {
							$cstrong = True;
							$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
							DB::query('INSERT INTO login_tokens VALUES (\'\', :token, \'\', :cl_userid)', array(':token'=>sha1($token), ':cl_userid'=>$st_userid));
							DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($token)));

							setcookie("PFID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
							setcookie("PFID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

							return $cl_userid;

						}
						
				}

		}

		return false;
}

}

?>