<?php
include('../Login/login.php');
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "Fem";
$username = $_SESSION['username'];
$nextpage = 0;
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
	$sql = "DELETE FROM profile WHERE username LIKE '$username' ";
	if ($conn->query($sql))
	{$nextpage=1;} 
	else{echo "Error: ". $sql ." ". $conn->error;}}
if ($nextpage==1) {
	header("Location: ../StartPage/Startpage.html");
	exit();
}

?>
