<?php

//Skydd mot session hijacking
//http://stackoverflow.com/questions/3517350/session-hijacking-and-php
session_regenerate_id();
ini_set('session.cookie_secure',1);
ini_set('session.cookie_httponly',1);
ini_set('session.use_only_cookies',1);

//require_once 'Start.php';
require_once 'HTMLView.php';
require_once 'LoginCheck.php';
require_once 'Start.php';
require_once 'LoggedIn.php';
require_once 'Test.php';
require_once 'CookieHandler.php';
//Variabler
$button = new LoginView();
$view = new HTMLView();
$count = 0;
$body = "";
$message = "";
$username = "";
$errorMessage = "";
$stop = FALSE;


//Kollar om kakorna finns
$cookie = new CookieHandler();
$cookieExists = $cookie -> CookieExists();

//Om kakorna finns så loggas man in med uppgifterna som finns i kakan


//Kollar om det finns en session och ifall det gör det så loggas man in.
if ($_SESSION['IsLoggedIn'] == TRUE && $stop === FALSE) {
	echo "bajs";
	var_dump("Session i index" . $_SESSION['IsLoggedIn']);

	$view2 = new LoggedInView("test", $errorMessage);
	$htmlview = new HTMLView();
	$view -> echoHTML($view2 -> ShowLoggedInPage($_SESSION['User'], $errorMessage));

}

if ($cookieExists == TRUE && $_SESSION['IsLoggedIn'] == FALSE) {
	$_SESSION['cookieLogin'] = TRUE;
	
		$c = new LoginCheck($_COOKIE["Username"], $_COOKIE["Password"]);
	
	
	$stop = TRUE;
}

//Kollar om användaren trycker på inloggningsknappen
if ($button -> GetLoginButton()) {
	echo "if körs";
	//Kollar de inmatade uppgifterna om de stämmer
	$c = new LoginCheck($view -> GetUsername(), $view -> GetPassword());
	

} else {
	//Stämmer de inte visas inloggningsformuläret igen med användarnamne ifyllt.
	if (!isset($_SESSION['IsLoggedIn']) && $stop == FALSE) {
		if($_SESSION['Logout'] == TRUE){
	$message = "Du är nu utloggad";
}
		session_unset($_SESSION['Logout']);
		echo "else körs!";
		$login = new LoginView();
		$body = $login -> ShowForm($message, $username);

		$view -> echoHTML($body);
	}
}
//echo "Tar bort logout sessionen";


?>