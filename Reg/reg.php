<?php
$fullname = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'pass');
$cpassword = filter_input(INPUT_POST, 'cpass');
$age = filter_input(INPUT_POST, 'age');
$nextpage=0;
/*$gender = filter_input(INPUT_POST, 'gender');*/
$gender = $_POST["Gender"];

if (!empty($fullname)){
if (!empty($email)){
if (!empty($username)){
if (!empty($password)){
if (!empty($age)){
if (!empty($gender)){	
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "Fem";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
	if($password==$cpassword){
$sql = "INSERT INTO profile (name, email,username,pass,cpass,age,gender)
values ('$fullname','$email','$username','$password','$cpassword','$age','$gender')";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";
$nextpage=1;
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
else 
{
	echo "passswords doesn't match";
}}
}

else{
echo "Gender should be selected";
die();
}}
else{
echo "Age should not be empty";
die();
}}
else{
echo "Password should not be empty";
die();
}}
else{
echo "User-name should not be empty";
die();
}}
else{
echo "email should not be empty";
die();
}}
else{
echo "fullname should not be empty";
die();
}
if ($nextpage==1) {
	header("Location: ../Home/homepage.html");
	exit();
}

?>