window.onscroll = function() {menusticky()};



var menu = $(".gvs-site-nav-menu-dropdown");

var sticky = menu.offsetTop;

function menusticky() {

 if ( $(window).width() >= 1024){

  //console.log("window:"+window.pageYOffset);

  //console.log("sticky:"+sticky);

    if (window.pageYOffset > 344) {

      menu.css({"visibility":"hidden"});

      $(".gvs-site-nav-menu").addClass("gvs-site-nav-menu-active");

    } else {

      menu.css({"visibility":"visible"});

      $(".gvs-site-nav-menu").removeClass("gvs-site-nav-menu-active");

    }

    

   

 }





}
//setting old_price high when discounted price goes higher than the old_price and setting up thousands operator and setting up discount
$(document).ready(function(){
  var deals_card = document.getElementsByName("deals_card");
for(let m of deals_card) {
     
     id=m.getAttribute("id");
     //console.log(id);
     let old_price = Number($("div[name='deals_card']").find("#old_price"+id).attr("data-target"));
     let discounted_price = Number($("div[name='deals_card']").find("#discounted_price"+id).attr("data-target"));
      if (old_price<discounted_price){ 
        let x = Math.random() * 30;
        old_price =  Math.ceil(discounted_price*((100+x)/100)); 
        percentage = Math.ceil(((old_price - discounted_price)/old_price)*100);
        $("div[name='deals_card']").find("#discountPercentage"+id).text("-"+percentage+"%");
        $("div[name='deals_card']").find("#old_price"+id).text(old_price.toLocaleString("en-US"));
        $("div[name='deals_card']").find("#discounted_price"+id).text(discounted_price.toLocaleString("en-US"));
       }
       else{
       percentage = Math.ceil(((old_price - discounted_price)/old_price)*100);
       $("div[name='deals_card']").find("#discountPercentage"+id).text("-"+percentage+"%");
       $("div[name='deals_card']").find("#old_price"+id).text(old_price.toLocaleString("en-US"));
       $("div[name='deals_card']").find("#discounted_price"+id).text(discounted_price.toLocaleString("en-US"));
       }
  

}
})












//setting up menu

$(document).ready(function() {



  $(".gvs-site-menu-root").children("li.gvs-site-menu-root-item").mouseover(function(){

    $("ul.gvs-site-menu-grand").css({"visibility": "hidden"});

    var main_number =$(this).attr("id").replace("Level_1_Category_No","");

    var i=0;

    while(i<13){

        i++;

        var sub_class = "ul.Level_1_Category_No"+main_number;

      if("cate_"+i == "cate_"+main_number){

         $(".gvs-site-menu-root").find(sub_class).css({"visibility": "visible"});

         $(this).children("a").addClass("hover");



  

      }

      else{

        var hide_class = "ul.Level_1_Category_No"+i;

        $(".gvs-site-menu-root").find(hide_class).css({"visibility": "hidden"});

        $("#Level_1_Category_No"+i).children("a").removeClass("hover");

      }

     }

  });

    

  $(".gvs-site-menu-sub").children("li.gvs-site-menu-sub-item").mouseover(function(){

          var sub_number =$(this).attr("data-cate");

          var i = 0;

          while(i<13){

              i++;

              var x = 0;

              while(x<13){

                x++;

                var sub_sub_data = "ul[data-spm='"+sub_number+"']";

            if("cate_"+i+"_"+x == sub_number){

              if ($(sub_sub_data).length > 0){ 

                  $(sub_sub_data).css({"visibility": "visible"});

                  $(this).children("a").addClass("hover");

                }

            }

            else{

              var hide_class = "ul[data-spm='cate_"+i+"_"+x+"']";

              var sub_class_li = "li[data-cate='cate_"+i+"_"+x+"']";

              $(hide_class).css({"visibility": "hidden"});

              $(sub_class_li).children("a").removeClass("hover");

            }



              }

              

           }

    

    });

 $(".gvs-site-menu-sub").children("li.sub-item-remove-arrow").mouseover(function(){

          $(".gvs-site-menu-sub").find("ul.gvs-site-menu-grand").css({"visibility": "hidden"});

       

    

    });



  $(document).mouseover(function(e) { 

      var container = $("ul.gvs-site-menu-root");

      var i = 1;

      while(i<13){ 

        if (!container.is(e.target) && container.has(e.target).length === 0) {

         var hide_class = "ul.Level_1_Category_No"+i;

         $(hide_class).css({"visibility": "hidden"});

         $("ul.gvs-site-menu-grand").css({"visibility": "hidden"});

         $("#Level_1_Category_No"+i).children("a").removeClass("hover");

      }

      i++;

      }

      // if the target of the click isn't the container nor a descendant of the container

      

    });

    











});





//loading data when loadmore button pressed

$(document).ready(function() {

  var click = 0;

  $("body").on("click",".J_LoadMoreButton", function(){ 

    click+=1;

      $.ajax({

        url: "../includes/load_more.php",

        type: "GET",

        data: {

          click:click

        },

        cache: false,

        success: function(dataResult){

          var data_id = "#LoadAJX"+click;

          $(data_id).html(dataResult);


        
        },
        complete: function () {
          //setting old_price high when discounted price goes higher than the old_price and setting up thousands operator and setting up discount
          
          var deals_card = document.getElementsByName("deals_card"+click);
          var deals_card_name = "div[name='deals_card"+click+"']";
          var count = 0;
          //console.log(deals_card_name );
          for(let m of deals_card) {
            
               id=m.getAttribute("id");
               //console.log(id);
               let old_price = Number($(deals_card_name).find("#old_price"+id).attr("data-target"));
               let discounted_price = Number($(deals_card_name).find("#discounted_price"+id).attr("data-target"));
                if (old_price<discounted_price){ 
                  
                  let x = Math.random() * 30;
                  old_price =  Math.ceil(discounted_price*((100+x)/100)); 
                  percentage = Math.ceil(((old_price - discounted_price)/old_price)*100);
                  $(deals_card_name).find("#discountPercentage"+id).text("-"+percentage+"%");
                  $(deals_card_name).find("#old_price"+id).text(old_price.toLocaleString("en-US"));
                  $(deals_card_name).find("#discounted_price"+id).text(discounted_price.toLocaleString("en-US"));
                 }
                 else{
                 percentage = Math.ceil(((old_price - discounted_price)/old_price)*100);
                 $(deals_card_name).find("#discountPercentage"+id).text("-"+percentage+"%");
                 $(deals_card_name).find("#old_price"+id).text(old_price.toLocaleString("en-US"));
                 $(deals_card_name).find("#discounted_price"+id).text(discounted_price.toLocaleString("en-US"));
                 }
                
            count++;
          }
         }
        

      });





  });



});

$(document).ready(function() {

  if ( $(window).width() >= 1024){

   $(".gvs-site-nav-menu").find(".gvs-site-menu-nav-category-label").mouseover(function(){



    $(this).addClass("gvs-site-menu-nav-category-label-active");

    $(".gvs-site-nav-menu-dropdown").addClass("gvs-site-nav-menu-dropdown-active");

  });

   $(document).mouseover(function(e) {

     var container_1 = $(".gvs-site-nav-menu").find(".gvs-site-menu-nav-category");

    if (!container_1.is(e.target) && container_1.has(e.target).length === 0) {

        container_1.find(".gvs-site-menu-nav-category-label").removeClass("gvs-site-menu-nav-category-label-active");

        $(".gvs-site-nav-menu-dropdown").removeClass("gvs-site-nav-menu-dropdown-active");

      }

  });

 }

});



//subscription form 

$(document).ready(function() { 

  $("body").on("click","#subsription-btn", function(){

    

    var email=$("input[name=subscription-email]").val();

    var emailcheck=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    var emailvalidation=emailcheck.test(email);

    var dream_item = $("input[name=dream-item]").val();

    if(email=="" || typeof(email)=="undefined" || (/^\s*$/.test(email)) || emailvalidation!==true){

        $(".subscription_err .subscription_err_p").text("Please enter a valid email address");

    }

    else{  

        $.ajax({url: "https://giveaways.lk/includes/subscription.php", method: "POST",

             data: {email : email,

                   dream_item : dream_item 

             }, 

             success: function(result){

              $(".subscription_err .subscription_err_p").text(result);

              

              },

              error:function(xhr){

          alert("An error occured: " + xhr.status + " " + xhr.statusText);

        }

      });

     }



  });





});



/*show animation until ajax is loading*/

$(document).ready(function() {

    $(document).ajaxStart(function(){

        $('.loader').addClass("loader-active");

        $('.J_LoadMore').addClass("J_LoadMore-none");

     }).ajaxStop(function(){

        $('.loader').removeClass("loader-active");

        $('.J_LoadMore').removeClass("J_LoadMore-none");

     });

});

