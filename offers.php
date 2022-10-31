<?php 

$menu = $_GET['m'] ?? "";

$page_number = $_GET["p"] ?? 1;

if($menu==""){

   header("location:index.php"); 

}

if(!isset($_GET["count"])){

  $count = 18;

}

else{

  $count = $_GET["count"];

}



?>

<!DOCTYPE HTML>

<?php 

include 'databaseConnections/general-connect.php';

include 'includes/dollar-rate.php';





?>



<html lang="en">

<head>

<meta charset="utf-8">

<meta name="keywords" content="">

<meta name="description" content="Find out black friday offers online and enjoy free items by joining giveaways.daily updated offers with huge black friday discounts, coupons and promo codes">

  

  

  

  

<meta property="og:url" content="https://giveaways.lk/" />

<meta property="og:type" content="website">

<meta property="og:title" content="Free giveaways & exclusive offers platform | Giveaways.lk" />

<meta property="og:description" content="Find out black friday offers online and enjoy free items by joining giveaways.daily updated offers with huge black friday discounts, coupons and promo codes" />

<meta property="og:image" content="https://giveaways.lk/images/general/giveawayslk-logo-og.png">

















<title>Free giveaways & exclusive offers platform | Giveaways.lk</title>

<link rel="shortcut icon" href="images/general/giveawayslk-logo.png">

  

  

  

<link rel="stylesheet" href="css/index.css">

<link rel="stylesheet" href="css/offers.css">

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

if(isset($menu) && $menu!==""){



$menud="SELECT tittle,currency,old_price,discount_price,img1,link FROM deals WHERE keywords LIKE '%".$menu."%' ";

$menud_prep=$conn->prepare($menud);

$menud_prep->execute();

$menud_prep_fetch = $menud_prep->setFetchMode(PDO::FETCH_ASSOC);





$menug="SELECT company_name,logo,cover_photo,link FROM giveaways WHERE keywords LIKE '%".$menu."%' ";

$menug_prep=$conn->prepare($menug);

$menug_prep->execute();

$menug_prep_fetch = $menug_prep->setFetchMode(PDO::FETCH_ASSOC);







 }



/*giveaways details*/



if($menug_prep->rowCount()>0){



  print('

     <div class="hp-mod-card card-official-stores J_OfficialStores J_NavChangeHook"  id="hp-official-stores" data-spm="officialStores" data-spm-max-idx="7">

  <div class="hp-mod-card-header">

    <h3 class="hp-mod-card-title" style="color: daily">Giveaways</h3>

      <a href="https://giveaways.lk/giveaways.php" class="hp-mod-card-shop-all J_ShopMore" style="color: daily">

      <span class="text">See More</span>

     <i class="fa fa-chevron-right"></i>

    </a>

  </div>

    <div class="card-official-stores-content J_OfficialStoresItems">

        

        

        

        <section class="banner-slider" id="officialSlide">

          <div class="card-official-stores-wrapper" data-tag="shops">







    ');

        

        $carousel_count = 1;

           while ($carousel_1=$menug_prep->fetch()) {

            if($carousel_count > 7){

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

                <p class="card-official-stores-p"> Official store </p>

              </a>

      ');

             $carousel_count++;  

           }

    

   print(' </div>

        </section>

        

      </div>

</div> ');

}







?>   



            



            

  





<!-- best deals start point--->

<?php  

/*deals*/



if($menud_prep->rowCount()>0){



  print('

     <div class="hp-mod-card card-jfy J_JFY J_NavChangeHook" >

  <div class="hp-mod-card-header">

    <h3 class="hp-mod-card-title">Best Deals</h3>

  </div>

      

    

    ');



  $i=1;

  while($i<=3){

     print('<div class="card-jfy-row J_Row'.$i.'" >');

        $carousel_count = 1;

        $x=0;

        while ($carousel_count<7) {



        if($carousel_1=$menud_prep->fetch()){

          $x++;

            if($x-1 < $count*($page_number-1) ){

              continue;

            }

            if(($count*$page_number)==$x-1){

               break;

            }

            if($carousel_1['currency']=="$"){

                $old_price = $dollar_rate*$carousel_1['old_price'];

                $discounted_price = $dollar_rate*$carousel_1['discount_price'];

          }

          else{

            $old_price = $carousel_1['old_price'];

            $discounted_price = $carousel_1['discount_price'];

          }

              $percentage = round((($carousel_1['old_price']-$carousel_1['discount_price'])/$carousel_1['old_price'])*100);

            print('

                    <div class="card-jfy-item-wrapper hp-mod-card-hover J_Items inline">

        <a href="'.$carousel_1['link'].'" target="blank">

          <div class="card-jfy-item">

            

      <div class="card-jfy-image card-jfy-image-background J_GridImage">

        <img class="image" src="images/deals/'.$carousel_1['img1'].'" alt="'.$carousel_1['tittle'].'">

      </div>

    

            <div class="card-jfy-item-desc">

              

      <div class="card-jfy-segment">

      </div>

    

              

      <div class="card-jfy-title"><span class="title">'.$carousel_1['tittle'].'</span></div>

    

              

      <div class="hp-mod-price">

        

      <div class="hp-mod-price-first-line">

        <span class="currency">Rs. </span><span class="price" id="discounted_price">'.$discounted_price.'</span>

      </div>

    

        <div class="hp-mod-price-second-line"><span class="hp-mod-price-text align-left">

      <span class="currency"></span><span class="price" id="old_price">'.$old_price.'</span>

      </span>

      <span class="hp-mod-discount align-left"> -'.$percentage.'%</span></div>

      </div>

    

              

     

    

            </div>

          </div>

        </a>

      </div>



      ');





        }

       

    

             

           

            $carousel_count++;

    }

    print('</div>');

     $i++;

 }

   

    print('</div>');

     $i++;

 

}



else{

  print('<div class="no_result"><p class="no_result_p">Sorry there are no results available for your search!</p></div>');

}



?>   

<?php

if(!isset($_GET["count"])){

  $count = 18;

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

$pages_needed = (int)ceil($menud_prep->rowCount()/ $count);





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

  </div>

    

  </div>

</div>



<!--Best deals end point --->





 

<!--trending now end point -->   

  

</div>



<?php include 'display/footer.php' ?>



<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript" src="js/index.js"></script>

<script type="text/javascript" src="js/offers.js"></script>

<script type="text/javascript" src="js/search.js"></script>

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



















