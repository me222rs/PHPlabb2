<?php 

	
			$myusername = "";
			$mypassword = "";


		
			
		$adress ="127.0.0.1"; // MySQL databas host 
		$username = "root"; // MySQL Användarnamn 
		$password = ""; // MySQL Lösenord 
		$databaseName = "login"; // Databas namn 
		$tableName = "loginshit"; // Tabell namn 

		// Ansluter till en MySQL databas host med användarnamn och lösenord, misslyckas så körs die()
		mysql_connect("$adress", "$username", "$password")or die("Anslutningen misslyckades!"); 
		// Väljer databas, misslyckas så körs die()
		mysql_select_db("$databaseName")or die("Ingen databas hittades");

		// $_POST hämtar värdet på textboxarna 
		$myusername = $_POST['myUsername']; 
		$mypassword = $_POST['myPassword'];
		
		if($myusername == null || $mypassword == null){
			echo "
			Inget användarnamn eller löserord!<br>
			<a href='index.php'>Tillbaka</a>	
			";
			die();
		} 
		
		// Skapar ett hashat lösenord
		
		for ($x=0; $x<=10; $x++) {
  			$mypassword = crypt($mypassword, "micke");
		}
		
		//var_dump($mypassword);
		//die();
		//Kör en SELECT från databasen och jämför med resultaten

		$sql = "SELECT * FROM $tableName WHERE Username='$myusername' and Password='$mypassword'";
		$result=mysql_query($sql);

		// mysql_num_rows räknar rader i databasen som innehåller det inmatade anvn och lösen
		$count=mysql_num_rows($result);

		// Finns det en rad med överenstämmande inloggningsuppgifter så kör if satsen
		if($count==1){

		// Redirectar till en annan sida
		session_start();
		header("location:LoggedIn.php");
		}else {
			echo "Fel användarnamn eller lösen!<br>
			<a href='index.php'>Tillbaka</a>";
}
	



?>