<?php
//session_start();
require_once 'CookieHandler.php';
require_once 'Start.php';
class LoggedInView {

	private $LogoutButton = "Logga ut";
	private $message = "";
	private $cookieLogin = FALSE;



		
	function ShowLoginMessage($message) {

		$login = new LoginView();
		$userPressedLogin = $login -> GetLoginButton();

		if ($_SESSION['cookieLogin'] == TRUE && $userPressedLogin == FALSE) {
			$message = "Du loggades in via cookies!";
			$_SESSION['Message'] = TRUE;
			return $message;
		}

		if (!empty($message)) {
			echo ">>>>Kommer in i första if satsen!<<<<";

			$dontrunthis = TRUE;
			return $message;
			//$this->message = $message;

		}

		if ($message == NULL && $_SESSION['IsLoggedIn'] == TRUE && $userPressedLogin == TRUE) {

			echo ">>>>Kommer in i andra if satsen!<<<<";
			$message = "Inloggningen lyckades!";
			//$_SESSION['LoginSuccess'] = TRUE;
			//$dontrunthis = TRUE;
			//$this->message = $message;
			return $message;
		}

		if ($_SESSION['IsLoggedIn'] == TRUE) {
			
			echo ">>>>Kommer in i tredje if satsen!<<<<";
			$username = $_SESSION['User'];
			$message = "";
			//$this->message = $message;

			return $message;
		}
		
		
	}

	function __construct(/*$username, $message*/) {
		$button = new LoginView();
		//$this->message = $message;
		$dontrunthis = FALSE;
		$cookie = new CookieHandler();
		$cookieExists = $cookie -> CookieExists();
		//Innehåller: Vi kommer ihåg dig nästa gång!

	}

	public function GetLogoutButton() {

		if (isset($_POST[$this -> LogoutButton])) {
			echo "Logout";
			return TRUE;
		}
		return FALSE;
	}

	public function ShowLoggedInPage($username, $message) {
	
		return $LoggedInHTML = "
			<form method='post' action='Logout.php'>
				<h1>$message</h1>
				<h2>Inloggad som: $username</h2>
				<input type='submit' name='$this->LogoutButton' value='Logout'>
				
			</form>";

	}

}
?>