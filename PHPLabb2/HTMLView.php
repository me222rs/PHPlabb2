<?php

class HTMLView {

	public function echoHTML($body) {

		setlocale(LC_ALL, "swedish");
		$day = ucwords(utf8_encode(strftime("%A")));
		$month = ucwords(utf8_encode(strftime("%B")));
		$dayNumber = strftime("%d");
		$year = strftime("%Y");
		$time = strftime("%H:%M:%S");

		if ($body === NULL) {

			throw new \Exception("HTMLView::echoHTML tillåter inte null i body!");

		}

		echo "
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset='UTF-8'>
		</head>
		<body>
			$body
			
		" . $day . ", den " . $dayNumber . " " . $month . " år " . $year . ". Klockan är [" . $time . "]" . "
		</body>
		
	
	</html>
	";

	}

	public function GetUsername() {
		if (isset($_POST['myUsername'])) {
			return $_POST['myUsername'];
		}

	}

	public function GetPassword() {
		if (isset($_POST['myPassword'])) {
			//echo crypt($_POST['myPassword'], "micke");
			return $_POST['myPassword'];
		}
	}

}
