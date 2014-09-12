<?php 

	class LoggedInView{
		
	function __construct($username){
		
		$this->ShowLoggedInPage($username);
		//echo "körs loginview konstruktorn?";
	}
		
		
		
		public function ShowLoggedInPage($username){
			
			return $LoggedInHTML = "
			<form name='form1' method='post' action='index.php'>
				<h1>Inloggning Lyckades!</h1>
				<h2>Inloggad som: $username</h2>
					
				<a href='logout.php'>Logout</a>	
			</form>";
		}

		
	}	



?>