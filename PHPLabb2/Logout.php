<?php 

 session_start();
 session_unset($_SESSION['IsLoggedIn']);
 session_unset($_SESSION['User']);
 setcookie("Username", NULL);
 setcookie("Password", NULL);
 header('Location: index.php?Logout');
 exit;


?>