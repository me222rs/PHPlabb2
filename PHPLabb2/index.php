<?php 
	//require_once 'Start.php';
	require_once 'HTMLView.php';
	require_once 'LoginCheck.php';
	require_once 'Start.php';
	
	$login = new LoginView();
	$body = $login->ShowForm();
	
	
	$view = new HTMLView();
	$view->echoHTML($body);
	
	$loginview = new LoginView();
	//$hej = $loginview->GetCreadentials();
	
		//$myusername = $_POST['myUsername']; 
		//$mypassword = $_POST['myPassword'];
	//var_dump($myusername, $mypassword);
	 
 		$c = new LoginCheck($view->GetUsername(), $view->GetPassword());
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