  var fullScreenPanel = $(window).height() - 105;
  var fullScreenOrderList = $(window).height() - 360;

  $('#js-table-area').height(fullScreenPanel).css('overflow' , 'auto');
  $('#order-list').height(fullScreenOrderList).css('overflow' , 'auto');

  $('.js-table-btn').click(function(){
    var tableNumber = $(this).data('table');
    var tableZone = $(this).data('zone');
    var order = $('#order_id').val();
    var zone_id = $('#zone_id').val();
    var base = this;

    if($(this).hasClass('btn-info')){  
      $.ajax({
        method: "POST",
        url: "/pos/add_table",
        data: { table: tableNumber,
                zone:  tableZone,
                order: order,
                zone_id: zone_id},
        datatype: "json",
        success: function(data){
            obj = JSON.parse(data);

            if(obj.order_id != order){
              $('#order_id').val(obj.order);
            }

            $(base).removeClass('btn-info');
            $(base).addClass('btn-default');
            addTableLabel(tableNumber);
        }
      });
    }else if($(this).hasClass('btn-default')){
      $.ajax({
        method: "POST",
        url: "/pos/remove_table",
        data: { table: tableNumber,
                zone:  tableZone,
                order: order},
        datatype: "json",
        success: function(){
            $(base).addClass('btn-info');
            $(base).removeClass('btn-default');
            removeTableLabel(tableNumber);
        }
      });
    }
  });

  $('.confirm-delete-order').click(function(){
      var order = $('#order_id').val();
      $.ajax({
        method: "POST",
        url: "/pos/remove",
        data: { 
                order: order
              },
        success: function(){
          window.location.replace('/pos');
        }
      });
  });

  $('.js-print').click(function(){
      var order = $('#order_id').val();
      window.open('/pos/print_bill/?order='+order, "popupWindow", "width=300,height=600,scrollbars=yes");
  });

  var fullScreenModalWidth = $(window).width() - 400;
  var fullScreenModalHeight= $(window).height() - 180;

  $('#productModal .modal-dialog').width(fullScreenModalWidth);
  $('#productModal .modal-body').height(fullScreenModalHeight).css('overflow' , 'auto');

  $('.js-product-select-btn').click(function(){
    var product = $(this).data('id');
    var order = $('#order_id').val();
    var zone_id = $('#zone_id').val();
    var dataInsert = { product: product, order: order, zone_id: zone_id};

     addProduct(dataInsert);

  });

  $('.js-order-detail-table').on('change', '.js-order-detail-qty', function(){
    var product = $(this).data('id');
    var order = $('#order_id').val();
    var zone_id = $('#zone_id').val();
    var dataInsert = { product: product, order: order, zone_id: zone_id, qty: $(this).val() };

    addProduct(dataInsert);

  }).on('click', '.js-order-detail-remove', function(){
    var order = $('#order_id').val();
    $('#confirm-delete-order-details').modal('show').attr('data-id', order).attr('data-product', $(this).data('id'));
  });

  $('.confirm-delete-order-details').click(function(){
      var order = $('#confirm-delete-order-details').attr('data-id');
      var product = $('#confirm-delete-order-details').attr('data-product');

      $.ajax({
        method: "POST",
        url: "/pos/remove_product",
        data: { product: product,
                order: order
              },
        datatype: "json",
        success: function(data){
          obj = JSON.parse(data);

          updateSubtotal(obj.subtotal);

          $('.js-order-detail-row[data-id="'+product+'"]').remove();
          $('#confirm-delete-order-details').modal('hide');
        }
      });
  });

    var fullScreenModalWidth = $(window).width() - 400;
  var fullScreenModalHeight= 290;

  $('#closeBillModal .modal-dialog').width(fullScreenModalWidth);
  $('#closeBillModal .modal-body').height(fullScreenModalHeight).css('overflow' , 'auto');

  var inFocus = false;
  $('#closeBillModal').focus(function() {
    inFocus = true;
  });

  $('#closeBillModal').blur(function() {
    inFocus = false;
  });

  $(document).on('keydown', function(e) {
    if(inFocus){
      var key = e.keyCode;

      if($.isNumeric(e.key)){
        keyDetection(e.key);
      }else if( key == 8 || key == 46 ){
        keyDetection('del');
        return false;
      }else if(e.key == 'Enter'){
        keyDetection('enter');
      } 
    }
  });

  $('.js-button-number').click(function(){
      var input = $(this).data('input');
      keyDetection(input);
  });

  function keyDetection(input){
      var number = $("#js-close-bill-amount").val();
      var subtotal = $("#js-close-bill-subtotal").val();

      if(input == 'enter'){
        if(Number(subtotal) <= Number(number) && subtotal > 0){
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
  }

  function addProduct(data){
          $.ajax({
        method: "POST",
        url: "/pos/add_product",
        data: data,
        datatype: "json",
        success: function(data){
            obj = JSON.parse(data);

            if(obj.order_id != $('#order_id').val()){
              $('#order_id').val(obj.order);
            }
            //$('#productModal').modal('hide');
            
            productIncrement(obj.product);

            updateSubtotal(obj.subtotal);
        }
      });
  }

  function addTableLabel(number) {
    $('.js-table-number').each(function(){
      if($(this).data('table') == number){
        $(this).removeClass('hide');
      }
    });    
  }

  function removeTableLabel(number) {
    $('.js-table-number').each(function(){
      if($(this).data('table') == number){
        $(this).addClass('hide');
      }
    });    
  }

  function updateSubtotal(number)
  {
    $("#js-subtotal").val((number/100).format());
    $("#js-close-bill-subtotal").val(number/100);
  }

  function productIncrement(product)
  {
    var base = this;
    var product = product;

    if(findProduct(product)){
      $('.js-order-detail-qty[data-id="'+product.id+'"]').val(product.qty);
      $('.js-order-detail-total[data-id="'+product.id+'"]').text((product.total/100).format(2));
    }else{

      $('.js-order-detail-table').append(addNewProductRow(product));
    }
  }

  function addNewProductRow(product){
    var row;
    var length = $('.js-order-detail-row').length + 1;

    row = '<tr data-id="' + product.id + '" class="js-order-detail-row">';
    row += '<td>'+ length +'</td>';
    row += '<td class="col-md-1"><button class="btn btn-danger js-order-detail-remove" data-id="'+product.id+'"><i class="fa fa-close"></i></button></td>';
    row += '<td class="col-md-6">';
    row += '<span data-id="'+product.id+'" class="js-order-detail-name">'+product.name+'</span>'; 
    row += '</td>';
    row += '<td class="col-md-3">';
    row += '<input type="number" value="1" data-id="'+product.id+'" class="col-md-12 js-order-detail-qty">';
    row += '</td>';
    row += '<td class="col-md-2">'; 
    row += '<span data-id="'+product.id+'" class="js-order-detail-total">'+(product.total/100).format(2)+'</span>'; 
    row += '</td>';
    row += '</tr>';

    return row;
  }

  Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
  }

  function findProduct(product)
  {
    var base = this;
    var result = false;

    $('.js-order-detail-row').each(function(){
        if(Number(product.id) == Number($(this).data('id'))){
          result = true;
        }
    });
    return result;
  }
