<?php 

class GetValuesFromDB {
	
	function __construct($argument) {
		
	}
	
	function GetUsernameAndPassword(){
		
	$server = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "login";
 
    $db_handle = mysql_connect($server, $username, $password);
    $db_found = mysql_select_db($database, $db_handle);
     
    if ($db_found) {
 
        $sql = "SELECT * FROM loginshit";
        $result = mysql_query($sql);
     
        while ($db_field = mysql_fetch_assoc($result)) {
            //print "<b>ID</b>: " .$db_field['LoginID']. " ";
            //print "<b>Usr</b>: " .$db_field['Username']. " ";
            //print "<b>Pass</b>: " .$db_field['Password']. "<br/>";
        	return $db_field['Username']. " ";
		
		
		}
     
        mysql_close($db_handle);
    } else {
        print "Error: Unable to find Database";
        mysql_close($db_handle);
    }
		
	}
}


	





?>