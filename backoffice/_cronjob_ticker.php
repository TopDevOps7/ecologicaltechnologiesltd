<?php

// DATABASE DETAILS
 $servername = 'gavipigi.mysql.db.internal';
 $username   = 'gavipigi_gws';
 $password   = 'Cj13J9+k*h!N=AWEEPmR';
 $dbname     = 'gavipigi_gwm';


// ALL YOUR ASSETS GO INTO THIS STRING SEPARATE BY COMMA
$assetString = 'BTC-USD,ETH-USD,%5EDJI,%5EGDAXI,EURUSD%3DX,GC%3DF,TSLA,DE000SLA9709.SG';  // separate them by commas please
$assetName = 'BTC,ETH,US30,DAX,EURUSD,GOLD,TSLA,STWI';



// split our string into array	
$delimiter = ',';
$assetArray = explode($delimiter,$assetString);  // split it	
$names = explode($delimiter,$assetName);		
$n = sizeof($assetArray); 




// loop thru each item in the array and hit HTTP requestNow
$assetType = '';


// start SQL connection_aborted


$conn = new mysqli($servername, $username, $password, $dbname);

   if ( $conn->connect_error ) {
      echo ('<br><br>Database Connection failed: ' . $conn->connect_error.'<br><br>');
    }
	

// start for loop

for ( $x = 0; $x < $n; $x++ ) {
	
$assetType = $assetArray[$x];

$ans = 	requestNow($assetType);  // $regularMarketPrice.'#'.$regularMarketChangePercent

$delimiter = '#';
$array = explode($delimiter,$ans );  // split it

$regularMarketPrice = $array[0];
$regularMarketChangePercent = $array[1];

$oldPrice = '';  // (old-new)/old

$currentName = $names[$x];

echo $assetType;
echo '  &nbsp; &nbsp;&nbsp; currentName: '.$currentName;
echo '  &nbsp; &nbsp;&nbsp; regularMarketPrice: '.$regularMarketPrice;
echo '  &nbsp; &nbsp;&nbsp; regularMarketChangePercent: '.$regularMarketChangePercent;

$aa = (float)$regularMarketPrice / ( 1 + ((float)$regularMarketChangePercent/100) );
$oldPrice = strval($aa);

echo '  &nbsp; &nbsp;&nbsp; oldPrice : '.$oldPrice ;

$aa = (float)$regularMarketPrice - (float)$oldPrice;  // new minus old

$priceDifference = strval($aa);

echo '  &nbsp; &nbsp;&nbsp; priceDifference: '.$priceDifference;

$diff = (float)$regularMarketChangePercent;
$status = '';

if ( $diff == 0 ) {
$status = '0';	
}
if ( $diff < 0 ) {
$status = '-1';	
}
if ( $diff > 0 ) {
$status = '1';	
}

echo '  &nbsp; &nbsp;&nbsp; status: '.$status;



echo '<br><br>';


// LOG DATA INTO DATABASE

$tableName = 'ticker';

// read the table

$sql = "SELECT * FROM ".$tableName;

$insert = 1;
$update = 2;

$mode = $insert;


if ( $result = mysqli_query($conn,$sql) )  {

 while ( $row = mysqli_fetch_row($result) )  {
	
		  $nameField = $row[1];  // get name field
		  
		  
		  if ( $nameField == $currentName ) {  // we got the name existing
			$mode = $update;  
			echo '<br>name found<br>';
		  }
		  
		 }	// end while loop
		 
		 mysqli_free_result($result);
	
}  // end if loop


else {
	echo "Error 333 : " . $conn->error;	
}


$sql = '';  // clears it

if ( $mode == $insert ) {
	
echo "<br>DOING INSERT<br>";

$sql = "INSERT INTO ".$tableName." 
( 
name, 
symbol, 
price,
perc,
status
)

VALUES (

 '".$currentName."',
 '".$assetType."',
 '".$regularMarketPrice."',
 '".$regularMarketChangePercent."' ,
 '".$status."'

 )
 

";

}  // end insert



if ( $mode == $update ) {
	
echo "<br>DOING UPDATE<br>";	
	
$sql = "UPDATE ".$tableName." 

 SET 
 
 symbol = '".$assetType."',
 price = '".$regularMarketPrice."',
 perc = '".$regularMarketChangePercent."' ,
 status = '".$status."' 
 
 WHERE
 
 name = '".$currentName."'
 
 
 ";
	
	
	
}  // end update



// print query

echo "<br>sql: ".$sql."<br>";


if ( $conn->query($sql) === TRUE ) { 

}

else {
echo "Error 222 : " . $conn->error;	
}
		

echo '<br>';


} // end for loop

// read from table called price

$tableName2 = 'price';
$latestPrice = '';
$secondLatest = '';
$m = 0;

$sql = "SELECT * FROM ".$tableName2." WHERE project_id=1 ORDER BY date DESC";

if ( $result = mysqli_query($conn,$sql) )  {

 while ( $row = mysqli_fetch_row($result) )  {
	
	       $price = $row[3]; // latest price is on row=3
		  
		  if ( $m == 0 ) {  // first entry, latest
			$latestPrice  = $price ;
		  }
		  
		  if ( $m == 1 ) {  // 2nd entry, 
			$secondLatest  = $price ;
		  }
		  
		 
		  $m++; // increment this
		  
		 }	// end while loop
		 
		 mysqli_free_result($result);
		 
	// get difference	 
	
	$diff = ((float)$latestPrice - (float)$secondLatest) * 100 / (float)$secondLatest;
	
	$percDiff = strval($diff);
	
	$status = '';
     
    echo '<br> percDiff: '.$percDiff.'<br>';
	
if ( $diff == 0 ) {
$status = '0';	
}
if ( $diff < 0 ) {
$status = '-1';	
}
if ( $diff > 0 ) {
$status = '1';	
}




   
$currentName = 'GWG';
$assetType   = '1';  

$sql = "SELECT * FROM ".$tableName;

$insert = 1;
$update = 2;

$mode = $insert;


if ( $result = mysqli_query($conn,$sql) )  {

 while ( $row = mysqli_fetch_row($result) )  {
	
		  $nameField = $row[1];  // get name field
		  
		  
		  if ( $nameField == $currentName ) {  // we got the name existing
			$mode = $update;  
			echo '<br>name found<br>';
		  }
		  
		 }	// end while loop
		 
		 mysqli_free_result($result);
	
}  // end if loop


// saving it

$sql = '';

if ( $mode == $insert  ) {

echo "<br>DOING INSERT 22 <br>";	

$sql = "INSERT INTO ".$tableName." 

( 
name, 
symbol, 
price,
perc,
status
)

VALUES (

 '".$currentName."',
 '".$assetType."',
 '".$latestPrice."',
 '".$percDiff."' ,
 '".$status."'

 )
 

";
 
  
}   // end insert


if ( $mode == $update ) {
	
echo "<br>DOING UPDATE 22 <br>";	
	
$sql = "UPDATE ".$tableName." 

 SET 
 
 symbol = '".$assetType."',
 price = '".$latestPrice."',
 perc = '".$percDiff."' ,
 status = '".$status."' 
 
 WHERE
 
 name = '".$currentName."'
 
 
 ";
	
	
	
}  // end update



if ( $conn->query($sql) === TRUE ) { 

}

else {
echo "Error 777 : " . $conn->error;	
}

      
	
}  // end if loop


else {
	
echo "Error 555 : " . $conn->error;	
	
}




// END LOG DATA INTO DATABASE

	



$conn->close();  // close the DB



function requestNow($path) {
	
    $url = "https://query1.finance.yahoo.com/v7/finance/quote?symbols=".$path;
	
	 
    $userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/63.0';
	
    $ch = curl_init();
	
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
	
    curl_setopt($ch, CURLOPT_URL,$url);
	
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
	
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
	
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
	
    $answer = curl_exec($ch);
	
    curl_close($ch);
	
	//$answer =  htmlspecialchars(print_r($answer, true));
	
	// GET regularMarketPrice
	
	$startString = 'regularMarketPrice';
	$endString = 'regularMarketDayHigh';
	
	$firstIndex = stripos($answer, $startString);  // start
	
	$answer22 = substr($answer,$firstIndex);
	
	$firstIndex = stripos($answer22, $endString );
	
	$regularMarketPrice = substr($answer22,0,$firstIndex);  // end
	
	$regularMarketPrice = str_replace($startString,'',$regularMarketPrice);
	$regularMarketPrice = str_replace($endString,'',$regularMarketPrice);
	
	$regularMarketPrice = str_replace('"','',$regularMarketPrice);
	$regularMarketPrice = str_replace(':','',$regularMarketPrice);
	$regularMarketPrice = str_replace(',','',$regularMarketPrice);
	
	
	// END GET regularMarketChangePercent
	
	$startString = 'regularMarketChangePercent';
	$endString = 'regularMarketTime';
	
	$firstIndex = stripos($answer, $startString);  // start
	
	$answer22 = substr($answer,$firstIndex);
	
	$firstIndex = stripos($answer22, $endString );
	
	$regularMarketChangePercent = substr($answer22,0,$firstIndex);  // end
	
	$regularMarketChangePercent = str_replace($startString,'',$regularMarketChangePercent);
	$regularMarketChangePercent = str_replace($endString,'',$regularMarketChangePercent);
	
	$regularMarketChangePercent = str_replace('"','',$regularMarketChangePercent);
	$regularMarketChangePercent = str_replace(':','',$regularMarketChangePercent);
	$regularMarketChangePercent = str_replace(',','',$regularMarketChangePercent);
	
	// END GET regularMarketChangePercent
	
	return $regularMarketPrice.'#'.$regularMarketChangePercent;
	
	}

?>