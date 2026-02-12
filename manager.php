<?php
session_start();
$db=mysqli_connect("localhost","root","","mebel");

$username=$_SESSION['username'];
if(isset($_POST['approve'])) {
    $order_id = mysqli_real_escape_string($db, $_POST['order_id']);
    $date = date('Y-m-d H:i:s');
    
    mysqli_query($db, "UPDATE orders SET status='Одобрен', update_date='$date' WHERE id='$order_id'");
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
    <div class="text">
        <h2>Вы авторизированы как: <?php echo $username=$_SESSION['username'];?></h2>
        <h3>Проверьте новые заявки</h3>
    </div>
    <table>
        <tr>
            <th>Номер заказа</th>
            <th>Имя клиента</th>
            <th>Телефон</th>
            <th>Дата</th>
            <th>Статус</th> 
            <th>Время обработки</th>
            <th>Действие</th> 
        </tr>
        <?php
            $sql=mysqli_query($db, 'SELECT * FROM orders ORDER BY date DESC');
            while($res=mysqli_fetch_array($sql)){
        ?>
        <tr>
            <td><?php echo $res['id'] ?></td>
            <td><?php echo $res['name'] ?></td>
            <td><?php echo $res['phone'] ?></td>
            <td><?php echo $res['date'] ?></h3>
            <td id=status><?php echo $res['status'] ?></td>
            <td>
                <?php 
                if($res['status'] == 'В обработке') {
                    echo '';
                } else {
                    echo $res['update_date'];
                }
                ?>
            </td>
            <td>
                <?php if($res['status'] == 'В обработке'): ?>
                <form method="POST">
                    <input type="hidden" name="order_id" value="<?php echo $res['id']; ?>">
                    <button type="submit" name="approve" id="approve">Одобрить</button>
                </form>
            <?php else: ?>
                <!-- Для одобренных заказов показываем статичный текст -->
                <span style="color: green;">✓ Одобрено</span>
                <!-- Или можно скрыть кнопку полностью -->
                <!-- <span>Обработано</span> -->
            <?php endif; ?>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>

</html>
