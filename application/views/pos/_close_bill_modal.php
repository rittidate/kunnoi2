<div class="modal fade" id="closeBillModal" tabindex="-1" role="dialog" aria-labelledby="closeBillModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">

        <div class="col-md-6 js-input-close-bill">
          <div class="row">
            <div class="form-group">
              <label class="control-label col-sm-4" for="subtotal">รวมทั้งสิ้น</label>
              <div class="col-sm-7">
                <input type="number" class="form-control input-lg" id="js-close-bill-subtotal" readonly="" placeholder="Subtotal" value="<?= !empty($order) ? $order->subtotal/100 : 0;?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-sm-4" for="amount">รับเงิน</label>
              <div class="col-sm-7">
                <input type="number" class="form-control input-lg" id="js-close-bill-amount" pattern="^\d+(\.|\,)\d{2}$" placeholder="Press Number">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-sm-4" for="change">เงินทอน</label>
              <div class="col-sm-7">
                <input type="number" class="form-control input-lg" id="js-close-bill-change" placeholder="Change">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 js-panel-close-bill">
          <div id="panel-banknote">
          </div>
          <div id="panel-button">
            <div class="row">
              <button class="btn btn-info col-md-4 js-button-number" data-input="7">7</button>
              <button class="btn btn-info col-md-4 js-button-number" data-input="8">8</button>
              <button class="btn btn-info col-md-4 js-button-number" data-input="9">9</button>
            </div>
            <div class="row">
              <button class="btn btn-info col-md-4 js-button-number" data-input="4">4</button>
              <button class="btn btn-info col-md-4 js-button-number" data-input="5">5</button>
              <button class="btn btn-info col-md-4 js-button-number" data-input="6">6</button>
            </div>
            <div class="row">
              <button class="btn btn-info col-md-4 js-button-number" data-input="1">1</button>
              <button class="btn btn-info col-md-4 js-button-number" data-input="2">2</button>
              <button class="btn btn-info col-md-4 js-button-number" data-input="3">3</button>
            </div>
            <div class="row">
              <button class="btn btn-danger col-md-4 js-button-number" data-input="del"><i class="fa fa-reply"></i></button>
              <button class="btn btn-info col-md-4 js-button-number" data-input="0">0</button>
              <button class="btn btn-success col-md-4 js-button-number" data-input="enter">Enter</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
