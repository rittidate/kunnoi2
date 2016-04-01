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
