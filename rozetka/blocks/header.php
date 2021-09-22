<?php
if(!defined('ROOT')){
  die('Direct request not allowed');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Rozetka - main</title>
    <link rel="stylesheet" href="css/slider.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"  crossorigin="anonymous"></script>
<script src="js/slider.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

  </head>
  <body class="<?= $_GET['action'] ?? '' ?>">
<div class="header">
        <div class="top-banner">
          <img src="img/top-banner.jpg" alt="" title="Модный взрыв" />
        </div>
      <div class="top-console">
          <div class="top-menu-button">
            <button class="js-open-modal" data-target="left_menu" ></button>
          </div>
          <a href="?action=main" class="logo">
            <img src="img/logo_n.svg" alt="" />
          </a>
          <div class="catalog-btn">
            <svg viewBox="0 0 24 24" id="icon-catalog">
            <g clip-rule="evenodd" fill-rule="evenodd">
            <path d="m17 2.75735-4.2427 4.24264 4.2427 4.24261 4.2426-4.24261zm-5.6569 2.82843c-.7811.78104-.7811 2.04738 0 2.82842l4.2426 4.2427c.7811.781 2.0475.781 2.8285 0l4.2426-4.2427c.781-.78104.781-2.04738 0-2.82842l-4.2426-4.24264c-.781-.781048-2.0474-.781048-2.8285 0z"></path>
            <path d="m7 4h-4c-.55228 0-1 .44772-1 1v4c0 .5523.44772 1 1 1h4c.55228 0 1-.4477 1-1v-4c0-.55228-.44772-1-1-1zm-4-2c-1.65685 0-3 1.34315-3 3v4c0 1.6569 1.34315 3 3 3h4c1.65685 0 3-1.3431 3-3v-4c0-1.65685-1.34315-3-3-3z"></path>
            <path d="m7 16h-4c-.55228 0-1 .4477-1 1v4c0 .5523.44772 1 1 1h4c.55228 0 1-.4477 1-1v-4c0-.5523-.44772-1-1-1zm-4-2c-1.65685 0-3 1.3431-3 3v4c0 1.6569 1.34315 3 3 3h4c1.65685 0 3-1.3431 3-3v-4c0-1.6569-1.34315-3-3-3z"> </path>
            <path d="m19 16h-4c-.5523 0-1 .4477-1 1v4c0 .5523.4477 1 1 1h4c.5523 0 1-.4477 1-1v-4c0-.5523-.4477-1-1-1zm-4-2c-1.6569 0-3 1.3431-3 3v4c0 1.6569 1.3431 3 3 3h4c1.6569 0 3-1.3431 3-3v-4c0-1.6569-1.3431-3-3-3z"></path></g>
            </svg>
            <a href="?action=category">Каталог</a>
          </div>
          <form class="search-block" action="index.php">
            <input type="hidden" name="action" value="search">
            <input name="query" value="<?= @$_GET['query'] ?>" type="text" placeholder="Я ищу..." />
            <button type="submit">Найти</button>
          </form>
          <div class="langs-block">
            <a href="#" class="active">RU</a>|<a href="#">UA</a>
          </div>

          <a href="?action=tests" class="premium-btn">
            <p>Попробуйте</p>
            <svg viewBox="0 0 96 32" id="icon-premium">
              <path d="m2.61711 0c-1.696112 5.01428-2.61711 10.3973-2.61711 16s.920998 10.9857 2.61711 16h90.76579c1.6961-5.0143 2.6171-10.3973 2.6171-16s-.921-10.98572-2.6171-16z"fill="#471a7b"></path>
              <g fill="#f7d869">
              <path d="m14.9764 10h-3.9764v11.7978h1.6244v-4.7191h2.2674c2.7073 0 4.1287-1.4832 4.1287-3.5394s-1.3876-3.5393-4.0441-3.5393zm.1861 5.7472h-2.5381v-4.4157h2.5381c1.3198 0 2.1997.8764 2.1997 2.2078 0 1.3315-.8799 2.2079-2.1997 2.2079z"></path>
                <path d="m28.022 21.7978h2.2336l-4.5517-5.2248c1.8782-.3876 2.8427-1.6179 2.8427-3.2191 0-1.955-1.3875-3.3539-4.0441-3.3539h-3.621v11.7978h1.6244v-5.1068h1.269zm-5.5161-10.4832h2.2166c1.3198 0 2.1658.7921 2.1658 2.0562 0 1.2472-.846 2.0562-2.1658 2.0562h-2.2166z"></path>
                <path d="m39.0508 11.4157v-1.4157h-7.4451v11.7978h7.4451v-1.4158h-5.8207v-3.9438h4.9747v-1.4157h-4.9747v-3.6068z"></path>
                <path d="m51.6665 10-4.4502 7.5169-4.4502-7.5169h-1.6921v11.7978h1.6244v-9.1012l4.4671 7.5843 4.4671-7.5843v9.1012h1.6244v-11.7978z"></path>
                <path d="m56.047 21.7978h1.6243v-11.7978h-1.6243z"></path>
                <path d="m65.2794 22c2.978 0 4.907-1.8371 4.907-4.7528v-7.2472h-1.6244v7.3315c0 1.8539-1.2691 3.2191-3.2826 3.2191-2.0136 0-3.2827-1.3652-3.2827-3.2191v-7.3315h-1.6244v7.2472c0 2.9157 1.929 4.7528 4.9071 4.7528z"></path>
                <path d="m83.4094 10-4.4501 7.5169-4.4502-7.5169h-1.6921v11.7978h1.6244v-9.1012l4.4671 7.5843 4.4671-7.5843v9.1012h1.6244v-11.7978z"></path>
              </g>
            </svg>
          </a>

            <?php if(auth_check()) : ?>
            <div class="favorites-link">
              <a href="?action=favorites"><?php include 'svg/bootstrap/heart.svg'?></a>
            </div>
            <?php endif ?>
  
              <div class="top-icons">
                <div class="counter">
                  <?= isset($_SESSION['count']) ? $_SESSION['count'] : '' ?>
                </div>
                    <svg viewBox="0 0 24 24" id="icon-user-simple" class="<?php if (!auth_check()) echo 'js-open-modal' ?> profile-icon" data-target="modal_login">
                    <g><path clip-rule="evenodd" d="m18 7.5c0 3.3137-2.6863 6-6 6-3.31375 0-6.00005-2.6863-6.00005-6 0-3.31371 2.6863-6 6.00005-6 3.3137 0 6 2.68629 6 6zm-2 0c0 2.20914-1.7909 4-4 4-2.20918 0-4.00005-1.79086-4.00005-4s1.79087-4 4.00005-4c2.2091 0 4 1.79086 4 4z" fill-rule="evenodd"></path>
                    <path d="m1.49996 22.5c.91192.4104.91152.4113.91152.4113l.00115-.0024c.00283-.006.00826-.0174.01636-.0339.01621-.0328.04305-.0857.08107-.1557.07611-.1402.19659-.3484.3657-.6021.33888-.5083.86856-1.1924 1.62187-1.8773 1.49422-1.3583 3.88685-2.7399 7.50237-2.7399 3.6154 0 6.0081 1.3816 7.5023 2.7399.7533.6849 1.283 1.369 1.6219 1.8773.1691.2537.2895.4619.3657.6021.038.07.0648.1229.081.1557.0081.0165.0136.0279.0164.0339l.0011.0024s-.0004-.0009.9116-.4113c.9119-.4104.9114-.4114.9114-.4114l-.0005-.0012-.0013-.0027-.0032-.0072-.0097-.0208c-.0079-.0167-.0186-.039-.0322-.0665-.0271-.055-.0659-.1311-.1169-.2251-.1021-.1879-.2534-.4485-.4593-.7573-.4112-.6167-1.044-1.4326-1.9407-2.2477-1.8057-1.6417-4.6631-3.2601-8.8476-3.2601-4.18457 0-7.04194 1.6184-8.84772 3.2601-.89669.8151-1.52951 1.631-1.94062 2.2477-.2059.3088-.357294.5694-.459306.7573-.05104.094-.089823.1701-.116976.2251-.01358.0275-.024262.0498-.032124.0665l-.009691.0208-.00328.0072-.001252.0027-.00053.0012s-.000465.001.911459.4114z"></path>
                    </g></svg>
                    <a href="?action=cart">
                    <svg viewBox="0 0 40 40" id="icon-header-basket">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 4.5C0.5 3.67157 1.17157 3 2 3H5.4264C7.29819 3 8.97453 4.15869 9.63602 5.9097L10.4264 8.00178C10.4503 8.00062 10.4745 8.00002 10.4987 8L34.0093 7.98001C37.2162 7.97728 39.3967 11.2342 38.1722 14.1982L34.3031 23.5639C33.8485 24.6643 32.8658 25.4581 31.6944 25.6711L18.7279 28.0286C16.5907 28.4172 14.481 27.2236 13.7133 25.1915L6.8296 6.9699C6.60911 6.38623 6.05033 6 5.4264 6H2C1.17157 6 0.5 5.32843 0.5 4.5ZM11.5587 10.9991L16.5197 24.1313C16.7756 24.8087 17.4789 25.2065 18.1913 25.077L31.1577 22.7195C31.3251 22.689 31.4655 22.5756 31.5304 22.4184L35.3995 13.0527C35.8077 12.0648 35.0809 10.9791 34.0119 10.98L11.5587 10.9991Z"></path>
                    <circle cx="13.5" cy="34" r="3"></circle>
                    <circle cx="31.5" cy="34" r="3"></circle>
                    </svg>
                    </a>
                <ul class="profile">
                  <?php if (auth_check()): ?>
                    <li><a href="#">profile</a></li>
                    <li><a href="#">favorites</a></li>
                    <li><a href="?logout">logout</a></li>
                  <?php else: ?>
                  <?php endif; ?>
                </ul>
              </div>
        </div>
</div>