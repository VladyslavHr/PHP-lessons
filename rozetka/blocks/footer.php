<footer>
<div class="footer-head">
	<div class="caption">Скачивайте наше приложение</div>
	<div class="apps">
	<a target="_blank" href="https://play.google.com/store/apps/details/?id=ua.com.rozetka.shop&amp;referrer=utm_source%3Dfullversion%26utm_medium%3Dsite%26utm_campaign%3Dfullversion"><img src="svg/button-google-play-ru.svg" alt=""></a>
	<a target="_blank" href="https://itunes.apple.com/app/apple-store/id740469631/?pt=3132803&amp;ct=fullversion&amp;at=1000l3MB&amp;mt=8"><img src="svg/button-appstore-ru.svg" alt="">  </a>	
</div>
</div>

<div class="footer-body-wrap">
<div class="footer-body">
	<div class="footer-social-clock">
<a class="footer-call-centr" href="#"><i class="bi bi-clock"></i>График работы Call-центра</a>
    <ul class="footer-body-socials">
            <li><a href="#" class="left-menu-socials-facebook"><?php include "svg/facebook.svg" ?></a> </li>
            <li><a href="#"  class="left-menu-socials-twitter"><?php include "svg/twitter.svg" ?></a></li>
            <li><a href="#"  class="left-menu-socials-youtube2"><?php include "svg/youtube2.svg" ?></a></li>
            <li><a href="#"  class="left-menu-socials-instagram"><?php include "svg/instagram.svg" ?></a></li>
            <li><a href="#"  class="left-menu-socials-viber"><?php include "svg/viber.svg" ?></a></li>
            <li><a href="#"  class="left-menu-socials-telegram"><?php include "svg/telegram.svg" ?></a></li>
            </ul>
	</div>
	<div class="footer-columns">
	<ul>
		<h3> Информация о компании </h3>
		<li><a href="#"> О нас </a></li>
		<li><a href="#"> Условия использования сайта </a></li>
		<li><a href="#"> Вакансии </a></li>
		<li><a href="#"> Контакты </a></li>
	</ul>
	<ul>
		<h3> Помощь </h3>
	<li><a href="#"> Доставка и оплата </a></li>
	<li><a href="#"> Кредит </a></li>
	<li><a href="#"> Гарантия </a></li>
	<li><a href="#"> Возврат товара </a></li>
	<li><a href="#"> Сервисные центры </a></li>
	</ul>
	<ul>
		<h3> Сервисы </h3>
	<li><a href="#"> Бонусный счёт </a></li>
	<li><a href="#"> Rozetka Premium </a></li>
	<li><a href="#"> Подарочные сертификаты </a></li>
	<li><a href="#"> Rozetka Обмен </a></li>
	<li><a href="#"> Туры и отдых </a></li>
	</ul>
	<ul>
		<h3> Партнерам </h3>
	<li><a href="#"> Продавать на Розетке </a></li>
	<li><a href="#"> Сотрудничество с нами </a></li>
	<li><a href="#"> Франчайзинг </a></li>
	<li><a href="#"> Аренда помещений </a></li>
	</ul>
	</div>

 </div>
 <div class="footer-bottom">
	 <button class="footer-payment-master" type="button">
	 <img src="https://xl-static.rozetka.com.ua/assets/img/design/mastercard-logo.svg" alt="">
	 </button>
	 <button class="footer-payment-visa" type="button">
	 <img src="https://xl-static.rozetka.com.ua/assets/img/design/visa-logo.svg" alt="">
	 </button>
 </div>
</div>

</footer>
<pre>
<?php
// print_r($_GET);
if(isset($_GET['open-modal'])){
    $show_modal = 'active';
}else{
    $show_modal = '';
}

?>

<?php include 'blocks/modal-login.php' ?>

<a href="#" class="arrow-up">🠑</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<div class="line-console">
	<ul class="line-items" >
		<li><a href="admin.php?action=console">
		<?php include 'svg/bootstrap/clipboard-data.svg' ?>	
		Admin Console</a></li>
		<li><a href="index.php?action=tests" >
		<?php include 'svg/bootstrap/cup-straw.svg' ?>		
		Test Page</a></li>
	</ul>
</div>


<script>
 document.querySelectorAll('.js-open-modal').forEach(function(el){
    el.addEventListener('click', function(e){
    	if(e.target !== this) return false
        var modal = document.getElementById(this.dataset.target)
    	
    	if(modal.classList.contains('active')){
    		setTimeout(function(){modal.classList.remove('active')}, 400)
    		modal.classList.add('fade')
    	}else{
    		modal.classList.remove('fade')
    		modal.classList.add('active')
    	}
    })
})
</script>

</body>
</html>