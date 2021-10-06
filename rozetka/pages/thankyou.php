<?php


$order_id = (int)$_SESSION['last_order_id'];

$order = db_query("SELECT * FROM orders WHERE id = '$order_id'")[0];


?>

<div class="thankyou-wrap">
    <div class="thanks">
        <h1>Спасибо за покупку</h1>
        <div class="thanks-time">
            <div class="thanks-clock">
                <?php include 'svg/bootstrap/clock.svg' ?>
            </div>
            <p>Ваш заказ будет обработан автоматически, в случае необходимости с вами свяжется менеджер</p> 
        </div>
        <div class="thanks-info">
            <div class="thanks-loc">
                <?php include 'svg/bootstrap/geo-alt-fill.svg' ?>
            </div>
            <h4>Информация о заказе: </h4>
            <ul>
                <li>Способ оплаты: <?= langs('payment.'.$order['payment']) ?></li>
                <li>Способ доставки: <?= langs('delivery.'.$order['delivery'], 'Неизвестно') ?></li>
            </ul>
        </div>
        <div class="thanks-adress">
            <p> Ваша посылка будет доставлена по адрессу: <?= $order['address'] ?></p>
            <span></span>
        </div>
        <div class="thanks-approve">
            <div class="thanks-ok">
                <?php include 'svg/bootstrap/check-circle.svg' ?>
            </div>
            <h4>Номер вашего заказа: <?= $order_id ?></h4>
        </div>
        <div class="thanks-approve">
            <div class="thanks-ok">
                    <?php include 'svg/bootstrap/check-circle.svg' ?>
            </div>
                <h4>Сумма заакза: <?= thousands($order['total_sum'])  ?>₴</h4>
        </div>
        <div class="thanks-link">
            <a href="?action=main">Перейти на главную страницу</a>
        </div>
    </div>
</div>