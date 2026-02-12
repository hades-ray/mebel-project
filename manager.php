<?php
$db=mysqli_connect("localhost","root","","mebel");
if(isset($_POST['aprove'])){

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/manager.css">
    <title>Document</title>
</head>
<body>
    <div class="logo">
        <a href="index.html"><img src="img/logo.jpg" alt="ЛОГО"></a>
    </div>
    <table>
        <tr>
            <th>Номер заказа</th>
            <th>Имя клиента</th>
            <th>Телефон</th>
            <th>Дата</th>
            <th>Статус</th> 
        </tr>
        <?php
            $sql=mysqli_query($db, 'Select * from orders');
            while($res=mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?php echo $res['id'] ?></td>
                <td><?php echo $res['name'] ?></td>
                <td><?php echo $res['phone'] ?></td>
                <td><?php echo $res['date'] ?></h3>
                <td><?php echo $res['status'] ?></td>
            </tr>
            <button type="submit" name="aprove">Одобрить</button>
        <?php
            }
        ?>
        
    </table>
</body>
</html>