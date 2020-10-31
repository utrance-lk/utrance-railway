<?php
session_start();

$host="localhost";
$database="utrance";
$username = "root";
$password = "";
$message = "";

try{
    $connect = new PDO("mysql:host=$host;dbname=$database", $username,$password);
	$connect-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	if(isset($_POST["login"])){
		if(empty($_POST["username"])||empty($_POST["passwor"])){
			$message = 'All fields are required';
		}	
		else{
			$query = "SELECT * FROM users WHERE username = :username AND passwor = :passwor";
			$statement = $connect->prepare($query);
			$statement->execute(
				array(
					'username' => $_POST["username"],
					'passwor' => $_POST["passwor"]
				)
			);
			$count = $statement->rowCount();
			if($count>0)
			{
				$_SESSION["username"]=$_POST["username"];
				header("location:login_success.php");
			}
			else{
				$message='<label>Wrong Data</label>';
			}

		}
	}
} 

catch(PDOException $error){
    $message = $error->getMessage();
}
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Utrance Sign In</title>
		<link rel="stylesheet" href="signIn.css">
	</head>
	<body>
		<br/>
		<?php
		if(isset($message)){
			echo '"test-danger"'.$message.'';
		}
		?>

		<div class="big_01">

			<form action="signIn.php" method="post">
				<div class="imgcontainer">
					<img src="avatar1.png" alt="Avatar" class="avatar">
				</div>

				<div class="container">
					
					<input type="text" placeholder="Username"  name="username" >
					<input type="text" placeholder="Password" name="passwor" >
					<button type="submit" name = "login">Login</button>
					<label>
						<input type="checkbox" checked="checked" name="remember"> Remember me
					</label>
				</div>

				<div class="container">
					<button type="button" class="cancelbtn">Cancel</button>
					<span class="passwor"><a href="#"><b>Forgot password?</b></a></span>
				</div>
			</form>
		<div>
		
	</body>
</html>

