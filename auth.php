<?php
session_start();
$db=mysqli_connect("localhost","root","","mebel");

if(isset($_POST['auth'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$temp = 0;
	
	// Специальная проверка для manager1
	if($username == 'manager1' && $password == '1234') {
		$_SESSION['username'] = $username;
		header('Location: manager.php'); // или любой другой URL для менеджера
		exit();
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/auth.css">
    <title>Войти</title>
</head>
<body>
    <div class="logo">
        <a href="index.html"><img src="img/logo.jpg" alt="ЛОГО"></a>
    </div>
    <form method="post" class="auth">
        <input id="input" type="text" name="username" placeholder="Введите логин">
        <input id="input" type="password" name="password" placeholder="Введите пароль">
        <button id="input" type="submit" name="auth">Войти</button>
    </form>
</body>
</html>