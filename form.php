<?php
$db=mysqli_connect("localhost","root","","mebel");

if(isset($_POST['btn'])){
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$product=$_POST['product'];
	$date = date('Y-m-d H:i:s'); // Формат: 2024-01-15 14:30:45
    mysqli_query($db, "INSERT INTO orders VALUES ('', '$name', '$phone', '$product', '$date', 'В обработке', '')");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/form.css">
    <title>Оставить заявку</title>
</head>
<body>
    <div class="logo">
        <a href="index.html"><img src="img/logo.jpg" alt="ЛОГО"></a>
    </div>
    <h2 id="text">Здесь вы можете оставить заявку, наш менеджер свяжется с вами в ближайшее время</h2>
    <form class="form" method="post">
        <input required class="input" type="text" name="name" placeholder="Введите имя">
        <input required class="input" type="phone" name="phone" placeholder="Введите номер телефона">
        <select class="input" name="product">
            <option value="Угловой диван">Угловой диван</option>
            <option value="Кресло">Кресло</option>
            <option value="Офисное кресло">Офисное кресло</option>
            <option value="Обеденный стол">Обеденный стол</option>
        </select>
        <button class="input" id="btn" name="btn" type="submit">Отправить зявку</button>
    </form>
</body>
</html>