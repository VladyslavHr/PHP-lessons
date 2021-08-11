<div class="row">
  <div class="col">
<?php bs_pagination($offset, $limit, $total_count); ?>
</div>
<div class="col-xl-1 col-lg-2 col-md-3 col-sm-12">
<select class="form-select" oninput="location.href = this.value">
        <!-- <option>Товаров на странице</option> -->
          <option <?= if_selected($limit, '5')  ?> value="<?= query_add(['offset' => 0,'limit' => '5'])?>">5</option>
          <option <?= if_selected($limit, '10')  ?> value="<?= query_add(['offset' => 0,'limit' => '10'])?>">10</option>
          <option <?= if_selected($limit, '20')  ?> value="<?= query_add(['offset' => 0,'limit' => '20'])?>">20</option>
          <option <?= if_selected($limit, '50')  ?> value="<?= query_add(['offset' => 0,'limit' => '50'])?>">50</option>
          <option <?= if_selected($limit, '100')  ?> value="<?= query_add(['offset' => 0,'limit' => '100'])?>">100</option>
          <!-- <option> Новинки </option>
          <option> Акционные </option> -->        
        </select>
        </div>
</div>