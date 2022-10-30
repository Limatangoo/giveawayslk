$(document).ready(function() {
  $(".menu-sticky-back-header").click(function(){
    history.back();
  });
  
  $(".left-nav-bar-scroller").children(".left-nav-bar-square").click(function(){
    var main_number =$(this).attr("id").replace("Level_1_Category_No","");
    var sticky_header_text = $(this).find("span.left-nav-bar-square-dsc").text();
    $(this).css({"background-color": "rgb(255, 255, 255)"});
    $(".menu-sticky-header").children("p.menu-sticky-header-p").text(sticky_header_text);
    var i=0;
    while(i<13){
        i++;
        var sub_data = "[data-spm='cate_"+main_number+"']";
      if("cate_"+i == "cate_"+main_number){
         $(sub_data).css({"display": "block"});
  
      }
      else{
        var hide_data = "[data-spm='cate_"+i+"']";
        $(hide_data).css({"display": "none"});
        $("#Level_1_Category_No"+i).css({"background-color": "rgb(239, 240, 245)"});
      }
     }
  });
   
  $(".right-nav-bar-submenu-p").children(".right-nav-bar-submenu-p-i").click(function(){
          var sub_number =$(this).attr("data-cate");
          var i = 0;
          while(i<13){
              i++;
              var x = 0;
              while(x<13){
                x++;
                var sub_sub_data = "div[data-spm='"+sub_number+"']";
            if("cate_"+i+"_"+x == sub_number){
              if (!$(sub_sub_data).is(':empty') && $(sub_sub_data).css("display")=="none"){ 
                  $(sub_sub_data).show();
                  $("i.right-nav-bar-submenu-p-i").removeClass("fa-chevron-up");
                  $("i.right-nav-bar-submenu-p-i").addClass("fa-chevron-down");
                  $(this).removeClass("fa-chevron-down");
                  $(this).addClass("fa-chevron-up");
                }
                else{
                  $(sub_sub_data).hide();
                  $(this).removeClass("fa-chevron-up");
                  $(this).addClass("fa-chevron-down");
                }
            }
            else{
              var hide_class = "div[data-spm='cate_"+i+"_"+x+"']";
              $(hide_class).hide();
             
            }

              }
              
           }
    
    }); 

});