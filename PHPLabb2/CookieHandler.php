<?php 
	/**
	 * 
	 */
	class CookieHandler {
		
		function __construct() {
			
		}
		
		public function CookieExists(){
			if(isset($_COOKIE["Username"]) && isset($_COOKIE["Password"])){
				return TRUE;
			}
			FALSE;
		}
		
		public function CreateCookie($username, $password){
			setcookie("Username", $username);
			setcookie("Password", $password);
			echo "Cookie har skapats";
		}
	}
	


?>