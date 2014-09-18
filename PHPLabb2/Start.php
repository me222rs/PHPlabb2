<?php

	class LoginView{
		private $LoginButton = "hej";
		private $LogoutButton = "Logga ut";
		private $message = "";	
			function __construct(){
				
		
		//$this->GetCredentials();
		//echo "körs loginview konstruktorn?";
	}
			
			public function GetLoginButton(){
				if(isset($_POST[$this->LoginButton])){
					return TRUE;
				}
				return FALSE;
			}
			
			
		
			
			function Message($message){
				echo "Koden kommer till Message()";
				print("<h2> Meddelandet är: " . $message . "</h2>");
				$this->message = $message;
			}
			
		public function ShowForm($message, $username){
			
			return $LoginHTML = "
			<form name='form1' method='post' action='index.php'>
				<h1> Laboration 2 - Login</h1>
				Username:
					<input type='text' name='myUsername' id='myUsername' value='$username'/>
				Password:
					<input type='password' name='myPassword' id='myPassword'/>
				Keep me logged in!
					<input type='checkbox' name='StayLoggedIn' />
					
					<input type='submit' name='$this->LoginButton' value='Login'>
					
					<p>$message</p>
					
			</form>";
		}

		
	}	
	
	
?>