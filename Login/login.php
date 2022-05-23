<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$dbname = "Fem";
$db = new mysqli($host,$username,$password,$dbname);
if (isset($_POST['username']) and isset($_POST['password'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM `profile` WHERE username='$username' and pass='$password'";
	$result = mysqli_query($db, $query) or die(mysqli_error($db));
	$count = mysqli_num_rows($result);
	if ($count == 1){
		$_SESSION['username'] = $username;
		//$_SESSION['username'] = $row[$this->pass_column];
  		//$_SESSION['userlevel'] = $row[$this->user_level];		
		$_SESSION['signedin']=1;
		header("Location: ../Home/homepage.html");
		exit();
	}else{
		echo "Invalid Login Credentials.";
	}
}
?>
