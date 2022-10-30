
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-SNFN6ZKSHW"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-SNFN6ZKSHW');
</script>
<div id="snow"></div>
<div class="yatra-header-phn">
  <div class="yatra-header">
    <div class="gvs-header gvs-header-lite" data-spm="header" data-tag="links">
      <div id="topActionHeader" class="gvs-header-content-wrap J_NavScroll">
        <div class="gvs-header-content">

          <div class="gvs-links-bar" id="topActionLinks">
              <div class="links-list header-content LK en">
                    <div class="header-content-follow">
                      <h3 class="footer-title">Follow Us</h3>
                      
                        
                        <a class="fa-brands fa-facebook"
                          href="https://www.facebook.com/giveawayssrilanka/" target="_blank" data-spm-click="gostr=/gvspub.footer.sns;locaid=d_fbk"
                        ></a>
                      
                        
                        <a class="fa-brands fa-twitter"
                          href="https://twitter.com/giveawayslk" target="_blank" data-spm-click="gostr=/gvspub.footer.sns;locaid=d_twr"
                        ></a>
                      
                        
                        <a class="fa-brands fa-instagram"
                          href="https://www.instagram.com/giveawayslk/" target="_blank" data-spm-click="gostr=/gvspub.footer.sns;locaid=d_ins"
                        ></a>
                      
                        
                       
                        
                        
                      </div>
                      

                  
              </div>
          </div>
          <div class="gvs-logo-bar">
            <div class="logo-bar-content header-content">
              
                <div class="gvs-logo-content">
                    <a href="https://giveaways.lk/" data-spm="dhome">
                        <img src="images/general/giveawayslk-logo.png" alt="" />
                        <span class="gvs-logo-content-span">Home</span></a>
                        </a>
               </div>
               <div class="gvs-logo-content-menu">
                  <a class="gvs-logo-content-menu-a" href="https://giveaways.lk/display/mobile-menu.php">
                   <i class="fa fa-bars fa-2x"></i>
                      <span class="gvs-logo-content-menu-span">Menu</span>
                  </a>
                </div>
              <div class="search-wrap">
              <div class="gvaws-nav-search"  data-spm="search">
                <form action="https://giveaways.lk/offers.php" method="GET" autocomplete="off">
                  <div class="search-box--2I2a">
                    <div class="search-box__bar--29h6">
                      <input type="search" id="m" name="m" placeholder="Search" class="search-box__input--O34g" tabindex="1" value="">
                    </div>
                    <div class="search-box__search--2fC5">
                      <button class="search-box__button--1oH7" tabindex="2" data-spm-click="">SEARCH</button>
                      </div>
                      <div class="search-box__popup--3Pf1">
                        
                      </div>
                    </div>
                  </form>
              </div>
           </div>

              
              
              
                
              
            </div>
          </div>
        </div>
        
            
        
      </div>
    </div>
    
      
      <div class="gvs-home-page-category">
        




  








  
  



  <div class="mui-zebra-module" id="J_8122147450" data-module-id="8122147450" data-version="5.1.1" data-spm="8122147450">
  

  
  
  
  
  












    












    
        
    








<div class="gvs-site-nav-menu" >
    <div class="gvs-site-menu-nav-container">
        <div class="gvs-site-menu-nav-category">
            <a class="gvs-site-menu-nav-category-label">
                <span class="gvs-site-menu-nav-category-text">Categories</span>
            </a>
            <div class="gvs-site-menu-nav-menu gvs-site-menu-show-category">
                




  








  
  



  <div class="mui-zebra-module" id="J_2174503220" data-module-id="2174503220" data-version="5.1.3" data-spm="2174503220">
  

<div class="gvs-site-nav-menu-dropdown" id="gvs-site-nav-menu-dropdown">
    

    
        
    

    
        
    

    
    
    <ul class="gvs-site-menu-root"  data-spm="cate">
        <?php

         //setting up menu main category according to availablity
            $category = array("Electronic Devices","Electronic Accessories","TV & Home Appliances","Health & Beauty","Babies & Toys","Home & Lifestyle","Womens Fashion","Mens Fashion","Watches & Wearables","Sports & Outdoor","Automotive & Motorbike","Coupons & Promo Codes");
            
            $db_deal_category = "SELECT DISTINCT category FROM deals";
            $db_deal_category_prep = $conn->prepare($db_deal_category);
            $db_deal_category_prep->execute();
            $db_deal_category_fetch = $db_deal_category_prep->fetchAll(PDO::FETCH_COLUMN);

            $db_giveaway_category = "SELECT DISTINCT category FROM giveaways";
            $db_giveaway_category_prep = $conn->prepare($db_giveaway_category);
            $db_giveaway_category_prep->execute();
            $db_giveaway_category_fetch = $db_giveaway_category_prep->fetchAll(PDO::FETCH_COLUMN);

            $total_db_categories =array_unique(array_merge($db_deal_category_fetch,$db_giveaway_category_fetch));
           


            foreach ($category as $key => $value) {
                foreach ($total_db_categories as $x => $y) {
                     if ($value==$y) {
                        print('<li class="gvs-site-menu-root-item" id=Level_1_Category_No'.($key+1).'>
            <a>
                
                     
                        <span>'.$value.'</span>
                     
                
            </a>

         </li>');
                     }
                }
            }


            
        ?>
        
        <?php
        foreach ($category as $key => $value) {
                foreach ($total_db_categories as $x => $y) {
                    if ($value==$y) {

                        //setting up menu sub category and sub sub category according to availablity
          $sub_category = array(array("Mobiles","Tablets","Laptops","Desktops","Gaming Consoles","Cameras","Audio"),array("Mobile Accessories","Gaming Accessories","Camera Accessories","Computer Accessories","Storage Devices","Printers & Fax Machines","Network Accessories"),array("Tv & Video devices","Home Audio","Washing Machines","Refrigerators","Gas Burners","Sewing Machines","Kitchen Appliances","Cooling & Heating","Vacuums & Floor care","Irons"),array("Makeup","Fragrances","Bath & Body","Beauty Tools","Food Supplements"),array("Toys","Maternity Care","Clothing & Accessories"),array("Bath","Bedding","Decor","Furniture","Outdoor Tools","Art & Craft","Music Instruments"),array("Women Clothing","Women Perfumes","Bags","Women Footwear","Lingerie, Sleep & Lounge","Gaming Consoles","Girls Fashion"),array("Men Clothing","Men Perfumes","Wallets & Bags","Men Footwear","Underwear","Other Mens Accessories","Boys Fashion"),array("Mens Watches","Women Watches","Unisex Watches","Kid Watches","Sunglasses","Eyeglasses","Mens Jewelry","Women Jewelry"),array("Men Shoes & Clothing","Women Shoes & Clothing","Outdoor Recreation","Sports Equipment"),array("Automotive"),array("Learning","Food & Drink","Hotels & Travels","Entertainment","Hosting","Auto Care"));
            
            $db_deal_sub_category = "SELECT DISTINCT sub_category  FROM deals";
            $db_deal_sub_category_prep = $conn->prepare($db_deal_sub_category);
            $db_deal_sub_category_prep->execute();
            $db_deal_sub_category_fetch = $db_deal_sub_category_prep->fetchAll(PDO::FETCH_COLUMN);

            $db_giveaway_sub_category = "SELECT DISTINCT sub_category FROM giveaways";
            $db_giveaway_sub_category_prep = $conn->prepare($db_giveaway_sub_category);
            $db_giveaway_sub_category_prep->execute();
            $db_giveaway_sub_category_fetch = $db_giveaway_sub_category_prep->fetchAll(PDO::FETCH_COLUMN);

            $total_db_sub_categories =array_unique(array_merge($db_deal_sub_category_fetch,$db_giveaway_sub_category_fetch));
           
           if(count($total_db_sub_categories)>0){
            print('<ul class="gvs-site-menu-sub Level_1_Category_No'.($key+1).'" data-spm="cate_'.($key+1).'">');
            foreach ($sub_category[$key] as $sub_key => $sub_value) {
                foreach ($total_db_sub_categories as $sub_x => $sub_y) {
                     if ($sub_value==$sub_y) {
                        print('<li class="gvs-site-menu-sub-item" data-cate="cate_'.($key+1).'_'.($sub_key+1).'">
                                        <a href="offers.php?m='.urlencode($sub_value).'">
                                <span>'.$sub_value.'</span>
                            </a>');

                        $db_deal_sub_sub_category = "SELECT DISTINCT sub_sub_category  FROM deals WHERE sub_category=:sub_category AND sub_sub_category IS NOT NULL";
                        $db_deal_sub_sub_category_prep = $conn->prepare($db_deal_sub_sub_category);
                        $db_deal_sub_sub_category_prep->bindValue(':sub_category',$sub_value);
                        $db_deal_sub_sub_category_prep->execute();
                        $db_deal_sub_sub_category_fetch = $db_deal_sub_sub_category_prep->fetchAll(PDO::FETCH_COLUMN);

                        $db_giveaway_sub_sub_category = "SELECT DISTINCT sub_sub_category FROM giveaways WHERE sub_category=:sub_category AND sub_sub_category IS NOT NULL";
                        $db_giveaway_sub_sub_category_prep = $conn->prepare($db_giveaway_sub_sub_category);
                        $db_giveaway_sub_sub_category_prep->bindValue(':sub_category',$sub_value);
                        $db_giveaway_sub_sub_category_prep->execute();
                        $db_giveaway_sub_sub_category_fetch = $db_giveaway_sub_sub_category_prep->fetchAll(PDO::FETCH_COLUMN);

                        $total_db_sub_sub_categories =array_unique(array_merge($db_deal_sub_sub_category_fetch,$db_giveaway_sub_sub_category_fetch));
                        if(count($total_db_sub_sub_categories)>0){ 
                            print('<ul class="gvs-site-menu-grand" data-spm="cate_'.($key+1).'_'.($sub_key+1).'">');
                            
                            foreach($total_db_sub_sub_categories as $m => $n){
                               print('<li class="gvs-site-menu-grand-item">
                                        <a href="offers.php?m='.urlencode($n).'">
                                            <span>'.$n.'</span>
                                        </a>
                                    </li>');
                            
                            }
                            print('</ul>');
                       }
                       print('</li>');
                     }
                }
            }
            print('</ul>');
           }



                    }
                }
            }

         

            


            
        ?> 
        


        
        
      </ul> 
    
</div>

  </div>





            </div>
        </div>

   
    </div>
</div>




  </div>





      </div>
      
    
  </div>
</div>


  </div>



  </div>






<!---getting details for counter --->
<?php 
$actived="SELECT tittle FROM deals";
$actived_prep=$conn->prepare($actived);
$actived_prep->execute();
$actived_prep_fetch = $actived_prep->setFetchMode(PDO::FETCH_ASSOC);

$expired="SELECT tittle FROM expired_deals";
$expired_prep=$conn->prepare($expired);
$expired_prep->execute();
$expired_prep_fetch = $expired_prep->setFetchMode(PDO::FETCH_ASSOC);

$pendingd="SELECT tittle FROM pending_deals";
$pendingd_prep=$conn->prepare($pendingd);
$pendingd_prep->execute();
$pendingd_prep_fetch = $pendingd_prep->setFetchMode(PDO::FETCH_ASSOC);

$active_deals = $actived_prep->rowCount();
$expired_deals = $expired_prep->rowCount();
$pendingd_deals = $pendingd_prep->rowCount();
$total_deals = $active_deals + $expired_deals + $pendingd_deals;

$activeg="SELECT company_name FROM giveaways";
$activeg_prep=$conn->prepare($activeg);
$activeg_prep->execute();
$activeg_prep_fetch = $activeg_prep->setFetchMode(PDO::FETCH_ASSOC);

$expireg="SELECT tittle FROM expired_giveaways";
$expireg_prep=$conn->prepare($expireg);
$expireg_prep->execute();
$expireg_prep_fetch = $expireg_prep->setFetchMode(PDO::FETCH_ASSOC);

$active_giveaways = $activeg_prep->rowCount();
$expired_giveaways = $expireg_prep->rowCount();
$total_giveaways = $active_giveaways + $expired_giveaways;

$card_offers = "SELECT bank FROM card_offers";
$card_offers_prep=$conn->prepare($card_offers);
$card_offers_prep->execute();
$card_offers_prep_fetch=$card_offers_prep->setFetchMode(PDO::FETCH_ASSOC);

$card_offerse = "SELECT bank FROM expired_card_offers";
$card_offerse_prep=$conn->prepare($card_offerse);
$card_offerse_prep->execute();
$card_offerse_prep_fetch=$card_offerse_prep->setFetchMode(PDO::FETCH_ASSOC);

$active_card_offers = $card_offers_prep->rowCount();
$expired_card_offers = $card_offerse_prep->rowCount();

$total_card_offers = $active_card_offers + $expired_card_offers;

/*counting total discount avialable */
$old_price = "SELECT SUM(old_price) FROM deals";
$old_price_prep=$conn->prepare($old_price);
$old_price_prep->execute();
$old_price_prep_fetch=$card_offerse_prep->setFetchMode(PDO::FETCH_ASSOC);

$discount_price = "SELECT SUM(discount_price) FROM deals";
$discount_price_prep=$conn->prepare($discount_price);
$discount_price_prep->execute();
$total_d = $discount_price_prep->fetch(PDO::FETCH_NUM);

$old_price = "SELECT SUM(old_price) FROM deals";
$old_price_prep=$conn->prepare($old_price);
$old_price_prep->execute();
$total_o = $old_price_prep->fetch(PDO::FETCH_NUM);


$total_old_price = $total_o[0];
$total_discount_price = $total_d[0];
$total_discount = $total_old_price - $total_discount_price;


?>











<div class="hp-mod-card card-banner-slider J_NavScroll hp-mod-card_lk" data-module-id="bannerSlider" data-spm="top">
  <section
    class="J_BannerSlider card-banner-slider-section"
    data-mode-name="banner-slider"
    
    
  >
    <div class="J_Content card-banner-slider-content">
      <div class="J_MuiSlider card-banner-slider-list">
        
          
            <div class="J_Item card-banner-slider-item"  data-index="0" style="background: #facfdc">
              <div class="card-banner-slider-main-span">
                
                  <div class="main-counter">
                     <div class="main-counter-div1">
                         <div class ="main-counter-giveaways">
                             <p class="counter" data-target="<?php  print($total_giveaways); ?>">0</p>
                             <p class="counter_p">Giveaways Promoted</p>
        
                         </div>
                         <div class ="main-counter-card">
                             <p class="counter" data-target="<?php  print($total_card_offers); ?>">0</p>
                             <p class="counter_p">Card Offers Given</p>
                             
                         </div>
                         <div class ="main-counter-deals">
                             <p class="counter" data-target="<?php  print($total_deals); ?>">0</p>
                             <p class="counter_p">Deals Available</p>
                         </div>
                         
                     </div>
                    <div class ="main-counter-div2">
                         <p class="main-counter-div2-p"><?php  print(ceil($total_discount/1000)); ?> K Worth Total Discounts Available Right Now</p>
                   </div>
                 </div>
                
                
              </div>
            </div>
          
        
      </div>

    </div>
  </section>
</div>

<script>
    // Selector
const counters = document.querySelectorAll('.counter');
// Main function
for(let n of counters) {
  const updateCount = () => {
    const target = + n.getAttribute('data-target');
    const count = + n.innerText;
    const speed = 5000; // change animation speed here
    const inc = target / speed; 
    if(count < target) {
      n.innerText = Math.ceil(count + inc);
      setTimeout(updateCount, 1);
    } else {
      n.innerText = target;
    }
  }
  updateCount();
}
</script>


