
$(document).ready(function() {
  var click = 0;
  $("body").on("click",".products_card_add", function(){ 
    var id = this.id.replace("deals_add","");
    var currency = $("input[name='currency"+id+"']:checked").val();
    var deal_discount_price = $("input[name='deal_discount_price"+id+"']").val();
    var deal_discount_link = $("input[name='deal_discount_link"+id+"']").val();
    var deal_trending = $("input[name='deal_trending"+id+"']:checked").val();
 

      $.ajax({
        url: "add_delete.php",
        type: "GET",
        data: {
          deals_add:"true",
          id:id,
          currency:currency,
          deal_discount_price:deal_discount_price,
          deal_discount_link:deal_discount_link,
          deal_trending:deal_trending
        },
        cache: false,
        success: function(dataResult){
          
        $("#products_card"+id).remove();
              
        }
      });


  });
  $("body").on("click",".products_card_delete", function(){ 
    var id = this.id.replace("deals_pending","");

      $.ajax({
        url: "add_delete.php",
        type: "GET",
        data: {
          deals_pending:"true",
          id:id,

        },
        cache: false,
        success: function(dataResult){
          
        $("#products_card"+id).remove();
              
        }
      });


  });

});