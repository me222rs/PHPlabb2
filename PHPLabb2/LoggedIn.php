<?php 
	//session_start();
	class LoggedInView{
		
		
	private $LogoutButton = "Logga ut";	
		private $message = "";
		

		
	function __construct($username, $message){
		$button = new LoginView();

		$this->message == $message;
		
		//Innehåller: Vi kommer ihåg dig nästa gång!
		var_dump($this->message);

		
	if($_SESSION['IsLoggedIn'] === TRUE){
		echo "blankt meddelande";
		$username = $_SESSION['User'];
		$this->message = "";
	}
	
	
	elseif($button -> GetLoginButton()){
		 // //$_SESSION['IsLoggedIn'] === TRUE;
		 echo "inlogning lyckades";
		 $this->message = "Inloggningen lyckades!";
	  }
 		
		$this->ShowLoggedInPage($username, $message);
		//echo "körs loginview konstruktorn?";
	}
		
	public function GetLogoutButton(){
				
				if(isset($_POST[$this->LogoutButton])){
					echo "Logout";
					return TRUE;
				}
				return FALSE;
			}
		

		
		
		public function ShowLoggedInPage($username, $message){
			
			return $LoggedInHTML = "
			<form method='post' action='Logout.php'>
				<h1>$this->message</h1>
				<h2>Inloggad som: $username</h2>
				<input type='submit' name='$this->LogoutButton' value='Logout'>
				
			</form>";
		}

		
	}	



?>