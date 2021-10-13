<div class="product">
        <?php edit_product_link($product['id'])?> 
            <div class="category-list-item-left">
              <?php product_heart($product) ?>
                <a class="category-product-image" href="?action=product&tab=1&id=<?= $product['id'] ?>">
                  <img class="image-main" src="<?= get_product_image_src($product) ?>" alt="" >
                  <img class="image-hover" src="<?= get_gallery_image_src($product) ?>" alt="" >
                </a>
            </div>
            <div class="category-list-item-right">
              <h2 class="category-title">
                <a href="?action=product&tab=1&id=<?= $product['id'] ?>">
                  <?= $product['title'] ?> <?php if(auth_admin()): ?> [<?=$product['id'] ?>] <?php endif ?>
                </a>
                
              </h2>
              <div class="category-color-wrapper">
                <ul class="category-colors">
                  <?php
                    if($product['colors']){
                        $colors = explode('|', $product['colors']);
                    foreach ($colors as $color){
                      echo "<li class='category-color'><span style='$color'></span></li>";
                      }
                    } 
                  ?>
                </ul>
              </div>
              <?php if(isset($product['old_price']) && $product['old_price']  && $product['old_price'] !== $product['price']): ?>
                <div class="old-price"><?= $product['old_price'] ?> ₴ </div>
              <?php else: ?>
                <div class="old-price no-style">&nbsp;</div>
              <?php endif; ?>
              <div class="category-price-cart">
                <div class="price"><?php echo $product[ 'price'] ?> ₴ </div>
                <div class="category-add-cart">
                    <a class="in-the-cart-add" 
                    onclick="add_to_cart(event)"
                    data-productid="<?=$product['id']?>" 
                    href="<?= query_add(['add_to_cart' => 1, 'product_id' => $product['id']])?>"><?php include "svg/bootstrap/cart4.svg"?>
                      <span class="in-the-cart-count"><?= cart_item_count($product) ?></span>
                      <span class="in-the-cart-desc"><?= in_the_cart($product) ?></span>
                      <?php if  (cart_item_count($product)) :?>
                      <div class="cart-add-check">
                        <?php include "svg/bootstrap/check-lg.svg" ?>
                      </div>
                      <?php else: ?>
                      <?php endif ?>
                    </a>
                </div>
              </div>
              <div class="category-status">
                <?php if($product['sell_status'] === 'available'): ?>
                  <div class="available">
                    <?php include 'svg/bootstrap/check-circle.svg' ?>
                    Есть в наличии
                  </div>
                      <?php elseif($product['sell_status'] === 'unavailable'): ?>
                        <div class="unavailable">
                          <?php include 'svg/bootstrap/dash-circle.svg' ?>
                          Нет в наличии
                        </div>
                      <?php elseif($product['sell_status'] === 'limited'): ?>
                        <div class="limited">
                          <?php include 'svg/bootstrap/clock.svg' ?>
                          Заканчивается
                        </div>
                      <?php elseif($product['sell_status'] === 'out_of_stock'): ?>
                        <div class="out_of_stock">
                          <?php include 'svg/bootstrap/dash-circle.svg' ?>
                          Товар закончился
                        </div>
                        <?php endif ?>
                      </div>
            
                      <?php if($product['ends']): ?>
                        <div class="is-over">Заканчивается</div>
                          <?php else: ?>
                            <div class="is-over">&nbsp;</div>
                              <?php endif; ?>
                      <div class="rating">rating: <?= !empty($product ['rating']) ? $product ['rating'] : 0  ?></div>
                      <?php if(!empty($product ['fast_info']) && is_array($product ['fast_info'])) : ?>
                        <ul class="fast-info">
                          <?php foreach($product ['fast_info'] as $spec => $value): ?>
                            <li><?= $spec ?>: <span><?= $value ?></span></li>
                              <?php endforeach; ?>
                                </ul>
                                  <?php endif; ?>
                      <?php if(!empty($product['finger_print']) && $product['finger_print']): ?>
                        <div class="finger-print"><img src="img/finger-info.png" alt=""></div>
                          <?php endif; ?>
              </div>

          </div>