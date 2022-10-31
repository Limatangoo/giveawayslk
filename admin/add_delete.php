<?php 

session_start();

include '../databaseConnections/db_admin.php';

include '../databaseConnections/general-connect.php';

if(!isset($_SESSION['admin_email'])){

         header("location:login.php"); 

          exit();

    }

elseif(isset($_SESSION['admin_email'])){ 





  if(isset($_GET['deals_add'])){

      $id = $_GET['id'];

     $deals_end_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 5 days'));



    $expired_deals = "SELECT * FROM expired_deals WHERE id=:id";

    $expired_deals_prep=$conn->prepare($expired_deals);

    $expired_deals_prep->bindValue(':id',$id);

    $expired_deals_prep->execute();

    $expired_deals_prep_fetch=$expired_deals_prep->fetch(PDO::FETCH_ASSOC);



    $deal_tittle = $expired_deals_prep_fetch["tittle"];

    $deal_category = $expired_deals_prep_fetch["category"];

    $deal_sub_category = $expired_deals_prep_fetch["sub_category"];

    $deal_sub_sub_category = $expired_deals_prep_fetch["sub_sub_category"];

    $deal_currency = $_GET["currency"];

    $deal_discounted_price = $_GET['deal_discount_price'];

    $deal_old_price = $expired_deals_prep_fetch["old_price"];

    $deal_start_date = $expired_deals_prep_fetch["start_date"];

    $deal_end_date = $deals_end_date;

    $deal_link = $_GET['deal_discount_link'];

    $img1 = $expired_deals_prep_fetch["img1"];

    $deal_trending = $_GET["deal_trending"];

    $deal_keywords = $expired_deals_prep_fetch["keywords"];

    



     $sql="INSERT INTO deals(tittle,category,sub_category,sub_sub_category,currency,old_price,discount_price,img1,link,start_date,end_date,trending,keywords)

      VALUES(:tittle,:category,:sub_category,:sub_sub_category,:currency,:old_price,:discount_price,:img1,:link,:start_date,:end_date,:trending,:keywords)";

      $sth=$conn->prepare($sql);



      $sth->bindValue(':tittle',$deal_tittle);

      $sth->bindValue(':category', $deal_category);

      $sth->bindValue(':sub_category', $deal_sub_category);

      $sth->bindValue(':sub_sub_category', $deal_sub_sub_category);

      $sth->bindValue(':currency', $deal_currency);

      $sth->bindValue(':old_price', $deal_old_price);

      $sth->bindValue(':discount_price', $deal_discounted_price);

      $sth->bindValue(':img1', $img1);

      $sth->bindValue(':link', $deal_link);

      $sth->bindValue(':start_date', $deal_start_date);

      $sth->bindValue(':end_date', $deal_end_date);

      $sth->bindValue(':trending', $deal_trending);

      $sth->bindValue(':keywords', $deal_keywords);

      $sth->execute();



      $deal_delete="DELETE FROM expired_deals WHERE id=:id";

      $deal_delete_prep=$conn->prepare($deal_delete);

      $deal_delete_prep->bindValue(':id',$id);

      $deal_delete_prep->execute(); 



        //header("location:expired.php#filter_products_middle_deals");

  }

  else if(isset($_GET['deals_pending'])){

     $id = $_GET['id'];

    $expired_deals = "SELECT * FROM expired_deals WHERE id=:id";

    $expired_deals_prep=$conn->prepare($expired_deals);

    $expired_deals_prep->bindValue(':id',$id);

    $expired_deals_prep->execute();

    $expired_deals_prep_fetch=$expired_deals_prep->fetch(PDO::FETCH_ASSOC);

    $deal_tittle = $expired_deals_prep_fetch["tittle"];

    $deal_category = $expired_deals_prep_fetch["category"];

    $deal_sub_category = $expired_deals_prep_fetch["sub_category"];

    $deal_sub_sub_category = $expired_deals_prep_fetch["sub_sub_category"];

    $deal_currency = $expired_deals_prep_fetch["currency"];

    $deal_discounted_price = $expired_deals_prep_fetch["discount_price"];

    $deal_old_price = $expired_deals_prep_fetch['old_price'];

    $deal_start_date = $expired_deals_prep_fetch["start_date"];

    $deal_end_date = $expired_deals_prep_fetch["end_date"];

    $deal_end_date = $expired_deals_prep_fetch["end_date"];

    $deal_link = $expired_deals_prep_fetch["link"];

    $img1 = $expired_deals_prep_fetch["img1"];

    $deal_trending = $expired_deals_prep_fetch["trending"];

    $deal_keywords = $expired_deals_prep_fetch["keywords"];

    



     $sql="INSERT INTO pending_deals(tittle,category,sub_category,sub_sub_category,currency,old_price,discount_price,img1,link,start_date,end_date,trending,keywords)

      VALUES(:tittle,:category,:sub_category,:sub_sub_category,:currency,:old_price,:discount_price,:img1,:link,:start_date,:end_date,:trending,:keywords)";

      $sth=$conn->prepare($sql);



      $sth->bindValue(':tittle',$deal_tittle);

      $sth->bindValue(':category', $deal_category);

      $sth->bindValue(':sub_category', $deal_sub_category);

      $sth->bindValue(':sub_sub_category', $deal_sub_sub_category);

      $sth->bindValue(':currency', $deal_currency);

      $sth->bindValue(':old_price', $deal_old_price);

      $sth->bindValue(':discount_price', $deal_discounted_price);

      $sth->bindValue(':img1', $img1);

      $sth->bindValue(':link', $deal_link);

      $sth->bindValue(':start_date', $deal_start_date);

      $sth->bindValue(':end_date', $deal_end_date);

      $sth->bindValue(':trending', $deal_trending);

      $sth->bindValue(':keywords', $deal_keywords);

      $sth->execute();

    $deal_delete="DELETE FROM expired_deals WHERE id=:id";

    $deal_delete_prep=$conn->prepare($deal_delete);

    $deal_delete_prep->bindValue(':id',$id);

    $deal_delete_prep->execute();



    //header("location:expired.php#filter_products_middle_deals");

  }

  

  



  else if(isset($_GET['giveaway_add'])){

    $id = $_GET['id'];

    $giveaways_end_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 5 days'));

     

    $expired_giveaways = "SELECT * FROM expired_giveaways WHERE id=:id";

    $expired_giveaways_prep=$conn->prepare($expired_giveaways);

    $expired_giveaways_prep->bindValue(':id',$id);

    $expired_giveaways_prep->execute();

    $expired_giveaways_prep_fetch=$expired_giveaways_prep->fetch(PDO::FETCH_ASSOC);

   

    $giveaway_company = $expired_giveaways_prep_fetch["company_name"];

    $giveaway_tittle = $expired_giveaways_prep_fetch["tittle"];

    $giveaway_category = $expired_giveaways_prep_fetch["category"];

    $giveaway_sub_category = $expired_giveaways_prep_fetch["sub_category"];

    $giveaway_sub_sub_category = $expired_giveaways_prep_fetch["sub_sub_category"] ?? "";

    $giveaway_start_date =$expired_giveaways_prep_fetch["start_date"];

    $giveaway_end_date = $_GET['giveaway_end_date'];

    $giveaway_link = $expired_giveaways_prep_fetch["link"];

    $logo = $expired_giveaways_prep_fetch["logo"];

    $coverphoto = $expired_giveaways_prep_fetch["cover_photo"];

    $giveaway_keywords = $expired_giveaways_prep_fetch["keywords"];







      $sql="INSERT INTO giveaways(company_name,tittle,category,sub_category,sub_sub_category,logo,cover_photo,link,start_date,end_date,keywords)

            VALUES(:company_name,:tittle,:category,:sub_category,:sub_sub_category,:logo,:cover_photo,:link,:start_date,:end_date,:keywords)";

      $sth=$conn->prepare($sql);



      $sth->bindValue(':company_name',$giveaway_company);

      $sth->bindValue(':tittle',$giveaway_tittle);

      $sth->bindValue(':category', $giveaway_category);

      $sth->bindValue(':sub_category', $giveaway_sub_category);

      $sth->bindValue(':sub_sub_category', $giveaway_sub_sub_category);

      $sth->bindValue(':logo', $logo);

      $sth->bindValue(':cover_photo', $coverphoto);

      $sth->bindValue(':link', $giveaway_link);

      $sth->bindValue(':start_date', $giveaway_start_date);

      $sth->bindValue(':end_date', $giveaway_end_date);

      $sth->bindValue(':keywords', $giveaway_keywords);

      $sth->execute(); 



      $giveaway_delete="DELETE FROM expired_giveaways WHERE id=:id";

      $giveaway_delete_prep=$conn->prepare($giveaway_delete);

      $giveaway_delete_prep->bindValue(':id',$id);

      $giveaway_delete_prep->execute();



      //header("location:expired.php#filter_products_middle_giveaways");



  }

  else if(isset($_GET['giveaway_delete'])){

     $id = $_GET['id'];

    $giveaway_delete="DELETE FROM expired_giveaways WHERE id=:id";

    $giveaway_delete_prep=$conn->prepare($giveaway_delete);

    $giveaway_delete_prep->bindValue(':id',$id);

    $giveaway_delete_prep->execute();



    //header("location:expired.php#filter_products_middle_giveaways");

  }

    else if(isset($_GET['pending_deals_add'])){

    $id = $_GET['id'];

    $page_number = $_GET['page_id'];

     $pending_end_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 5 days'));



    $pending_deals = "SELECT * FROM pending_deals WHERE id=:id";

    $pending_deals_prep=$conn->prepare($pending_deals);

    $pending_deals_prep->bindValue(':id',$id);

    $pending_deals_prep->execute();

    $pending_deals_prep_fetch=$pending_deals_prep->fetch(PDO::FETCH_ASSOC);

    $deal_tittle = $pending_deals_prep_fetch["tittle"];

    $deal_category = $pending_deals_prep_fetch["category"];

    $deal_sub_category = $pending_deals_prep_fetch["sub_category"];

    $deal_sub_sub_category = $pending_deals_prep_fetch["sub_sub_category"];

    $deal_currency = $_GET["currency"];

    $deal_discounted_price = $_GET['deal_discount_price'];

    $deal_old_price = $pending_deals_prep_fetch['old_price'];

    $deal_start_date = $pending_deals_prep_fetch["start_date"];

    $deal_end_date = $pending_end_date;

    $deal_link = $_GET['deal_discount_link'];

    $img1 = $pending_deals_prep_fetch["img1"];

    $deal_trending = $_GET["deal_trending"];;

    $deal_keywords = $pending_deals_prep_fetch["keywords"];

    



     $sql="INSERT INTO deals(tittle,category,sub_category,sub_sub_category,currency,old_price,discount_price,img1,link,start_date,end_date,trending,keywords)

      VALUES(:tittle,:category,:sub_category,:sub_sub_category,:currency,:old_price,:discount_price,:img1,:link,:start_date,:end_date,:trending,:keywords)";

      $sth=$conn->prepare($sql);



      $sth->bindValue(':tittle',$deal_tittle);

      $sth->bindValue(':category', $deal_category);

      $sth->bindValue(':sub_category', $deal_sub_category);

      $sth->bindValue(':sub_sub_category', $deal_sub_sub_category);

      $sth->bindValue(':currency', $deal_currency);

      $sth->bindValue(':old_price', $deal_old_price);

      $sth->bindValue(':discount_price', $deal_discounted_price);

      $sth->bindValue(':img1', $img1);

      $sth->bindValue(':link', $deal_link);

      $sth->bindValue(':start_date', $deal_start_date);

      $sth->bindValue(':end_date', $deal_end_date);

      $sth->bindValue(':trending', $deal_trending);

      $sth->bindValue(':keywords', $deal_keywords);

      $sth->execute();



      $pending_delete="DELETE FROM pending_deals WHERE id=:id";

      $pending_delete_prep=$conn->prepare($pending_delete);

      $pending_delete_prep->bindValue(':id',$id);

      $pending_delete_prep->execute(); 



        header("location:pending.php?p=".$page_number."");





  }

  else if(isset($_GET['pending_deals_delete'])){

    $id = $_GET['id'];

    $page_number = $_GET['page_id'];

    $pending_delete="DELETE FROM pending_deals WHERE id=:id";

    $pending_delete_prep=$conn->prepare($pending_delete);

    $pending_delete_prep->bindValue(':id',$id);

    $pending_delete_prep->execute(); 



      header("location:pending.php?p=".$page_number."");





  }

/*for edit.php*/

  else if(isset($_GET['edit_active_deals'])){

    $id = $_GET['active_id'];

    $active_end_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 5 days'));



    $deal_currency = $_GET['currency'];

    $deal_discounted_price = $_GET['deal_discount_price'];

    $deal_end_date = $active_end_date;

    $deal_link = $_GET['deal_discount_link'];

    $deal_trending = $_GET["deal_trending"];



    $sql = " UPDATE deals SET currency=:currency,discount_price =:discount_price,end_date =:end_date,link=:link,trending=:trending WHERE id=:id";



    $sth=$conn->prepare($sql);

    $sth->bindValue(':id',$id);

    $sth->bindValue(':currency',$deal_currency);

    $sth->bindValue(':discount_price',$deal_discounted_price);

    $sth->bindValue(':end_date',$deal_end_date);

    $sth->bindValue(':link', $deal_link);

    $sth->bindValue(':trending',$deal_trending);

   

       

    $sth->execute();

      

    

      



    header("location:edit.php");





  }

    else if(isset($_GET['edit_expired_deals'])){

    $id = $_GET['expired_id'];

    $expired_end_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 5 days'));



    $expired_deals = "SELECT * FROM expired_deals WHERE id=:id";

    $expired_deals_prep=$conn->prepare($expired_deals);

    $expired_deals_prep->bindValue(':id',$id);

    $expired_deals_prep->execute();



    $expired_deals_prep_fetch=$expired_deals_prep->fetch(PDO::FETCH_ASSOC);

    $deal_tittle = $expired_deals_prep_fetch["tittle"];

    $deal_category = $expired_deals_prep_fetch["category"];

    $deal_sub_category = $expired_deals_prep_fetch["sub_category"];

    $deal_sub_sub_category = $expired_deals_prep_fetch["sub_sub_category"];

    $deal_currency = $_GET['currency'];

    $deal_discounted_price = $_GET['deal_discount_price'];

    $deal_old_price = $expired_deals_prep_fetch['old_price'];

    $deal_start_date = $expired_deals_prep_fetch["start_date"];

    $deal_end_date = $expired_end_date;

    $deal_link = $_GET['deal_discount_link'];

    $img1 = $expired_deals_prep_fetch["img1"];

    $deal_trending = $_GET["deal_trending"];;

    $deal_keywords = $expired_deals_prep_fetch["keywords"];

    



    $sql="INSERT INTO deals(tittle,category,sub_category,sub_sub_category,currency,old_price,discount_price,img1,link,start_date,end_date,trending,keywords)

      VALUES(:tittle,:category,:sub_category,:sub_sub_category,:currency,:old_price,:discount_price,:img1,:link,:start_date,:end_date,:trending,:keywords)";

    $sth=$conn->prepare($sql);

    $sth->bindValue(':tittle',$deal_tittle);

    $sth->bindValue(':category', $deal_category);

    $sth->bindValue(':sub_category', $deal_sub_category);

    $sth->bindValue(':sub_sub_category', $deal_sub_sub_category);

    $sth->bindValue(':currency', $deal_currency);

    $sth->bindValue(':old_price', $deal_old_price);

    $sth->bindValue(':discount_price', $deal_discounted_price);

    $sth->bindValue(':img1', $img1);

    $sth->bindValue(':link', $deal_link);

    $sth->bindValue(':start_date', $deal_start_date);

    $sth->bindValue(':end_date', $deal_end_date);

    $sth->bindValue(':trending', $deal_trending);

    $sth->bindValue(':keywords', $deal_keywords);

       

    $sth->execute();

      

    



    $expired_delete="DELETE FROM expired_deals WHERE id=:id";

    $expired_delete_prep=$conn->prepare($expired_delete);

    $expired_delete_prep->bindValue(':id',$id);

    $expired_delete_prep->execute(); 



    header("location:edit.php");





  }

  else if(isset($_GET['edit_pending_deals'])){

    $id = $_GET['pending_id'];

    $pending_end_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 5 days'));



    $pending_deals = "SELECT * FROM pending_deals WHERE id=:id";

    $pending_deals_prep=$conn->prepare($pending_deals);

    $pending_deals_prep->bindValue(':id',$id);

    $pending_deals_prep->execute();



    $pending_deals_prep_fetch=$pending_deals_prep->fetch(PDO::FETCH_ASSOC);



    $deal_tittle = $pending_deals_prep_fetch["tittle"];

    $deal_category = $pending_deals_prep_fetch["category"];

    $deal_sub_category = $pending_deals_prep_fetch["sub_category"];

    $deal_sub_sub_category = $pending_deals_prep_fetch["sub_sub_category"];

    $deal_currency = $_GET['currency'];

    $deal_discounted_price = $_GET['deal_discount_price'];

    $deal_old_price = $pending_deals_prep_fetch['old_price'];

    $deal_start_date = $pending_deals_prep_fetch["start_date"];

    $deal_end_date = $expired_end_date;

    $deal_link = $_GET['deal_discount_link'];

    $img1 = $pending_deals_prep_fetch["img1"];

    $deal_trending = $_GET["deal_trending"];;

    $deal_keywords = $pending_deals_prep_fetch["keywords"];

    



    $sql="INSERT INTO deals(tittle,category,sub_category,sub_sub_category,currency,old_price,discount_price,img1,link,start_date,end_date,trending,keywords)

      VALUES(:tittle,:category,:sub_category,:sub_sub_category,:currency,:old_price,:discount_price,:img1,:link,:start_date,:end_date,:trending,:keywords)";

    $sth=$conn->prepare($sql);

    $sth->bindValue(':tittle',$deal_tittle);

    $sth->bindValue(':category', $deal_category);

    $sth->bindValue(':sub_category', $deal_sub_category);

    $sth->bindValue(':sub_sub_category', $deal_sub_sub_category);

    $sth->bindValue(':currency', $deal_currency);

    $sth->bindValue(':old_price', $deal_old_price);

    $sth->bindValue(':discount_price', $deal_discounted_price);

    $sth->bindValue(':img1', $img1);

    $sth->bindValue(':link', $deal_link);

    $sth->bindValue(':start_date', $deal_start_date);

    $sth->bindValue(':end_date', $pending_end_date);

    $sth->bindValue(':trending', $deal_trending);

    $sth->bindValue(':keywords', $deal_keywords);

       

    $sth->execute();

      

    



    $pending_delete="DELETE FROM pending_deals WHERE id=:id";

    $pending_delete_prep=$conn->prepare($pending_delete);

    $pending_delete_prep->bindValue(':id',$id);

    $pending_delete_prep->execute(); 



    header("location:edit.php");





  }







}



?>



