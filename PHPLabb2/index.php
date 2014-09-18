<?php
//require_once 'Start.php';
require_once 'HTMLView.php';
require_once 'LoginCheck.php';
require_once 'Start.php';
require_once 'LoggedIn.php';
require_once 'Test.php';
require_once 'CookieHandler.php';

$button = new LoginView();
//$button2 = new LoggedInView("", "");
$view = new HTMLView();
$count = 0;
$body = "";
$message = "";
$username = "";
$errorMessage = "";
$stop = FALSE;


// var_dump($button2->GetLogoutButton());
// if ($button2 -> GetLogoutButton()) {
// 
	// echo "test 1";
	// $c = new Session();
	// $body = $c -> LogOut();
	// $view -> echoHTML($body);
// 
// }


//Kollar om kakorna finns
$cookie = new CookieHandler();
$cookieExists = $cookie -> CookieExists();

//Om kakorna finns så loggas man in med uppgifterna som finns i kakan
if ($cookieExists === TRUE) {
	$c = new LoginCheck($_COOKIE["Username"], $_COOKIE["Password"]);
	$stop = TRUE;
}

//Kollar om det finns en session och ifall det gör det så loggas man in.
if ($_SESSION['IsLoggedIn'] == TRUE && $stop === FALSE) {
	echo "bajs";
	var_dump("Session i index" . $_SESSION['IsLoggedIn']);

	$view2 = new LoggedInView("test", $errorMessage);
	$htmlview = new HTMLView();
	$view -> echoHTML($view2 -> ShowLoggedInPage($_SESSION['User'], $errorMessage));

}



//Kollar om användaren trycker på inloggningsknappen
if ($button -> GetLoginButton()) {
	echo "if körs";
	//Kollar de inmatade uppgifterna om de stämmer
	$c = new LoginCheck($view -> GetUsername(), $view -> GetPassword());

} else {
	//Stämmer de inte visas inloggningsformuläret igen med användarnamne ifyllt.
	if (!isset($_SESSION['IsLoggedIn'])) {
		if($_SERVER['QUERY_STRING'] === "Logout"){
	$message = "Du är nu utloggad";
}
		echo "else körs!";
		$login = new LoginView();
		$body = $login -> ShowForm($message, $username);

		$view -> echoHTML($body);
	}
}

//echo("Koden kommer hit");
//$isLoggedIn = new LoginCheck("test", "test2");
// var_dump("count är " . $count);
// if($count == 0){
//$login = new LoginView();
//$body = $login->ShowForm();
// }

// $view = new HTMLView();
//$view->echoHTML($body);

//$loginview = new LoginView();

//$c = new LoginCheck($view->GetUsername(), $view->GetPassword());

//$htmlBody = $c->Login($myusername, $mypassword);

//ucwords gör att strängen börjar med stor bokstav.
//Sätter språket till svenska för att strftime ska fungera bra.
//Hur får man bort 0 i datumet? %e som borde ge datum utan 0 fungerar ej.

// setlocale(LC_ALL , "swedish");
// $day = ucwords(utf8_encode(strftime("%A")));
// $month = ucwords(utf8_encode(strftime("%B")));
// $dayNumber = strftime("%d");
// $year = strftime("%Y");
// $time = strftime("%H:%M:%S");

//Ekar ut html-dokumentet
//Meta charset utf-8 gör att svenska tecken fungerar.

// echo "
// <!DOCTYPE html>
// <html>
// <head>
// <meta charset='UTF-8'>
// </head>
// <body>
//
// <form name='form1' method='post' action='LoginCheck.php'>
// <h1> Laboration 2 - Login</h1>
// Username:
// <input type='text' name='myUsername' id='myUsername'/>
// Password:
// <input type='password' name='myPassword' id='myPassword'/>
// Keep me logged in!
// <input type='checkbox' name='StayLoggedIn' />
//
// <input type='submit' name='Submit' value='Login'>
//
//
// </form>
// ". ucwords(strftime($day . ", den " . $dayNumber . " " . $month . " år " . $year .". Klockan är [". $time . "]")) ."
// </body>
//
//
// </html>
// ";

//$c = new LoginCheck();
//$htmlBody = $c->Login();

//$view = new HTMLView();
//$view->echoHTML($htmlBody);

//Testkod för att kolla så att den lokala databasen fungerar
//http://www.clonmelweb.net/tutorial_EasyPHP_2of2.php

//var_dump($myusername=$_POST['myUsername']);
//var_dump($myusername=$_POST['myPassword']);
/*
 $server = "127.0.0.1";
 $username = "root";
 $password = "";
 $database = "login";

 $db_handle = mysql_connect($server, $username, $password);
 $db_found = mysql_select_db($database, $db_handle);

 if ($db_found) {

 $sql = "SELECT * FROM loginshit";
 $result = mysql_query($sql);

 while ($db_field = mysql_fetch_assoc($result)) {
 print "<b>ID</b>: " .$db_field['LoginID']. " ";
 print "<b>Usr</b>: " .$db_field['Username']. " ";
 print "<b>Pass</b>: " .$db_field['Password']. "<br/>";
 }

 mysql_close($db_handle);
 } else {
 print "Error: Unable to find Database";
 mysql_close($db_handle);
 }

 */
?>