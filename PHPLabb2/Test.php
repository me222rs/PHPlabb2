<?php
 /**
  * 
  */
 class Session {
     
     function __construct() {
         $this->LogOut();
     }
 }
 
		function LogOut(){
			echo "LogOut körs!";
			session_unset($_SESSION['IsLoggedIn']);
			
			//session_destroy();
		}
?>
