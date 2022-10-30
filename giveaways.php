
<!DOCTYPE HTML>
<?php 
include 'includes/general-connect.php';


?>

<html lang="en">
<head>
 <meta charset="utf-8">
<meta name="keywords" content="">
<meta name="description" content="Find out promotional giveaways to win free gifts.win apple iphones,samsung phones,free cash,ps5,xbox,gaming pc,laptops by joining international giveaway contests">
  
  
  
  
<meta property="og:url" content="https://giveaways.lk/" />
<meta property="og:type" content="website">
<meta property="og:title" content="promotional giveaways to win free gifts | Giveaways.lk" />
<meta property="og:description" content="Find out promotional giveaways to win free gifts.win apple iphones,samsung phones,free cash,ps5,xbox,gaming pc,laptops by joining international giveaway contests" />
<meta property="og:image" content="https://giveaways.lk/images/general/giveawayslk-logo-og.png">








<title>promotional giveaways to win free gifts | Giveaways.lk</title>
<link rel="shortcut icon" href="images/general/giveawayslk-logo.png">
  
  
  

 <link rel="stylesheet" href="css/giveaways.css">
 <link rel="stylesheet" href="css/mobile.css">
<link rel="stylesheet" href="css/giveaways-searchbox.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/brands.min.css">

</head>
<body>
  


<?php include 'display/header.php' ?>




<div class="page regional_lk" style="">
  
<?php include 'display/popular_categories.php' ?>



<?php 
if(!isset($_GET["p"])){
  $page_number = 1;
}
else{
  $page_number = (int)$_GET["p"];
}
if(!isset($_GET["count"])){
  $count = 12;
}
else{
  $count = $_GET["count"];
}

/*giveaways details*/
$giveaways = "SELECT company_name,logo,cover_photo,link FROM giveaways";
$giveaway_prep=$conn->prepare($giveaways);
$giveaway_prep->execute();
$giveaway_prep_fetch=$giveaway_prep->setFetchMode(PDO::FETCH_ASSOC);

$x=0; 
$i=0;
print($giveaway_prep->rowCount());
if($giveaway_prep->rowCount()>0){
    print(' <div class="hp-mod-card card-official-stores J_OfficialStores J_NavChangeHook"  id="hp-official-stores" data-spm="officialStores" data-spm-max-idx="12">
  <div class="hp-mod-card-header">
    <h3 class="hp-mod-card-title" style="color: daily">Giveaways</h3>
  </div>
    <div class="card-official-stores-content J_OfficialStoresItems">
        
        
        
        <section class="banner-slider" id="officialSlide">
          ');
 
  while($x<2){

     print('<div class="card-official-stores-wrapper" data-tag="shops">');
    $carousel_count = 1;
    while ($carousel_count<7) {
        $i++;
       $carousel_1=$giveaway_prep->fetch();
       if($i<=$count*($page_number-1)){
            continue;
            }
       

       if($carousel_1){

        print('<a class="card-official-stores-box hp-mod-card-hover align-left giveaway-card" href="'.$carousel_1['link'].'"  title="'.$carousel_1['company_name'].'" target="blank">
                <div class="card-official-stores-brand-overlay"></div>
                <div class="card-official-stores-brand-img">
                  <img src="images/giveaways/cover/'.$carousel_1['cover_photo'].'" class="image" alt="'.$carousel_1['company_name'].'" data-spm-anchor-id="a2a0e.home.officialStores.i0.30544625xec7kq">
                </div>
                <div class="card-official-stores-shop-img">
                  <img src="images/giveaways/logo/'.$carousel_1['logo'].'" class="image" alt="Vantime Store">
                </div>
                <div class="card-official-stores-h1"> '.$carousel_1['company_name'].' </div>
                
              </a>

      ');

       }

        
         $carousel_count++;
       
     }
    print('</div>');
     $x++;
     }
         
   print(' </div>
        </section>
        
      </div>
</div> ');
}
else{
    print('<div class="no_result"><p class="no_result_p">Sorry there are no results available for above filters!</p></div>');
}

/*------giveaway details -------

if($giveaway_prep->rowCount()>0){

  print('
     <div class="hp-mod-card card-official-stores J_OfficialStores J_NavChangeHook"  id="hp-official-stores" data-spm="officialStores" data-spm-max-idx="12">
  <div class="hp-mod-card-header">
    <h3 class="hp-mod-card-title" style="color: daily">Giveaways</h3>
  </div>
    <div class="card-official-stores-content J_OfficialStoresItems">
        
        
        
        <section class="banner-slider" id="officialSlide">
          <div class="card-official-stores-wrapper" data-tag="shops">



    ');
        
        $carousel_count = 0;
           while ($carousel_1=$giveaway_prep->fetch()) {
            $carousel_count++; 
              if($carousel_count-1 < $count*($page_number-1)){
            continue;
            }
              if(($count*$page_number)==$carousel_count-1){
                 break;
              }
          
        
            print(' <a class="card-official-stores-box hp-mod-card-hover align-left" href="'.$carousel_1['link'].'"  title="'.$carousel_1['company_name'].'" target="blank">
                <div class="card-official-stores-brand-overlay"></div>
                <div class="card-official-stores-brand-img">
                  <img src="images/giveaways/cover/'.$carousel_1['cover_photo'].'" class="image" alt="'.$carousel_1['company_name'].'" data-spm-anchor-id="a2a0e.home.officialStores.i0.30544625xec7kq">
                </div>
                <div class="card-official-stores-shop-img">
                  <img src="images/giveaways/logo/'.$carousel_1['logo'].'" class="image" alt="Vantime Store">
                </div>
                <div class="card-official-stores-h1"> '.$carousel_1['company_name'].' </div>
                
              </a>
      ');
              
           }
    
   print(' </div>
        </section>
        
      </div>
</div> ');
}

-*/

?>   
<?php
if(!isset($_GET["count"])){
  $count = 12;
}
else{
  $count = $_GET["count"];
}

if(!isset($_GET["p"])){
  $page_number = 1;
}
else{
  $page_number = (int)$_GET["p"];
}



/*calculating how many pages needed to display all women jewelries*/
$pages_needed = (int)ceil($giveaway_prep->rowCount()/ $count);


?>
<div class="page_number"><!--contains page numbering-->
         <i class="fa fa-angle-left fa-lg" id="page_backward"></i>
          <?php 
             $n=1;
             while ($n<=$pages_needed) {
              if ($n==6||($page_number+($n-4))==($pages_needed+1)) {
                break;
              }
              if($page_number<5){
               print("<p class='page_number_p' id='page_number_p".$n."'>".$n."</p>");
             } 
              else{
               print("<p class='page_number_p' id='page_number_p".($page_number+($n-4))."'>".($page_number+($n-4))."</p>");
              }
              $n++;
             }

          ?>
         <i class="fa fa-angle-right fa-lg" id="page_forward"></i>
</div>
            
  




  
</div>
<?php include 'display/footer.php' ?>
 
  

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/search.js"></script>
<script src="js/giveaways.js"></script>
<script type="text/javascript">
var sitting_page_id = "page_number_p"+url_page_number;
document.getElementById(sitting_page_id).style.color = "#FFFFFF";
document.getElementById(sitting_page_id).style.backgroundColor = "#1a9cb7";

//hide backward button when the page number is 1
if(url_page_number==1){
    $("#page_backward").hide();
}
//hide  forward button when there is only 1 page
if($(".page_number_p").text()==1){
  $("#page_forward").hide();
}
//hide forward button when max page was reached
if(<?php echo $pages_needed ?>==url_page_number){
     $("#page_forward").hide();
}




</script>







  
    




    
  



  




  

  

</body>
</html>









