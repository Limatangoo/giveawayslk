<?php 
session_start();
?>
<?php include '../includes/db_admin.php'?>
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

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

<link rel="stylesheet" type="text/css" href="../css/admin.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<section class="admin_menu">
	<a href="expired.php">Expired</a>
    <a href="pending.php">pending</a>
    <a href="edit.php">Edit</a>
     <a href="pending_card_offers.php">pending card offers</a>
</section>
<section class="deal_form" id="deal_form">
	<form  name="deal_form" action="admin-tasks.php" enctype="multipart/form-data" method="POST">
		<h1>Deal</h1>
		<div class="Deal_0">
			<input type="text" name="deal_tittle" placeholder="Tittle">
		</div>
		<div class="Deal_1">
			<select name="deal_category" id="deal_category">
				  <option value="Electronic Devices" data-sub="deal_sub_category1">Electronic Devices</option>
				  <option value="Electronic Accessories" data-sub="deal_sub_category2">Electronic Accessories</option>
				  <option value="TV & Home Appliances" data-sub="deal_sub_category3">TV & Home Appliances</option>
				  <option value="Health & Beauty" data-sub="deal_sub_category4">Health & Beauty</option>
				  <option value="Babies & Toys" data-sub="deal_sub_category5">Babies & Toys</option>
				  <option value="Home & Lifestyle" data-sub="deal_sub_category6">Home & Lifestyle</option>
				  <option value="Womens Fashion" data-sub="deal_sub_category7">Womens Fashion</option>
				  <option value="Mens Fashion" data-sub="deal_sub_category8">Mens Fashion</option>
				  <option value="Watches & Wearables" data-sub="deal_sub_category9">Watches & Wearables</option>
				  <option value="Sports & Outdoor" data-sub="deal_sub_category10">Sports & Outdoor</option>
				  <option value="Automotive & Motorbike" data-sub="deal_sub_category11">Automotive & Motorbike</option>
				  <option value="Coupons & Promo Codes" data-sub="deal_sub_category12">Coupons & Promo Codes</option>
			
				 
			</select>
	    </div>
	    <div class="Deal_2">
			<select class="deal_sub_category"  name="deal_sub_category"  id="deal_sub_category1" >
				  <option value="Mobiles" data-sub="deal_sub_category1_1">Mobiles</option>
				  <option value="Tablets" data-sub="deal_sub_category1_2">Tablets</option>
				  <option value="Laptops" data-sub="deal_sub_category1_3">Laptops</option>
				  <option value="Desktops" data-sub="deal_sub_category1_4">Desktops</option>
				  <option value="Gaming Consoles" data-sub="deal_sub_category1_5">Gaming Consoles</option>
				  <option value="Cameras" data-sub="deal_sub_category1_6">Cameras</option>
				  <option value="Audio" data-sub="deal_sub_category1_7">Audio</option>
				 
			</select>
			<select class="deal_sub_category"  name=""  id="deal_sub_category2" >
				  <option value="Mobile Accessories" data-sub="deal_sub_category2_1">Mobile Accessories</option>
				  <option value="Gaming Accessories" data-sub="deal_sub_category2_2">Gaming Accessories</option>
				  <option value="Camera Accessories" data-sub="deal_sub_category2_3">Camera Accessories</option>
				  <option value="Computer Accessories" data-sub="deal_sub_category2_4">Computer Accessories</option>
				  <option value="Storage Devices" data-sub="deal_sub_category2_5">Storage Devices</option>
				  <option value="Printers & Fax Machines" data-sub="deal_sub_category2_6">Printers & Fax Machines</option>
				  <option value="Network Accessories" data-sub="deal_sub_category2_7">Network Accessories</option>
				  
			</select>
			<select class="deal_sub_category"  name=""  id="deal_sub_category3" >
				  <option value="Tv & Video devices" data-sub="deal_sub_category3_1">Tv & Video devices</option>
				  <option value="Home Audio" data-sub="deal_sub_category3_2">Home Audio</option>
				  <option value="Washing Machines">Washing Machines</option>
				  <option value="Refrigerators">Refrigerators</option>
				  <option value="Gas Burners">Gas Burners</option>
				  <option value="Sewing Machines">Sewing Machines</option>
				  <option value="Kitchen Appliances" data-sub="deal_sub_category3_3">Kitchen Appliances</option>
				  <option value="Cooling & Heating" data-sub="deal_sub_category3_4">Cooling & Heating</option>
				  <option value="Vacuums & Floor care" data-sub="deal_sub_category3_5">Vacuums & Floor care</option>
				  <option value="Irons">Irons</option>
			</select>
			<select class="deal_sub_category"  name=""  id="deal_sub_category4" >
				  <option value="Makeup" data-sub="deal_sub_category4_1">Makeup</option>
				  <option value="Fragrances" data-sub="deal_sub_category4_2">Fragrances</option>
				  <option value="Bath & Body" data-sub="deal_sub_category4_3">Bath & Body</option>
				  <option value="Beauty Tools" data-sub="deal_sub_category4_4">Beauty Tools</option>
				  <option value="Food Supplements" data-sub="deal_sub_category4_5">Food Supplements</option>
			</select>
			<select class="deal_sub_category"  name=""  id="deal_sub_category5" >
				  <option value="Toys">Toys</option>
				  <option value="Maternity Care">Maternity Care</option>
				  <option value="Clothing & Accessories">Clothing & Accessories</option>
				  
			</select>
			<select class="deal_sub_category"  name=""  id="deal_sub_category6" >
				  <option value="Bath" data-sub="deal_sub_category6_1">Bath</option>
				  <option value="Bedding" data-sub="deal_sub_category6_2">Bedding</option>
				  <option value="Decor" data-sub="deal_sub_category6_3">Decor</option>
				  <option value="Furniture" data-sub="deal_sub_category6_4">Furniture</option>
				  <option value="Outdoor Tools" data-sub="deal_sub_category6_5">Outdoor Tools</option>
				  <option value="Art & Craft">Art & Craft</option>
				  <option value="Music Instruments">Music Instruments</option>
			</select>
			<select class="deal_sub_category"  name=""  id="deal_sub_category7" >
				  <option value="Women Clothing" data-sub="deal_sub_category7_1">Women Clothing</option>
				  <option value="Bags" data-sub="deal_sub_category7_2">Bags</option>
				  <option value="Women Footwear" data-sub="deal_sub_category7_3">Women Footwear</option>
				  <option value="Lingerie, Sleep & Lounge" data-sub="deal_sub_category7_4">Lingerie, Sleep & Lounge</option>
				  <option value="Girls Fashion" data-sub="deal_sub_category7_5">Girls Fashion</option>
				  <option value="Women Perfumes" data-sub="deal_sub_category7_6">Women Perfumes</option>
				  <option value="Other Womens Accessories" data-sub="deal_sub_category7_7">Other Womens Accessories</option>
			</select>
			<select class="deal_sub_category"  name=""  id="deal_sub_category8" >
				 <option value="Men Clothing" data-sub="deal_sub_category8_1">Men Clothing</option>
				  <option value="Wallets & Bags" data-sub="deal_sub_category8_2">Wallets & Bags</option>
				  <option value="Men Footwear" data-sub="deal_sub_category8_3">Men Footwear</option>
				  <option value="Underwear">Underwear</option>
				  <option value="Other Mens Accessories" data-sub="deal_sub_category8_4">Other Mens Accessories</option>
				  <option value="Boys Fashion" data-sub="deal_sub_category8_5">Boys Fashion</option>
				  <option value="Men Perfumes" data-sub="deal_sub_category8_6">Men Perfumes</option>
				  
			</select>
			<select class="deal_sub_category"  name=""  id="deal_sub_category9" >
				  <option value="Mens Watches" data-sub="deal_sub_category9_1">Mens Watches</option>
				  <option value="Women Watches" data-sub="deal_sub_category9_2">Women Watches</option>
				  <option value="Unisex Watches">Unisex Watches</option>
				  <option value="Kid Watches">Kid Watches</option>
				  <option value="Sunglasses" data-sub="deal_sub_category9_3">Sunglasses</option>
				  <option value="Eyeglasses" data-sub="deal_sub_category9_4">Eyeglasses</option>
				  <option value="Mens Jewelry" data-sub="deal_sub_category9_5">Mens Jewelry</option>
				  <option value="Women Jewelry" data-sub="deal_sub_category9_6">Women Jewelry</option>
			</select>
			<select class="deal_sub_category"  name=""  id="deal_sub_category10" >
				  <option value="Men Shoes & Clothing">Men Shoes & Clothing</option>
				  <option value="Women Shoes & Clothing">Women Shoes & Clothing</option>
				  <option value="Outdoor Recreation" data-sub="deal_sub_category10_1">Outdoor Recreation</option>
				  <option value="Sports Equipment" data-sub="deal_sub_category10_2">Sports Equipment</option>
			</select>
			<select class="deal_sub_category"  name=""  id="deal_sub_category11" >
				  <option value="Automotive">Automotive</option>
			</select>
			<select class="deal_sub_category"  name=""  id="deal_sub_category12" >
				  <option value="Learning">Learning</option>
				  <option value="Food & Drink">Food & Drink</option>
				  <option value="Hotels & Travels">Hotels & Travels</option>
				  <option value="Entertainment">Entertainment</option>
				  <option value="Hosting">Hosting</option>
				  <option value="Auto Care">Auto Care</option>
			</select>
		</div>







		<div class="Deal_3">
			<select class="deal_sub_sub_category"  name="deal_sub_sub_category" id="deal_sub_category1_1" >
				  <option value="Samsung Phones">Samsung Phones</option>
				  <option value="Apple Phones">Apple Phones</option>
				  <option value="Huawei Phones">Huawei Phones</option>
				  <option value="Xiomi Phones">Xiomi Phones</option>
				  <option value="Vivo Phones">Vivo Phones</option>
				  <option value="Nokia Phones">Nokia Phones</option>
				  <option value="OnePlus Phones">OnePlus Phones</option>
				  <option value="HTC Phones">HTC Phones</option>
				  <option value="Google Phones">Google Phones</option>
				  <option value="Oppo Phones">Oppo Phones</option>
				  <option value="Sony Phones">Sony Phones</option>
				  <option value="Realme Phones">Realme Phones</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category1_3" >
				  <option value="Laptops & Notebooks">Laptops & Notebooks</option>
				  <option value="Gaming Laptops">Gaming Laptops</option>
				  <option value="Macbook">Macbook</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category1_5" >
				  <option value="Play Station Consoles">Play Station Consoles</option>
				  <option value="X Box Consoles">X Box Consoles</option>
				  <option value="Nintendo Consoles">Nintendo Consoles</option>
				  <option value="Other Gaming Consoles">Other Gaming Consoles</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category1_6" >
				  <option value="CCTV">CCTV</option>
				  <option value="DSLR">DSLR</option>
				  <option value="Drones">Drones</option>
				  <option value="Car Cameras">Car Cameras</option>
				  <option value="Video Cameras">Video Cameras</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category1_7" >
				  <option value="Headphones & Headset">Headphones & Headset</option>
				  <option value="Portable Players">Portable Players</option>
				  <option value="Stage Equipment">Stage Equipment</option>
			</select>




			<select class="deal_sub_sub_category"  name="" id="deal_sub_category2_1" >
				  <option value="Phone Cases">Phone Cases</option>
				  <option value="Power Banks">Power Banks</option>
				  <option value="Cables & Convertors">Cables & Convertors</option>
				  <option value="Wall Chargers">Wall Chargers</option>
				  <option value="Wireless Chargers">Wireless Chargers</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category2_2" >
				  <option value="Playstation Controllers">Playstation Controllers</option>
				  <option value="X Box Controllers">X Box Controllers</option>
				  <option value="Other Gaming Accessories">Other Gaming Accessories</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category2_3" >
				  <option value="Lenses">Lenses</option>
				  <option value="Batteries">Batteries</option>
				  <option value="Tripods & Monopods">Tripods & Monopods</option>
				  <option value="Lighting & Studio Equipment">Lighting & Studio Equipment</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category2_4" >
				  <option value="Monitors">Monitors</option>
				  <option value="Mice">Mice</option>
				  <option value="Adapters & Cables">Adapters & Cables</option>
				  <option value="Graphic Cards">Graphic Cards</option>
				  <option value="Desktop Casings">Desktop Casings</option>
				  <option value="Motherboards">Motherboards</option>
				  <option value="Fans & Heatsinks">Fans & Heatsinks</option>
				  <option value="Processors">Processors</option>
				  
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category2_5" >
				  <option value="External Hard Drives">External Hard Drives</option>
				  <option value="Internal Hard Drives">Internal Hard Drives</option>
				  <option value="Flash Drives">Flash Drives</option>
				  <option value="SD Cards">SD Cards</option>
			</select>

			<select class="deal_sub_sub_category"  name="" id="deal_sub_category2_6" >
				  <option value="Printers">Printers</option>
				  <option value="Ink & Toners">Ink & Toners</option>
				  <option value="Fax Machines">Fax Machines</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category2_7" >
				  <option value="Access Points">Access Points</option>
			</select>
			


			<select class="deal_sub_sub_category"  name="" id="deal_sub_category3_1" >
				  <option value="Projectors">Projectors</option>
				  <option value="LED Televisions">LED Televisions</option>
				  <option value="Smart Televisions">Smart Televisions</option>
				  <option value="OLED Televisions">OLED Televisions</option>
				  <option value="Other Televisions">Other Televisions</option>
				  <option value="Blu Ray/DVD Players">Blu Ray/DVD Players</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category3_2" >
				  <option value="Home Theater Systems">Home Theater Systems</option>
				  <option value="Cassettes & Audio Players">Cassettes & Audio Players</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category3_3" >
				  <option value="Rice Cooker">Rice Cooker</option>
				  <option value="Blender, Mixer & Grinder">Blender, Mixer & Grinder</option>
				  <option value="Electric Kettle">Electric Kettle</option>
				  <option value="Microwave & Oven">Microwave & Oven</option>
				  <option value="Toasters">Toasters</option>
				  <option value="Water Dispensers & Filters">Water Dispensers & Filters</option>
				  <option value="Juicer & Fruit Extraction">Juicer & Fruit Extraction</option>
				  <option value="Coffee Machines">Coffee Machines</option>
				  <option value="Pressure Cookers">Pressure Cookers</option>
				  <option value="Other Kitchen Appliances">Other Kitchen Appliances</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category3_4" >
				  <option value="Fan">Fan</option>
				  <option value="Air Conditioner">Air Conditioner</option>
				  <option value="Air Cooler">Air Cooler</option>
				  <option value="Heaters">Heaters</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category3_5" >
				  <option value="Vacuum Cleaner">Vacuum Cleaner</option>
				  <option value="Floor Polisher">Floor Polisher</option>
				  <option value="Steam Mop">Steam Mop</option>
			</select>


	        <select class="deal_sub_sub_category"  name="" id="deal_sub_category4_1" >
				  <option value="Face">Face</option>
				  <option value="Foundation">Foundation</option>
				  <option value="Lips">Lips</option>
				  <option value="Eyes">Eyes</option>
				  <option value="Nails">Nails</option>
				  <option value="Makeup Bags & Organizers">Makeup Bags & Organizers</option>
				  <option value="Makeup Accessories">Makeup Accessories</option>
				  <option value="Makeup Removers">Makeup Removers</option>
				  <option value="Manicure Kits">Manicure Kits</option>
				  <option value="Nail Polish">Nail Polish</option>
				  <option value="Lipsticks">Lipsticks</option>
				  <option value="Eyeliners">Eyeliners</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category4_2" >
				  <option value="Men Perfume">Men Perfume</option>
				  <option value="Women Perfume">Women Perfume</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category4_3" >
				  <option value="Body & Massage Oils">Body & Massage Oils</option>
				  <option value="Body Soaps & Shower Gels">Body Soaps & Shower Gels</option>
				  <option value="Foot Care">Foot Care</option>
				  <option value="Hair Removal">Hair Removal</option>
				  <option value="Hand Care">Hand Care</option>
				  <option value="Talcum Powder">Talcum Powder</option>
				  <option value="Body Scrubs">Body Scrubs</option>
				  <option value="Hand Washes & Sanitizers">Hand Washes & Sanitizers</option>
				  <option value="Foot Deodorant">Foot Deodorant</option>
			</select>
	        <select class="deal_sub_sub_category"  name="" id="deal_sub_category4_4" >
				  <option value="Curling Irons & Wands">Curling Irons & Wands</option>
				  <option value="Flat Irons">Flat Irons</option>
				  <option value="Hair Dryers">Hair Dryers</option>
				  <option value="Body Massage Tools">Body Massage Tools</option>
			</select>
			



	        <select class="deal_sub_sub_category"  name="" id="deal_sub_category6_1" >
				  <option value="Bath Mats">Bath Mats</option>
				  <option value="Bath Towels">Bath Towels</option>
				  <option value="Bathrobes">Bathrobes</option>
				  <option value="Bathroom Scales">Bathroom Scales</option>
				  <option value="Shower Caddies & Hangers">Shower Caddies & Hangers</option>
				  <option value="Shower Curtains">Shower Curtains</option>
				  <option value="Towel Rails & Warmers">Towel Rails & Warmers</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category6_2" >
				  <option value="Bed Sheets">Bed Sheets</option>
				  <option value="Bedding Accessories">Bedding Accessories</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category6_3" >
				  <option value="Artificial Flowers & Plants">Artificial Flowers & Plants</option>
				  <option value="Candles & Candleholders">Candles & Candleholders</option>
				  <option value="Clocks">Clocks</option>
				  <option value="Curtains">Curtains</option>
				  <option value="Cushions & Covers">Cushions & Covers</option>
				  <option value="Mirrors">Mirrors</option>
				  <option value="Picture Frames">Picture Frames</option>
				  <option value="Rugs & Carpets">Rugs & Carpets</option>
				  <option value="Vases & Vessels">Vases & Vessels</option>
				  <option value="Wall Stickers & Decals">Wall Stickers & Decals</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category6_4" >
				  <option value="Bedroom">Bedroom</option>
				  <option value="Kitchen">Kitchen</option>
				  <option value="Office">Office</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category6_5" >
				  <option value="Electrical">Electrical</option>
				  <option value="Hand Tools">Hand Tools</option>
				  <option value="Security Accessories">Security Accessories</option>
			</select>




			<select class="deal_sub_sub_category"  name="" id="deal_sub_category7_1" >
				  <option value="Sarees & Kurthas">Sarees & Kurthas</option>
				  <option value="Tops">Tops</option>
				  <option value="Formal Dresses">Formal Dresses</option>
				  <option value="Jackets & Coats">Jackets & Coats</option>
				  <option value="Jeans">Jeans</option>
				  <option value="Shorts">Shorts</option>
				  <option value="Skirts">Skirts</option>
				  <option value="Socks & Tights">Socks & Tights</option>
				  <option value="Sweaters & Cardigans">Sweaters & Cardigans</option>
				  <option value="Women Hoodies">Women Hoodies</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category7_2" >
				  <option value="Backpacks">Backpacks</option>
				  <option value="Tote Bags">Tote Bags</option>
				  <option value="Shoulder Bags">Shoulder Bags</option>
				  <option value="Wallet & Accessories">Wallet & Accessories</option>
				  <option value="Clutches">Clutches</option>
				  <option value="Top-Handle Bags">Top-Handle Bags</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category7_3" >
				  <option value="Girl Boots">Boots</option>
				  <option value="Flat Shoes">Flat Shoes</option>
				  <option value="Heels">Heels</option>
				  <option value="Sandals">Sandals</option>
				  <option value="Flip Flops">Flip Flops</option>
				  <option value="Sneakers">Sneakers</option>
				  <option value="Wedges">Wedges</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category7_4" >
				  <option value="Bras">Bras</option>
				  <option value="Camisoles & Slips">Camisoles & Slips</option>
				  <option value="Lingerie Sets">Lingerie Sets</option>
				  <option value="Panties">Panties</option>
				  <option value="Robes">Robes</option>
				  <option value="Shapewear">Shapewear</option>
				  <option value="Sleep & Loungewear">Sleep & Loungewear</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category7_5" >
				  <option value="Girls Clothing">Girls Clothing</option>
				  <option value="Girls Accessories">Girls Accessories</option>
				  <option value="Girls Shoes">Girls Shoes</option>
			</select>


			<select class="deal_sub_sub_category"  name="" id="deal_sub_category8_1" >
				  <option value="T-Shirts">T-Shirts</option>
				  <option value="Shirts">Shirts</option>
				  <option value="Trousers & Pants">Trousers & Pants</option>
				  <option value="Jeans">Jeans</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category8_2" >
				  <option value="Messenger Bags">Messenger Bags</option>
				  <option value="Backpacks">Backpacks</option>
				  <option value="Wallet & Accessories">Wallet & Accessories</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category8_3" >
				  <option value="Boots">Boots</option>
				  <option value="Flip Flops">Flip Flops</option>
				  <option value="Formal Shoes">Formal Shoes</option>
				  <option value="Sneakers">Sneakers</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category8_4" >
				  <option value="Belts">Belts</option>
				  <option value="Gloves">Gloves</option>
				  <option value="Socks">Socks</option>
				  <option value="Ties & Bow Ties">Ties & Bow Ties</option>
				  <option value="Umbrellas">Umbrellas</option>
				  <option value="Trimmers & Clippers">Trimmers & Clippers</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category8_5" >
				  <option value="Boys Clothing">Boys Clothing</option>
				  <option value="Boys Shoes">Boys Shoes</option>
			</select>



	        <select class="deal_sub_sub_category"  name="" id="deal_sub_category9_1" >
				  <option value="Casual Watches">Casual Watches</option>
				  <option value="Smart Watches">Smart Watches</option>
				  <option value="Sport Watches">Sport Watches</option>
			</select>
	        <select class="deal_sub_sub_category"  name="" id="deal_sub_category9_2" >
				  <option value="Casual Watches">Casual Watches</option>
				  <option value="Smart Watches">Smart Watches</option>
				  <option value="Sport Watches">Sport Watches</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category9_3" >
				  <option value="Men Sunglasses">Men Sunglasses</option>
				  <option value="Women Sunglasses">Women Sunglasses</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category9_4" >
				  <option value="Men Eyeglasses">Men Eyeglasses</option>
				  <option value="Women Eyeglasses">Women Eyeglasses</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category9_5" >
				  <option value="Bracelets">Bracelets</option>
				  <option value="Necklaces">Necklaces</option>
				  <option value="Rings">Rings</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category9_6" >
				  <option value="Bracelets">Bracelets</option>
				  <option value="Necklaces">Necklaces</option>
				  <option value="Rings">Rings</option>
				  <option value="Earings">Earings</option>
			</select>





			<select class="deal_sub_sub_category"  name="" id="deal_sub_category10_1" >
				  <option value="Cycling">Cycling</option>
				  <option value="Camping">Camping</option>
				  <option value="Fishing">Fishing</option>
			</select>
			<select class="deal_sub_sub_category"  name="" id="deal_sub_category10_2" >
				  <option value="Fitness Accessories">Fitness Accessories</option>
				  <option value="Water Sports">Water Sports</option>
				  <option value="Boxing & Martial Arts">Boxing & Martial Arts</option>
				  <option value="Racket Sports">Racket Sports</option>
				  <option value="Team Sports">Team Sports</option>
				  <option value="Other Sport Accessories">Other Sport Accessories</option>
			</select>
		</div>
		<div class="Deal_9">
			<input type="radio" id="currency1" name="currency" value="Rs" checked>
		    <label for="currency1">Rs</label><br>
		    <input type="radio" id="currency2" name="currency" value="$">
		    <label for="currency2">$</label><br>
		</div>
		<div class="Deal_4">
		<input type="Number" name="deal_discounted_price" placeholder="discounted_price"> 
		</div>
		<div class="Deal_4">
		<input type="Number" name="deal_old_price" placeholder="old_price"> 
		</div>
		<div class="Deal_5">
			<label for="date" >Start Date:<input type="date"  name="deal_start_date"></label>
		</div>
		<div class="Deal_6">
			<label for="date" >End Date:<input type="date"  name="deal_end_date"></label> 
		</div>
		<div class="Deal_7">
			<input type="text" name="deal_link" placeholder="deal_link"> 
		</div>
		<div class="Deal_8">
			<input type="file" name="img1" placeholder="img1" required> 
		</div>
		<div class="Deal_9">
			<input type="radio" id="deal_trending_yes" name="deal_trending" value="yes">
		    <label for="deal_trending_yes">yes</label><br>
		    <input type="radio" id="deal_trending_no" name="deal_trending" value="no" checked>
		    <label for="deal_trending_no">no</label><br>
		</div>
		<div class="Deal_10">
			<textarea id="deal_keywords" name="deal_keywords" rows="4" cols="50" placeholder="keywords"></textarea>
		</div>
		<div class="Deal_11">
			<input type="submit" name="deal_submit" id="deal_submit" value="Submit">
		</div>


	</form>
</section>
<!---End of deals Form --->


<section class="giveaway_form" id="giveaway_form">
	<form  name="giveaway_form" action="admin-tasks.php" enctype="multipart/form-data" method="POST">
		<h1>Giveaway</h1>
		<div class="giveaway_0">
			<input type="text" name="giveaway_company" placeholder="Comapany Name">
		</div>
		<div class="Deal_0">
			<input type="text" name="giveaway_tittle" placeholder="Tittle">
		</div>
		<div class="giveaway_1">
			<select name="giveaway_category" id="giveaway_category">
				  <option value="Electronic Devices" data-sub="giveaway_sub_category1">Electronic Devices</option>
				  <option value="Electronic Accessories" data-sub="giveaway_sub_category2">Electronic Accessories</option>
				  <option value="TV & Home Appliances" data-sub="giveaway_sub_category3">TV & Home Appliances</option>
				  <option value="Health & Beauty" data-sub="giveaway_sub_category4">Health & Beauty</option>
				  <option value="Babies & Toys" data-sub="giveaway_sub_category5">Babies & Toys</option>
				  <option value="Home & Lifestyle" data-sub="giveaway_sub_category6">Home & Lifestyle</option>
				  <option value="Womens Fashion" data-sub="giveaway_sub_category7">Womens Fashion</option>
				  <option value="Mens Fashion" data-sub="giveaway_sub_category8">Mens Fashion</option>
				  <option value="Watches & Wearables" data-sub="giveaway_sub_category9">Watches & Wearables</option>
				  <option value="Sports & Outdoor" data-sub="giveaway_sub_category10">Sports & Outdoor</option>
				  <option value="Automotive & Motorbike" data-sub="giveaway_sub_category11">Automotive & Motorbike</option>
				  <option value="Coupons & Promo Codes" data-sub="giveaway_sub_category12">Coupons & Promo Codes</option>
			
				 
			</select>
	    </div>
	    <div class="giveaway_2">
			<select class="giveaway_sub_category"  name="giveaway_sub_category"  id="giveaway_sub_category1" >
				  <option value="Mobiles" data-sub="giveaway_sub_category1_1">Mobiles</option>
				  <option value="Tablets" data-sub="giveaway_sub_category1_2">Tablets</option>
				  <option value="Laptops" data-sub="giveaway_sub_category1_3">Laptops</option>
				  <option value="Desktops" data-sub="giveaway_sub_category1_4">Desktops</option>
				  <option value="Gaming Consoles" data-sub="giveaway_sub_category1_5">Gaming Consoles</option>
				  <option value="Cameras" data-sub="giveaway_sub_category1_6">Cameras</option>
				  <option value="Audio" data-sub="giveaway_sub_category1_7">Audio</option>
				 
			</select>
			<select class="giveaway_sub_category"  name=""  id="giveaway_sub_category2" >
				  <option value="Mobile Accessories" data-sub="giveaway_sub_category2_1">Mobile Accessories</option>
				  <option value="Gaming Accessories" data-sub="giveaway_sub_category2_2">Gaming Accessories</option>
				  <option value="Camera Accessories" data-sub="giveaway_sub_category2_3">Camera Accessories</option>
				  <option value="Computer Accessories" data-sub="giveaway_sub_category2_4">Computer Accessories</option>
				  <option value="Storage Devices" data-sub="giveaway_sub_category2_5">Storage Devices</option>
				  <option value="Printers & Fax Machines" data-sub="giveaway_sub_category2_6">Printers & Fax Machines</option>
				  <option value="Network Accessories" data-sub="giveaway_sub_category2_7">Network Accessories</option>
				  
			</select>
			<select class="giveaway_sub_category"  name=""  id="giveaway_sub_category3" >
				  <option value="Tv & Video devices" data-sub="giveaway_sub_category3_1">Tv & Video devices</option>
				  <option value="Home Audio" data-sub="giveaway_sub_category3_2">Home Audio</option>
				  <option value="Washing Machines">Washing Machines</option>
				  <option value="Refrigerators">Refrigerators</option>
				  <option value="Gas Burners">Gas Burners</option>
				  <option value="Sewing Machines">Sewing Machines</option>
				  <option value="Kitchen Appliances" data-sub="giveaway_sub_category3_3">Kitchen Appliances</option>
				  <option value="Cooling & Heating" data-sub="giveaway_sub_category3_4">Cooling & Heating</option>
				  <option value="Vacuums & Floor care" data-sub="giveaway_sub_category3_5">Vacuums & Floor care</option>
				  <option value="Irons">Irons</option>
			</select>
			<select class="giveaway_sub_category"  name=""  id="giveaway_sub_category4" >
				  <option value="Makeup" data-sub="giveaway_sub_category4_1">Makeup</option>
				  <option value="Fragrances" data-sub="giveaway_sub_category4_2">Fragrances</option>
				  <option value="Bath & Body" data-sub="giveaway_sub_category4_3">Bath & Body</option>
				  <option value="Beauty Tools" data-sub="giveaway_sub_category4_4">Beauty Tools</option>
				  <option value="Food Supplements" data-sub="giveaway_sub_category4_5">Food Supplements</option>
			</select>
			<select class="giveaway_sub_category"  name=""  id="giveaway_sub_category5" >
				  <option value="Toys">Toys</option>
				  <option value="Maternity Care">Maternity Care</option>
				  <option value="Clothing & Accessories">Clothing & Accessories</option>
				  
			</select>
			<select class="giveaway_sub_category"  name=""  id="giveaway_sub_category6" >
				  <option value="Bath" data-sub="giveaway_sub_category6_1">Bath</option>
				  <option value="Bedding" data-sub="giveaway_sub_category6_2">Bedding</option>
				  <option value="Decor" data-sub="giveaway_sub_category6_3">Decor</option>
				  <option value="Furniture" data-sub="giveaway_sub_category6_4">Furniture</option>
				  <option value="Outdoor Tools" data-sub="giveaway_sub_category6_5">Outdoor Tools</option>
				  <option value="Art & Craft">Art & Craft</option>
				  <option value="Music Instruments">Music Instruments</option>
			</select>
			<select class="giveaway_sub_category"  name=""  id="giveaway_sub_category7" >
				  <option value="Women Clothing" data-sub="giveaway_sub_category7_1">Women Clothing</option>
				  <option value="Bags" data-sub="giveaway_sub_category7_2">Bags</option>
				  <option value="Women Footwear" data-sub="giveaway_sub_category7_3">Women Footwear</option>
				  <option value="Lingerie, Sleep & Lounge" data-sub="giveaway_sub_category7_4">Lingerie, Sleep & Lounge</option>
				  <option value="Girls Fashion" data-sub="giveaway_sub_category7_5">Girls Fashion</option>
				  <option value="Women Perfumes" data-sub="giveaway_sub_category7_6">Women Perfumes</option>
				  <option value="Other Womens Accessories" data-sub="giveaway_sub_category7_7">Other Womens Accessories</option>
			</select>
			<select class="giveaway_sub_category"  name=""  id="giveaway_sub_category8" >
				  <option value="Men Clothing" data-sub="giveaway_sub_category8_1">Men Clothing</option>
				  <option value="Wallets & Bags" data-sub="giveaway_sub_category8_2">Wallets & Bags</option>
				  <option value="Men Footwear" data-sub="giveaway_sub_category8_3">Men Footwear</option>
				  <option value="Underwear">Underwear</option>
				  <option value="Other Mens Accessories" data-sub="giveaway_sub_category8_4">Other Mens Accessories</option>
				  <option value="Boys Fashion" data-sub="giveaway_sub_category8_5">Boys Fashion</option>
				  <option value="Men Perfumes" data-sub="giveaway_sub_category8_6">Men Perfumes</option>
				  
			</select>
			<select class="giveaway_sub_category"  name=""  id="giveaway_sub_category9" >
				  <option value="Mens Watches" data-sub="giveaway_sub_category9_1">Mens Watches</option>
				  <option value="Women Watches" data-sub="giveaway_sub_category9_2">Women Watches</option>
				  <option value="Unisex Watches">Unisex Watches</option>
				  <option value="Kid Watches">Kid Watches</option>
				  <option value="Sunglasses" data-sub="giveaway_sub_category9_3">Sunglasses</option>
				  <option value="Eyeglasses" data-sub="giveaway_sub_category9_4">Eyeglasses</option>
				  <option value="Mens Jewelry" data-sub="giveaway_sub_category9_5">Mens Jewelry</option>
				  <option value="Women Jewelry" data-sub="giveaway_sub_category9_6">Women Jewelry</option>
			</select>
			<select class="giveaway_sub_category"  name=""  id="giveaway_sub_category10" >
				  <option value="Men Shoes & Clothing">Men Shoes & Clothing</option>
				  <option value="Women Shoes & Clothing">Women Shoes & Clothing</option>
				  <option value="Outdoor Recreation" data-sub="giveaway_sub_category10_1">Outdoor Recreation</option>
				  <option value="Sports Equipment" data-sub="giveaway_sub_category10_2">Sports Equipment</option>
			</select>
			<select class="giveaway_sub_category"  name=""  id="giveaway_sub_category11" >
				  <option value="Automotive">Automotive</option>
			</select>
			<select class="giveaway_sub_category"  name=""  id="giveaway_sub_category12" >
				  <option value="Learning">Learning</option>
				  <option value="Food & Drink">Food & Drink</option>
				  <option value="Hotels & Travels">Hotels & Travels</option>
				  <option value="Entertainment">Entertainment</option>
				  <option value="Hosting">Hosting</option>
				  <option value="Auto Care">Auto Care</option>
			</select>
		</div>







		<div class="giveaway_3">
			<select class="giveaway_sub_sub_category"  name="giveaway_sub_sub_category" id="giveaway_sub_category1_1" >
				  <option value="Samsung Phones">Samsung Phones</option>
				  <option value="Apple Phones">Apple Phones</option>
				  <option value="Huawei Phones">Huawei Phones</option>
				  <option value="Xiomi Phones">Xiomi Phones</option>
				  <option value="Vivo Phones">Vivo Phones</option>
				  <option value="Nokia Phones">Nokia Phones</option>
				  <option value="OnePlus Phones">OnePlus Phones</option>
				  <option value="HTC Phones">HTC Phones</option>
				  <option value="Google Phones">Google Phones</option>
				  <option value="Oppo Phones">Oppo Phones</option>
				  <option value="Sony Phones">Sony Phones</option>
				  <option value="Realme Phones">Realme Phones</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category1_3" >
				  <option value="Laptops & Notebooks">Laptops & Notebooks</option>
				  <option value="Gaming Laptops">Gaming Laptops</option>
				  <option value="Macbook">Macbook</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category1_5" >
				  <option value="Play Station Consoles">Play Station Consoles</option>
				  <option value="X Box Consoles">X Box Consoles</option>
				  <option value="Nintendo Consoles">Nintendo Consoles</option>
				  <option value="Other Gaming Consoles">Other Gaming Consoles</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category1_6" >
				  <option value="CCTV">CCTV</option>
				  <option value="DSLR">DSLR</option>
				  <option value="Drones">Drones</option>
				  <option value="Car Cameras">Car Cameras</option>
				  <option value="Video Cameras">Video Cameras</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category1_7" >
				  <option value="Headphones & Headset">Headphones & Headset</option>
				  <option value="Portable Players">Portable Players</option>
				  <option value="Stage Equipment">Stage Equipment</option>
			</select>




			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category2_1" >
				  <option value="Phone Cases">Phone Cases</option>
				  <option value="Power Banks">Power Banks</option>
				  <option value="Cables & Convertors">Cables & Convertors</option>
				  <option value="Wall Chargers">Wall Chargers</option>
				  <option value="Wireless Chargers">Wireless Chargers</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category2_2" >
				  <option value="Playstation Controllers">Playstation Controllers</option>
				  <option value="X Box Controllers">X Box Controllers</option>
				  <option value="Other Gaming Accessories">Other Gaming Accessories</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category2_3" >
				  <option value="Lenses">Lenses</option>
				  <option value="Batteries">Batteries</option>
				  <option value="Tripods & Monopods">Tripods & Monopods</option>
				  <option value="Lighting & Studio Equipment">Lighting & Studio Equipment</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category2_4" >
				  <option value="Monitors">Monitors</option>
				  <option value="Mice">Mice</option>
				  <option value="Adapters & Cables">Adapters & Cables</option>
				  <option value="Graphic Cards">Graphic Cards</option>
				  <option value="Desktop Casings">Desktop Casings</option>
				  <option value="Motherboards">Motherboards</option>
				  <option value="Fans & Heatsinks">Fans & Heatsinks</option>
				  <option value="Processors">Processors</option>
				  
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category2_5" >
				  <option value="External Hard Drives">External Hard Drives</option>
				  <option value="Internal Hard Drives">Internal Hard Drives</option>
				  <option value="Flash Drives">Flash Drives</option>
				  <option value="SD Cards">SD Cards</option>
			</select>

			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category2_6" >
				  <option value="Printers">Printers</option>
				  <option value="Ink & Toners">Ink & Toners</option>
				  <option value="Fax Machines">Fax Machines</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category2_7" >
				  <option value="Access Points">Access Points</option>
			</select>
			


			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category3_1" >
				  <option value="Projectors">Projectors</option>
				  <option value="LED Televisions">LED Televisions</option>
				  <option value="Smart Televisions">Smart Televisions</option>
				  <option value="OLED Televisions">OLED Televisions</option>
				  <option value="Other Televisions">Other Televisions</option>
				  <option value="Blu Ray/DVD Players">Blu Ray/DVD Players</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category3_2" >
				  <option value="Home Theater Systems">Home Theater Systems</option>
				  <option value="Cassettes & Audio Players">Cassettes & Audio Players</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category3_3" >
				  <option value="Rice Cooker">Rice Cooker</option>
				  <option value="Blender, Mixer & Grinder">Blender, Mixer & Grinder</option>
				  <option value="Electric Kettle">Electric Kettle</option>
				  <option value="Microwave & Oven">Microwave & Oven</option>
				  <option value="Toasters">Toasters</option>
				  <option value="Water Dispensers & Filters">Water Dispensers & Filters</option>
				  <option value="Juicer & Fruit Extraction">Juicer & Fruit Extraction</option>
				  <option value="Coffee Machines">Coffee Machines</option>
				  <option value="Pressure Cookers">Pressure Cookers</option>
				  <option value="Other Kitchen Appliances">Other Kitchen Appliances</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category3_4" >
				  <option value="Fan">Fan</option>
				  <option value="Air Conditioner">Air Conditioner</option>
				  <option value="Air Cooler">Air Cooler</option>
				  <option value="Heaters">Heaters</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category3_5" >
				  <option value="Vacuum Cleaner">Vacuum Cleaner</option>
				  <option value="Floor Polisher">Floor Polisher</option>
				  <option value="Steam Mop">Steam Mop</option>
			</select>


	        <select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category4_1" >
				  <option value="Face">Face</option>
				  <option value="Foundation">Foundation</option>
				  <option value="Lips">Lips</option>
				  <option value="Eyes">Eyes</option>
				  <option value="Nails">Nails</option>
				  <option value="Makeup Bags & Organizers">Makeup Bags & Organizers</option>
				  <option value="Makeup Accessories">Makeup Accessories</option>
				  <option value="Makeup Removers">Makeup Removers</option>
				  <option value="Manicure Kits">Manicure Kits</option>
				  <option value="Nail Polish">Nail Polish</option>
				  <option value="Lipsticks">Lipsticks</option>
				  <option value="Eyeliners">Eyeliners</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category4_2" >
				  <option value="Men Perfume">Men Perfume</option>
				  <option value="Women Perfume">Women Perfume</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category4_3" >
				  <option value="Body & Massage Oils">Body & Massage Oils</option>
				  <option value="Body Soaps & Shower Gels">Body Soaps & Shower Gels</option>
				  <option value="Foot Care">Foot Care</option>
				  <option value="Hair Removal">Hair Removal</option>
				  <option value="Hand Care">Hand Care</option>
				  <option value="Talcum Powder">Talcum Powder</option>
				  <option value="Body Scrubs">Body Scrubs</option>
				  <option value="Hand Washes & Sanitizers">Hand Washes & Sanitizers</option>
				  <option value="Foot Deodorant">Foot Deodorant</option>
			</select>
	        <select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category4_4" >
				  <option value="Curling Irons & Wands">Curling Irons & Wands</option>
				  <option value="Flat Irons">Flat Irons</option>
				  <option value="Hair Dryers">Hair Dryers</option>
				  <option value="Body Massage Tools">Body Massage Tools</option>
			</select>
			



	        <select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category6_1" >
				  <option value="Bath Mats">Bath Mats</option>
				  <option value="Bath Towels">Bath Towels</option>
				  <option value="Bathrobes">Bathrobes</option>
				  <option value="Bathroom Scales">Bathroom Scales</option>
				  <option value="Shower Caddies & Hangers">Shower Caddies & Hangers</option>
				  <option value="Shower Curtains">Shower Curtains</option>
				  <option value="Towel Rails & Warmers">Towel Rails & Warmers</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category6_2" >
				  <option value="Bed Sheets">Bed Sheets</option>
				  <option value="Bedding Accessories">Bedding Accessories</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category6_3" >
				  <option value="Artificial Flowers & Plants">Artificial Flowers & Plants</option>
				  <option value="Candles & Candleholders">Candles & Candleholders</option>
				  <option value="Clocks">Clocks</option>
				  <option value="Curtains">Curtains</option>
				  <option value="Cushions & Covers">Cushions & Covers</option>
				  <option value="Mirrors">Mirrors</option>
				  <option value="Picture Frames">Picture Frames</option>
				  <option value="Rugs & Carpets">Rugs & Carpets</option>
				  <option value="Vases & Vessels">Vases & Vessels</option>
				  <option value="Wall Stickers & Decals">Wall Stickers & Decals</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category6_4" >
				  <option value="Bedroom">Bedroom</option>
				  <option value="Kitchen">Kitchen</option>
				  <option value="Office">Office</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category6_5" >
				  <option value="Electrical">Electrical</option>
				  <option value="Hand Tools">Hand Tools</option>
				  <option value="Security Accessories">Security Accessories</option>
			</select>




			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category7_1" >
				  <option value="Sarees & Kurthas">Sarees & Kurthas</option>
				  <option value="Tops">Tops</option>
				  <option value="Formal Dresses">Formal Dresses</option>
				  <option value="Jackets & Coats">Jackets & Coats</option>
				  <option value="Jeans">Jeans</option>
				  <option value="Shorts">Shorts</option>
				  <option value="Skirts">Skirts</option>
				  <option value="Socks & Tights">Socks & Tights</option>
				  <option value="Sweaters & Cardigans">Sweaters & Cardigans</option>
				  <option value="Women Hoodies">Women Hoodies</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category7_2" >
				  <option value="Backpacks">Backpacks</option>
				  <option value="Tote Bags">Tote Bags</option>
				  <option value="Shoulder Bags">Shoulder Bags</option>
				  <option value="Wallet & Accessories">Wallet & Accessories</option>
				  <option value="Clutches">Clutches</option>
				  <option value="Top-Handle Bags">Top-Handle Bags</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category7_3" >
				  <option value="Girl Boots">Boots</option>
				  <option value="Flat Shoes">Flat Shoes</option>
				  <option value="Heels">Heels</option>
				  <option value="Sandals">Sandals</option>
				  <option value="Flip Flops">Flip Flops</option>
				  <option value="Sneakers">Sneakers</option>
				  <option value="Wedges">Wedges</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category7_4" >
				  <option value="Bras">Bras</option>
				  <option value="Camisoles & Slips">Camisoles & Slips</option>
				  <option value="Lingerie Sets">Lingerie Sets</option>
				  <option value="Panties">Panties</option>
				  <option value="Robes">Robes</option>
				  <option value="Shapewear">Shapewear</option>
				  <option value="Sleep & Loungewear">Sleep & Loungewear</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category7_5" >
				  <option value="Girls Clothing">Girls Clothing</option>
				  <option value="Girls Accessories">Girls Accessories</option>
				  <option value="Girls Shoes">Girls Shoes</option>
			</select>


			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category8_1" >
				  <option value="T-Shirts">T-Shirts</option>
				  <option value="Shirts">Shirts</option>
				  <option value="Trousers & Pants">Trousers & Pants</option>
				  <option value="Jeans">Jeans</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category8_2" >
				  <option value="Messenger Bags">Messenger Bags</option>
				  <option value="Backpacks">Backpacks</option>
				  <option value="Wallet & Accessories">Wallet & Accessories</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category8_3" >
				  <option value="Boots">Boots</option>
				  <option value="Flip Flops">Flip Flops</option>
				  <option value="Formal Shoes">Formal Shoes</option>
				  <option value="Sneakers">Sneakers</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category8_4" >
				  <option value="Belts">Belts</option>
				  <option value="Gloves">Gloves</option>
				  <option value="Socks">Socks</option>
				  <option value="Ties & Bow Ties">Ties & Bow Ties</option>
				  <option value="Umbrellas">Umbrellas</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category8_5" >
				  <option value="Boys Clothing">Boys Clothing</option>
				  <option value="Boys Shoes">Boys Shoes</option>
			</select>



	        <select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category9_1" >
				  <option value="Casual Watches">Casual Watches</option>
				  <option value="Smart Watches">Smart Watches</option>
				  <option value="Sport Watches">Sport Watches</option>
			</select>
	        <select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category9_2" >
				  <option value="Casual Watches">Casual Watches</option>
				  <option value="Smart Watches">Smart Watches</option>
				  <option value="Sport Watches">Sport Watches</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category9_3" >
				  <option value="Men Sunglasses">Men Sunglasses</option>
				  <option value="Women Sunglasses">Women Sunglasses</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category9_4" >
				  <option value="Men Eyeglasses">Men Eyeglasses</option>
				  <option value="Women Eyeglasses">Women Eyeglasses</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category9_5" >
				  <option value="Bracelets">Bracelets</option>
				  <option value="Necklaces">Necklaces</option>
				  <option value="Rings">Rings</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category9_6" >
				  <option value="Bracelets">Bracelets</option>
				  <option value="Necklaces">Necklaces</option>
				  <option value="Rings">Rings</option>
				  <option value="Earings">Earings</option>
			</select>





			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category10_1" >
				  <option value="Cycling">Cycling</option>
				  <option value="Camping">Camping</option>
				  <option value="Fishing">Fishing</option>
			</select>
			<select class="giveaway_sub_sub_category"  name="" id="giveaway_sub_category10_2" >
				  <option value="Fitness Accessories">Fitness Accessories</option>
				  <option value="Water Sports">Water Sports</option>
				  <option value="Boxing & Martial Arts">Boxing & Martial Arts</option>
				  <option value="Racket Sports">Racket Sports</option>
				  <option value="Team Sports">Team Sports</option>
				  <option value="Other Sports Accessories">Other Sports Accessories</option>
			</select>
		</div>
		<div class="giveaway_5">
			<label for="date" >Start Date:<input type="date"  name="giveaway_start_date"></label>
		</div>
		<div class="giveaway_6">
			<label for="date" >End Date:<input type="date"  name="giveaway_end_date"></label> 
		</div>
		<div class="giveaway_7">
			<input type="text" name="giveaway_link" placeholder="giveaway_link"> 
		</div>
		<div class="giveaway_8">
			<p>Logo</p>
			<input type="file" name="logo" placeholder="logo"> 
		</div>
		<div class="giveaway_8">
			<p>Cover Photo</p>
			<input type="file" name="cover" placeholder="cover photo"> 
		</div>
		
		<div class="giveaway_10">
			<textarea id="giveaway_keywords" name="giveaway_keywords" rows="4" cols="50" placeholder="keywords"></textarea>
		</div>
		<div class="giveaway_11">
			<input type="submit" name="giveaway_submit" id="giveaway_submit" value="Submit">
		</div>


	</form>
</section>
<!--end of giveaway form-->
<section class="bank_form" id="bank_form">
	<form  name="bank_form" action="admin-tasks.php" enctype="multipart/form-data" method="POST" autocomplete="on">
		<h1>Bank offers</h1>
		<div class="giveaway_0">
			<select name="bank_name" id="bank_name" autocomplete="on">
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
				  <option value="HSBC">HSBC</option>
			
				 
			</select>
		</div>
		<div class="Deal_0">
			<select name="card_type" id="card_type">
				  <option value="Debit">Debit</option>
				  <option value="Credit">Credit</option>
				 
			</select>
		</div>
		<div class="Deal_0">
			<select name="card_proccessor" id="card_proccessor">
				  <option value="Visa">Visa</option>
				  <option value="Master Card">Master Card</option>
				  <option value="Amex">Amex</option>
				  <option value="Discover">Discover</option>
				 
			</select>
		</div>
		<div class="Deal_0">
			<input type="text" name="bank_tittle" placeholder="Tittle" autocomplete="on">
		</div>
		<div class="Deal_4">
		  <input type="Number" name="bank_discounted_percentage" placeholder="discounted percentage"> 
		</div>
		
			<select class="bank_sub_category"  name="bank_sub_category"  id="bank_sub_category12" >
			    <option value="Hosting">Hosting</option>
				  <option value="Learning">Learning</option>
				  <option value="Lifestyle">Lifestyle</option>
				  <option value="Auto Care">Auto Care</option>
				  <option value="Food & Drink">Food & Drink</option>
				  <option value="Entertainment">Entertainment</option>
				  <option value="Supermarkets">Supermarkets</option>
				  <option value="Fashion & Other">Fashion & Other</option>
				  <option value="Hotels & Travels">Hotels & Travels</option>
				  <option value="Health & Insurance">Health & Insurance</option>
			</select>
		</div>







		
		<div class="giveaway_5">
			<label for="date" >Start Date:<input type="date"  name="bank_start_date"></label>
		</div>
		<div class="giveaway_6">
			<label for="date" >End Date:<input type="date"  name="bank_end_date"></label> 
		</div>
		<div class="giveaway_7">
			<input type="text" name="bank_link" placeholder="offer_link"> 
		</div>
		
		<div class="giveaway_8">
			<p>Cover Photo</p>
			<input type="file" name="bank_cover" placeholder="cover photo" required> 
		</div>
		
		<div class="giveaway_11">
			<input type="submit" name="bank_submit" id="bank_submit" value="Submit">
		</div>


	</form>
	

</section>

<Section class="container my-3" style="text-align:center">
  	<div class="col-sm-6" style="border:1px solid red">
  	    <h3>Card offers batch upload</h3>
  	    <form action="admin-tasks.php" enctype="multipart/form-data" method="POST">
  	    	<input id="file" type="file" name="batch_images[]" multiple>
  	    	<button class="bg-warning" type="submit" name="card_offers_photos_submit">Submit now</button>
  	    </form> 
  	</div>	
 </section>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="admin.js"></script>
</body>
</html>



  