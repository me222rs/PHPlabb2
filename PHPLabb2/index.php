<?php

//Ta bort alla echo och var_dump innan publicering på one.com

//Skydd mot session hijacking
//http://stackoverflow.com/questions/3517350/session-hijacking-and-php
//session_regenerate_id();

//var_dump($_SERVER["HTTP_USER_AGENT"]);


//ini_set('session.cookie_secure',0);
//ini_set('session.cookie_httponly',1);
//ini_set('session.use_only_cookies',1);
session_start();

$_SESSION['ClientInfo'] = $_SERVER["HTTP_USER_AGENT"];

//var_dump($_SERVER["HTTP_USER_AGENT"]);

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
$crap = FALSE;


//Kollar om kakorna finns
$cookie = new CookieHandler();
$cookieExists = $cookie -> CookieExists();

//Om kakorna finns så loggas man in med uppgifterna som finns i kakan


//Kollar om det finns en session och ifall det gör det så loggas man in.
if ($_SESSION['IsLoggedIn'] == TRUE && $stop === FALSE) {

	if($_SESSION['ClientInfo'] == $_SESSION['LoginClient']){
	echo ">>>Skriver ut Loggedinview i index.php<<<";
		$view2 = new LoggedInView("test", $errorMessage);
		$view -> echoHTML($view2 -> ShowLoggedInPage($_SESSION['User'], $errorMessage));
			
	}
	elseif($_SESSION['ClientInfo'] != $_SESSION['LoginClient']){

		echo ">>>Skriver ut formuläret i index.php<<<";
		$login = new LoginView();
		$body = $login -> ShowForm($message, $username);

		$view -> echoHTML($body);


	}
	
}



if ($cookieExists == TRUE && $_SESSION['IsLoggedIn'] == FALSE) {
	$_SESSION['cookieLogin'] = TRUE;
	
		$c = new LoginCheck($_COOKIE["Username"], $_COOKIE["Password"]);
	
	
	$stop = TRUE;
}

//Kollar om användaren trycker på inloggningsknappen
if ($button -> GetLoginButton()) {
	echo "Försöker logga in";
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