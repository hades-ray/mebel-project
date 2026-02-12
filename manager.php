<?php
$db=mysqli_connect("localhost","root","","mebel");

if(isset($_POST['approve'])) {
    $order_id = $_POST['order_id'];
    mysqli_query($db, "UPDATE orders SET status='Одобрен' WHERE id='$order_id'");
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
            <th>Действие</th> 
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
            <td>
            <form method="POST">
                <input type="hidden" name="order_id" value="<?php echo $res['id']; ?>">
                <button type="submit" name="approve">Одобрить</button>
            </form>
        </td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>