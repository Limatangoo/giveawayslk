
<?php 
session_start();
include '../includes/general-connect.php';
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
<link rel="stylesheet" href="../css/edit.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/brands.min.css">
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
<section class="search_area">
   <div class="search-wrap"> 
      <div class="gvaws-nav-search"  data-spm="search">
        <form action="https://giveaways.lk/offers.php" method="GET" autocomplete="off">
          <div class="search-box--2I2a">
            <div class="search-box__bar--29h6">
              <input type="search" id="m" name="m" placeholder="Search" class="search-box__input--O34g" tabindex="1" value="">
              <input type="hidden" name="_keyori" value="ss">
              <input type="hidden" name="from" value="input">
              <input type="hidden" name="spm" value="a2a0e.home.search.go.107d46259T1eYz">
            </div>
            <div class="search-box__search--2fC5">
              <button class="search-box__button--1oH7" tabindex="2" data-spm-click="gostr=/gvspub.header.search;locaid=d_go">SEARCH</button></div>
            </div>
          </form>
      </div>
   </div>
  
</section>
<section class="search_result">
  <div class="search_result_middle">
    <div class="search_result_middle_ajx">  
  
    </div>
  </div>

  
</section>






<script type="text/javascript" src="../js/edit.js"></script>

</body>
</html>


