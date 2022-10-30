<?php include '../includes/general-connect.php' ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
<link rel="stylesheet" href="../css/mobile-menu.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/brands.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<section class="menu-sticky">
    <div class="menu-sticky-back-header">
       <div class="menu-sticky-back">
           <i class="fa fa-arrow-left"></i>
       </div>
        <div class="menu-sticky-header">
            <p class="menu-sticky-header-p"></p>
        </div>
    </div>
    <div class="header-content-follow">
     <div class="header-content-follow-p">
         <p class="footer-title">Follow Us</p>
     </div>
     <div class="header-content-follow-icons">
        <a class="fa-brands fa-facebook" href="" target="_blank" data-spm-click="gostr=/gvspub.footer.sns;locaid=d_fbk"></a>
      
        
        <a class="fa-brands fa-twitter" href="" target="_blank" data-spm-click="gostr=/gvspub.footer.sns;locaid=d_twr"></a>
      
        
        <a class="fa-brands fa-instagram" href="" target="_blank" data-spm-click="gostr=/gvspub.footer.sns;locaid=d_ins"></a>
      
        
        <a class="fa-brands fa-youtube" href=""></a>
                      
      </div> 
                          
                        
    </div>
    

</section>




<section class="left-right-nav-bar">
    <div class="left-right-nav-bar-border-column">
        <div class="left-right-nav-bar-border-row"> 
            <section class="left-nav-bar">
                    <div class="left-nav-bar-scroller">
                        <?php

         //setting up menu main category according to availablity
            $category = array("Electronic Devices","Electronic Accessories","TV & Home Appliances","Health & Beauty","Babies & Toys","Home & Lifestyle","Womens Fashion","Mens Fashion","Watches & Wearables","Sports & Outdoor","Automotive & Motorbike","Coupons & Promo Codes");

            $svg_class = array("bi-phone","bi-boombox","bi-tv","bi-shield-plus","bi-dribbble","bi-house-door","bi-bag","bi-briefcase","bi-smartwatch","bi-tools","bi-truck","bi-cash-coin");  
             $svg_path_d1 = array("M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z","M14 0a.5.5 0 0 1 .5.5V2h.5a1 1 0 0 1 1 1v11a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h12.5V.5A.5.5 0 0 1 14 0Zm0 3H1v3h14V3h-1Zm1 4H1v7h14V7Zm-3.5 5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM6 10.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm1 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm5 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM2.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Zm2 0a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Zm7.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Zm1.5.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM5 10.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM6.5 4a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3Z","M2.5 13.5A.5.5 0 0 1 3 13h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zM13.991 3l.024.001a1.46 1.46 0 0 1 .538.143.757.757 0 0 1 .302.254c.067.1.145.277.145.602v5.991l-.001.024a1.464 1.464 0 0 1-.143.538.758.758 0 0 1-.254.302c-.1.067-.277.145-.602.145H2.009l-.024-.001a1.464 1.464 0 0 1-.538-.143.758.758 0 0 1-.302-.254C1.078 10.502 1 10.325 1 10V4.009l.001-.024a1.46 1.46 0 0 1 .143-.538.758.758 0 0 1 .254-.302C1.498 3.078 1.675 3 2 3h11.991zM14 2H2C0 2 0 4 0 4v6c0 2 2 2 2 2h12c2 0 2-2 2-2V4c0-2-2-2-2-2z","M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z","M8 0C3.584 0 0 3.584 0 8s3.584 8 8 8c4.408 0 8-3.584 8-8s-3.592-8-8-8zm5.284 3.688a6.802 6.802 0 0 1 1.545 4.251c-.226-.043-2.482-.503-4.755-.217-.052-.112-.096-.234-.148-.355-.139-.33-.295-.668-.451-.99 2.516-1.023 3.662-2.498 3.81-2.69zM8 1.18c1.735 0 3.323.65 4.53 1.718-.122.174-1.155 1.553-3.584 2.464-1.12-2.056-2.36-3.74-2.551-4A6.95 6.95 0 0 1 8 1.18zm-2.907.642A43.123 43.123 0 0 1 7.627 5.77c-3.193.85-6.013.833-6.317.833a6.865 6.865 0 0 1 3.783-4.78zM1.163 8.01V7.8c.295.01 3.61.053 7.02-.971.199.381.381.772.555 1.162l-.27.078c-3.522 1.137-5.396 4.243-5.553 4.504a6.817 6.817 0 0 1-1.752-4.564zM8 14.837a6.785 6.785 0 0 1-4.19-1.44c.12-.252 1.509-2.924 5.361-4.269.018-.009.026-.009.044-.017a28.246 28.246 0 0 1 1.457 5.18A6.722 6.722 0 0 1 8 14.837zm3.81-1.171c-.07-.417-.435-2.412-1.328-4.868 2.143-.338 4.017.217 4.251.295a6.774 6.774 0 0 1-2.924 4.573z","M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z","M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z","M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z","M9 5a.5.5 0 0 0-1 0v3H6a.5.5 0 0 0 0 1h2.5a.5.5 0 0 0 .5-.5V5z","M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z","M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z","M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z");

             $svg_path_d2 = array("M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z","","","M8 4.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V9a.5.5 0 0 1-1 0V7.5H6a.5.5 0 0 1 0-1h1.5V5a.5.5 0 0 1 .5-.5z","","","","","M4 1.667v.383A2.5 2.5 0 0 0 2 4.5v7a2.5 2.5 0 0 0 2 2.45v.383C4 15.253 4.746 16 5.667 16h4.666c.92 0 1.667-.746 1.667-1.667v-.383a2.5 2.5 0 0 0 2-2.45V8h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5H14v-.5a2.5 2.5 0 0 0-2-2.45v-.383C12 .747 11.254 0 10.333 0H5.667C4.747 0 4 .746 4 1.667zM4.5 3h7A1.5 1.5 0 0 1 13 4.5v7a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 11.5v-7A1.5 1.5 0 0 1 4.5 3z","","","M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z");
              
            
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
                        print('<div class="left-nav-bar-square" id=Level_1_Category_No'.($key+1).'>
                            <div class="left-nav-bar-div2">
                                <div class="left-nav-bar-div3">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi '.$svg_class[$key].' left-nav-bar-square-svg" viewBox="0 0 16 16">
                                          <path d="'.$svg_path_d1[$key].'"/>
                                          <path d="'.$svg_path_d2[$key].'"/>
                                        </svg>
                                    </span>
                                    <span class="left-nav-bar-square-dsc">'.$value.'</span>
                                </div>
                            </div>
                     
                
            
                      </div>');
                     }
                }
            }


            
        ?>
                        
                       
                        
                    
                    </div>  
            </section>



        <section class="right-nav-bar">
            <div class="right-nav-bar-scroller">
                <?php
        foreach ($category as $key => $value) {
                foreach ($total_db_categories as $x => $y) {
                    if ($value==$y) {

                        //setting up menu sub category and sub sub category according to availablity
          $sub_category = array(array("Mobiles","Tablets","Laptops","Desktops","Gaming Consoles","Cameras","Audio"),array("Mobile Accessories","Gaming Accessories","Camera Accessories","Computer Accessories","Storage Devices","Printers & Fax Machines","Network Accessories"),array("Tv & Video devices","Home Audio","Washing Machines","Refrigerators","Gas Burners","Sewing Machines","Kitchen Appliances","Cooling & Heating","Vacuums & Floor care","Irons"),array("Makeup","Bath & Body","Beauty Tools","Food Supplements"),array("Toys","Maternity Care","Clothing & Accessories"),array("Bath","Bedding","Decor","Furniture","Outdoor Tools","Art & Craft","Music Instruments"),array("Women Clothing","Women Perfumes","Bags","Women Footwear","Lingerie, Sleep & Lounge","Girls Fashion"),array("Men Clothing","Men Perfumes","Wallets & Bags","Men Footwear","Underwear","Other Accessories","Boys Fashion"),array("Mens Watches","Women Watches","Unisex Watches","Kid Watches","Sunglasses","Eyeglasses","Mens Jewelry","Women Jewelry"),array("Men Shoes & Clothing","Women Shoes & Clothing","Outdoor Recreation","Sports Equipment"),array("Automotive"),array("Learning","Food & Drink","Hotels & Travels","Entertainment","Hosting","Auto Care"));
            
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
            print('<div class="right-nav-bar-border" data-spm="cate_'.($key+1).'">');
            foreach ($sub_category[$key] as $sub_key => $sub_value) {
                foreach ($total_db_sub_categories as $sub_x => $sub_y) {
                     if ($sub_value==$sub_y) {
                        print('<div class="right-nav-bar-submenu" data-cate="cate_'.($key+1).'_'.($sub_key+1).'">
                               <div class="right-nav-bar-submenu-p">
                                        <a href="../offers.php?m='.$sub_value.'" class="right-nav-bar-submenu-p-a">
                                <p>'.$sub_value.'</p>
                            </a>
                            <i class="right-nav-bar-submenu-p-i fa fa-chevron-down" data-cate="cate_'.($key+1).'_'.($sub_key+1).'"></i>
                                </div>');

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
                            print('
                                <div class="right-nav-bar-sub-submenu" data-spm="cate_'.($key+1).'_'.($sub_key+1).'">');
                            
                            foreach($total_db_sub_sub_categories as $m => $n){
                               print('
                                        <a href="../offers.php?m='.$n.'" class="right-nav-bar-sub-submenu-a">
                                            <span>'.$n.'</span>
                                        </a>
                                    ');
                            
                            }
                            print('</div>');
                       }
                       else{
                        print('<script>$("i[data-cate=\'cate_'.($key+1).'_'.($sub_key+1).'\']").css({"display":"none"});</script>');
                       }
                       print('</div>');
                     }

                }
            }
            print('</div>');
           }



                    }
                }
            }

         

            


            
        ?> 
                
                
           </div> 
        </section>
        </div>
    </div>
</section>









</body>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../js/mobile-menu.js"></script>
</html>