<?php
include("partial/config/config.php");
die();
//print_r($_REQUEST);

if(isset($_POST['action'])){
    if($_POST['action']=='edit-customer'){
    $id=$_POST['id'];
    $sql="select * from customer where customer_id='$id'";
    $res=$con->query($sql);
    $res->setFetchMode(PDO::FETCH_ASSOC);
    $row = $res->fetchall();
    //print_r($row);
    echo json_encode($row);

}
if($_POST['action']=='invoice_last_id'){
    $sql="select invoice from invoices order by invoice desc";
    $res=$con->query($sql);
    $row = $res->fetch();
    echo json_encode($row);

}if($_POST['action']=='receipt_last_id'){
    $sql="select invoice from receipt order by invoice desc";
    $res=$con->query($sql);

    $row = $res->fetch();
    if($row>0){
        echo json_encode($row); 
    }
    else{
        echo json_encode(0);

    }
    
}

}



if(isset($_POST['add_purchase']))

{
    $qty=$_POST['avl_qty']+$_POST['pur_stk'];
   $purchase_price=$_POST['pur_pur_price'];
   $sale_price=$_POST['pur_sale_price'];
   $pro_id=$_POST['pro_id'];

   $sql="UPDATE `product` SET quantity='$qty',`purchase_price`='$purchase_price',`sales_price`='$sale_price'WHERE pid='$pro_id'";
//$sql="UPDATE product set 'quantity'='$qty','purchase_price'='$purchase_price','sales_price'='$sale_price' WHERE pid=$pro_id";
$result=$con->query($sql);
if(!$result)
{
    echo "error";
}else
{
    echo"ww"; 
   
 
   header('location:purchase.php');
}

} 
if(isset($_POST['add_product'])){
    //Array ( 
        $product_name=$_POST['product_name'];
        $category=$_POST['category'];
         $quantity=$_POST['quantity'];
         $mini_stk= $_POST['mini_stk'];
         $purchase_price=$_POST['purchase_price'];
          $sales_price=$_POST['sales_price'];

    $sql="INSERT INTO `product`(`product_name`, `category`, `quantity`, `minimum_stock`, `purchase_price`, `sales_price`) VALUES('$product_name','$category','$quantity','$mini_stk','$purchase_price','$sales_price')";
        $res=$con->query($sql);
        if($res){
            header('location:product1.php');
        }
        else 
        {
            echo "err";
        }
}
if(isset($_POST['product_edit'])){
    //print_r($_REQUEST);
    //Array ( 
        $pid=$_POST['id'];
        $product_name=$_POST['product_name'];
        $category=$_POST['category'];
         $quantity=$_POST['quantity'];
         $mini_stk= $_POST['mini_stk'];
         $purchase_price=$_POST['purchase_price'];
          $sales_price=$_POST['sales_price'];
         
    $sql="update product set `product_name`='$product_name',`category`='$category',`quantity`='$quantity',`minimum_stock`='$mini_stk',`purchase_price`='$purchase_price',`sales_price`='$sales_price'where pid='$pid'";
        $res=$con->query($sql);
        if($res){
            header('location:product1.php');
        }
        else 
        {
            echo "err";
        }
}



if(isset($_POST['addSup'])){
    //Array ( 
        $supName=$_POST['supName'];
        $supCompanyName=$_POST['supCompanyName'];
         $supGST=$_POST['supGST'];
         $SupPhno= $_POST['SupPhno'];
         $supAlterPhno=$_POST['supAlterPhno'];
          $supAdress=$_POST['supAdress'];
          $supStreet=$_POST['supStreet'];
          $supDistrict=$_POST['supDistrict'];
          $supState=$_POST['supArea'];
          $supPincode=$_POST['supPincode'];
          $sup_open_balance=$_POST['$sup_open_balance'];
          $sup_reg_date=$_POST['sup_reg_date'];

    $sql="INSERT INTO `supplier`(`supplier_name`, `company_name`, `gst_no`, `phone_no`, `alter_phone_no`, `address`, `street`, `district`, `state`, `area`, `pincode`, `con_num`, `email`, `total_buy`,`total_paid`,`total_due`, `reg_date`) VALUES('$supName','$supCompanyName','$supGST','$SupPhno','$supAlterPhno','$supAdress')";
        $res=$con->query($sql);
        if($res){
            header('location:suppliers.php');
        }
        else 
        {
            echo "err";
        }
}
if(isset($_POST['addTransport'])){
    //Array ( 
        $transport_name=$_POST['transport_name'];
       
    $sql="INSERT INTO `transport`(`transportName`) VALUES('$transport_name')";
        $res=$con->query($sql);
        if($res){
            header('location:transport.php');
        }
        else 
        {
            echo "err";
        }
}
if(isset($_POST['add_cat'])){
    //Array ( 
        $cat_name=$_POST['cat_name'];
        $status=$_POST['status'];
        

    $sql="INSERT INTO `category`(`category_name`, `status`) VALUES('$cat_name','$status')";
        $res=$con->query($sql);
        if($res){
            header('location:category.php');
        }
        else 
        {
            echo "err";
        }
}     


if(isset($_POST['action'])){
    if($_POST['action']=='delete_product'){
         $id=$_POST['product_id'];
    $sql="delete from product where pid='$id'";
    $res=$con->query($sql);
    if($res){
           $status=['msg'=>'Record_deleted',
           'status'=> 'success',];
        }
        else 
        {
            $status=['msg'=>'Record_ not deleted',
           'status'=> 'error',];
        }
        echo json_encode($status);
    }
   
}


if(isset($_POST['add_pur_history'])){
    //Array ( 
        $suplier=$_POST['Supplier'];
        $batch=$_POST['batch'];
        $gst=$_POST['gst'];
        $notes=$_POST['notes'];
        $amount=$_POST['amount'];
    $sql_insert="INSERT INTO `puchase_history`(`supplier_id`, `batch`,`amount`, `gst`, `notes`) VALUES ('$suplier','$batch','$amount','$gst','$notes')";
    $res=$con->query($sql_insert);
    $sql = "SELECT * from gst";
    $res = $con->query($sql);
    $res->setFetchMode(PDO::FETCH_ASSOC);
    $row = $res->fetchall();
    echo $gst1=$row[0]['gst']+$gst;
    
    $sql1="update gst set gst='$gst1' where id=1";
            $res=$con->query($sql1);
        if($res){
            header('location:purchase_history.php');
        }
        else 
        {
            echo "err";
        }
}
//Array ( [customer_name] => [company_name] => [gst_no] => [customer_phno] => [customer_alter_phno] => [customer_address] => [street] => [area] => [distrtict] =>
 //[//state] => [pincode] => [landmark] => [add_customer] => submit ) hellp
if(isset($_POST['add_customer'])){
    $customer_name = $_POST['customer_name']; // customer name
	$company_name = $_POST['company_name']; // customer email
	$gst_no = $_POST['gst_no']; // customer address
	$customer_phno =$_POST['customer_phno']; // customer address
    	$customer_alter_phno = $_POST['customer_alter_phno']; // customer address
    $customer_adreess_1 = $_POST['customer_address1']; // customer address
        $customer_adreess_2 = $_POST['customer_address_2']; // customer address
        
	$street = $_POST['street']; // customer town
	$area = $_POST['area']; // customer county
	$state = $_POST['state']; // customer postcode
    $district = $_POST['distrtict']; // customer postcode
	$pincode = $_POST['pincode']; // customer phone number
    //$landmark = $_POST['landmark']; // customer phone number
    $sql=" INSERT INTO `customer`( `customer_name`, `company_name`, `gst_no`, `phone_no`,`address_1`, `address_2`, `street`, `area`, `district`, `state`, `pincode`, `alter_phone_no`) VALUES('$customer_name','$company_name','$gst_no','$customer_phno','$customer_adreess_1','$customer_adreess_2','$street','$area','$district','$state','$pincode','$customer_alter_phno')";
    $res=$con->query($sql);
    if($res){
        header('location:customer.php');
    }


    
}


if(isset($_POST['Edit_customer'])){
    //print_r($_REQUEST);
    $customer_name = $_POST['customer_name']; // customer name
	$company_name = $_POST['company_name']; // customer email
	$gst_no = $_POST['gst_no']; // customer address
	$customer_phno =$_POST['customer_phno']; // customer address
    	$customer_alter_phno = $_POST['customer_alter_phno']; // customer address
    $customer_adreess_1 = $_POST['customer_address1']; // customer address
        $customer_adreess_2 = $_POST['customer_address_2']; // customer address
        
	$street = $_POST['street']; // customer town
	$area = $_POST['area']; // customer county
	$state = $_POST['state']; // customer postcode
    $district = $_POST['distrtict']; // customer postcode
	$pincode = $_POST['pincode']; // customer phone number
    //$landmark = $_POST['landmark']; // customer phone number
    $customer_id=$_POST['customer_id'];

    $sql="UPDATE `customer` SET `customer_name`='$customer_name',`company_name`='$company_name',`gst_no`='$gst_no',`phone_no`='$customer_phno',
    `address_1`='$customer_adreess_1',`address_2`='$customer_adreess_2',`street`='$street',`area`='$area',`district`='$district',
    `state`='$state',`pincode`='$pincode',`alter_phone_no`='$customer_alter_phno' WHERE customer_id=$customer_id";
    //$sql="  INTO `customer`( `customer_name`, `company_name`, `gst_no`, `phone_no`,`address_1`, `address_2`, `street`, `area`, `district`, `state`, `pincode`, `alter_phone_no`) VALUES('$customer_name','$company_name','$gst_no','$customer_phno','$customer_adreess_1','$customer_adreess_2','$street','$area','$district','$state','$pincode','$customer_alter_phno')";
    $res=$con->query($sql);
    if($res){
        header('location:customer.php');
    }


    
}

?>
