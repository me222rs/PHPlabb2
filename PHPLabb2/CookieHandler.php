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
			setcookie("Username", $username, time()+60*60*24*30);
			setcookie("Password", $password, time()+60*60*24*30);
			echo "Cookie har skapats";
		}
	}
	


?>