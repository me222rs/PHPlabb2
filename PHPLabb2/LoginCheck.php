<?php
require_once 'LoggedIn.php';
require_once 'HTMLView.php';
require_once 'Start.php';
require_once 'CookieHandler.php';

session_start();
class LoginCheck {
//miuFafsCP9fBo
	private $count;
	private $username2 = "Admin";
	private $password2 = "miuFafsCP9fBo";
	private $CheckboxIsChecked = "";
	//private $errorMessage = "";

	function __construct($myusername, $mypassword) {

		//$this->Verify($myusername, $mypassword, $checkbox);
		//try{
		if($_SESSION['IsLoggedIn'] == FALSE || !isset($_SESSION['IsLoggedIn'])){
			
				$this -> Login($myusername, $mypassword);
			
		}
		
	}
	


	function LoginStatus() {
		if (isset($_SESSION['IsLoggedIn']) && $_SESSION['IsLoggedIn'] === TRUE) {
			return TRUE;
		}
		return FALSE;
	}


	function GetUser() {
		if (isset($_SESSION['IsLoggedIn'])) {
			return $_SESSION['IsLoggedIn'];
		}
	}

	function Login($myusername, $mypassword) {

		$errorMessage = NULL;
		//Användarnamn och meddelande visas på inloggningssidan
		$view = new LoggedInView($myusername, $errorMessage);
		$htmlview = new HTMLView();

		$isCookieCorrect = new CookieHandler();
		$value = $isCookieCorrect -> CheckCookieValue($this -> username2, $this -> password2);
		echo "value är: " . $value;
		$exist = $isCookieCorrect -> CookieExists();
		echo "exist är: " . $exist;
		if ($exist == TRUE) {

			if ($value == FALSE) {
				echo "Kommer in i if satsen med fel cookieuppgifter!";
				$errorMessage = "Fel uppgifter i cookie!";

				setcookie("Username", NULL);
				setcookie("Password", NULL);

				$htmlview = new HTMLView();
				$backToLogin = new LoginView();
				$html = $backToLogin -> ShowForm($errorMessage, $myusername);
				$htmlview -> echoHTML($html);
				die();
			}

		}

		echo "Passerat if satsen med fel cookieuppgifter";
		echo $mypassword;
		
		
		if ($myusername == "" || $myusername == NULL) {
			$errorMessage = "Användarnamn saknas";
echo "Kommer in i användarnamn saknas";
			$htmlview = new HTMLView();
			$backToLogin = new LoginView();
			$html = $backToLogin -> ShowForm($errorMessage, $myusername);
			$htmlview -> echoHTML($html);
			die();
		}
		
		
		
		if ($mypassword == "" || $mypassword == NULL) {
			$errorMessage = "Lösenord saknas";
echo "Kommer in i lösenord saknas";
			$htmlview = new HTMLView();
			$backToLogin = new LoginView();
			$html = $backToLogin -> ShowForm($errorMessage, $myusername);
			$htmlview -> echoHTML($html);
			die();
		}
		



		if (!$myusername == $this -> username2 && !$mypassword == $this -> password2) {
			$errorMessage = "Fel användarnamn och lösenord";

			$htmlview = new HTMLView();
			$backToLogin = new LoginView();
			$html = $backToLogin -> ShowForm($errorMessage, $myusername);
			$htmlview -> echoHTML($html);

		}

		//Kollar så att användarnamn och lösenord inte är en tom sträng eller null

		//Om inloggningsuppgifterna stämmer så loggas man in
		if ($myusername == $this -> username2 && $mypassword == $this -> password2) {

			//Kollar checkboxen
			$CheckboxIsChecked = FALSE;
			if (isset($_POST['StayLoggedIn'])) {
				$CheckboxIsChecked = TRUE;

			}

			//Om checkboxen är ikryssad skapas cookie
			if ($CheckboxIsChecked === TRUE) {

				$errorMessage = "Vi kommer ihåg dig nästa gång!";
				$create = new CookieHandler();
				$create -> CreateCookie($myusername, $mypassword);
				//Set cookie
			}
			var_dump($_SESSION['IsLoggedIn']);
			// if(isset($_SESSION['IsLoggedIn'])){
			// $errorMessage = TRUE;
			// }
			//$errorMessage = "Inloggningen lyckades!";

			//Sätter sessionen

			$_SESSION['IsLoggedIn'] = TRUE;
			$_SESSION['User'] = $myusername;
			
			$login2 = new LoggedInView();
			$_SESSION['LoginClient'] = $_SERVER["HTTP_USER_AGENT"];
			$mess = $login2 -> ShowLoginMessage($errorMessage);
			echo ">>>Skriver ut Loggedinview i LoginCheck.php<<<";
			$loginview = $view -> ShowLoggedInPage($myusername, $mess);
			$htmlview -> echoHTML($loginview);
			
			//header('Location: index.php');
			//header('Location: ' . $_SERVER['PHP_SELF']);
		} else {
			$errorMessage = "FEL användarnamn och lösen.";

			$htmlview = new HTMLView();
			$backToLogin = new LoginView();
			$html = $backToLogin -> ShowForm($errorMessage, $myusername);
			$htmlview -> echoHTML($html);
		}

		function GetCount() {
			var_dump($this -> count);
			return $this -> count;
		}

	}

}
?>