<?php
session_start();

require 'connect.php';

if(isset($_POST['login'])){
    
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    $sql = "SELECT id, username, password FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($user === false){
        die('Incorrect username / password combination!');
    } else{
        $validPassword = password_verify($passwordAttempt, $user['password']);
        
        if($validPassword){
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();
            
            header('Location: home.php');
            exit;
            
        } else{
            die('Incorrect username / password combination!');
        }
    }
    
} 
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Utrance Sign In</title>
		<link rel="stylesheet" href="signIn.css">
	</head>
	<body>
		<div class="big_01">

			<form action="signIn.php" method="post">
				<div class="imgcontainer">
					<img src="avatar1.png" alt="Avatar" class="avatar">
				</div>

				<div class="container">
					
					<input type="text" placeholder="Username" name="username" required>
					<input type="text" placeholder="Password" name="password" required>
					<button type="submit">Login</button>
					<label>
						<input type="checkbox" checked="checked" name="remember"> Remember me
					</label>
				</div>

				<div class="container" style="background-color:#000000">
					<button type="button" class="cancelbtn">Cancel</button>
					<span class="password"><a href="#">Forgot password?</a></span>
				</div>
			</form>
		<div>
		
	</body>
</html>

