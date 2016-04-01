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
                <input type="number" class="form-control input-lg" id="js-close-bill-amount" placeholder="Press Number">
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
<script>
  var fullScreenModalWidth = $(window).width() - 400;
  var fullScreenModalHeight= 290;

  $('#closeBillModal .modal-dialog').width(fullScreenModalWidth);
  $('#closeBillModal .modal-body').height(fullScreenModalHeight).css('overflow' , 'auto');

  $('.js-button-number').click(function(){
      var input = $(this).data('input');
      var number = $("#js-close-bill-amount").val();
      var subtotal = $("#js-close-bill-subtotal").val();

      if(input == 'enter'){
        if(Number(subtotal) <= Number(number)){
            $.ajax({
              method: "POST",
              url: "/pos/summary",
              data: { 
                      amount: number,
                      order: $("#order_id").val()
                    },
              datatype: "json",
              success: function(data){
                obj = JSON.parse(data);
                $("#js-close-bill-change").val(obj.cash_tender/100);

                window.open('/pos/print_summary/?order='+obj.order_id, "popupWindow", "width=300,height=600,scrollbars=yes");

                var delay=4000; //3 second

                setTimeout(function() {
                  window.location.replace('/pos');
                }, delay);
              }
            });
        }
      }else if(input == 'del'){
        var delNumber = number.slice(0, number.length-1);
        $("#js-close-bill-amount").val(delNumber);
      }else{
        var lastNumber = number + input;
        $("#js-close-bill-amount").val(lastNumber);
      }
  });

</script>
