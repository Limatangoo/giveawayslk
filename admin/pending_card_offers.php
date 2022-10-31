<?php 
session_start();
include '../databaseConnections/db_admin.php';
include '../databaseConnections/general-connect.php';
?>

<?php 

//admin authorization
if(!isset($_SESSION['admin_email'])){
            $adminemail=$_POST['admin_login_email'];
            $password=$_POST['admin_login_pwd'];
            

            $dbemail="SELECT email FROM auth WHERE email=:email";
            $dbhashpassword="SELECT password FROM auth WHERE email=:email";

            $dbemail_prep=$conn4->prepare($dbemail);
            $dbhashpassword_prep=$conn4->prepare($dbhashpassword);


            $dbemail_prep->bindValue(':email',$adminemail);
            $dbhashpassword_prep->bindValue(':email',$adminemail);

            $dbemail_prep->execute();
            $dbhashpassword_prep->execute();


            $dbemail_fetch=$dbemail_prep->fetch(PDO::FETCH_ASSOC);
            $dbhashpassword_fetch=$dbhashpassword_prep->fetch(PDO::FETCH_ASSOC);

            $dbpassword=password_verify($password,$dbhashpassword_fetch['password']);
    //set a token inisde if otheriwse admins will be exposed to phishing attacks
    if (isset($_POST['login_submit'])) {
        if($_POST["admin_login_email"]==""||$_POST["admin_login_pwd"]==""|| empty(trim($_POST['admin_login_email']))||empty(trim($_POST['admin_login_pwd']))){
            header("location:login.php");
            exit();

        }
           
        
        else if($dbemail_fetch<=0 || $dbpassword!=1) {
                       
            header("location:login.php?error=error");
            exit();
            
        }
        
        else{
           
            $_SESSION['admin_email']=$dbemail_fetch['email'];
        }
    }
    //attack mode
    else{
        header("location:login.php");
            exit();
    }
}


$sql = "SELECT id,bank,tittle,card_type,proccessor_type FROM expired_card_offers WHERE unique_name IS NULL";
$sql_prep = $conn->prepare($sql);
$sql_prep->execute();

while($row=$sql_prep->fetch(PDO::FETCH_ASSOC)) {
    $unique_name = $row["bank"].$row["tittle"].$row["card_type"].$row["proccessor_type"];

    $insert_unique = "UPDATE expired_card_offers SET unique_name=:unique_name WHERE id=:id";
    $insert_unique_prep = $conn->prepare($insert_unique);
    $insert_unique_prep->bindValue(':unique_name',$unique_name);
    $insert_unique_prep->bindValue(':id',$row["id"]);
    $insert_unique_prep->execute();
}

//deleting duplicate values
$sql_delete = "SELECT id,unique_name FROM expired_card_offers";
$sql_delete_prep = $conn->prepare($sql_delete);
$sql_delete_prep->execute();

$arr = array();
while($row=$sql_delete_prep->fetch(PDO::FETCH_ASSOC)) {
    foreach ($arr as $key => $value) {

        if($value==$row["unique_name"]){
          $dlt_quary = "DELETE FROM expired_card_offers WHERE id=:id";
          $dlt_quary_prep = $conn->prepare($dlt_quary);
          $dlt_quary_prep->bindValue(":id",$row["id"]);
          $dlt_quary_prep->execute();
        }
    }
    array_push($arr,$row["unique_name"]);
    
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
<link rel="stylesheet" type="text/css" href="../css/admin.css">
<link rel="stylesheet" href="../css/mobile.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/brands.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<section class="container-sm">
  <div class="row">
  	<div class="col-sm-3">
  		<div class="container-fluid my-5">
  			<a href="https://giveaways.lk/admin" class="container-fluid">Main</a>
  		    <a href="https://giveaways.lk/admin/expired.php" class="container-fluid">Expire</a>
  		    <a href="" class="https://giveaways.lk/admin/pending.php">Pending</a>
  		   
  		</div>
  		<div class="container-fluid">
  			<div class="bank_name container p-3 bg-light my-2" id="bank_name_1">
  				<p>BOC</p>
  				
  			</div>
  			<div class="container p-3 card_type" id="card_type_1">
  				<a href="https://giveaways.lk/admin/pending_card_offers.php?bank=BOC&card_type=Credit" class="container-fluid">Credit</a>
  				<a href="https://giveaways.lk/admin/pending_card_offers.php?bank=BOC&card_type=Debit" class="container-fluid">Debit</a>
  			</div>
  		</div>
  		<div class="container-fluid">
  			<div class="bank_name container p-3 bg-light my-2" id="bank_name_2">
  				<p>Commercial</p>
  				
  			</div>
  			<div class="container p-3 card_type" id="card_type_2">
  				<a href="https://giveaways.lk/admin/pending_card_offers.php?bank=Commercial&card_type=Credit" class="container-fluid">Credit</a>
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=Commercial&card_type=Debit" class="container-fluid">Debit</a>
  			</div>
  		</div>
  		<div class="container-fluid">
  			<div class="bank_name container p-3 bg-light my-2" id="bank_name_3">
  				<p>Peoples bank</p>
  				
  			</div>
  			<div class="container p-3 card_type" id="card_type_3">
  				<a href="https://giveaways.lk/admin/pending_card_offers.php?bank=Peoples bank&card_type=Credit" class="container-fluid">Credit</a>
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=Peoples bank&card_type=Debit" class="container-fluid">Debit</a>
  			</div>
  		</div>
  		<div class="container-fluid">
  			<div class="bank_name container p-3 bg-light my-2" id="bank_name_4">
  				<p>HNB</p>
  				
  			</div>
  			<div class="container p-3 card_type" id="card_type_4">
  				<a href="https://giveaways.lk/admin/pending_card_offers.php?bank=HNB&card_type=Credit" class="container-fluid">Credit</a>
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=HNB&card_type=Debit" class="container-fluid">Debit</a>
  			</div>
  		</div>
        <div class="container-fluid">
            <div class="bank_name container p-3 bg-light my-2" id="bank_name_5">
                <p>Sampath</p>
                
            </div>
            <div class="container p-3 card_type" id="card_type_5">
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=Sampath&card_type=Credit" class="container-fluid">Credit</a>
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=Sampath&card_type=Debit" class="container-fluid">Debit</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="bank_name container p-3 bg-light my-2" id="bank_name_6">
                <p>NDB</p>
                
            </div>
            <div class="container p-3 card_type" id="card_type_6">
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=NDB&card_type=Credit" class="container-fluid">Credit</a>
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=NDB&card_type=Debit" class="container-fluid">Debit</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="bank_name container p-3 bg-light my-2" id="bank_name_7">
                <p>Seylan</p>
                
            </div>
            <div class="container p-3 card_type" id="card_type_7">
               <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=Seylan&card_type=Credit" class="container-fluid">Credit</a>
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=Seylan&card_type=Debit" class="container-fluid">Debit</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="bank_name container p-3 bg-light my-2" id="bank_name_8">
                <p>DFCC</p>
                
            </div>
            <div class="container p-3 card_type" id="card_type_8">
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=DFCC&card_type=Credit" class="container-fluid">Credit</a>
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=DFCC&card_type=Debit" class="container-fluid">Debit</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="bank_name container p-3 bg-light my-2" id="bank_name_9">
                <p>NTB</p>
                
            </div>
            <div class="container p-3 card_type" id="card_type_9">
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=NTB&card_type=Credit" class="container-fluid">Credit</a>
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=NTB&card_type=Debit" class="container-fluid">Debit</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="bank_name container p-3 bg-light my-2" id="bank_name_10">
                <p>Pan Asia</p>
                
            </div>
            <div class="container p-3 card_type" id="card_type_10">
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=Pan Asia&card_type=Credit" class="container-fluid">Credit</a>
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=Pan Asia&card_type=Debit" class="container-fluid">Debit</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="bank_name container p-3 bg-light my-2" id="bank_name_11">
                <p>Union Bank</p>
                
            </div>
            <div class="container p-3 card_type" id="card_type_11">
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=Union Bank&card_type=Credit" class="container-fluid">Credit</a>
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=Union Bank&card_type=Debit" class="container-fluid">Debit</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="bank_name container p-3 bg-light my-2" id="bank_name_12">
                <p>Amana Bank</p>
                
            </div>
            <div class="container p-3 card_type" id="card_type_12">
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=Amana Bank&card_type=Credit" class="container-fluid">Credit</a>
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=Amana Bank&card_type=Debit" class="container-fluid">Debit</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="bank_name container p-3 bg-light my-2" id="bank_name_13">
                <p>Cargills Bank</p>
                
            </div>
            <div class="container p-3 card_type" id="card_type_13">
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=Cargills Bank&card_type=Credit" class="container-fluid">Credit</a>
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=Cargills Bank&card_type=Debit" class="container-fluid">Debit</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="bank_name container p-3 bg-light my-2" id="bank_name_14">
                <p>HSBC</p>
                
            </div>
            <div class="container p-3 card_type" id="card_type_14">
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=HSBC&card_type=Credit" class="container-fluid">Credit</a>
                <a href="https://giveaways.lk/admin/pending_card_offers.php?bank=HSBC&card_type=Debit" class="container-fluid">Debit</a>
            </div>
        </div>
  		
  	</div>
  	<div class="col-sm-9 my-5">
        <div class="container">
            <div class="d-flex flex-row flex-wrap">
              
                    <?php  

                     //select expired items 
                    if(!isset($_GET["bank"]) || !isset($_GET["card_type"])){
                      $bank = "";
                      $card_type ="";
                      $where = "";
                    }
                    else{
                      $bank = $_GET["bank"];
                      $card_type =$_GET["card_type"];
                      $where = "WHERE bank=:bank AND card_type=:card_type";
                    }
                    $card = "SELECT id,bank,tittle,card_type,proccessor_type,percentage,cover_photo,start_date,end_date,link FROM expired_card_offers ".$where;
                    $card_prep = $conn->prepare($card);

                    if($bank!=""&&$card_type!=""){
                      $card_prep->bindValue(':bank',$bank);
                      $card_prep->bindValue(':card_type',$card_type);
                    }
                    
                    $card_prep->execute();
                    
                   
                    //page numbering
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
                    $carousel_count = 0;
                     $pages_needed = (int)ceil($card_prep->rowCount()/ $count);
                     //setting up date
                     
                   $bank_start_date = date("Y-m-d"); 
                   $bank_end_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 5 days'));
                   
                    while($row=$card_prep->fetch(PDO::FETCH_ASSOC)) {
                        $carousel_count++; 
                          if($carousel_count-1 < $count*($page_number-1)){
                        continue;
                        }
                          if(($count*$page_number)==$carousel_count-1){
                             break;
                          }
                       print('<div class="m-5 flex-fill">
                        <form class="" action="admin-tasks.php" method="POST">
                       <div class="card-official-stores-box hp-mod-card-hover align-left">
                        <div class="card-official-stores-brand-overlay"></div>
                        <a href="" target="_blank">
                            <div class="card-official-stores-brand-img">
                              <img src="../images/card_offers/'.$row['cover_photo'].'" class="image" alt="Deer park Hotel" data-spm-anchor-id="a2a0e.home.officialStores.i0.30544625xec7kq">
                            </div>
                       </a>
                        <div class="card-official-stores-discount-img">
                          <img src="../images/general/discounted.png" class="discount-image">
                        </div>
                         <div class="card-official-stores-discount-percentage">
                          <p class="card-official-stores-discount-percentage-p">'.$row['percentage'].'<span class="card-official-stores-discount-percentage-span">%</span></p>
                        </div>
                        <div class="card-official-stores-shop-img">
                          <img src="../images/bank_logos/'.$row['bank'].'.jpg" class="image" alt="Vantime Store">
                        </div>
                        <div class="card-official-stores-h1">'.$row['tittle'].'</div>
                        <p class="card-official-stores-p"> '.$row['bank'].' '.$row['card_type'].'Card </p>
                        <p class="card-official-stores-p"> '.$row['proccessor_type'].' </p>
                        <div class="">
                            <input type="number" name="card_offer_percentage" value="'.$row['percentage'].'"><span>%</span> 
                        </div>
                        <div class="container mt-2">
                            <span>From</span><input type="date" name="card_offer_startdate" value="'.$bank_start_date.'">
                        </div>
                        <div class="container mt-2">
                            <span>To</span><input type="date" name="card_offer_enddate" value="'.$bank_end_date.'">
                        </div>
                        <div class="container my-2">
                            <input type="text" name="card_offer_link" value="'.$row['link'].'">
                        </div>
                        <div class="d-none">
                            <input type="text" name="card_offer_id" value="'.$row['id'].'">
                        </div>
                        <div class="container my-2">
                            <button class="ml-5 my-2 p-2 bg-warning" type="submit" name="card_offers_pending_submit">Add Back</button>
                        </div>

                        
                       </div>
                  </form>
                  </div>');
                    }

                    ?>
                   
               
                
            </div>
        </div>

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
	

</section>


<script type="text/javascript">

//credit card and debit card display options
$(document).ready(function() {
   $("body").on("click",".bank_name", function(){ 

      var click_id = "#"+$(this).attr("id"); 
      var id = "#card_type_"+$(this).attr("id").replace("bank_name_","");
      var i=0;
      while(i<14){
        i++;
      if("#card_type_"+i==id){
         $(id).show();
        
      }
      else{
        $("#card_type_"+i).hide();
        
      }
     }

   });
});
//page numbering
 var urlParams = new URLSearchParams(location.search);
   
   if (urlParams.get('p')==null || urlParams.get('p')=="") {
      var url_page_number = 1;
   }
   else{
      var url_page_number = Number(urlParams.get('p'));
   }
   if (urlParams.get('bank')==null || urlParams.get('bank')=="") {
      var bank = "";
   }
   else{
      var bank = urlParams.get('bank');
   }
   if (urlParams.get('card_type')==null || urlParams.get('card_type')=="") {
      var card_type = "";
   }
   else{
      var card_type = urlParams.get('card_type');
   }
$(document).ready(function() {    
    /* page navigation with page numbers */
 $("body").on("click",".page_number_p", function(){
   var pageid = $(this).text();
   

   location.assign(`https://giveaways.lk/admin/pending_card_offers.php?p=${pageid}&bank=${bank}&card_type=${card_type}`);


  });

//navigating when page forward button was clicked
  $("body").on("click","#page_forward", function(){
    var pageid = url_page_number + 1;

   location.assign(`https://giveaways.lk/admin/pending_card_offers.php?p=${pageid}&bank=${bank}&card_type=${card_type}`);

  });
  //navigating when page backward button was clicked
  $("body").on("click","#page_backward", function(){
      var pageid = url_page_number - 1;
   

   location.assign(`https://giveaways.lk/admin/pending_card_offers.php?p=${pageid}&bank=${bank}&card_type=${card_type}`);

  });


});
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