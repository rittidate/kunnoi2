<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Product List</h4>
      </div>
      <div class="modal-body">
          <div class="row">
          <?php foreach($product as $item): ?>
            <div class="col-md-2">
              <button class ="btn btn-primary js-product-select-btn col-md-12" data-id="<?= $item->id; ?>">
                <i class="fa fa-plus"></i>
                <span><?= $item->t_full_name;?></span>
                </br>
                <span>฿ <?= number_format($item->price1/100, 2, '.', ',');?></span>
              </button>
            </div>
          <?php endforeach; ?>
          </div>
      </div>
    </div>
  </div>
</div>

<?= js_asset('pos_modal.js'); ?>
