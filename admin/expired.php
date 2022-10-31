

<?php 

session_start();

include '../databaseConnections/db_admin.php';

include '../databaseConnections/general-connect.php';

?>



<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <title></title>

    <link rel="stylesheet" type="text/css" href="../css/admin.css">

    <link rel="stylesheet" type="text/css" href="../css/expired.css">

    <link rel="stylesheet" type="text/css" href="../css/mobile.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

    <?php 

if(!isset($_SESSION['admin_email'])){

         header("location:login.php"); 

          exit();

    }

else{ 





/*deals details*/

$deals = "SELECT id,tittle,currency,old_price,discount_price,img1,link,trending FROM expired_deals";

$deals_prep=$conn->prepare($deals);

$deals_prep->execute();

$deals_prep_fetch=$deals_prep->setFetchMode(PDO::FETCH_ASSOC);

$total_deals = $deals_prep->rowCount();



if($total_deals>0){

   print('<div class="filter_products_middle_ajx" id="filter_products_middle_deals">

      <div class="filter_products_products" id="filter_products_products">

        <h1>Expired Deals</h1>');



   while ($row = $deals_prep->fetch()) {

       print('<div class="products_card" id="products_card'.$row["id"].'">

       

        <div class="products_card_img">

          <iframe src="'.$row["link"].'" class="products_card_img_1" alt=""></iframe>

        </div>

        <div class="products_card_name">

           <a href="'.$row["link"].'" target="blank"><p class="products_card_name_p">'.$row["tittle"].'</p></a>

        </div>

        <div class="products_card_trending">

           <div class="products_card_trending_input">

            <input type="radio" id="deal_trending_yes'.$row["id"].'" name="deal_trending'.$row["id"].'" value="yes">

            <label for="deal_trending_yes">yes</label>

           </div>

           <div class="products_card_trending_input">

            <input type="radio" id="deal_trending_no'.$row["id"].'" name="deal_trending'.$row["id"].'" value="no">

            <label for="deal_trending_no">no</label>

           </div>

        </div>

         <br>

        <div class="products_card_price">

          

          <input name="deal_discount_price'.$row["id"].'" class="products_card_price_p" id="products_card_price_p1" value="'.$row["discount_price"].'">

        </div>

        <div class="products_card_currency">

            <input type="radio" id="currency1_pending'.$row["id"].'" name="currency'.$row["id"].'" value="Rs">

            <label for="currency1">Rs</label>

            <input type="radio" id="currency2_pending'.$row["id"].'" name="currency'.$row["id"].'" value="$">

            <label for="currency2">$</label><br>

        </div>

          <div class="products_card_link">

          

          <input name="deal_discount_link'.$row["id"].'" class="products_card_link_p" id="products_card_link_p1" value="'.$row["link"].'">

        </div>

        <div class="products_card_btn">

          <button type="submit" class="products_card_add" id="deals_add'.$row["id"].'" name="deals_add">Add back</button>

        </div>

        <div class="products_card_btn">

          <button type="submit" class="products_card_delete" id="deals_pending'.$row["id"].'" name="deals_pending">Add to pending</button></a>

        </div>

      </div>');

                             print('<script>

            var trending = "'.$row['trending'].'";

            var currency = "'.$row['currency'].'";

            if(trending==="yes"){

               $("input#deal_trending_yes'.$row["id"].'").prop("checked", true);

            }

            else{

                $("input#deal_trending_no'.$row["id"].'").prop("checked", true);

            }

            if(currency==="Rs"){

               $("input#currency1_pending'.$row["id"].'").prop("checked", true);

            }

            else{

                $("input#currency2_pending'.$row["id"].'").prop("checked", true);

            }





            </script>');

   }

  print('</div> 

           

</div>');

}





/*giveaway details

$giveaways = "SELECT id,company_name,tittle,cover_photo,link,end_date FROM expired_giveaways";

$giveaways_prep=$conn->prepare($giveaways);

$giveaways_prep->execute();

$giveaways_prep_fetch=$deals_prep->setFetchMode(PDO::FETCH_ASSOC);

$total_giveaways = $giveaways_prep->rowCount();



if($total_giveaways>0){

   print('<div class="filter_products_middle_ajx" id="filter_products_middle_giveaways">

      <div class="filter_products_products" id="filter_products_products">

        <h1>Expired giveaways</h1>');



   while ($row_1 = $giveaways_prep->fetch()) {

       print('<div class="products_card">



        <input type="text" name="id" value="'.$row_1["id"].'" hidden>

        <a href="'.$row_1["link"].'" target="blank">

        <div class="products_card_img">

          <iframe src="'.$row_1["link"].'" class="products_card_img_1" alt=""></iframe>

        </div>

        </a>

        <div class="products_card_name">

          <a href="'.$row_1["link"].'" target="blank"><p class="products_card_name_p">'.$row_1["tittle"].'</p></a>

        </div>

        <div class="products_card_end_date">

        <label for="date" >End Date:<input type="date"  name="giveaway_end_date" value="'.$row_1["end_date"].'"></label> 

        </div>

        <div class="products_card_btn">

           <button class="products_card_add" id="giveaway_add" name="giveaway_add">Add back</button>

        </div>

        <div class="products_card_btn">

         <button type="submit"  class="products_card_delete" name="giveaway_delete">Delete</button>

        </div>

      </div>');

   }

  print('</div> 

           

</div>');

}



*/





}



?>



<script type="text/javascript" src="expired.js"></script>

</body>

</html>





