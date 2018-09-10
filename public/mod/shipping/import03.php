<?PHP 
include_once("_bootstrap.php"); 

//error_reporting(E_ALL);


$today = date("Ymd");                           // 20010310
echo $today;

shipping_raw_truncate($dbh);

echo "<table border=1>";
$row = 1;
if (($handle = fopen("../data/".$today.".csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        //echo "<p> $num fields in line $row: <br /></p>\n";
		echo "<tr>";
        echo "<td>" . $row . "</td>";
        $row++;
		$row_array = array();
        for ($c=0; $c < $num; $c++) {
            //echo $data[$c] . "<br />\n";
			echo "<td>";
			echo $data[$c];
			$row_array[$c] =  $data[$c];
			//input($frm); 
			echo "</td>";
        }
		echo "</tr>";
		//print_r($row_array);
        if($row != 2)
		  input($row_array,$dbh);
    }
    fclose($handle);
}

echo "</table>";

//delete_first_row($dbh);

#//////////////////////////////////////////////////////

function shipping_raw_truncate($dbh) {


      //DB::select('TRUNCATE TABLE shipping_raw');

      //$sqlQuery = "TRUNCATE TABLE shipping_raw";
      //$result = DB::select(DB::raw($sqlQuery));


	  $qid = db_query("TRUNCATE TABLE shipping_raw ", false,false,false,$dbh);
	
}

function delete_first_row($dbh) {

	  $qid = db_query("DELETE FROM shipping_raw WHERE idx = 1;", false,false,false, $dbh);
	
}



function input($row_array,$dbh) { 

  $qid = db_query(" 
  INSERT INTO shipping_raw (
      Shipping_status
     ,Order_no
     ,Cart_no
     ,Delivery_company
     ,Tracking_no
     ,Shipping_date
     ,Order_date
     ,Payment_Complete
     ,Desired_Shipping_Date
     ,Estimated_shipping_date
     ,Delivered_date
     ,Shipping_Method
     ,Item_code
     ,Item
     ,Qty
     ,Options
     ,Option_Code
     ,Gift
     ,Recipient
     ,Recipient_phonetic
     ,Recipient_Phone_number
     ,Recipient_mobile_Phone_number
     ,Address
     ,Postal_code
     ,Nation
     ,Payment_of_shipping_rate
     ,Payment_Nation
     ,Currency
     ,Payment
     ,Sell_Price
     ,discount
     ,Total_Price
     ,Settle_Price
     ,Customer
     ,Customer_phonetic
     ,Memo_to_Seller
     ,Customer_phone_number
     ,Customer_mobile_phone_number
     ,Seller_code
     ,JAN_code
     ,Standard_no
     ,Present
  ) VALUES (
      '".$row_array['0']."' 
     ,'".$row_array['1']."' 
     ,'".$row_array['2']."' 
     ,'".$row_array['3']."' 
     ,'".$row_array['4']."' 
     ,'".$row_array['5']."' 
     ,'".$row_array['6']."' 
     ,'".$row_array['7']."' 
     ,'".$row_array['8']."' 
     ,'".$row_array['9']."' 
     ,'".$row_array['10']."' 
     ,'".$row_array['11']."' 
     ,'".$row_array['12']."' 
     ,'".$row_array['13']."' 
     ,'".$row_array['14']."' 
     ,'".$row_array['15']."' 
     ,'".mysqli_real_escape_string($dbh,$row_array['16'])."' 
     ,'".mysqli_real_escape_string($dbh,$row_array['17'])."' 	 
     ,'".mysqli_real_escape_string($dbh,$row_array['18'])."' 
     ,'".mysqli_real_escape_string($dbh,$row_array['19'])."' 
     ,'".$row_array['20']."' 
     ,'".$row_array['21']."' 
     ,'".$row_array['22']."' 
     ,'".mysqli_real_escape_string($dbh,$row_array['23'])."' 
     ,'".mysqli_real_escape_string($dbh,$row_array['24'])."' 
     ,'".mysqli_real_escape_string($dbh,$row_array['25'])."' 
     ,'".mysqli_real_escape_string($dbh,$row_array['26'])."' 
     ,'".$row_array['27']."' 
     ,'".$row_array['28']."' 
     ,'".$row_array['29']."' 
     ,'".$row_array['30']."' 
     ,'".$row_array['31']."' 
     ,'".$row_array['32']."' 
     ,'".mysqli_real_escape_string($dbh,$row_array['33'])."' 
     ,'".mysqli_real_escape_string($dbh,$row_array['34'])."' 
     ,'".mysqli_real_escape_string($dbh,$row_array['35'])."' 
     ,'".$row_array['36']."' 
     ,'".$row_array['37']."' 
     ,'".$row_array['38']."' 
     ,'".$row_array['39']."' 
     ,'".$row_array['40']."' 
     ,'".$row_array['41']."' 
  )", false,false,false, $dbh); 
 
}

 
?>