<?php
include("../partial/config/db_config.php");

$id = $_POST['id'] ?? '';
$product_id = $_POST['product_id'] ?? '';
$product_name = $_POST['product_name'] ?? '';
$purchase_date = $_POST['purchase_date'] ?? '';
$purchase_supplier = $_POST['purchase_supplier'] ?? '';
$supplier_name = $_POST['supplier_name'] ?? '';
$prev_quantity = $_POST['prev_quantity'] ?? '';
$purchase_quantity = $_POST['purchase_quantity'] ?? '';
$purchase_price = $_POST['purchase_price'] ?? '';
$purchase_sell_price = $_POST['purchase_sell_price'] ?? '';
$purchase_subtotal = $_POST['purchase_subtotal'] ?? '';
$purchase_net_total = $_POST['purchase_net_total'] ?? '';
$purchase_payment_by = $_POST['purchase_payment_by'] ?? '';
//$customerRegDate = $_POST['customerRegDate']?? '';


if (isset($_POST["action"])) {


    if ($_POST['action'] == 'purchase') {


        $json_data = $_POST['data']; // assuming 'data' is the key name in the POST request
        $action = $_POST['action'] ?? '';

        // Decode the JSON data into a PHP array
        $data_array = json_decode($json_data, true);

        $get_purchase_products = $purchase_products->splitLastid();
        // echo 
        $data = [
            '`id`' =>  "'PUR" . $get_purchase_products . "'",
            '`product_id`' => "'" . ($data_array['product_id']) . "'",
            '`product_name`' => "'" . ($data_array['product_name']) . "'",
            // '`purchase_date`' => "'" . ($data_array['purchase_date']) . "'",
            '`purchase_suppliar`' => "'" . ($data_array['suppliar_id']) . "'",
            '`suppliar_name`' => "'" . ($data_array['suppliar_name']) . "'",
            '`prev_quantity`' => "'" . ($data_array['pre_quantity']) . "'",
            '`purchase_quantity`' => "'" . ($data_array['new_purchase_quantity']) . "'",
            '`purchase_price`' => "'" . ($data_array['new_purchase_price']) . "'",
            '`purchase_sell_price`' => "'" . ($data_array['new_sell_price']) . "'",
            '`purchase_subtotal`' => "'" . ($data_array['subtotal']) . "'",
        ];
        $qty = $data_array['pre_quantity'] + $data_array['new_purchase_quantity'];
        $update = [
            '`productQuantity`' => "'" . $qty . "'",
            '`productPurchasePrice`' => "'" . ($data_array['new_purchase_price']) . "'",
            '`productSalesPrice`' => "'" . ($data_array['new_sell_price']) . "'",
        ];
        $response = $purchase_products->purchaseinsert($data);
        $response = json_decode($response, true);
        if ($response["status"] == "200") {
            $product->update($update, 'id', $data_array['product_id']);
        }
    } elseif ($_POST['action'] == 'readone') {

        $id = $_POST['id'];
        echo $customer->read('customer_id', $id);
    } elseif (isset($_POST['action']) && $_POST['action'] == 'update') {

        $data = [

            '`customerName`' => "'" . $customerName . "'",
            '`customerCompanyName`' => "'" . $customerCompanyName . "'",
            '`customerGst`' => "'" . $customerGst . "'",
            '`customerAddress1`' => "'" . $customerAddress1 . "'",
            '`customerAddress2`' => "'" . $customerAddress2 . "'",
            '`customerStreet`' => "'" . $customerStreet . "'",
            '`customerArea`' => "'" . $customerArea . "'",
            '`customerPincode`' => "'" . $customerPincode . "'",
            '`customerPhoneNo`' => "'" . $customerPhoneNo . "'",
            '`customerState`' => "'" . $customerState . "'"
        ];
        $customer->update($data, 'customer_id', $customer_id);
    } elseif ($_POST['action'] == 'delete') {
        $data = [
            '`status`' => "'0'",
        ];
        echo $customer->updatestatus($data, 'customer_id', $customer_id);
    }
}
