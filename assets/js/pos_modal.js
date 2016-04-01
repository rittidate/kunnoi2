  var fullScreenModalWidth = $(window).width() - 400;
  var fullScreenModalHeight= $(window).height() - 180;

  $('#productModal .modal-dialog').width(fullScreenModalWidth);
  $('#productModal .modal-body').height(fullScreenModalHeight).css('overflow' , 'auto');

  $('.js-product-select-btn').click(function(){
    var product = $(this).data('id');
    var order = $('#order_id').val();
    var zone_id = $('#zone_id').val();

      $.ajax({
        method: "POST",
        url: "/pos/add_product",
        data: { product: product,
                order: order,
                zone_id: zone_id},
        datatype: "json",
        success: function(data){
            obj = JSON.parse(data);

            if(obj.order_id != order){
              $('#order_id').val(obj.order);
            }
            //$('#productModal').modal('hide');

            productIncrement(obj.product);
            $("#js-subtotal").val((obj.subtotal/100).format());
            $("#js-close-bill-subtotal").val(obj.subtotal/100);
        }
      });
  });

  $('.js-order-detail-table').on('change', '.js-order-detail-qty', function(){
    var product = $(this).data('id');
    var order = $('#order_id').val();
    var zone_id = $('#zone_id').val();

      $.ajax({
        method: "POST",
        url: "/pos/add_product",
        data: { product: product,
                order: order,
                zone_id: zone_id,
                qty: $(this).val()
              },
        datatype: "json",
        success: function(data){
            obj = JSON.parse(data);

            productIncrement(obj.product);
            $("#js-subtotal").val((obj.subtotal/100).format());
            $("#js-close-bill-subtotal").val(obj.subtotal/100);
        }
      });
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
          $("#js-subtotal").val((obj.subtotal/100).format());
          $("#js-close-bill-subtotal").val(obj.subtotal/100);
          $('.js-order-detail-row[data-id="'+product+'"]').remove();
          $('#confirm-delete-order-details').modal('hide');
        }
      });
  });

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
