$(document).ready(function () {
  $("body").on('change', 'select[name="deal_category"]', function() {
      var value = $(this).children("option:selected").data("sub"); 
      var i = 0;
      while(i<12){
           i++;
         if(value == "deal_sub_category"+i){
            $("#"+value).css({
              "display":"block"
            });

            x=0;
            while(x<12){
              x++;
              y=0;
              while(y<12){
                y++;
                if(x==i && y==1){
                   $("#"+value+"_"+1).css({
                        "display":"block"
                      });
                   $("#"+value+"_"+1).attr("name","deal_sub_sub_category");
                    continue;
                }
                $("#deal_sub_category"+x+"_"+y).hide();
                $("#deal_sub_category"+x+"_"+y).attr("name","");
              }
            }
            $("#"+value).attr("name","deal_sub_category");
            
         }
         else{
          $("#deal_sub_category"+i).hide();
          $("#deal_sub_category"+i).attr("name","");

         }
      }
   
  });
  $("body").on('change', 'select[name="deal_sub_category"]', function() {
      var value = $(this).children("option:selected").data("sub"); 
      var i = 0;
      while(i<13){
           i++;
           var x = 0;
           while(x<13){ 
            x++;
         if(value == "deal_sub_category"+i+"_"+x){
            $("#"+value).css({
              "display":"block"
            });
            $("#"+value).attr("name","deal_sub_sub_category");
         }
         else{
          $("#deal_sub_category"+i+"_"+x).hide();
          $("#deal_sub_category"+i+"_"+x).attr("name","");
          }
         }
      }
    
  });
  $("body").on('change', 'select[name="deal_category"]', function() {
      var value = $(this).children("option:selected").val(); 
  
     console.log(value);
    
  });
});

$(document).ready(function () {
  $("body").on('change', 'select[name="giveaway_category"]', function() {
      var value = $(this).children("option:selected").data("sub"); 
      var i = 0;
      while(i<12){
           i++;
         if(value == "giveaway_sub_category"+i){
            $("#"+value).css({
              "display":"block"
            });

            x=0;
            while(x<12){
              x++;
              y=0;
              while(y<12){
                y++;
                if(x==i && y==1){
                   $("#"+value+"_"+1).css({
                        "display":"block"
                      });
                   $("#"+value+"_"+1).attr("name","giveaway_sub_sub_category");
                    continue;
                }
                $("#giveaway_sub_category"+x+"_"+y).hide();
                $("#giveaway_sub_category"+x+"_"+y).attr("name","");
              }
            }
            $("#"+value).attr("name","giveaway_sub_category");
            
         }
         else{
          $("#giveaway_sub_category"+i).hide();
          $("#giveaway_sub_category"+i).attr("name","");

         }
      }
   
  });
  $("body").on('change', 'select[name="giveaway_sub_category"]', function() {
      var value = $(this).children("option:selected").data("sub"); 
      var i = 0;
      while(i<13){
           i++;
           var x = 0;
           while(x<13){ 
            x++;
         if(value == "giveaway_sub_category"+i+"_"+x){
            $("#"+value).css({
              "display":"block"
            });
            $("#"+value).attr("name","giveaway_sub_sub_category");
         }
         else{
          $("#giveaway_sub_category"+i+"_"+x).hide();
          $("#giveaway_sub_category"+i+"_"+x).attr("name","");
          }
         }
      }
    
  });
  
  $("body").on('click', 'input[name="deal_discounted_price"]', function() {
      var deal_keywords = $("input[name='deal_tittle']").val();
      var deal_keywords_new = deal_keywords.replace(/\//g,'');
      deal_keywords_new = deal_keywords_new.replace(/\\/g,'');
      deal_keywords_new = deal_keywords_new.replace(/\-/g,'');
      deal_keywords_new = deal_keywords_new.replace(/\,/g,'');
      //deal_keywords_new = deal_keywords_new.replace(/\s/g,'');
      deal_keywords_new = deal_keywords_new.replace(/\:/g,'');
      deal_keywords_new = deal_keywords_new.replace(/\)/g,'');
      deal_keywords_new = deal_keywords_new.replace(/\(/g,'');

      $("textarea[name='deal_keywords']").val(deal_keywords_new);

  
    
  });
    $("body").on('click', 'input[name="giveaway_end_date"]', function() {
      var giveaway_keywords = $("input[name='giveaway_tittle']").val();
      var giveaway_keywords_new = giveaway_keywords.replace(/\//g,'');
      giveaway_keywords_new = giveaway_keywords_new.replace(/\\/g,'');
      giveaway_keywords_new = giveaway_keywords_new.replace(/\-/g,'');
      giveaway_keywords_new = giveaway_keywords_new.replace(/\,/g,'');
      //giveaway_keywords_new = giveaway_keywords_new.replace(/\s/g,'');
      giveaway_keywords_new = giveaway_keywords_new.replace(/\:/g,'');
      giveaway_keywords_new = giveaway_keywords_new.replace(/\)/g,'');
      giveaway_keywords_new = giveaway_keywords_new.replace(/\(/g,'');

      $("textarea[name='giveaway_keywords']").val(giveaway_keywords_new);

  
    
  });

});
$(document).ready(function () {
  $("body").on('change', 'select[name="bank_category"]', function() {
      var value = $(this).children("option:selected").data("sub"); 
      var i = 0;
      while(i<12){
           i++;
         if(value == "bank_sub_category"+i){
            $("#"+value).css({
              "display":"block"
            });

            x=0;
            while(x<12){
              x++;
              y=0;
              while(y<12){
                y++;
                if(x==i && y==1){
                   $("#"+value+"_"+1).css({
                        "display":"block"
                      });
                   $("#"+value+"_"+1).attr("name","bank_sub_sub_category");
                    continue;
                }
                $("#bank_sub_category"+x+"_"+y).hide();
                $("#bank_sub_category"+x+"_"+y).attr("name","");
              }
            }
            $("#"+value).attr("name","bank_sub_category");
            
         }
         else{
          $("#bank_sub_category"+i).hide();
          $("#bank_sub_category"+i).attr("name","");

         }
      }
   
  });
  $("body").on('change', 'select[name="bank_sub_category"]', function() {
      var value = $(this).children("option:selected").data("sub"); 
      var i = 0;
      while(i<13){
           i++;
           var x = 0;
           while(x<13){ 
            x++;
         if(value == "bank_sub_category"+i+"_"+x){
            $("#"+value).css({
              "display":"block"
            });
            $("#"+value).attr("name","bank_sub_sub_category");
         }
         else{
          $("#bank_sub_category"+i+"_"+x).hide();
          $("#bank_sub_category"+i+"_"+x).attr("name","");
          }
         }
      }
    
  });



});