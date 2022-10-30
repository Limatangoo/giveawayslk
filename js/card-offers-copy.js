   var urlParams = new URLSearchParams(location.search);
   
   if (urlParams.get('p')==null || urlParams.get('p')=="") {
      var url_page_number = 1;
   }
   else{
      var url_page_number = Number(urlParams.get('p'));
   }
   if (urlParams.get('start_date')!=null && urlParams.get('start_date')!=="") {
      var d1 = urlParams.get('start_date');
   }
   else{
      var d1 = "";
   }
   if (urlParams.get('end_date')!=null && urlParams.get('end_date')!=="") {
      var d2 = urlParams.get('end_date');
   }
   else{
      var d2 = "";
   }

/*filter functions*/

var today = new Date();
$(document).ready(function() {
    if(d1!==null && d2!==""){
        var startDate = d1.replace(/-/g,'/');
        var endDate = d2.replace(/-/g,'/');
            $(function() {
      $('input[name="daterange"]').daterangepicker({
        opens: 'left',
        startDate:startDate,
        endDate:endDate,
        minDate:today.getFullYear()+"/"+(today.getMonth()+1)+"/"+today.getDate(),
        locale: {
          format: 'YYYY/MM/DD'
          
      }
        
      }, function(start, end, label) {
        d1 = start.format('YYYY-MM-DD');
        d2 = end.format('YYYY-MM-DD');
      });
      
  
  
    });
        
        
    }
    else{
        $(function() {
          $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            autoUpdateInput: false,
             minDate:today.getFullYear()+"/"+(today.getMonth()+1)+"/"+today.getDate(),
             //maxDate:today.getFullYear()+"/"+(today.getMonth())+"/"+today.getDate(),
            locale: {
              cancelLabel: 'Clear',
              format: 'YYYY/MM/DD'
              
          }
            
          }, function(start, end, label) {
            d1 = start.format('YYYY-MM-DD');
            d2 = end.format('YYYY-MM-DD');
          });
          
           $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
      });
      
      
        });
}

    $("body").on("click","#filter_main_div3_filter",function(){
          var type = $( "#type option:selected" ).val();
          var bank_name = $( "#bank_name option:selected" ).val();
          var card_type = $( "#card_type option:selected" ).val();
          var pageid = 1;
          location.assign(`https://giveaways.lk/card-offers-copy.php?p=${pageid}&type=${type}&start_date=${d1}&end_date=${d2}&bank=${bank_name}&card_type=${card_type}`);
        })
    
            /* page navigation with page numbers */
    if (urlParams.get('type')!=null && urlParams.get('type')!=="") {
      var type = encodeURIComponent(urlParams.get('type'));
   }
   else{
      var type = "";
   }
   if (urlParams.get('bank')!=null && urlParams.get('bank')!=="") {
      var bank_name = urlParams.get('bank');
   }
   else{
      var bank_name = "";
   }
   if (urlParams.get('card_type')!=null && urlParams.get('card_type')!=="") {
      var card_type = urlParams.get('card_type');
   }
   else{
      var card_type = "";
   }
   console.log(type);
     $("body").on("click",".page_number_p", function(){
       var pageid = $(this).text();
       
       
       location.assign(`https://giveaways.lk/card-offers-copy.php?p=${pageid}&type=${type}&start_date=${d1}&end_date=${d2}&bank=${bank_name}&card_type=${card_type}`);
    
    
      });
    
    //navigating when page forward button was clicked
      $("body").on("click","#page_forward", function(){
        var pageid = url_page_number + 1;
    
       location.assign(`https://giveaways.lk/card-offers-copy.php?p=${pageid}&type=${type}&start_date=${d1}&end_date=${d2}&bank=${bank_name}&card_type=${card_type}`);
    
      });
      //navigating when page backward button was clicked
      $("body").on("click","#page_backward", function(){
          var pageid = url_page_number - 1;
       
    
       location.assign(`https://giveaways.lk/card-offers-copy.php?p=${pageid}&type=${type}&start_date=${d1}&end_date=${d2}&bank=${bank_name}&card_type=${card_type}`);
    
      });
});



