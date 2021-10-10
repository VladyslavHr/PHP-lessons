<?php 
$favorites_total = db_query("SELECT favorites FROM users WHERE id = '$user_id'");

// pa($favorites_total);

?>
<div class="user-info-wrapper">
    <div class="user-left-menu">
        <div class="usen-avatar">
            <div class="avatar-and-name">
                <?php if($avatar_exists = false): ?>
                    <?= auth_user('avatar') ?>
                <?php else: ?>
                    <div class="no-user-avatar">
                        <span>A</span>
                    </div>
                <?php endif ?>
                <div class="user-name">
                    <h3><?= auth_user('name')?> <?= auth_user('last_name')?> </h3>
                    <p><?=auth_user('email')?></p>
                </div>
            </div>
        </div>
        <div class="user-menu">
            <ul class="user-menu-list">
                    <li>
                        <a href="?action=cart">
                            <span><?= bi('card-list') ?></span>
                            <p> Мои заказы</p>
                        </a>
                    </li>
                    <li>
                        <a href="?action=favorites">
                            <span><?= bi('heart') ?></span>    
                            <p>Список желаний</p> 
                            <!-- <?= $favorites_total?> -->
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span><?= bi('eye') ?></span>
                            <p>Просмотренные товары</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span><?= bi('chat-left-text') ?></span>
                            <p> Мои отзывы</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span><?= bi('envelope') ?></span>
                            <p>Моя переписка</p> 
                        </a>
                    </li>
            </ul>
        </div>
    </div>
    <div class="user-info-wrap">
        <h3><?= langs('user-info-wrap.h3')?></h3>
        <div class="personal-info-first">
            <div class="personal-info">
                <span><?= bi('person-circle')?>
                    <h5><?= langs('user-info-wrap.h3')?></h5>
                </span>
                
                    <a href="#" class="personal-info-edit">
                        <span><?= bi('pencil-square')?>
                        <p><?=langs('personal-info-edit.p')?></p>
                        </span>     
                    </a>
            </div>
            <div class="personal-info-check">
                    <ul class="personal-info-list">
                            <li>
                                <label class="label-user-name" for=""><?= langs('personal-info-list.label-user-name')?></label>
                                <span><?= auth_user('name')?></span>
                            </li>
                            <li>
                                <label class="label-user-last-name" for=""><?= langs('personal-info-list.label-user-last-name')?></label>
                                <span><?= auth_user('last_name')?></span>
                            </li>
                            <li>
                                <label class="label-user-age" for=""><?= langs('personal-info-list.label-user-age')?></label>
                                <span><?= auth_user('age')?></span>
                            </li>
                            <li>
                                <label class="label-user-birth" for=""><?= langs('personal-info-list.label-user-birth')?></label>
                                <span><?= auth_user('name')?></span>
                            </li>
                            <li>
                                <label class="label-user-gender" for=""><?= langs('personal-info-list.label-user-gender')?></label>
                                <span><?= auth_user('gender')?></span>
                            </li>
                            <li>
                                <label class="label-user-language" for=""><?= langs('personal-info-list.label-user-language')?></label>
                                <span><?= auth_user('name')?></span>
                            </li>
                    </ul>
            </div>
        </div>
        <div class="personal-info-block">
            <div class="user-contacts">
                <span><?= bi('person-lines-fill')?>
                    <p><?= langs('user-contacts')?></p>
                </span>

                <a href="#" class="personal-info-edit">
                        <span><?= bi('pencil-square')?>
                        <p><?=langs('personal-info-edit.p')?></p>
                        </span>     
                </a>
            </div>
            <div class="user-mail">
                <label for=""><?= langs('user-mail')?></label>
                <span><?= auth_user('email')?></span>
            </div>
        </div>

        <div class="personal-info-block">   
            <div class="user-delivery-way">
                <span><?= bi('truck')?>
                    <p><?= langs('user-delivery-way')?></p>
                </span>

                <a href="#" class="personal-info-edit">
                        <span><?= bi('pencil-square')?>
                        <p><?=langs('personal-info-edit.p')?></p>
                        </span>     
                </a>
            </div>
            <div class="checkout-delivery-type">
            <ul>
                <li> 
                    <input checked class="delivery-input" type="radio" name="delivery" value="shop" id="delivery-1">
                        <label class="user-delivery-block" for="delivery-1">
                            <div class="user-delivery-radio"></div>
                            <p>Самовывоз с магазина</p>
                        </label>
                </li>
                <li>
                    <input class="delivery-input" type="radio" name="delivery" value="post" id="delivery-2">
                        <label class="user-delivery-block" for="delivery-2">
                            <div class="user-delivery-radio"></div>
                            <p>Доставка на отеделние почты</p>
                        </label>
                </li>
                <li>
                    <input class="delivery-input" type="radio" name="delivery" value="courier" id="delivery-3"> 
                        <label class="user-delivery-block" for="delivery-3">
                            <div class="user-delivery-radio"></div>
                            <p>Доставка курьером</p>
                            <div class="delivery-adress">
                                <textarea name="address" id="" cols="30" rows="10"></textarea>
                            </div>
                        </label>
                </li>  
            </ul>
        </div>
        </div> 

        <div class="personal-info-block">
            <div class="user-pay-method">
                <span><?= bi('credit-card-2-back-fill')?>
                    <p><?= langs('user-pay-method')?></p>
                </span>

                <a href="#" class="personal-info-edit">
                        <span><?= bi('pencil-square')?>
                        <p><?=langs('personal-info-edit.p')?></p>
                        </span>     
                </a>
            </div>
            <div class="checkout-payment-method">
            <ul>
                <li>
                <input checked class="delivery-input" type="radio" name="payment" value="cash" id="payment-1">
                        <label class="user-delivery-block" for="payment-1">
                            <div class="user-delivery-radio"></div>
                            <p>Оплата наличными при получении</p>
                        </label>
                </li>
                <li>
                <input class="delivery-input" type="radio" name="payment" value="card" id="payment-2">
                        <label class="user-delivery-block" for="payment-2">
                            <div class="user-delivery-radio"></div>
                            <p>Оплата онлайн картой</p>
                        </label>
                </li>
                <li>
                <input class="delivery-input" type="radio" name="payment" value="pp" id="payment-3">
                        <label class="user-delivery-block" for="payment-3">
                            <div class="user-delivery-radio"></div>
                            <p>Оплата PayPal</p>
                            <span class="user-delivery-free">Комиссия 3,5%</span>
                        </label>
                </li>
            </ul>
        </div>
        </div>
    </div>


</div>