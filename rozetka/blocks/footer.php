
</div> <!--  main-conten-wrapper -->
<footer>
<div class="footer-head-wrapper">
	<div class="footer-head">
		<div class="caption">Скачивайте наше приложение</div>
		<div class="apps">
		<a target="_blank" href="https://play.google.com/store/apps/details/?id=ua.com.rozetka.shop&amp;referrer=utm_source%3Dfullversion%26utm_medium%3Dsite%26utm_campaign%3Dfullversion"><img src="svg/button-google-play-ru.svg" alt=""></a>
		<a target="_blank" href="https://itunes.apple.com/app/apple-store/id740469631/?pt=3132803&amp;ct=fullversion&amp;at=1000l3MB&amp;mt=8"><img src="svg/button-appstore-ru.svg" alt="">  </a>	
	</div>
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
		 <li><h3> Информация о компании </h3></li>
		<li><a href="#"> О нас </a></li>
		<li><a href="#"> Условия использования сайта </a></li>
		<li><a href="#"> Вакансии </a></li>
		<li><a href="#"> Контакты </a></li>
	</ul>
	<ul>
		 <li><h3> Помощь </h3></li>
	<li><a href="#"> Доставка и оплата </a></li>
	<li><a href="#"> Кредит </a></li>
	<li><a href="#"> Гарантия </a></li>
	<li><a href="#"> Возврат товара </a></li>
	<li><a href="#"> Сервисные центры </a></li>
	</ul>
	<ul>
		 <li><h3> Сервисы </h3></li>
	<li><a href="#"> Бонусный счёт </a></li>
	<li><a href="#"> Rozetka Premium </a></li>
	<li><a href="#"> Подарочные сертификаты </a></li>
	<li><a href="#"> Rozetka Обмен </a></li>
	<li><a href="#"> Туры и отдых </a></li>
	</ul>
	<ul>
		<li><h3> Партнерам </h3></li> 
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
		<li><a href="index.php?action=jquery-rules" >
		<?php include 'svg/bootstrap/tools.svg' ?>		
		jQuery</a></li>
	</ul>
</div>


<div class="chat-button js-open-modal-nocheck" data-target="chat_wrapper">
	<?php include 'svg/bootstrap/chat-dots.svg' ?>
</div>

<div class="chat js-open-modal" id="chat_wrapper">
	<div class="chat-head">
		<div class="chat-logo">
			<img src="img/rozetka-logo.png" alt="" />
		</div>
		<h4>Чат</h4>
		<button class="js-open-modal-nocheck" data-target="chat_wrapper"><?php include 'svg/bootstrap/x.svg' ?></button>
	</div>
	<div class="chat-greeting ">
		<h3 class="text-center">Enter your name</h3>
	</div>
	<div class="chat-dialog hide">
	</div>
	<form class="chat-message-sent" id="chat_form">
		<input id = "chat_input" maxlenght="1000" placeholder="Введите сообщение ...">
		<button type="submit"><?= bi('arrow-right-circle') ?></button>
</form>
	<div class="chat-add">
		<span><?= bi('emoji-smile') ?></span>
		<span><?= bi('plus-lg') ?></span>
		<span><?= bi('three-dots-vertical') ?></span>
	</div>
</div>





<script src="js/main.js"></script>

<script>
var chat_dialog_id 
var chat_started = false
var greeting

	$('#chat_form').submit(function(event) {
		event.preventDefault()
		var chat_input = $('#chat_input')
		var chat_input_value = chat_input.val()
		chat_input.val('')
		log(chat_input_value)
		
		if(!chat_started){
			if (chat_input_value.trim()) {
				start_chat(chat_input_value)
				chat_started = true
			}else{
				$('#chat_input').addClass('fail')
			}
	    }else{
			send_message(chat_input_value)
		}

	})


	function send_message(message) {
		$.post(location.href,
			{send_chat_message: 1, chat_dialog_id: chat_dialog_id, message: message},
			function (data) {
				if(data.status === 'ok') $('.chat-dialog').append(`<div class="chat-client">${message}</div>`)
			}, 'json')
	}


	$('#chat_input').keyup(function() {
		if(this.value.trim()){
			$(this).removeClass('fail')
		}
	})


	function start_chat(chat_input_value) {
		$('.chat-greeting').addClass('hide')
		$('.chat-dialog').removeClass('hide')
		sessionStorage.setItem('user_name', chat_input_value)
		$.post(location.href,
		{create_chat: 1, user_name: chat_input_value},
		function (data) {
			chat_dialog_id = data.chat_dialog_id
			sessionStorage.setItem('chat_dialog_id', chat_dialog_id)
			greeting = data.greeting
			if(data.status === 'ok') $('.chat-dialog').append(`<div class="chat-admin">${greeting}</div>`)
			setInterval(function() {
	    		load_messages(chat_dialog_id);
    		}, 5000);
		}, 'json')
	}

	var chat_dialog_id = sessionStorage.getItem('chat_dialog_id')
	if (chat_dialog_id) {
		continue_chat(chat_dialog_id)
	}

	function continue_chat(chat_dialog_id){
		$('.chat-greeting').addClass('hide')
		$('.chat-dialog').removeClass('hide')
		var user_name = sessionStorage.getItem('user_name')
		greeting = `Welcome back ${user_name}!`
		load_messages(chat_dialog_id)
		setInterval(function() {
	    		load_messages(chat_dialog_id);
    		}, 5000);
	}


	function load_messages(chatId) {
            $.post('admin.php', 
                {get_chat_messages: 1, chatId: chatId},
                function(data) {
                    $('.chat-dialog').html('')
					$('.chat-dialog').append(`<div class="chat-admin">${greeting}</div>`)
                    data.messages.forEach(function(element){
                        $('.chat-dialog').append('<div class="chat-'+ element.from +'"><span>' + element.message + '</span></div>')
                    })
                }, 'json')
        }
</script>

</body>
</html>