<?php
/**
 *
 */
require_once 'TextFileHandling.php';
class CookieHandler {

	function __construct() {

	}

	public function CookieExists() {
		if (isset($_COOKIE["Username"]) && isset($_COOKIE["Password"])) {
			return TRUE;
		}
		FALSE;
	}

	public function CreateCookie($username, $password) {
		//crypt($password, "micke");
		$expirationTime = time() + 45;
		setcookie("Username", $username, $expirationTime);
		setcookie("Password", $password, $expirationTime);

		$CookieTimeUN = $expirationTime;
		$TextFileHandler = new TextFileHandling();
		$TextFileHandler -> SaveToText($CookieTimeUN);
		echo "Cookie har skapats";
	}

	public function CheckCookieValue($myusername, $mypassword) {
		$time = time();

		$textFileHandler = new TextFileHandling();
		$current = $textFileHandler -> ReadfromText();
		if ($current < $time) {
			return FALSE;
		}

		if ($_COOKIE["Username"] == $myusername && $_COOKIE["Password"] == $mypassword) {
			return TRUE;
		}
		return FALSE;
	}

	public function CheckCookieTime($CookieTimeUN, $CookieTimePW) {

	}

}
?>