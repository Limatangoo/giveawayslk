<?php 
session_start();
include '../includes/db_admin.php';
include '../includes/general-connect.php';
?>
<?php 
if(!isset($_SESSION['admin_email'])){
         header("location:login.php"); 
          exit();
    }
else{
    	if(isset($_POST["deal_submit"])){
    		//resizing function for two images
    		function resize_image($file,$max_resolution){
    		 if (file_exists($file)) {
			    if (pathinfo($file,PATHINFO_EXTENSION) == "jpg") {
                    $original_image = imagecreatefromjpeg($file);
                }elseif (pathinfo($file,PATHINFO_EXTENSION) == "gif") {
			        $original_image = imagecreatefromgif($file);
			    } elseif (pathinfo($file,PATHINFO_EXTENSION) == "jpeg") {
			        $original_image = imagecreatefromjpeg($file);
			    } elseif (pathinfo($file,PATHINFO_EXTENSION) == "webp") {
			        $original_image = imagecreatefromwebp($file);
			    }
    			

    			//resolution
    			$original_width = imagesx($original_image);
    			$original_height = imagesy($original_image);

    			//try width first
    			$ratio = $max_resolution/$original_width;
    			$new_width = $max_resolution;
    			$new_height = $original_height*$ratio;

    			//if that does not work
    			if($new_height>$max_resolution){
    				$ratio = $max_resolution / $original_height;
    				$new_height = $max_resolution;
    				$new_width = $original_width * $ratio;

    			}
    			if($original_image){
    				$new_image = imagecreatetruecolor($new_width, $new_height);
    				imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

    				imagejpeg($new_image,$file,90);
    			}
    		}

    	}


            $deal_tittle = $_POST["deal_tittle"];
    		$deal_category = $_POST["deal_category"];
            $deal_sub_category = $_POST["deal_sub_category"];
    		$deal_sub_sub_category = $_POST["deal_sub_sub_category"];
            $deal_currency = $_POST["currency"];
    		$deal_discounted_price = $_POST["deal_discounted_price"];
    		$deal_old_price = $_POST["deal_old_price"];
    		$deal_start_date = $_POST["deal_start_date"];
    		$deal_end_date = $_POST["deal_end_date"];
    		$deal_link = $_POST["deal_link"];
    		$img1 = $_FILES["img1"]["name"];
    		$deal_trending = $_POST["deal_trending"];
    		$deal_keywords = strtolower($deal_category."\n".$deal_sub_category."\n".$deal_sub_sub_category."\n".$_POST["deal_keywords"]);

            if($deal_start_date==""){
               $deal_start_date = date("Y-m-d"); 
            }
            if($deal_end_date==""){
               $deal_end_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 5 days'));
               
            }
           
			//renaming the two images
			
    		$extension1 = pathinfo($img1,PATHINFO_EXTENSION);
    		
    		$new_img1 = $deal_tittle.'.'.$extension1;

    		/* Validating and uploading  images */
        
			$target_dir_img1="../images/deals/";
			
			$target_file_img1=$target_dir_img1.$new_img1;

			move_uploaded_file($_FILES['img1']['tmp_name'],$target_file_img1);
			
			/*Resizing the two images*/
    		resize_image($target_file_img1,"200");
    		
			//inserting deal details

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
			$sth->bindValue(':img1', $new_img1);
            $sth->bindValue(':link', $deal_link);
            $sth->bindValue(':start_date', $deal_start_date);
			$sth->bindValue(':end_date', $deal_end_date);
			$sth->bindValue(':trending', $deal_trending);
			$sth->bindValue(':keywords', $deal_keywords);
		
			
		    $sth->execute(); 
		    header("Location: index.php#deal_form");


  }
 elseif(isset($_POST["giveaway_submit"])){
            //resizing functio for two images
            function resize_image($file,$max_resolution){
             if (file_exists($file)) {
                            
                  if (pathinfo($file,PATHINFO_EXTENSION) == "jpg") {
                    $original_image = imagecreatefromjpeg($file);
                }  elseif (pathinfo($file,PATHINFO_EXTENSION) == "gif") {
                    $original_image = imagecreatefromgif($file);
                } elseif (pathinfo($file,PATHINFO_EXTENSION) == "jpeg") {
                    $original_image = imagecreatefromjpeg($file);
                }elseif (pathinfo($file,PATHINFO_EXTENSION) == "webp") {
			        $original_image = imagecreatefromwebp($file);
			    }elseif (pathinfo($file,PATHINFO_EXTENSION) == "png") {
                    $original_image = imagecreatefrompng($file);
                }
                

                //resolution
                $original_width = imagesx($original_image);
                $original_height = imagesy($original_image);

                //try width first
                $ratio = $max_resolution/$original_width;
                $new_width = $max_resolution;
                $new_height = $original_height*$ratio;

                //if that does not work
                if($new_height>$max_resolution){
                    $ratio = $max_resolution / $original_height;
                    $new_height = $max_resolution;
                    $new_width = $original_width * $ratio;

                }
                if($original_image){
                    $new_image = imagecreatetruecolor($new_width, $new_height);
                    imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

                    imagejpeg($new_image,$file,90);
                }
            }

        }

            $giveaway_company = $_POST["giveaway_company"];
            $giveaway_tittle = $_POST["giveaway_tittle"];
            $giveaway_category = $_POST["giveaway_category"];
            $giveaway_sub_category = $_POST["giveaway_sub_category"];
            $giveaway_sub_sub_category = $_POST["giveaway_sub_sub_category"] ?? "";
            $giveaway_start_date = $_POST["giveaway_start_date"];
            $giveaway_end_date = $_POST["giveaway_end_date"];
            $giveaway_link = $_POST["giveaway_link"];
            $logo = $_FILES["logo"]["name"];
            $coverphoto = $_FILES["cover"]["name"];
            $giveaway_keywords = strtolower($giveaway_category."\n".$giveaway_sub_category."\n".$giveaway_sub_sub_category."\n".$_POST["giveaway_keywords"]);

            if($giveaway_start_date==""){
               $giveaway_start_date = date("Y-m-d"); 
            }
            if($giveaway_end_date==""){
               $giveaway_end_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 5 days'));
               
            }
           
            //renaming the two images
            
            $extension1 = pathinfo($logo,PATHINFO_EXTENSION);     
            $new_logo = $giveaway_company.'_logo.'.$extension1;

            $extension2 = pathinfo($coverphoto,PATHINFO_EXTENSION);     
            $new_cover = $giveaway_tittle.'_cover.'.$extension2;

            /* Validating and uploading  images */
        
            $target_dir_logo="../images/giveaways/logo/"; 
            $target_file_logo=$target_dir_logo.$new_logo;

            $target_dir_cover="../images/giveaways/cover/"; 
            $target_file_cover=$target_dir_cover.$new_cover;

            move_uploaded_file($_FILES['logo']['tmp_name'],$target_file_logo);
            move_uploaded_file($_FILES['cover']['tmp_name'],$target_file_cover);
            /*Resizing the two images*/
            resize_image($target_file_logo,"600");
            resize_image($target_file_cover,"600");

            

            
            //inserting giveaway details

            $sql="INSERT INTO giveaways(company_name,tittle,category,sub_category,sub_sub_category,logo,cover_photo,link,start_date,end_date,keywords)
            VALUES(:company_name,:tittle,:category,:sub_category,:sub_sub_category,:logo,:cover_photo,:link,:start_date,:end_date,:keywords)";
            $sth=$conn->prepare($sql);

            $sth->bindValue(':company_name',$giveaway_company);
            $sth->bindValue(':tittle',$giveaway_tittle);
            $sth->bindValue(':category', $giveaway_category);
            $sth->bindValue(':sub_category', $giveaway_sub_category);
            $sth->bindValue(':sub_sub_category', $giveaway_sub_sub_category);
            $sth->bindValue(':logo', $new_logo);
            $sth->bindValue(':cover_photo', $new_cover);
            $sth->bindValue(':link', $giveaway_link);
            $sth->bindValue(':start_date', $giveaway_start_date);
            $sth->bindValue(':end_date', $giveaway_end_date);
            $sth->bindValue(':keywords', $giveaway_keywords);
        
            
            $sth->execute(); 
            
            header("Location: index.php#giveaway_form");
       
       
      } 
    elseif(isset($_POST["bank_submit"])){
            //resizing functio for two images
            function resize_image($file,$max_resolution){
             if (file_exists($file)) {
                            
                  if (pathinfo($file,PATHINFO_EXTENSION) == "jpg") {
                    $original_image = imagecreatefromjpeg($file);
                }  elseif (pathinfo($file,PATHINFO_EXTENSION) == "gif") {
                    $original_image = imagecreatefromgif($file);
                } elseif (pathinfo($file,PATHINFO_EXTENSION) == "jpeg") {
                    $original_image = imagecreatefromjpeg($file);
                }elseif (pathinfo($file,PATHINFO_EXTENSION) == "webp") {
                    $original_image = imagecreatefromwebp($file);
                }elseif (pathinfo($file,PATHINFO_EXTENSION) == "png") {
                    $original_image = imagecreatefrompng($file);
                }
                

                //resolution
                $original_width = imagesx($original_image);
                $original_height = imagesy($original_image);

                //try width first
                $ratio = $max_resolution/$original_width;
                $new_width = $max_resolution;
                $new_height = $original_height*$ratio;

                //if that does not work
                if($new_height>$max_resolution){
                    $ratio = $max_resolution / $original_height;
                    $new_height = $max_resolution;
                    $new_width = $original_width * $ratio;

                }
                if($original_image){
                    $new_image = imagecreatetruecolor($new_width, $new_height);
                    imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

                    imagejpeg($new_image,$file,90);
                }
            }

        }

            $bank_name = $_POST["bank_name"];
            $card_type = $_POST["card_type"];
            $card_proccessor = $_POST["card_proccessor"];
            $bank_tittle = $_POST["bank_tittle"];
            $bank_discounted_percentage = $_POST["bank_discounted_percentage"];
            $bank_category = "Coupons & Promo Codes";
            $bank_sub_category = $_POST["bank_sub_category"];
            $bank_sub_sub_category = $_POST["bank_sub_sub_category"] ?? "";
            $bank_start_date = $_POST["bank_start_date"];
            $bank_end_date = $_POST["bank_end_date"];
            $bank_link = $_POST["bank_link"];
            $bank_cover = $_FILES["bank_cover"]["name"];
            $bank_keywords = strtolower($bank_name." ".$card_type." card offers\n".$card_proccessor." card offers\n");

            if($bank_start_date==""){
               $bank_start_date = date("Y-m-d"); 
            }
            if($bank_end_date==""){
               $bank_end_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 5 days'));
               
            }
           
            //renaming the two images
            

            $extension2 = pathinfo($bank_cover,PATHINFO_EXTENSION);     
            $new_cover = $bank_tittle.' '.$bank_name.' '.$card_type.' card offers_cover.'.$extension2;

            /* Validating and uploading  images */
        
            $target_dir_cover="../images/card_offers/"; 
            $target_file_cover=$target_dir_cover.$new_cover;

            move_uploaded_file($_FILES['bank_cover']['tmp_name'],$target_file_cover);
            /*Resizing the two images*/
        
            resize_image($target_file_cover,"600");

            

            
            //inserting card_offer details

            $sql="INSERT INTO card_offers(bank,tittle,card_type,proccessor_type,percentage,category,sub_category,cover_photo,link,start_date,end_date,photo_upload,keywords)
            VALUES(:bank,:tittle,:card_type,:proccessor_type,:percentage,:category,:sub_category,:cover_photo,:link,:start_date,:end_date,:photo_upload,:keywords)";
            $sth=$conn->prepare($sql);

            $sth->bindValue(':bank',$bank_name);
            $sth->bindValue(':tittle',$bank_tittle);
            $sth->bindValue(':card_type',$card_type);
            $sth->bindValue(':proccessor_type',$card_proccessor);
            $sth->bindValue(':percentage',$bank_discounted_percentage);
            $sth->bindValue(':category', $bank_category);
            $sth->bindValue(':sub_category', $bank_sub_category);
            $sth->bindValue(':cover_photo', $new_cover);
            $sth->bindValue(':link', $bank_link);
            $sth->bindValue(':start_date', $bank_start_date);
            $sth->bindValue(':end_date', $bank_end_date);
            $sth->bindValue(':photo_upload', 1);
            $sth->bindValue(':keywords', $bank_keywords);
        
            
            $sth->execute(); 
            
            
           //header("Location: index.php?bank=".$bank_name."&tittle=".$bank_tittle."&card_type=".$card_type."&proccessor_type=".$proccessor_type."&percentage=".$bank_discount_percentage."&category=".$bank_category."&sub_category=".$bank_sub_category."&sub_sub_category=".$bank_sub_sub_category."&cover_photo=".$new_cover."&link=".$bank_link."&start_date=".$bank_start_date."&end_date=".$bank_end_date."&keywords=".$bank_keywords."#giveaway_form");
       
      }
    elseif(isset($_POST["card_offers_photos_submit"])){

        $image_name = "SELECT id,tittle,cover_photo FROM card_offers WHERE photo_upload=0";
        $image_name_prep = $conn->prepare($image_name);
        $image_name_prep->execute();
        $image_name_prep_fetch=$image_name_prep->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $image_name_prep->fetch()) {
             
        // File upload configuration 
        $targetDir = "../images/card_offers/"; 
        $allowTypes = array('jpg','png','jpeg','gif'); 
         
        $fileNames = array_filter($_FILES['batch_images']['name']); 
        if(!empty($fileNames)){ 

            foreach($_FILES['batch_images']['name'] as $key=>$val){ 
                $db_photo = strtolower($row["tittle"]);
                $act_photo = strtolower(basename($_FILES['batch_images']['name'][$key]));
                
                $a1 = str_split(preg_replace('/\s+/','',preg_replace('/\\.[^.\\s]{3,4}$/','',$act_photo) ));//haystack
                $a2 = str_split(preg_replace('/\s+/','',$db_photo)); //needle
                $count_a1 = count($a1);
                $count_a2 = count($a2);
                if($count_a2 > $count_a1){
                   $a2 = str_split(preg_replace('/\s+/','',preg_replace('/\\.[^.\\s]{3,4}$/','',$act_photo) ));
                   $a1 = str_split(preg_replace('/\s+/','',$db_photo));
                }
                $match= 0;
                $chars_needle = count($a2);
                //finding the match 
                foreach($a2 as $key2=>$val2){
                  foreach($a1 as $key1=>$val1){
                   if($val1==$val2){
                      foreach($a2 as $key3=>$val3){
                        if($key3 == $key2+1){
                           foreach($a1 as $key4=>$val4){
                             if($val3 == $val4 && $key4==$key1+1){
                               $match+=1;
                             }
                           }
                        }
                      }
                   }
                  }
                }
               

                if(($match/$chars_needle)>0.65){
                // Check whether file type is valid 
                $target_file_cover=$targetDir.$row["cover_photo"];
                $fileType = pathinfo($target_file_cover, PATHINFO_EXTENSION); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to server 
                    copy($_FILES['batch_images']['tmp_name'][$key], $target_file_cover);

                    $update_photo_upload = "UPDATE card_offers SET photo_upload=1 WHERE id=".$row['id']."";
                    $update_photo_upload_prep = $conn->prepare($update_photo_upload);
                    $update_photo_upload_prep->execute();
                 


                 }
                 break; 
             }

            
              
                
            }
            
             

        }
        }


     } 
     
              elseif(isset($_POST["card_offers_pending_submit"])){

            
            $card_offer_id = $_POST["card_offer_id"];
            $card = "SELECT id,bank,sub_category,tittle,card_type,proccessor_type,percentage,cover_photo,start_date,end_date,link,keywords FROM expired_card_offers WHERE id=:id";
            $card_prep = $conn->prepare($card);
            $card_prep->bindValue(":id",$card_offer_id);
            $card_prep->execute();
            $detail = $card_prep->fetch(PDO::FETCH_ASSOC);

            $bank_name = $detail["bank"];
            $card_type = $detail["card_type"];
            $card_proccessor = $detail["proccessor_type"];
            $bank_tittle = $detail["tittle"];
            $bank_discounted_percentage = $_POST["card_offer_percentage"];
            $bank_category = "Coupons & Promo Codes";
            $bank_sub_category = $detail["sub_category"];
            $bank_start_date = $_POST["card_offer_startdate"];
            $bank_end_date = $_POST["card_offer_enddate"];
            $bank_link = $_POST["card_offer_link"];
            $bank_cover = $detail["cover_photo"];
            $bank_keywords = $detail["keywords"];
            
        
           //setting photo_upload to 0 if photo could not be found
            $dir=$_SERVER['DOCUMENT_ROOT'].'/images/card_offers';
            $files2 = scandir($dir);
            $array_found=array_search($bank_cover, $files2);
            
            if($array_found){
             $photo_upload = 1;
          }
          else{
            $photo_upload = 0;
          }
         

            

            
            //inserting card_offer details to active table

            $sql="INSERT INTO card_offers(bank,tittle,card_type,proccessor_type,percentage,category,sub_category,cover_photo,link,start_date,end_date,photo_upload,keywords)
            VALUES(:bank,:tittle,:card_type,:proccessor_type,:percentage,:category,:sub_category,:cover_photo,:link,:start_date,:end_date,:photo_upload,:keywords)";
            $sth=$conn->prepare($sql);

            $sth->bindValue(':bank',$bank_name);
            $sth->bindValue(':tittle',$bank_tittle);
            $sth->bindValue(':card_type',$card_type);
            $sth->bindValue(':proccessor_type',$card_proccessor);
            $sth->bindValue(':percentage',$bank_discounted_percentage);
            $sth->bindValue(':category', $bank_category);
            $sth->bindValue(':sub_category', $bank_sub_category);
            $sth->bindValue(':cover_photo', $bank_cover);
            $sth->bindValue(':link', $bank_link);
            $sth->bindValue(':start_date', $bank_start_date);
            $sth->bindValue(':end_date', $bank_end_date);
            $sth->bindValue(':photo_upload', $photo_upload);
            $sth->bindValue(':keywords', $bank_keywords);
        
            
            $sth->execute(); 

            //deleting the values from expired card_offer table
        $dlt_quary = "DELETE FROM expired_card_offers WHERE id=:id";
        $dlt_quary_prep = $conn->prepare($dlt_quary);
        $dlt_quary_prep->bindValue(":id",$detail["id"]);
        $dlt_quary_prep->execute();
                
       
     
            
        

     } 
    }  
?>