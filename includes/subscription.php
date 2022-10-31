<?php 

if( isset($_POST["email"])){

  include '../databaseConnections/db_subscription.php';



  function test_input($data){

		$data=trim($data);

		$data=stripslashes($data);

		$data=htmlspecialchars($data);

		return $data;

	}

	if (isset($_POST["email"]) && $_POST["email"]!=""&& !empty(trim($_POST['email']))) {

	   $email = test_input($_POST["email"]);

	   $dream_item = strtolower(test_input($_POST["dream_item"]));

	} 

	else {

	 echo ("email error");

			exit();

	}



	$chk="SELECT email,item FROM dream_item WHERE email=:email";

		$chk_prep=$conn3->prepare($chk);

		$chk_prep->bindValue(':email',$email);

		$chk_prep_fetch=$chk_prep->setFetchMode(PDO::FETCH_ASSOC);

	  $chk_prep->execute();



		if($chk_prep_fetch){

			$chk_prep_data = $chk_prep->fetch();

			if($chk_prep_data['email']==$email && $chk_prep_data['item']==$dream_item){

           print ("You have already submitted");

			}

			else{

	    	$sql="INSERT INTO dream_item(email,item) VALUES(:email,:item)";

			  $sth=$conn3->prepare($sql);

			  $sth->bindValue(':email', $email);

			  $sth->bindValue(':item', $dream_item);

		    $sth->execute();



		    print("Thank you!! We will let you know when the best deal available");

		}

			



		}



	 





 

}







?>