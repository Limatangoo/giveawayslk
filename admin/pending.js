
   var urlParams = new URLSearchParams(location.search);
   
   if (urlParams.get('p')==null || urlParams.get('p')=="") {
      var url_page_number = 1;
   }
   else{
      var url_page_number = Number(urlParams.get('p'));
   }
   


$(document).ready(function() {    
    /* page navigation with page numbers */
 $("body").on("click",".page_number_p", function(){
   var pageid = $(this).text();
   

   location.assign(`https://giveaways.lk/admin/pending.php?p=${pageid}`);


  });

//navigating when page forward button was clicked
  $("body").on("click","#page_forward", function(){
    var pageid = url_page_number + 1;

   location.assign(`https://giveaways.lk/admin/pending.php?p=${pageid}`);

  });
  //navigating when page backward button was clicked
  $("body").on("click","#page_backward", function(){
      var pageid = url_page_number - 1;
   

   location.assign(`https://giveaways.lk/admin/pending.php?p=${pageid}`);

  });


});

