<?php include '../databaseConnections/general-connect.php'?>

<?php



$q = $_POST["q"] ?? "";

/*desktop search*/

if(isset($q) && $q!==""){



$searchd="SELECT keywords FROM deals WHERE keywords LIKE '%".$q."%' ";

$search_prep=$conn->prepare($searchd);

$search_prep->execute();

$row = $search_prep->fetchAll(PDO::FETCH_COLUMN);



$searchg="SELECT keywords FROM giveaways WHERE keywords LIKE '%".$q."%' ";

$search_prepg=$conn->prepare($searchg);

$search_prepg->execute();

$row_1 = $search_prepg->fetchAll(PDO::FETCH_COLUMN);





$result = $row + $row_1;

$result_length = count($result);  

$i=0;

$str = "";

while ($i<$result_length) {

    $str .= $result[$i]."\n";

    $i++;

}



$split = explode("\n",$str);

$split = array_unique($split);

$match = preg_grep("/^".$q."/i", $split);

$i=0;

foreach ($match as $key => $value) {

    $pattern = '/^'.$q.'/i';

    $value1 = preg_replace($pattern,'',$value);

    

     if($i>=5){

           break;

        }

    

    print('

        <a class="suggest-common--2KmE" href="https://giveaways.lk/offers.php?m='.$q.$value1.'">

            <span>

                <span><b>'.$q.'</b>'.$value1.'</span>

            </span>

        </a>

    ');

    $i++;

}

   

 }



?>