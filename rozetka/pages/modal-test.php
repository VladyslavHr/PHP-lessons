<?php if(!defined('ROOT')){ die('Direct request not allowed'); }?>
<div class="product-about">
    <div class="trade">
        <div class="add-to-cart">
        <?php include 'svg/cart.svg' ?>   
        Купить</div>
        <div class="buy-credit js-open-modal" data-target="modal_login">Open modal JS</div>
        <a href="?open-modal" class="buy-credit js-open-modal" data-target="modal_login">Open modal PHP</a>
        <label for="modal_login_checkbox"  class="buy-credit" style="background: blueviolet">Open modal 1</label>
        
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
  <div class="modal-login-wrapper" id="">
    <div class="modal-login">
        <div class="header">
            Вход
            <span class="close js-open-modal" data-target="modal_login"> × </span>
            <label for="modal_login_checkbox" class="label-close"> × </label>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="body">
            <div class="body-left">
                <label for="modal_login_email" class="input-title"> Email </label>
                <input class="input-email " type="email" id="modal_login_email"> 
                <input class="input-email wrong" type="email" id="modal_login_wrong_email"> 
                <p class="input-wrong">Введен неверный адрес эл.почты или номер телефона</p>
                <label for="modal_login_password" class="input-title"> Password </label>
                <input class="input-password" type="password" id="modal_login_password">
                <input class="input-password wrong" type="password" id="modal_login_wrong_password">
                <div class="remember-wrapper">
                    <label>
                        <input class="remember-checkbox" type="checkbox" >
                        <div class="my-checkbox"></div>
                        Запомнить
                    </label>
                    <a href="#"> Напомнить пароль</a>
                </div>
                <button class="login-btn">Войти</button>
                <a href="#" class="register-link"> Зарегистрироваться</a>
                <div class="or">или</div>
            </div>
            <div class="body-right">
                <div class="right-title">Войти как пользователь</div>
                <div class="enter-facebook">
                    <?php include 'svg/facebook.svg' ?>
                    <a href="#">Facebook</a>
                </div>
                <div class="enter-google">
                    <?php include 'svg/google.svg' ?>
                    <a href="#">Google</a>
                </div>
            </div>
        </div>

    </div>
</div>
  </div>
</div>
