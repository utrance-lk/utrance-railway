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

if(isset($_POST['register'])){
    
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    $sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['num'] > 0){
        die('That username already exists!');
    }
    
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
    
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $passwordHash);

    $result = $stmt->execute();
    
    if($result){
        echo 'Thank you for registering with Utrance';
    }
    
}
 
?>

<!DOCTYPE html>
<html>

    <head>
    <meta charset="UTF-8">
        <title>Login/Registration</title>
        <link rel="stylesheet" href="sign.css">
    </head>

    <body>
        <div class="big_01">
            <div class="form_01">
                <div class="button_01">
                    <div id="btn"></div>
                    <button type="button" class="tog_01" onclick="sign_in()">Sign In</button>
                    <button type="button" class="tog_01" onclick="sign_up()">Sign Up</button>
                </div>
                <form id="sign_in" class="input_01" action="login.php" method="post">
                    <input type="text" name="username" class="input_field" placeholder="Username" required>
                    <input type="text" name="password" class="input_field" placeholder="Password" required>
                    <button type="submit" name="login" class="submit_btn">Sign In</button> 
                </form>
                <form id="sign_up" class="input_01" action="login.php" method="post">
                    <input type="text" class="input_field" placeholder="Username" required>
                    <input type="text" class="input_field" placeholder="Password" required>
                    <input type="text" class="input_field" placeholder="NIC number" required>
                    <input type="text" class="input_field" placeholder="Email ID" required>
                    <input type="text" class="input_field" placeholder="Phone Number" required>
                    <button type="submit" class="submit_btn">Sign Up</button> 
                </form>
            </div>
        </div>

        <script>
            var x = document.getElementById("sign_in");
            var y = document.getElementById("sign_up");
            var z = document.getElementById("btn");

            function sign_up(){
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "110px";
            }

             function sign_in(){
                x.style.left = "50px";
                y.style.left = "450px";
                z.style.left = "0px";
            }
        </script>

    </body>

</html>

