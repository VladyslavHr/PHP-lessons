<?php if(!defined('ROOT')){ die('Direct request not allowed'); }?>
<div class="main-container main">
    <?php include 'blocks/sidebar.php' ?>
      <div class="main-content">
         <div class="slim-slider">
            <div class="slim-slide" data-thumb="img/PIC1.jpg">
              <img src="img/PIC1.jpg" />
            </div>
            <div class="slim-slide" data-thumb="img/pic2.jpg">
              <img src="img/pic2.jpg" />
            </div>
            <div class="slim-slide" data-thumb="img/pic3.jpg">
              <img src="img/pic3.jpg" />
            </div>
            <div class="slim-slide" data-thumb="img/pic4.jpg">
              <img src="img/pic4.jpg" />
            </div>
         </div>

        <script>
          let Slider = new SlimSlider({
            selector: ".slim-slider",
            childsClassName: ".slim-slide",
            threshold: 15,
            dir: "ltr",
            showPointers: true,
            showButtons: true,
            showThumbnails: true,
            infinite: true,
            itemsPerSlide: 1,
            autoPlay: false,
          });
          console.log(Slider);
        </script>

        <h2 class="block-title" id="viewed">Просмотренные товары</h2>
        <button class="js-open-modal open-sidebar-button" data-target="left_sidebar">Open menu</button>
        <div class="products">
          <?php 
          
          $products = db_query("SELECT * FROM products ORDER BY RAND() LIMIT 15");
          foreach($products as $product): 




            ?>
          <div class="product-wrapper">    
            <div class="product">
              <?php if($product['favorite']): ?>
              <div class="heart"></div>
              <?php else: ?>
                <div class="heart heart-empty"></div>
              <?php endif; ?>
              <img
                src="<?= get_product_image_src($product) ?>"
                alt=""
              />
              <a href="?<?= 'action=product&tab=1&id=' . $product['id'] ?>" class = "product-title">
              <?= $product['title'] ?>
              </a>
             
              
              <?php if(isset($product['old_price'])): ?>
              <div class="old-price"><?= $product['old_price'] ?> ₴ </div>
              <?php else: ?>
                <div class="old-price no-style">&nbsp;</div>
                <?php endif; ?>
              <div class="price"><?php echo $product[ 'price'] ?> ₴ </div>
              <?php if($product['ends']): ?>
                <div class="is-over">Заканчивается</div>
              <?php else: ?>
                <div class="is-over">&nbsp;</div>
              <?php endif; ?>
            </div>
          </div>
            <?php endforeach; ?>
          

        </div>



        <h2 class="block-title">Новые видео на канале <a href="#">ROZETKA</a> 
            <span class="youtube"> You Tube</span>
        </h2>
        <?php if(false): ?>
        <div class="new-videos">

            <div class="video-item">
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/uvq2DSQY-CU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="video-title">ЦЬОГО ВАМ НЕ РОЗПОВІДАЛИ ПРО AIRPODS MAX! | Огляд навушників від Apple</div>
                <div class="video-date">26 апреля 2021 г.</div>
            </div>


            <div class="video-item">
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/ZnBZu-ZHSfM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="video-title">ЦЬОГО ВАМ НЕ РОЗПОВІДАЛИ ПРО AIRPODS MAX! | Огляд навушників від Apple</div>
                <div class="video-date">26 апреля 2021 г.</div>
            </div>

            <div class="video-item">
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/Gao8UI9pCTI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="video-title">ЦЬОГО ВАМ НЕ РОЗПОВІДАЛИ ПРО AIRPODS MAX! | Огляд навушників від Apple</div>
                <div class="video-date">26 апреля 2021 г.</div>
            </div>

            <div class="video-item">
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/uvq2DSQY-CU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="video-title">ЦЬОГО ВАМ НЕ РОЗПОВІДАЛИ ПРО AIRPODS MAX! | Огляд навушників від Apple</div>
                <div class="video-date">26 апреля 2021 г.</div>
            </div>

        </div>
        <?php endif ?>
      </div>
    </div>