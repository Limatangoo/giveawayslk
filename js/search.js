$(document).ready(function() { 
	$("#m").keyup(function(){
         var q = $(this).val();
		$.ajax({url: "https://giveaways.lk/includes/searchfile.php", method: "POST",
			data: { q : q}, 
				success: function(result){
				if(result.length>0 && q.length>0){
				$(".search-box__popup--3Pf1").html("<div class='suggest-list--3Tm8'></div>");
				$(".suggest-list--3Tm8").html(result);


				}
				else{
				$(".suggest-list--3Tm8").slideUp();
				}},
			error:function(xhr){
			alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});
	})

	$(document).click(function(e) { 
      var container = $(".search-box__bar--29h6");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
         $(".suggest-list--3Tm8").slideUp();
      }
      
      
     
      
    });
      

});


