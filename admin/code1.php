<?php
include("partial/config/config.php");
echo "<pre>";
print_r($_REQUEST);
die();
if ($_POST['action'] = 'create_invoice'){

	// invoice customer information
	// billing
	$customer_name = $_POST['customer_name']; // customer name
	$customer_id = $_POST['customer_email']; // customer email
	$company_name = $_POST['customer_address_1']; // customer address
	$customer_address = $_POST['customer_address_2']; // customer address
	$gst_no = $_POST['customer_town']; // customer town
	//$customer_county = $_POST['customer_county']; // customer county
	$customer_postcode = $_POST['customer_postcode']; // customer postcode
	$customer_phone = $_POST['customer_phone']; // customer phone number
	
	//shipping
	$customer_name_ship = $_POST['customer_name_ship']; // customer name (shipping)
	$customer_address_1_ship = $_POST['customer_address_1_ship']; // customer address (shipping)
	$customer_address_2_ship = $_POST['customer_address_2_ship']; // customer address (shipping)
	$shipping_district = $_POST['shipping_district']; // customer town (shipping)
	$shipping_phone = $_POST['shipping_phone']; // customer town (shipping)
	$shipping_state = $_POST['customer_town_ship']; // customer county (shipping)
	$customer_postcode_ship = $_POST['customer_postcode_ship']; // customer postcode (shipping)



	//transport
	$transpot_name=$_POST['transport_name'];
	$weight=$_POST['weight'];
	$bags=$_POST['bags'];
	$ewaysno=$_POST['ewaysno'];
	$destination=$_POST['destination'];



	// invoice details
	$invoice_number = $_POST['invoice_id']; // invoice number
	$custom_email = $_POST['custom_email']; // invoice custom email body
	$invoice_date = $_POST['invoice_date']; // invoice date
	$custom_email = $_POST['custom_email']; // custom invoice email
	$invoice_due_date = $_POST['invoice_due_date']; // invoice due date
	$invoice_subtotal = $_POST['invoice_subtotal']; // invoice sub-total
	//$invoice_shipping = $_POST['invoice_shipping']; // invoice shipping amount
	$invoice_discount = $_POST['invoice_discount']; // invoice discount
	$invoice_vat = $_POST['invoice_vat']; // invoice vat
	$invoice_total = $_POST['invoice_total']; // invoice total
	$invoice_notes = $_POST['invoice_notes']; // Invoice notes
	$invoice_type = $_POST['invoice_type']; // Invoice type
	$invoice_status = $_POST['invoice_status']; // Invoice status


	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);

	//output any connection error
	
	// the query
	$query = "INSERT INTO `shipping`(`invoice_id`, `name`, `address_1`, `address_2`, `state`, `postcode`, `phone_no`, `transport_id`) VALUES
	('$invoice_number','$customer_name_ship','$customer_address_1_ship','$customer_address_2_ship','$shipping_state','$customer_postcode_ship','$shipping_phone','1')";
	$results = $mysqli->query($query);
	if($results){
		

		
	}
	else{
		echo "nn";
	}
	
	$sql="select * from shipping";
	$results=$mysqli->query($sql);
	// $results->rowCount();
	$shipping_id=mysqli_num_rows($results);

	$cgst=$_POST['invoice_cgst'];
	$sgst=$_POST['invoice_sgst'];

	$inv="INSERT INTO `invoices`(`invoice`, `customer_id`, `invoice_date`, `invoice_due_date`, `ewaybillNo`, `weight`,`bags`,`transport`, `destination`, `subtotal`, `shipping`,`discount`,`gst`, `cgst`, `sgst`, `total`,`notes`,`invoice_type`) VALUES ('$invoice_number','$customer_id','$invoice_date','$invoice_due_date','$ewaysno','$weight','$bags','1','$destination','$invoice_subtotal','$shipping_id','$invoice_discount','$gst_no','$cgst','$sgst','$invoice_total','$invoice_notes','$invoice_type')";
	$rres=$mysqli->query($inv);
	
	
	$show_gst="select gst from gst";
	$get_gst=$mysqli->query($show_gst);
	$get_gst_balance = $get_gst->fetch_assoc();
	$gst_balance=$get_gst_balance['gst'];
	
	echo $gst_bal=$gst_balance-$invoice_vat;
	$gst=" UPDATE `gst` SET `gst`='$gst_bal' where id='1'";
	$mysqli->query($gst);

	
$mysqlii = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);

	// invoice product items
	foreach($_POST['invoice_product'] as $key => $value) {
	     $item_product = $value;
		echo "<br>".$item_pname=$_POST['pid'][$key];
	      $item_avl_qty = $_POST['invoice_product_avl_qty'][$key];
	    $item_qty = $_POST['invoice_product_qty'][$key];
	     $item_price = $_POST['invoice_product_price'][$key];
	    $item_discount = $_POST['invoice_product_discount'][$key];
	    $item_subtotal = $_POST['invoice_product_sub'][$key];
		echo "<br> pur_priec".$purchase_price = $_POST['purchase_price'][$key];
		echo "<br>". $qty=$item_avl_qty-$item_qty;
		
	$pro_update=" UPDATE product set `quantity`='$qty' where `product_name`='$item_pname'";
	$mysqli->query($pro_update);
	    // insert invoice items into database
		$queryy.= "INSERT INTO invoice_items (
				invoice,
				product,
				qty,
				price,
				purprice
				discount,

				subtotal
			) VALUES (
				'".$invoice_number."',
				'".$item_product."',
				'".$item_qty."',
				'".$item_price."',
				'".$purchase_price."',
				'".$item_discount."',
				'".$item_subtotal."'
			);
		";

	}

	header('Content-Type: application/json');

	// execute the query
	if($mysqlii -> multi_query($queryy)){
		//if saving success
		echo json_encode(array(
			'status' => 'Success',
			'message' => 'Invoice has been created successfully!'
			
		));
//header("location:invoice?inv_id='$invoice_number'");
	}
	//close database connection
	$mysqli->close();
	 
	 












	/* insert invoice into database
	$query = "INSERT INTO invoices (
					invoice,
					custom_email,
					invoice_date, 
					invoice_due_date, 
					subtotal, 
					shipping, 
					discount, 
					vat, 
					total,
					notes,
					invoice_type,
					status
				) VALUES (
				  	'".$invoice_number."',
				  	'".$custom_email."',
				  	'".$invoice_date."',
				  	'".$invoice_due_date."',
				  	'".$invoice_subtotal."',
				  	'".$invoice_shipping."',
				  	'".$invoice_discount."',
				  	'".$invoice_vat."',
				  	'".$invoice_total."',
				  	'".$invoice_notes."',
				  	'".$invoice_type."',
				  	'".$invoice_status."'
			    );
			";
	// insert customer details into database
	$query .= "INSERT INTO customers (
					invoice,
					name,
					email,
					address_1,
					address_2,
					town,
					
					postcode,
					phone,
					name_ship,
					address_1_ship,
					address_2_ship,
					town_ship,
				
					postcode_ship
				) VALUES (
					'".$invoice_number."',
					'".$customer_name."',
					'".$customer_email."',
					'".$customer_address_1."',
					'".$customer_address_2."',
					'".$customer_town."',
					'".$customer_postcode."',
					'".$customer_phone."',
					'".$customer_name_ship."',
					'".$customer_address_1_ship."',
					'".$customer_address_2_ship."',
					'".$customer_town_ship."',
					
					'".$customer_postcode_ship."'
				);
			";

	// invoice product items
	foreach($_POST['invoice_product'] as $key => $value) {
	    $item_product = $value;
	    // $item_description = $_POST['invoice_product_desc'][$key];
	    $item_qty = $_POST['invoice_product_qty'][$key];
	    $item_price = $_POST['invoice_product_price'][$key];
	    $item_discount = $_POST['invoice_product_discount'][$key];
	    $item_subtotal = $_POST['invoice_product_sub'][$key];

	    // insert invoice items into database
		$query .= "INSERT INTO invoice_items (
				invoice,
				product,
				qty,
				price,
				discount,
				subtotal
			) VALUES (
				'".$invoice_number."',
				'".$item_product."',
				'".$item_qty."',
				'".$item_price."',
				'".$item_discount."',
				'".$item_subtotal."'
			);
		";

	}

	header('Content-Type: application/json');

	// execute the query
	if($mysqli -> multi_query($query)){
		//if saving success
		echo json_encode(array(
			'status' => 'Success',
			'message' => 'Invoice has been created successfully!'
			
		));
header('location:invoice_details.php');
	}
	//close database connection
	$mysqli->close();
	*/
}

?>