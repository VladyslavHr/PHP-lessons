<div class="left-menu-wrapper js-open-modal" data-target="left_menu" id="left_menu">

<div class="left-menu">
    <div class="left-menu-header">
    <img src="svg/logo_n.svg" alt="">
    <div class="left-menu-close js-open-modal" data-target="left_menu"> × </div>
    </div>
    <div class="left-menu-profile">
        <a class="left-menu-avatar">
            <?php if($avatar_exists = false): ?>
            <img src="" alt="">
            <?php else: ?>
                <span>A</span>
            <?php endif ?>
        </a>
        <div class="left-menu-user">
                <h3>Vlad</h3>
                <p>Vladysalvhrebennikov@gmail.com</p>
        </div>
    </div>
    <a class="left-menu-premium">
                <h3>premium</h3>
                <p>Бесплатная доставка весь год</p>
            </a>
    <ul class="left-menu-main-nav">
                    <li><a href="?action=brands"><i class="bi bi-menu-button-fill"></i>Каталог товаров</a></li>
                    <li><a href="#"><i class="bi bi-cart3"></i>Корзина</a></li>
                    <li><a href="#"><i class="bi bi-signpost-2"></i>Сравнения</a></li>
                    <li><a href="?action=favorites"><i class="bi bi-journal-text"></i>Справочный центр/favorites</a></li>
                    <li><a href="#"><i class="bi bi-telephone-forward"></i>+38065478955</a></li>             
    </ul>
    <div class="left-menu-langs">
        <h3>Язык</h3>
        <div class="inputs">
        <input name="lang" type="radio" id="input-lang-ru" checked="checked">
            <label for="input-lang-ru">
            RU
            </label>
            <input name="lang" type="radio" id="input-lang-ua" >
            <label for="input-lang-ua">
            UA
            </label>
        </div>
    </div>
    <div class="left-menu-city">
        <h3>Город</h3>
        <select name="" id="">
            <option value="Днепр">Днепр</option>
            <option value="Львов">Львов</option>
            <option value="Киев">Киев</option>
            <option value="Харьков">Харьков</option>
            <option value="Одесса">Одесса</option>
        </select>
    </div>
    
    <div class="left-menu-sub-nav">
    <input class="left-menu-checkbox" type="checkbox" id="left-menu-checkbox1">
    <label for="left-menu-checkbox1"><?php include 'svg/left-menu-arrow.svg' ?></label>
    <h3>Сервисы</h3> 
        <ul class="left-menu-sub-nav-services">
            <li><a href="#"> Бонусный счёт</a> </li>
            <li><a href="#"> Rozetka Premium</a> </li>
            <li><a href="#"> Подарочные сертификаты</a> </li>
            <li><a href="#"> Rozetka Обмен</a> </li>
            <li><a href="#"> Туры и отдых</a> </li>
        </ul>
    </div>
    <div class="left-menu-sub-nav">
    <input class="left-menu-checkbox" type="checkbox" id="left-menu-checkbox2">
    <label for="left-menu-checkbox2"><?php include 'svg/left-menu-arrow.svg' ?></label>
    <h3>Сервисы</h3> 
        <ul class="left-menu-sub-nav-services">
            <li><a href="#"> Бонусный счёт</a> </li>
            <li><a href="#"> Rozetka Premium</a> </li>
            <li><a href="#"> Подарочные сертификаты</a> </li>
            <li><a href="#"> Rozetka Обмен</a> </li>
            <li><a href="#"> Туры и отдых</a> </li>
        </ul>
    </div>
    <div class="left-menu-apps">
        <h3>Скачивайте наше приложение</h3>
            <a target="_blank" href="https://play.google.com/store/apps/details/?id=ua.com.rozetka.shop&referrer=utm_source%3Dfullversion%26utm_medium%3Dsite%26utm_campaign%3Dfullversion"><img src="svg/button-google-play-ru.svg" alt=""></a>    
            <a target="_blank" href="https://itunes.apple.com/app/apple-store/id740469631/?pt=3132803&ct=fullversion&at=1000l3MB&mt=8"><img src="svg/button-appstore-ru.svg" alt="">  </a>
    </div>
    <div class="left-menu-socials">
            <h3>Мы в социальных сетях</h3>
            <ul>
            <li><a href="#" class="left-menu-socials-facebook"><?php include "svg/facebook.svg" ?></a> </li>
            <li><a href="#"  class="left-menu-socials-twitter"><?php include "svg/twitter.svg" ?></a></li>
            <li><a href="#"  class="left-menu-socials-youtube2"><?php include "svg/youtube2.svg" ?></a></li>
            <li><a href="#"  class="left-menu-socials-instagram"><?php include "svg/instagram.svg" ?></a></li>
            <li><a href="#"  class="left-menu-socials-viber"><?php include "svg/viber.svg" ?></a></li>
            <li><a href="#"  class="left-menu-socials-telegram"><?php include "svg/telegram.svg" ?></a></li>
            </ul>
    </div>
    <div class="left-menu-logout">
    
    </div>
</div>

</div>