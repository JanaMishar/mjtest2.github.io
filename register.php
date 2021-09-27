<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<div style="text-align: center;">

		<form method="POST">
			<label>Enter Name</label>
			<input type="text" name="name">
			<br>
			<br>
			<label>Enter Email</label>
			<input type="email" name="email">
			<br>
			<br>
			<label>Enter Password</label>
			<input type="password" name="password">
			<br>
			<br>
			<label>Enter Re-enter Password</label>
			<input type="password" name="cpassword">
			<br>
			<br>
			<input type="submit" name="submit">
			<br>
			<br>
			<a href="signin.php">Already have an account</a>
		</form>
	</div>

	

</body>
</html>

<?php
	include 'connection.php';

	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];



		$pass=password_hash($password,PASSWORD_BCRYPT);

		$checkmail="select * from test where email='$email'";
		$checkmailprocess=mysqli_query($con,$checkmail);
		$countmail=mysqli_num_rows($checkmailprocess);

		if($countmail>0){
			echo 'mail already exisist';
		}else{



		$query="insert into test(name,email,password) values('$name','$email','$pass')";

		$processquery=mysqli_query($con,$query);
	}
}


?>