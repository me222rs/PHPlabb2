<?php

	class LoginView{
		
			function __construct(){
		
		//$this->GetCredentials();
		//echo "körs loginview konstruktorn?";
	}
		
		
		public function ShowForm(){
			
			return $LoginHTML = "
			<form name='form1' method='post' action='index.php'>
				<h1> Laboration 2 - Login</h1>
				Username:
					<input type='text' name='myUsername' id='myUsername'/>
				Password:
					<input type='password' name='myPassword' id='myPassword'/>
				Keep me logged in!
					<input type='checkbox' name='StayLoggedIn' />
					
					<input type='submit' name='Submit' value='Login'>
					
					
			</form>";
		}

		
	}	
	
	
?>