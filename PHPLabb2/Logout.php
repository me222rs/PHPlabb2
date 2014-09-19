<?php 

 session_start();
 session_unset($_SESSION['IsLoggedIn']);
 session_unset($_SESSION['User']);
 session_unset($_SESSION['cookieLogin']);
 
 setcookie("Username", NULL);
 setcookie("Password", NULL);
 $_SESSION['Logout'] = TRUE;
 header('Location: index.php');
 exit;


?>