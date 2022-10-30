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

