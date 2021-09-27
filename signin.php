<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<div style="text-align: center;">
		<form method="POST">
			<label>Enter Email </label>
			<input type="email" name="email">
			<br>
			<br>
			<label>Enter Password</label>
			<input type="password" name="password">
			<br>
			<br>
			<input type="submit" name="submit">

		</form>
	<div>
	<br>
	<br>
	<a href="register.php">New User</a>

</body>
</html>

<?php
	session_start();

	include 'connection.php';

	if(isset($_POST['submit'])){
		$email=$_POST['email'];

		$pass=$_POST['password'];

		$query="select * from test where email='$email'";

		$processquery=mysqli_query($con,$query);

		$fetchdata=mysqli_fetch_assoc($processquery);



		$dbpass=$fetchdata['password'];

		$dbname=$fetchdata['name'];

		$_SESSION['name']=$dbname;

		$checkpass=password_verify($pass,$dbpass);

		if($checkpass){
			header('location:./action/welcome.php');
		}else{
			header('location:signin.php');
		}
	}
?>