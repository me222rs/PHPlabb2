<?php
class TextFileHandling{
	function SaveToText($CookieTimeUN){
		$file = 'Text.txt';



$current .= $CookieTimeUN . "\n";


file_put_contents($file, $current);
	}
	
	function ReadfromText(){
		$file = 'Text.txt';
		$current = file_get_contents($file);
		 return $current;
		
		
	}
}
?>