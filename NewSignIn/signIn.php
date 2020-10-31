<?php
session_start();

$dsn = "mysql:host localhost;dbname=utrance";
$username = "root";
$password = "";
$message = "";

try{
    $db = new PDO($dsn,$username,$password);
	echo "Connected!";
	if(isset($_POST["login"])){
		if(empty($_post["username"])||empty($_POST["password"])){
			$message = '<label>All fields are required</label>';
		}	
		else{
			$query = "SELECT * FROM users WHERE username = :username AND password = :password";
			$statemet = $connect->prepare($query);
			$statement->execute(
				array(
					'username' => $_POST["username"],
					'password' => $_POST["password"]
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

catch(PDOException $e){
    $error_message = $e->getMessage();
    echo $error_message;
    exit();
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
		<div class="big_01">

			<form action="signIn.php" method="post">
				<div class="imgcontainer">
					<img src="avatar1.png" alt="Avatar" class="avatar">
				</div>

				<div class="container">
					
					<input type="text" placeholder="Username"  name="username" required>
					<input type="text" placeholder="Password" name="password" required>
					<button type="submit" name = "login">Login</button>
					<label>
						<input type="checkbox" checked="checked" name="remember"> Remember me
					</label>
				</div>

				<div class="container">
					<button type="button" class="cancelbtn">Cancel</button>
					<span class="password"><a href="#"><b>Forgot password?</b></a></span>
				</div>
			</form>
		<div>
		
	</body>
</html>

