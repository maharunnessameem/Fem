 <?php 
	require 'connection.php';
	require './Login/login.php';
	session_start();
     	unset($_SESSION["email"]);
     	header("Location: StartPage/Startpage.html");
     	echo "3";
     	session_destroy();
     	echo "4";
     	session_unset();    
     	echo "5";

     	
     	exit();
 ?>