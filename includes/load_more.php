<?php

include '../databaseConnections/general-connect.php';

include 'dollar-rate.php';

$click = $_GET['click'] ?? "";



if($click!=""){

   $trending_deals = "SELECT id,tittle,currency,old_price,discount_price,img1,link FROM deals WHERE trending='yes'";

	$trending_deals_prep=$conn->prepare($trending_deals);

	$trending_deals_prep->execute();

	$trending_deals_prep_fetch=$trending_deals_prep->setFetchMode(PDO::FETCH_ASSOC);

	$trending_deals_count = $trending_deals_prep->rowCount();



	$other_deals = "SELECT id,tittle,currency,old_price,discount_price,img1,link FROM deals WHERE trending='no'";

	$other_deals_prep=$conn->prepare($other_deals);

	$other_deals_prep->execute();

	$other_deals_prep_fetch=$other_deals_prep->setFetchMode(PDO::FETCH_ASSOC);

	$other_deals_count = $other_deals_prep->rowCount();



	$total_deals_count = $trending_deals_count + $other_deals_count;



    $trending_cards_per_click = 0;

    $other_cards_per_click = 0;

	  $i=1;

  while($i<4){



     print('<div class="card-jfy-row J_Row'.(($click*18)/6+$i).'" >');

        $carousel_count = 1;

    while ($carousel_count<7) {

        $carousel_1=$trending_deals_prep->fetch();

       if($trending_cards_per_click<18*$click){

        $trending_cards_per_click++;

          continue;



        }



       if($carousel_1){

        $trending_cards_per_click++;

        $percentage = round((($carousel_1['old_price']-$carousel_1['discount_price'])/$carousel_1['old_price'])*100);

        print('

                    <div class="card-jfy-item-wrapper hp-mod-card-hover J_Items inline" name="deals_card'.($click).'" id="'.$carousel_1['id'].'">

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

        <span class="currency">'.$carousel_1['currency'].'.</span><span class="price" name = "discounted_price" class="price" id="discounted_price'.$carousel_1['id'].'" data-target="'.$carousel_1['discount_price'].'"></span>

      </div>

    

        <div class="hp-mod-price-second-line"><span class="hp-mod-price-text align-left">

      <span class="currency"></span><span class="price" name = "old_price" class="price" id="old_price'.$carousel_1['id'].'" data-target="'.$carousel_1['old_price'].'"></span>

      </span>

      <span class="hp-mod-discount align-left" id="discountPercentage'.$carousel_1['id'].'"></span></div>

      </div>

    

              

     

    

            </div>

          </div>

        </a>

      </div>



      ');



       }

       else{

       
        
        

            $carousel_2=$other_deals_prep->fetch();

            if($other_cards_per_click<18-($trending_deals_count-($click-1)*18)){

                $other_cards_per_click++;

                continue;



        }

           if($carousel_2){ 

            $other_cards_per_click++;

          $percentage = round((($carousel_2['old_price']-$carousel_2['discount_price'])/$carousel_2['old_price'])*100);

          print('

                    <div class="card-jfy-item-wrapper hp-mod-card-hover J_Items inline" name="deals_card'.($click).'" id="'.$carousel_2['id'].'">

        <a href="'.$carousel_2['link'].'" target="blank">

          <div class="card-jfy-item">

            

      <div class="card-jfy-image card-jfy-image-background J_GridImage">

        <img class="image" src="images/deals/'.$carousel_2['img1'].'" alt="'.$carousel_2['tittle'].'">

      </div>

    

            <div class="card-jfy-item-desc">

              

      <div class="card-jfy-segment">

      </div>

    

              

      <div class="card-jfy-title"><span class="title">'.$carousel_2['tittle'].'</span></div>

    

              

      <div class="hp-mod-price">

        

      <div class="hp-mod-price-first-line">

        <span class="currency">Rs.</span><span class="price" name = "discounted_price" class="price" id="discounted_price'.$carousel_2['id'].'" data-target="'.$carousel_2['discount_price'].'"></span>

      </div>

    

        <div class="hp-mod-price-second-line"><span class="hp-mod-price-text align-left">

      <span class="currency"></span><span class="price" name="old_price" id="old_price'.$carousel_2['id'].'" data-target="'.$carousel_2['old_price'].'"></span>

      </span>

      <span class="hp-mod-discount align-left" id="discountPercentage'.$carousel_2['id'].'"></span></div>

      </div>

    

              

     

    

            </div>

          </div>

        </a>

      </div>



      ');

          }   

          

        



       }

        

         $carousel_count++;

       

     }

    print('</div>');

     $i++;

     }   

     print('</div><div class="LoadAJX" id="LoadAJX'.($click+1).'">');

    }



?>