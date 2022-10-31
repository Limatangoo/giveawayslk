
<!DOCTYPE HTML>
<?php 
include 'databaseConnections/general-connect.php';


?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="keywords" content="boc credit card offers, sampath card offers, dfcc credit card offers, seylan credit card offers, amex credit card offers, commercial bank credit card offers, hnb credit card offers, hsbc credit card offers, credit card offers, ndb credit card offers, sampath credit card offers">
  <meta name="description" content="credit and debit card offers in srilanka. find out the best offer for your debit or credit card from sampath hnb commercial amex seylan dfcc boc hsbc">
  
  
  
  
<meta property="og:url" content="https://www.giveaways.lk/card-offers.php" />
<meta property="og:type" content="website">
<meta property="og:title" content="Credit and debit card offers today | Giveaways.lk" />
<meta property="og:description" content="credit and debit card offers in srilanka. find out the best offer for your debit or credit card from sampath hnb commercial amex seylan dfcc boc hsbc" />
<meta property="og:image" content="https://giveaways.lk/images/general/giveawayslk-logo-og.png">








  <title>Credit and debit card offers today | Giveaways.lk</title>
  <link rel="shortcut icon" href="images/general/giveawayslk-logo.png">
  
  
  
<link rel="stylesheet" href="css/card-offers.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="css/mobile.css">


</head>
<body>
  
  

<link rel="stylesheet" href="css/giveaways-searchbox.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/brands.min.css">


<?php include 'display/header.php' ?>
<?php
$where = "WHERE sub_category=:sub_category AND start_date<=:start_date AND end_date>=:end_date AND bank=:bank AND card_type=:card_type ORDER BY percentage DESC";
if(!isset($_GET["type"])|| ($_GET["type"]=="")||($_GET["type"]=="undefined")){
  $type = "";
  $where = str_replace("sub_category=:sub_category AND",'',$where);
}
else{
  $type = $_GET["type"];
}
if(!isset($_GET["start_date"])|| ($_GET["start_date"]==" ")||($_GET["start_date"]=="undefined")){
  $start_date = "";
  $where = str_replace("start_date<=:start_date AND end_date>=:end_date AND",'',$where);
}
else{
  $start_date = $_GET["start_date"];
}
if(!isset($_GET["end_date"]) || ($_GET["end_date"]=="")||($_GET["end_date"]=="undefined")){
  $end_date = "";
  $where = str_replace("start_date<=:start_date AND end_date>=:end_date AND",'',$where);
}
else{
  $end_date = $_GET["end_date"];
}
if(!isset($_GET["bank"])|| ($_GET["bank"]=="")||($_GET["start_date"]=="bank")){
  $bank = "";
  $where = str_replace("bank=:bank AND",'',$where);
}
else{
  $bank = $_GET["bank"];
}
if(!isset($_GET["card_type"])|| ($_GET["card_type"]=="")||($_GET["card_type"]=="undefined")){
  $card_type = "Credit";
  $where = str_replace("AND card_type=:card_type",'',$where);
}
else{
  $card_type = $_GET["card_type"];
}
if(!isset($_GET["p"])){
  $page_number = 1;
}
else{
  $page_number = (int)$_GET["p"];
}
if(!isset($_GET["count"])){
  $count = 18;
}
else{
  $count = $_GET["count"];
}
if($type == "" && $start_date == "" && $end_date == "" && $bank == "" && $card_type == ""){
  $where = 'ORDER BY percentage DESC';
}

$card_offers = "SELECT bank,tittle,card_type,proccessor_type,percentage,cover_photo,link FROM card_offers ".$where;
$card_offers_prep=$conn->prepare($card_offers);

if($type!=""){
  $card_offers_prep->bindValue(':sub_category',$type);
}
if($start_date!=""){
  $card_offers_prep->bindValue(':start_date',$start_date);
}
if($end_date!=""){
  $card_offers_prep->bindValue(':end_date',$end_date);
}
if($bank!=""){
  $card_offers_prep->bindValue(':bank',$bank);
}
if($card_type!=""){
  $card_offers_prep->bindValue(':card_type',$card_type);
}
$card_offers_prep->execute();
$card_offers_prep_fetch=$card_offers_prep->setFetchMode(PDO::FETCH_ASSOC);


//select only available categories
$select_types = "SELECT DISTINCT sub_category FROM card_offers";
$select_types_prep = $conn->prepare($select_types);
$select_types_prep->execute();
$select_types_prep_fetch=$select_types_prep->setFetchMode(PDO::FETCH_ASSOC);
?>

<section class="filter">
  <div class="filter_main">
    <div class="filter_main_div1">
      <div class="filter_main_div1_type">
        <p class="filter_main_div1_type_p">Type:</p>
        <span class="custom-dropdown big">
          <select class=""  name="type" id="type">
              <option value="<?php echo(urlencode($type)); ?>"><?php echo($type); ?></option>
              <?php
              while($row=$select_types_prep->fetch()){
                  print('<option value="'.urlencode($row["sub_category"]).'">'.$row["sub_category"].'</option>');
              }
              
    		  ?>
        </select>
      </span>
      </div>
      <div class="filter_main_div1_calender">
        <div class="filter_main_div1_calender_1">
          <p class="filter_main_div1_calender_1_p">Period:</p>
          <span class="filter_main_div1_calender_1_span"><input type="text" name="daterange" value="" readonly="readonly"/></span>
         
        </div>
        
        
      </div>
      
    </div>
    <div class="filter_main_div2">
      <div class="filter_main_div2_bank">
        <p class="filter_main_div2_bank_p">Bank:</p>
        <span class="custom-dropdown big">
          <select name="bank_name" id="bank_name">
            <option value="<?php echo($bank); ?>"><?php echo($bank); ?></option>
            <option value="BOC">BOC</option>
            <option value="Commercial">Commercial</option>
            <option value="Peoples Bank">People's Bank</option>
            <option value="HNB">HNB</option>
            <option value="Sampath">Sampath</option>
            <option value="NDB">NDB</option>
            <option value="Seylan">Seylan</option>
            <option value="DFCC">DFCC</option>
            <option value="NTB">NTB</option>
            <option value="Pan Asia">Pan Asia</option>
            <option value="Union Bank">Union Bank</option>
            <option value="Amana Bank">Amana Bank</option>
            <option value="Cargills Bank">Cargills Bank</option>
        
           
        </select>
        </span>
      </div>
      <div class="filter_main_div2_cardtype">
        <p class="filter_main_div2_cardtype_p">Card Type</p>
        <span class="custom-dropdown big">
          <select name="card_type" id="card_type">
            <option value="<?php echo($card_type); ?>"><?php echo($card_type); ?></option>
            <option value="Debit">Debit</option>
            <option value="Credit">Credit</option>
           
        </select>
      </span>
      </div>
      
    </div>
    <div class="filter_main_div3">
      <div class="filter_main_div3_btn">
        <button id="filter_main_div3_filter">Filter</button>
        
      </div>
      
    </div>
    
  </div>
  

</section>

<div class="page regional_lk" style="">
  
<?php include 'display/popular_categories.php' ?>



<?php 

/*bank_offers details
$card_offers = "SELECT bank,tittle,card_type,proccessor_type,percentage,cover_photo,link FROM card_offers ORDER BY percentage DESC";
$card_offers_prep=$conn->prepare($card_offers);
$card_offers_prep->execute();
$card_offers_prep_fetch=$card_offers_prep->setFetchMode(PDO::FETCH_ASSOC);*/



$x=0; 
$i=0;
if($card_offers_prep->rowCount()>0){
    print(' <div class="hp-mod-card card-official-stores J_OfficialStores J_NavChangeHook"  id="hp-official-stores" data-spm="officialStores" data-spm-max-idx="12">
  <div class="hp-mod-card-header">
    <h3 class="hp-mod-card-title" style="color: daily">Card Offers</h3>
  </div>
    <div class="card-official-stores-content J_OfficialStoresItems">
        
        
        
        <section class="banner-slider" id="officialSlide">');
 
  while($x<3){

     print('<div class="card-official-stores-wrapper" data-tag="shops">');
    $carousel_count = 1;
    while ($carousel_count<7) {
        $i++;
    $carousel_1=$card_offers_prep->fetch();
       if($i<=$count*($page_number-1)){
            continue;
            }
       

       if($carousel_1){

        print('<a class="card-official-stores-box hp-mod-card-hover align-left bank-offers" href="'.$carousel_1['link'].'"  title="'.$carousel_1['bank'].'" target="blank">
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
                <div class="card-official-stores-h1">'.ucwords($carousel_1['tittle']).'</div>
                <p class="card-official-stores-p"> '.$carousel_1['bank'].' '.$carousel_1['card_type'].' Card </p>
                <p class="card-official-stores-p"> '.$carousel_1['proccessor_type'].' </p>
              </a>

      ');

       }

        
         $carousel_count++;
       
     }
    print('</div>');
     $x++;
     }
}
else{
    print('<div class="no_result"><p class="no_result_p">Sorry there are no results available for above filters!</p></div>');
}



?>   
<?php




/*calculating how many pages needed to display all women jewelries*/
$pages_needed = (int)ceil($card_offers_prep->rowCount()/ $count);


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

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="js/card-offers.js"></script>



  
    




    
  



  




  

  

</body>
</html>









