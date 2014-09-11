<?php 

	class LoggedInView{
		
	function __construct(){
		
		$this->ShowLoggedInPage();
		//echo "körs loginview konstruktorn?";
	}
		
		
		public function ShowLoggedInPage(){
			
			return $LoggedInHTML = "
			<form name='form1' method='post' action='index.php'>
				<h1>Inloggning Lyckades!</h1>
				<h2>Inloggad som: </h2>
					
					
			</form>";
		}

		
	}	



?>