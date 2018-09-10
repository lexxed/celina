<?PHP 
include_once("_bootstrap.php"); 


echo "<pre>";
echo"
";
echo "</pre>";
 
// get distinct cart numbers
$cartNumber = cartNumber($dbh); 
//print_r($cartNumber);


$row = 1;
//echo "<table style=\"border-collapse: collapse; border-style: dashed; \">";
echo "<table border=1>";
echo "<tr>";
foreach ($cartNumber as $this_cart) {
	//echo $this_cart;
	$orders = get_orders_for_this_cart($this_cart,$dbh);
	//print_r($orders);
	$num_orders = count($orders);
	//echo $num_orders;
	//echo "<br>";
	echo "\r\n";

	echo "<td style=\"width:400px; \" valign=top>";
	echo "\r\n";
	if ($num_orders == 1) {
		printf("To: %s<br>",$orders[0]['Recipient']);
		printf("%s<br>",$orders[0]['Address']);
		printf("%s ",$orders[0]['Nation']);
		$postal = filter_postal($orders[0]['Postal_code']);
		printf("%s<br>",$postal);
		echo "<br>";
		printf("Tel: %s / %s<br>",$orders[0]['Customer_mobile_phone_number'],$orders[0]['Customer_phone_number']);
		echo "<br>";
		
		printf("Cart: %s<br>",$this_cart);
		printf("%s x ",$orders[0]['Qty']);
		$option = shorten_option($orders[0]['Options']);
		$item = shorten_item($orders[0]['Item']); 
		printf("%s / %s <br> ",$option,$item);
		//printf("Order_no: %s<br>",$orders[0]['Order_no']);
	}
	if ($num_orders > 1) {
		printf("To: %s<br>",$orders[0]['Recipient']);
		printf("%s<br>",$orders[0]['Address']);
		printf("%s ",$orders[0]['Nation']);
		$postal = filter_postal($orders[0]['Postal_code']);
		printf("%s<br>",$postal); 
		echo "<br>";
		printf("Tel: %s / %s<br>",$orders[0]['Customer_mobile_phone_number'],$orders[0]['Customer_phone_number']);
		echo "<br>";
		
		printf("Cart: %s<br>",$this_cart);
		for ($h=0; $h < $num_orders; $h+=1) {
			printf("%s x ",$orders[$h]['Qty']);
			$option = shorten_option($orders[$h]['Options']); 
			$item = shorten_item($orders[$h]['Item']); 
			printf("%s / %s <br> ",$option,$item);
			
			//printf("%s <br> ",$orders[$h]['Item']);
			//printf("Order_no: %s<br>",$orders[$h]['Order_no']);
		}	
	}	
	echo "\r\n";
	echo "<br><br>";
	echo "</td>";
	if ($row % 2 == 0) { 
		echo "\r\n";
		echo "</tr>";
		echo "<tr>";
		echo "\r\n";
	}
	if ($row % 8 == 0) { 
		echo "\r\n";
		echo "</table>";
		echo "<br><br><br>";
		echo "<table border=1><tr>";
		echo "\r\n";
	}
	$row++;
} 
echo "</table>";



# functions //////////////////////////////////////

function filter_postal($postal) {
	
   $postal = str_replace("'", "", $postal);
	
   return $postal;
}

function shorten_item($item) {
		
   $item_short = "";	
   
   $findme   = 'Facial Mask';
   $pos = strpos($item, $findme);

	// Note our use of ===.  Simply == would not work as expected
	// because the position of 'a' was the 0th (first) character.
	if ($pos === false) {
		//echo "The string '$findme' was not found in the string '$mystring'";
	} else {
		$item_short = "Face";	
	}
	
   $findme   = 'Eye';
   $pos = strpos($item, $findme);

	// Note our use of ===.  Simply == would not work as expected
	// because the position of 'a' was the 0th (first) character.
	if ($pos === false) {
		//echo "The string '$findme' was not found in the string '$mystring'";
	} else {
		$item_short = "Eye";	
	}	
	
	//if($item_short == "") {
	//	$item_short = $item;
	//}
		
	return $item_short;
}



function shorten_option($option) {
	$remove = array("/ OVERSEAS SHIPPING:singapore(+S$2.50)","/ Overseas shipping:Singapore ", "Size:","Shipping:", "Item:", "OVERSEAS SHIPPING:singapore /", "Overseas:Singapoe", "Overseas shipping:Singapoe","S$","OVERSEAS SHIPPING:SINGAPORE ", "SHIPPING:");
	$option = str_replace($remove, "", $option);
	
	# replace type
	$option = str_replace("Type:", "", $option);	
	
	# replace Registered mail with Reg Mail
	$option = str_replace("Registered mail", "<u>Reg</u> mail", $option);
	
	# replace Registered mail with Reg Mail
	$option = str_replace("registered mail", "<u>Register</u> mail", $option);	
	
	
	
	# replace normal mail to normal
	$option = str_replace("Normal mail", "Normal", $option);	
	
	# replace 
	$option = str_replace("overseas shipping:singapore", "SG", $option);		
	
	# replace 
	$option = str_replace("none will take a risk", "Normal", $option);			
	
	 
	
	# cut off email
	$pos = strpos($option, "/ Email");
	if ($pos !== false) {
		$option = substr($option, 0, stripos($option, "/ Email") );
	}
	return $option;
}

function get_orders_for_this_cart($this_cart,$dbh) { 

  $qid = db_query(" 
    SELECT 
    idx,Shipping_status,Order_no,Cart_no,Delivery_company,Tracking_no,Shipping_date,Order_date,Payment_Complete,Desired_Shipping_Date,Estimated_shipping_date,Delivered_date,Shipping_Method,Item_code,Item,Qty,Options,Option_Code,Gift,Recipient,Recipient_phonetic,Recipient_Phone_number,Recipient_mobile_Phone_number,Address,Postal_code,Nation,Payment_of_shipping_rate,Payment_Nation,Currency,Payment,Sell_Price,discount,Total_Price,Settle_Price,Customer,Customer_phonetic,Memo_to_Seller,Customer_phone_number,Customer_mobile_phone_number,Seller_code,JAN_code,Standard_no,Present
    FROM shipping_raw
	WHERE Cart_no = '$this_cart'
  ",false,false,false,$dbh);

  $p = array(); $i=0;
  while ($row = mysqli_fetch_row($qid)) {
    $p[$i]['idx'] = $row[0];
    $p[$i]['Shipping_status'] = $row[1];
    $p[$i]['Order_no'] = $row[2];
    $p[$i]['Cart_no'] = $row[3];
    $p[$i]['Delivery_company'] = $row[4];
    $p[$i]['Tracking_no'] = $row[5];
    $p[$i]['Shipping_date'] = $row[6];
    $p[$i]['Order_date'] = $row[7];
    $p[$i]['Payment_Complete'] = $row[8];
    $p[$i]['Desired_Shipping_Date'] = $row[9];
    $p[$i]['Estimated_shipping_date'] = $row[10];
    $p[$i]['Delivered_date'] = $row[11];
    $p[$i]['Shipping_Method'] = $row[12];
    $p[$i]['Item_code'] = $row[13];
    $p[$i]['Item'] = $row[14];
    $p[$i]['Qty'] = $row[15];
    $p[$i]['Options'] = $row[16];
    $p[$i]['Option_Code'] = $row[17];
    $p[$i]['Gift'] = $row[18];
    $p[$i]['Recipient'] = $row[19];
    $p[$i]['Recipient_phonetic'] = $row[20];
    $p[$i]['Recipient_Phone_number'] = $row[21];
    $p[$i]['Recipient_mobile_Phone_number'] = $row[22];
    $p[$i]['Address'] = $row[23];
    $p[$i]['Postal_code'] = $row[24];
    $p[$i]['Nation'] = $row[25];
    $p[$i]['Payment_of_shipping_rate'] = $row[26];
    $p[$i]['Payment_Nation'] = $row[27];
    $p[$i]['Currency'] = $row[28];
    $p[$i]['Payment'] = $row[29];
    $p[$i]['Sell_Price'] = $row[30];
    $p[$i]['discount'] = $row[31];
    $p[$i]['Total_Price'] = $row[32];
    $p[$i]['Settle_Price'] = $row[33];
    $p[$i]['Customer'] = $row[34];
    $p[$i]['Customer_phonetic'] = $row[35];
    $p[$i]['Memo_to_Seller'] = $row[36];
    $p[$i]['Customer_phone_number'] = $row[37];
    $p[$i]['Customer_mobile_phone_number'] = $row[38];
    $p[$i]['Seller_code'] = $row[39];
    $p[$i]['JAN_code'] = $row[40];
    $p[$i]['Standard_no'] = $row[41];
    $p[$i]['Present'] = $row[42];
    $i++;
  } 
  return $p; 
}


function cartNumber($dbh) { 

  $qid = db_query(" 
    SELECT 
    DISTINCT(Cart_no)
    FROM shipping_raw
  ",false,false,false,$dbh);


	$p = array(); $i=0;
	while ($row = mysqli_fetch_row($qid)) {
			for ($h=0; $h < sizeof($row); $h+=1) {
					$p[$i] = $row[$h];
			}
			$i++;
	}



	
	return $p;

}


?>