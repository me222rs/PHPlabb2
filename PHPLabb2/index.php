<?php 
	//ucwords gör att strängen börjar med stor bokstav.
	//Sätter språket till svenska för att strftime ska fungera bra.
	//Hur får man bort 0 i datumet? %e som borde ge datum utan 0 fungerar ej.
	setlocale(LC_ALL , "swedish");
	$day = ucwords(utf8_encode(strftime("%A")));
	$month = ucwords(utf8_encode(strftime("%B")));
	$dayNumber = strftime("%d"); 
	$year = strftime("%Y");
	$time = strftime("%H:%M:%S");

	//Ekar ut html-dokumentet
	//Meta charset utf-8 gör att svenska tecken fungerar.
	echo "
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset='UTF-8'>
		</head>
		<body>
		
			<form>
				<h1> Laboration 2 - Login</h1>
				Username:
					<input type='text' id='Username' />
				Password:
					<input type='password' id='Password' />
				Keep me logged in!
					<input type='checkbox' name='StayLoggedIn' />
					
					<button type='button'>Log in</button>
			</form>
		". ucwords(strftime($day . ", den " . $dayNumber . " " . $month . " år " . $year .". Klockan är [". $time . "]")) ."
		</body>
		
	
	</html>
	";
	
?>