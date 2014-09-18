<?php 
require_once 'LoggedIn.php';
require_once 'HTMLView.php';
require_once 'Start.php';
require_once 'CookieHandler.php';

session_start();
	class LoginCheck {
	
	private $count;
	private $username2 = "Admin";
	private $password2 = "Password";
	private $CheckboxIsChecked = "";
	//private $errorMessage = "";
	
	
	function __construct($myusername, $mypassword){
		
		//$this->Verify($myusername, $mypassword, $checkbox);
		//try{
			$this->Login($myusername, $mypassword);
		

	}
		function LoginStatus(){
			if(isset($_SESSION['IsLoggedIn']) && $_SESSION['IsLoggedIn'] === TRUE){
				return TRUE;
			}
			return FALSE;
		}
		
		 // function LogOut(){
			 // echo "hora";
			 // session_unset($_SESSION['IsLoggedIn']);			
			 // //session_destroy();
		 // }
		
		function GetUser(){
			if(isset($_SESSION['IsLoggedIn'])){
				return $_SESSION['IsLoggedIn'];
			}
		}
		
		function Login($myusername, $mypassword){
			
			
			
			$errorMessage = "";
			//Användarnamn och meddelande visas på inloggningssidan
			$view = new LoggedInView($myusername, $errorMessage);
			$htmlview = new HTMLView();
			
			if(!$myusername == $this->username2 && !$mypassword == $this->password2){
				$errorMessage = "Fel användarnamn och lösenord";
				
				$htmlview = new HTMLView();
				$backToLogin = new LoginView();
				$html = $backToLogin->ShowForm($errorMessage, $myusername);
				$htmlview->echoHTML($html);
				
			}
			
			if($myusername == "" || $myusername == NULL){
				$errorMessage = "Användarnamn saknas";
				
				$htmlview = new HTMLView();
				$backToLogin = new LoginView();
				$html = $backToLogin->ShowForm($errorMessage, $myusername);
				$htmlview->echoHTML($html);
				die();
			}
			
			
			if($mypassword == "" || $mypassword == NULL){
				$errorMessage = "Lösenord saknas";
				
				$htmlview = new HTMLView();
				$backToLogin = new LoginView();
				$html = $backToLogin->ShowForm($errorMessage, $myusername);
				$htmlview->echoHTML($html);
				die();
			}
			
			
			//Kollar så att användarnamn och lösenord inte är en tom sträng eller null

			

			
			

			//Om inloggningsuppgifterna stämmer så loggas man in
			 if($myusername == $this->username2 && $mypassword == $this->password2){
				
				//Kollar checkboxen	
				$CheckboxIsChecked = FALSE;
			if(isset($_POST['StayLoggedIn'])){
				$CheckboxIsChecked = TRUE;
				
			}
			
			//Om checkboxen är ikryssad skapas cookie
			if($CheckboxIsChecked === TRUE){
				
				$errorMessage = "Vi kommer ihåg dig nästa gång!";
				$create = new CookieHandler();
				$create->CreateCookie($myusername, $mypassword);
				//Set cookie
			}
				
				
				//$errorMessage = "Inloggningen lyckades!";
				
				//Sätter sessionen
				$_SESSION['IsLoggedIn'] = TRUE;
				$_SESSION['User'] = $myusername;
				
			
				
				//var_dump($_SESSION['IsLoggedIn']);
				//var_dump($_SESSION['User']);
				
				var_dump($errorMessage);
				$loginview = $view->ShowLoggedInPage($myusername, $errorMessage);
				$htmlview->echoHTML($loginview);
			 }
			 
			 else{
			 	$errorMessage = "FEL användarnamn och lösen.";
			
			
				$htmlview = new HTMLView();
				$backToLogin = new LoginView();
				$html = $backToLogin->ShowForm($errorMessage, $myusername);
				$htmlview->echoHTML($html);
			 }

			
		
		
/*		
			
		$adress ="127.0.0.1"; // MySQL databas host 
		$username = "root"; // MySQL Användarnamn 
		$password = ""; // MySQL Lösenord 
		$databaseName = "login"; // Databas namn 
		$tableName = "loginshit"; // Tabell namn 
 		
		// Ansluter till en MySQL databas host med användarnamn och lösenord, misslyckas så körs die()
		mysql_connect("$adress", "$username", "$password")or die("Anslutningen misslyckades!"); 
		// Väljer databas, misslyckas så körs die()
		mysql_select_db("$databaseName")or die("Ingen databas hittades");

		// Skapar ett hashat lösenord
		
		for ($x=0; $x<=10; $x++) {
  			$mypassword = crypt($mypassword, "micke");
		}
		
		var_dump($mypassword);

		//Kör en SELECT från databasen och jämför med resultaten

		$sql = "SELECT * FROM $tableName WHERE Username='$myusername' and Password='$mypassword'";
		$result=mysql_query($sql);
		
		// mysql_num_rows räknar rader i databasen som innehåller det inmatade anvn och lösen
		$this->count=mysql_num_rows($result);
		//$this->count = 0;
		$view = new LoggedInView($myusername, $errorMessage);
		$htmlview = new HTMLView();
		
     		//if(!$myusername == $username && $mypassword == $password){
			//	echo "KOmmer in";
			//	$errorMessage = "FEL";
			//}
			

		// Finns det en rad med överenstämmande inloggningsuppgifter så kör if satsen
		if($this->count==1){
		//if($this->username2 = $myusername && $this->password2 == $mypassword){
		//$_SESSION['IsLoggedIn']=TRUE;
			
		$errorMessage = "Inloggningen lyckades!";

		$loginview = $view->ShowLoggedInPage($myusername, $errorMessage);
		$htmlview->echoHTML($loginview);


		}else{
			$errorMessage = "FEL användarnamn och lösen.";
			
			
			$htmlview = new HTMLView();
			$backToLogin = new LoginView();
			$html = $backToLogin->ShowForm($errorMessage, $myusername);
			$htmlview->echoHTML($html);
		}
	
	}
*/
		 function GetCount(){
			 var_dump($this->count);
			 return $this->count;
		 }
		 }
}

?>