<?php include '../includes/general-connect.php'?>


<?php
session_start();
if(!isset($_SESSION['admin_email'])){
     header("location:login.php"); 
      exit();
    }
?>
<?php
$q = $_POST["q"] ?? "";
/*desktop search*/
if(isset($q) && $q!==""){

$searchd="SELECT * FROM deals WHERE keywords LIKE '%".$q."%' ";
$searchd_prep=$conn->prepare($searchd);
$searchd_prep->execute();


$searchd_1="SELECT * FROM expired_deals WHERE keywords LIKE '%".$q."%' ";
$searchd_1_prep=$conn->prepare($searchd_1);
$searchd_1_prep->execute();

$searchd_2="SELECT * FROM pending_deals WHERE keywords LIKE '%".$q."%' ";
$searchd_2_prep=$conn->prepare($searchd_2);
$searchd_2_prep->execute();

if($searchd_prep->rowCount()>0){ 
 print('<div class="search_result_active">
      <h2>Active Deals</h2>');
  $i=1;
  while($i<=3){
     print('<div class="card-jfy-row J_Row'.$i.'" >');
        $carousel_count = 1;
        $x=0;
        while ($carousel_count<5) {

        if($carousel_1=$searchd_prep->fetch()){
          $x++;
        
              $percentage = round((($carousel_1['old_price']-$carousel_1['discount_price'])/$carousel_1['old_price'])*100);
            print('<form class="products_card" action="add_delete.php" method="GET">

        <input type="text" name="active_id" value="'.$carousel_1["id"].'" hidden>
        <div class="products_card_img">
           <img class="image" src="../images/deals/'.$carousel_1['img1'].'" alt="'.$carousel_1['tittle'].'">
        </div>
        <div class="products_card_name">
           <a href="'.$carousel_1["link"].'" target="blank"><p class="products_card_name_p">'.$carousel_1["tittle"].'</p></a>
        </div>
        <div class="products_card_trending">
           <div class="products_card_trending_input">
            <input type="radio" id="deal_trending_yes'.$carousel_1["id"].'" name="deal_trending" value="yes">
            <label for="deal_trending_yes">yes</label>
           </div>
           <div class="products_card_trending_input">
            <input type="radio" id="deal_trending_no'.$carousel_1["id"].'" name="deal_trending" value="no">
            <label for="deal_trending_no">no</label>
           </div>
        </div>
        <br>
        <div class="products_card_price">
          
          <input name="deal_discount_price" class="products_card_price_p" id="products_card_price_p1" value="'.$carousel_1["discount_price"].'">
        </div>
        <div class="products_card_currency">
            <input type="radio" id="currency1_active'.$carousel_1["id"].'" name="currency" value="Rs">
            <label for="currency1">Rs</label>
            <input type="radio" id="currency2_active'.$carousel_1["id"].'" name="currency" value="$">
            <label for="currency2">$</label><br>
        </div>
        <div class="products_card_link">
          
          <input name="deal_discount_link" class="products_card_link_p" id="products_card_link_p1" value="'.$carousel_1["link"].'">
        </div>
        <div class="products_card_btn">
          <button type="submit" class="products_card_add" id="deals_add" name="edit_active_deals">Edit</button>
        </div>
        
      </form>
      ');
                print('<script>
            var trending = "'.$carousel_1['trending'].'";
            var currency = "'.$carousel_1['currency'].'";
            if(trending==="yes"){
               $("input#deal_trending_yes'.$carousel_1["id"].'").prop("checked", true);
            }
            else{
                $("input#deal_trending_no'.$carousel_1["id"].'").prop("checked", true);
            }
            if(currency==="Rs"){
               $("input#currency1_active'.$carousel_1["id"].'").prop("checked", true);
            }
            else{
                $("input#currency2_active'.$carousel_1["id"].'").prop("checked", true);
            }
            </script>');


        }

    
             
           
            $carousel_count++;
    }
    print('</div>');
     $i++;
 }

print('</div>');
}
if($searchd_1_prep->rowCount()>0){ 
 print('<div class="search_result_expired">
      <h2>Expired Deals</h2>');
  $i=1;
  while($i<=3){
     print('<div class="card-jfy-row J_Row'.$i.'" >');
        $carousel_count = 1;
        $x=0;
        while ($carousel_count<5) {

        if($carousel_2=$searchd_1_prep->fetch()){
          $x++;
        
              $percentage = round((($carousel_2['old_price']-$carousel_2['discount_price'])/$carousel_2['old_price'])*100);
            print('<form class="products_card" action="add_delete.php" method="GET">

        <input type="text" name="expired_id" value="'.$carousel_2["id"].'" hidden>
        <div class="products_card_img">
           <img class="image" src="../images/deals/'.$carousel_2['img1'].'" alt="'.$carousel_2['tittle'].'">
        </div>
        <div class="products_card_name">
           <a href="'.$carousel_2["link"].'" target="blank"><p class="products_card_name_p">'.$carousel_2["tittle"].'</p></a>
        </div>
        <div class="products_card_trending">
           <div class="products_card_trending_input">
            <input type="radio" id="deal_trending_yes'.$carousel_2["id"].'" name="deal_trending" value="yes">
            <label for="deal_trending_yes">yes</label>
           </div>
           <div class="products_card_trending_input">
            <input type="radio" id="deal_trending_no'.$carousel_2["id"].'" name="deal_trending" value="no">
            <label for="deal_trending_no">no</label>
           </div>
        </div>
        <br>
        <div class="products_card_price">
          
          <input name="deal_discount_price" class="products_card_price_p" id="products_card_price_p1" value="'.$carousel_2["discount_price"].'">
        </div>
        <div class="products_card_currency">
            <input type="radio" id="currency1_expire'.$carousel_2["id"].'" name="currency" value="Rs">
            <label for="currency1">Rs</label>
            <input type="radio" id="currency2_expire'.$carousel_2["id"].'" name="currency" value="$">
            <label for="currency2">$</label><br>
        </div>
        <div class="products_card_link">
          
          <input name="deal_discount_link" class="products_card_link_p" id="products_card_link_p1" value="'.$carousel_2["link"].'">
        </div>
        <div class="products_card_btn">
          <button type="submit" class="products_card_add" id="deals_add" name="edit_expired_deals">Add back</button>
        </div>
       
      </form>
      ');
                print('<script>
            var trending = "'.$carousel_2['trending'].'";
            var currency = "'.$carousel_2['currency'].'";
            if(trending==="yes"){
               $("input#deal_trending_yes'.$carousel_2["id"].'").prop("checked", true);
            }
            else{
                $("input#deal_trending_no'.$carousel_2["id"].'").prop("checked", true);
            }
            if(currency==="Rs"){
               $("input#currency1_expire'.$carousel_2["id"].'").prop("checked", true);
            }
            else{
                $("input#currency2_expire'.$carousel_2["id"].'").prop("checked", true);
            }
            </script>');


        }

    
             
           
            $carousel_count++;
    }
    print('</div>');
     $i++;
 }

print('</div>');
}
if($searchd_2_prep->rowCount()>0){ 
 print('<div class="search_result_pending">
      <h2>Pending Deals</h2>');
  $i=1;
  while($i<=3){
     print('<div class="card-jfy-row J_Row'.$i.'" >');
        $carousel_count = 1;
        $x=0;
        while ($carousel_count<5) {

        if($carousel_3=$searchd_2_prep->fetch()){
          $x++;
        
              $percentage = round((($carousel_3['old_price']-$carousel_3['discount_price'])/$carousel_3['old_price'])*100);
            print('<form class="products_card" action="add_delete.php" method="GET">

        <input type="text" name="pending_id" value="'.$carousel_3["id"].'" hidden>
        <div class="products_card_img">
           <img class="image" src="../images/deals/'.$carousel_3['img1'].'" alt="'.$carousel_3['tittle'].'">
        </div>
        <div class="products_card_name">
           <a href="'.$carousel_3["link"].'" target="blank"><p class="products_card_name_p">'.$carousel_3["tittle"].'</p></a>
        </div>
        <div class="products_card_trending">
           <div class="products_card_trending_input">
            <input type="radio" id="deal_trending_yes'.$carousel_3["id"].'" name="deal_trending" value="yes">
            <label for="deal_trending_yes">yes</label>
           </div>
           <div class="products_card_trending_input">
            <input type="radio" id="deal_trending_no'.$carousel_3["id"].'" name="deal_trending" value="no">
            <label for="deal_trending_no">no</label>
           </div>
        </div>
        <br>
        <div class="products_card_price">
          
          <input name="deal_discount_price" class="products_card_price_p" id="products_card_price_p1" value="'.$carousel_3["discount_price"].'">
        </div>
        <div class="products_card_currency">
            <input type="radio" id="currency1_pending'.$carousel_3["id"].'" name="currency" value="Rs">
            <label for="currency1">Rs</label>
            <input type="radio" id="currency2_pending'.$carousel_3["id"].'" name="currency" value="$">
            <label for="currency2">$</label><br>
        </div>
        <div class="products_card_link">
          
          <input name="deal_discount_link" class="products_card_link_p" id="products_card_link_p1" value="'.$carousel_3["link"].'">
        </div>
        <div class="products_card_btn">
          <button type="submit" class="products_card_add" id="deals_add" name="edit_pending_deals">Add back</button>
        </div>
        
      </form>
      ');
                print('<script>
            var trending = "'.$carousel_3['trending'].'";
            var currency = "'.$carousel_3['currency'].'";
            if(trending==="yes"){
               $("input#deal_trending_yes'.$carousel_3["id"].'").prop("checked", true);
            }
            else{
                $("input#deal_trending_no'.$carousel_3["id"].'").prop("checked", true);
            }
            if(currency==="Rs"){
               $("input#currency1_pending'.$carousel_3["id"].'").prop("checked", true);
            }
            else{
                $("input#currency2_pending'.$carousel_3["id"].'").prop("checked", true);
            }


            </script>');


        }

    
             
           
            $carousel_count++;
    }
    print('</div>');
     $i++;
 }

print('</div>');
}
 }

?>