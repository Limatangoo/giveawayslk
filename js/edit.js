$(document).ready(function() { 
    $("#m").keyup(function(){
         var q = $(this).val();
        $.ajax({url: "https://giveaways.lk/admin/edit-task.php", method: "POST",
            data: { q : q}, 
                success: function(result){
                if(result.length>0 && q.length>0){
                $(".search_result_middle_ajx").show(); 
                $(".search_result_middle_ajx").html(result);
               // $(".search_result_middle_ajx").html("pakayua");


                }
                else{
                 $(".search_result_middle_ajx").hide(); 
                }
               },
            error:function(xhr){
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        });
    })



});


