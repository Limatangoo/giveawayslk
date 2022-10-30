
<?php 
session_start();
include '../includes/db_admin.php';
include '../includes/general-connect.php';
include '../includes/dollar-rate.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
<link rel="stylesheet" type="text/css" href="../css/admin.css">
<link rel="stylesheet" href="../css/index.css">
<link rel="stylesheet" href="../css/mobile.css">
<link rel="stylesheet" href="../css/admin.css">
<link rel="stylesheet" href="../css/pending.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/brands.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php 
if(!isset($_SESSION['admin_email'])){
         header("location:login.php"); 
          exit();
    }

?>
<section class="admin_menu">
    <a href="index.php">Main</a>
    <a href="edit.php">Edit</a>
</section>
<section class="row">
	<div class="col-sm-2 my-5">
		<div class="container-fluid my-2"><a  href="?q=Electronic Devices">Electronic Devices</a></div>
	    <div class="container-fluid my-2"><a  href="?q=Electronic Accessories">Electronic Accessories</a></div>
		<div class="container-fluid my-2"><a  href="?q=TV & Home Appliances">TV & Home Appliances</a></div>
		<div class="container-fluid my-2"><a  href="?q=Health & Beauty">Health & Beauty</a></div>
	    <div class="container-fluid my-2"><a  href="?q=Babies & Toys">Babies & Toys</a></div>
		<div class="container-fluid my-2"><a  href="?q=Home & Lifestyle">Home & Lifestyle</a></div>
		<div class="container-fluid my-2"><a  href="?q=Womens Fashion">Womens Fashion</a></div>
	    <div class="container-fluid my-2"><a  href="?q=Mens Fashion">Mens Fashion</a></div>
		<div class="container-fluid my-2"><a  href="?q=Watches & Wearables">Watches & Wearables</a></div>
		<div class="container-fluid my-2"><a  href="?q=Sports & Outdoor">Sports & Outdoor</a></div>
	    <div class="container-fluid my-2"><a  href="?q=Automotive & Motorbike">Automotive & Motorbike</a></div>
		<div class="container-fluid my-2"><a  href="?q=Coupons & Promo Codes">Coupons & Promo Codes</a></div>
		 
	</div>
	<div class="col-sm-10">
		<?php
if(!isset($_GET["count"])){
  $count = 12;
}
else{
  $count = $_GET["count"];
}
if(!isset($_GET["q"])){
  $q = "Electronic Devices";
}
else{
  $q = $_GET["q"];
}
$page_number = $_GET["p"] ?? 1;

/*pending deals details*/
$menud="SELECT * FROM pending_deals WHERE category=:q";
$menud_prep=$conn->prepare($menud);
$menud_prep->bindValue(':q',$q);
$menud_prep->execute();
$menud_prep_fetch = $menud_prep->setFetchMode(PDO::FETCH_ASSOC);
$pages_needed = (int)ceil($menud_prep->rowCount()/ $count);


if($menud_prep->rowCount()>0){

  print('
     <div class="hp-mod-card card-jfy J_JFY J_NavChangeHook" >
  <div class="hp-mod-card-header">
    <h3 class="hp-mod-card-title">Pending Deals</h3>
  </div>
      
    
    ');

  $i=1;
  while($i<=3){
     print('<div class="card-jfy-row J_Row'.$i.'" >');
        $carousel_count = 1;
        $x=0;
        while ($carousel_count<5) {

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
            print('<form class="products_card" action="add_delete.php" method="GET">
        <input type="text" name="page_id" value="'.$page_number.'" hidden>
        <input type="text" name="id" value="'.$carousel_1["id"].'" hidden>
        <div class="products_card_img">
          <iframe src="'.$carousel_1["link"].'" class="products_card_img_1" alt=""></iframe>
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
          
          <input name="deal_discount_price" class="products_card_price_p" id="products_card_price_p1" value="'.$carousel_1["discount_price"].'"><span> '.$carousel_1["currency"].' </span>
        </div>
        <div class="products_card_currency">
            <input type="radio" id="currency1_pending'.$carousel_1["id"].'" name="currency" value="Rs">
            <label for="currency1">Rs</label>
            <input type="radio" id="currency2_pending'.$carousel_1["id"].'" name="currency" value="$">
            <label for="currency2">$</label><br>
        </div>
        <div class="products_card_link">
          
          <input name="deal_discount_link" class="products_card_link_p" id="products_card_link_p1" value="'.$carousel_1["link"].'">
        </div>
        <div class="products_card_btn">
          <button type="submit" class="products_card_add" id="deals_add" name="pending_deals_add">Add back</button>
        </div>
        <div class="products_card_btn">
          <button type="submit" class="products_card_delete" id="deals_pending" name="pending_deals_delete">Delete</button></a>
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
               $("input#currency1_pending'.$carousel_1["id"].'").prop("checked", true);
            }
            else{
                $("input#currency2_pending'.$carousel_1["id"].'").prop("checked", true);
            }</script>');


        }

    
             
           
            $carousel_count++;
    }
    print('</div>');
     $i++;
 }
   
 
}


?>
	</div>

</section>



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

<script type="text/javascript" src="pending.js"></script>
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


/*set up radio button checked depending on the value*/
//$("input[name=deal_trending][value=no]").prop("checked", true);
</script>
</body>
</html>


