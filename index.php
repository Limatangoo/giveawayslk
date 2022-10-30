<?php 
include 'includes/general-connect.php';
include 'includes/dollar-rate.php';

?>
<!DOCTYPE HTML>
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
<link rel="stylesheet" href="css/mobile.css">
<link rel="stylesheet" href="css/giveaways-searchbox.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/brands.min.css">
<link rel="stylesheet" href="css/snow.css">

</head>
<body>
  
  
<?php include 'display/header.php'; ?>



<div class="page regional_lk" style="">
  

<?php include 'display/popular_categories.php' ?>

<?php 

/*giveaways details*/
$giveaways = "SELECT company_name,logo,cover_photo,link FROM giveaways";
$giveaway_prep=$conn->prepare($giveaways);
$giveaway_prep->execute();
$giveaway_prep_fetch=$giveaway_prep->setFetchMode(PDO::FETCH_ASSOC);


if($giveaway_prep->rowCount()>0){

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



    ');
        

$i=0;
  while($i<2){
      print('<div class="card-official-stores-wrapper" data-tag="shops">');
        $carousel_count = 1;
           while ($carousel_count < 7) {
            $carousel_1=$giveaway_prep->fetch();
        
            print(' <a class="card-official-stores-box hp-mod-card-hover align-left giveaway-card" href="'.$carousel_1['link'].'"  title="'.$carousel_1['company_name'].'" target="blank">
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
             $carousel_count++;  
           }
           print('</div>');
           $i++;
}
    
   print('
        </section>
        
      </div>
</div> ');
}



?>   
<?php 

/*bank offer details*/
$card_offers = "SELECT bank,tittle,card_type,proccessor_type,percentage,cover_photo,link FROM card_offers ORDER BY percentage DESC";
$card_offers_prep=$conn->prepare($card_offers);
$card_offers_prep->execute();
$card_offers_prep_fetch=$card_offers_prep->setFetchMode(PDO::FETCH_ASSOC);

$card_offers_1 = "SELECT bank,tittle,card_type,proccessor_type,percentage,cover_photo,link FROM card_offers WHERE sub_category=:sub_category ORDER BY percentage DESC";
$card_offers_prep_1=$conn->prepare($card_offers_1);
$card_offers_prep_1->bindValue(':sub_category',"Food & Drink");
$card_offers_prep_1->execute();
$card_offers_prep_fetch_1=$card_offers_prep_1->setFetchMode(PDO::FETCH_ASSOC);

if($card_offers_prep->rowCount()>0){

  print('
     <div class="hp-mod-card card-official-stores J_OfficialStores J_NavChangeHook"  id="hp-official-stores" data-spm="officialStores" data-spm-max-idx="7">
  <div class="hp-mod-card-header">
    <h3 class="hp-mod-card-title" style="color: daily">Bank Offers</h3>
      <a href="card-offers.php" class="hp-mod-card-shop-all J_ShopMore" style="color: daily">
      <span class="text">See More</span>
     <i class="fa fa-chevron-right"></i>
    </a>
  </div>
    <div class="card-official-stores-content J_OfficialStoresItems">
        
        
        
        <section class="banner-slider" id="officialSlide">

    ');
    $i=0;
        while($i<1){
         print('<div class="card-official-stores-wrapper" data-tag="shops">');
        $carousel_count = 1;
           while ($carousel_count < 7) {
           $carousel_1=$card_offers_prep->fetch();
   
        
            print(' <a class="card-official-stores-box hp-mod-card-hover align-left bank-offers" href="'.$carousel_1['link'].'"  title="'.$carousel_1['bank'].'" target="blank">
                <div class="card-official-stores-brand-overlay"></div>
                <div class="card-official-stores-brand-img">
                  <img src="images/card_offers/'.$carousel_1['cover_photo'].'" class="image" alt="'.$carousel_1['tittle'].'" data-spm-anchor-id="a2a0e.home.officialStores.i0.30544625xec7kq">
                </div>
                <div class="card-official-stores-discount-img">
                  <img src="images/general/discounted.png" class="discount-image" >
                </div>
                 <div class="card-official-stores-discount-percentage">
                  <p class="card-official-stores-discount-percentage-p">'.$carousel_1['percentage'].'<span class="card-official-stores-discount-percentage-span">%</span></p>
                </div>
                <div class="card-official-stores-shop-img">
                  <img src="images/bank_logos/'.$carousel_1['bank'].'.jpg" class="image" alt="Vantime Store">
                </div>
                <div class="card-official-stores-h1"> '.ucfirst($carousel_1['tittle']).' </div>
                <p class="card-official-stores-p"> '.$carousel_1['bank'].' '.$carousel_1['card_type'].' Card </p>
                <p class="card-official-stores-p"> '.$carousel_1['proccessor_type'].' </p>
              </a>
      ');
             $carousel_count++;  
           }
           print('</div>');
           $i++;
           }
           
                      $i=0;
            while($i<1){
         print('<div class="card-official-stores-wrapper" data-tag="shops">');
        $carousel_count = 1;
           while ($carousel_count < 7) {
           $carousel_1_1=$card_offers_prep_1->fetch();
   
        
            print(' <a class="card-official-stores-box hp-mod-card-hover align-left bank-offers" href="'.$carousel_1_1['link'].'"  title="'.$carousel_1_1['bank'].'" target="blank">
                <div class="card-official-stores-brand-overlay"></div>
                <div class="card-official-stores-brand-img">
                  <img src="images/card_offers/'.$carousel_1_1['cover_photo'].'" class="image" alt="'.$carousel_1_1['tittle'].'" data-spm-anchor-id="a2a0e.home.officialStores.i0.30544625xec7kq">
                </div>
                <div class="card-official-stores-discount-img">
                  <img src="images/general/discounted.png" class="discount-image" >
                </div>
                 <div class="card-official-stores-discount-percentage">
                  <p class="card-official-stores-discount-percentage-p">'.$carousel_1_1['percentage'].'<span class="card-official-stores-discount-percentage-span">%</span></p>
                </div>
                <div class="card-official-stores-shop-img">
                  <img src="images/bank_logos/'.$carousel_1_1['bank'].'.jpg" class="image" alt="Vantime Store">
                </div>
                <div class="card-official-stores-h1"> '.ucfirst($carousel_1_1['tittle']).' </div>
                <p class="card-official-stores-p"> '.$carousel_1_1['bank'].' '.$carousel_1_1['card_type'].' Card </p>
                <p class="card-official-stores-p"> '.$carousel_1_1['proccessor_type'].' </p>
              </a>
      ');
             $carousel_count++;  
           }
           print('</div>');
           $i++;
           }
    
   print(' 
        </section>
        
      </div>
</div> ');
}


?>
            

            
  


<!-- best deals start point--->
<?php  
/*deals*/
$trending_deals = "SELECT tittle,currency,old_price,discount_price,img1,link FROM deals WHERE trending='yes'";
$trending_deals_prep=$conn->prepare($trending_deals);
$trending_deals_prep->execute();
$trending_deals_prep_fetch=$trending_deals_prep->setFetchMode(PDO::FETCH_ASSOC);
$total_deals = $trending_deals_prep->rowCount();

if($total_deals>0){

  print('
     <div class="hp-mod-card card-jfy J_JFY J_NavChangeHook" >
  <div class="hp-mod-card-header">
    <h3 class="hp-mod-card-title">Best Deals</h3>
  </div>
      
    
    ');
  $i=1;
  while($i<=ceil($total_deals/6)){
    if($i==4){
      break;
    }
     print('<div class="card-jfy-row J_Row'.$i.'" >');
        $carousel_count = 1;
        while ($carousel_count<7) {

        if($carousel_1=$trending_deals_prep->fetch()){
           
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
        <span class="currency">Rs. </span><span class="price" id="discounted_price">'.$carousel_1['discount_price'].'</span>
      </div>
    
        <div class="hp-mod-price-second-line"><span class="hp-mod-price-text align-left">
      <span class="currency"></span><span class="price" id="old_price">'.$carousel_1['old_price'].'</span>
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
}



?>   
<div class="LoadAJX" id="LoadAJX1"></div>
    </div>
  </div>
    <div class="card-jfy-load-more J_LoadMore">
      <a class="button J_LoadMoreButton">Load More</a>
    </div>
  </div>
</div>

<!--Best deals end point --->


  
</div>

<?php include 'display/footer.php' ?>
 

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/search.js"></script>
<!--<script type="text/javascript" src="js/snow.js"></script>-->






  
    




    
  



  




  

  

</body>
</html>









