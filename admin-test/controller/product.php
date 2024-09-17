<?php
include("../partial/config/db_config.php");

$product_name = $_POST['product_name'] ?? '';
$product_category_id = $_POST['product_category'] ?? '';
$productQuantity = $_POST['product_quantity'] ?? '';;
$productPurchasePrice = $_POST['purchase-price'] ?? '';
$productSalesPrice = $_POST['sales-price'] ?? '';
$productMinimumQuantity = $_POST['product-minimum-quantity']??'';
$productSKN = $_POST['product-skn'] ?? '';
$productHsn = $_POST['product-hsn'] ?? '';
$productBatch = $_POST['product-batch'] ?? '';
$product_id=$_POST['product_id']??'';
$id=$_POST['id']??'';


if (isset($_POST["action"])) {

    if ($_POST["action"] == "update_status") {
        $update = [
            'productStatus' => $_POST['status']
        ];
        $product->update($update, 'product_id', $_POST['id']);
    }
    if ($_POST['action'] == 'insert') {
        $product_last_id = $product->splitLastid() + 1;  
        $data = [
            '`product_id`' =>  "'PRO" . $product_last_id . "'",
            '`category_id`' => "'" . $product_category_id . "'",
            '`productName`' => "'" . $product_name . "'",
            'productQuantity' => $productQuantity,
            'productPurchasePrice' => $productPurchasePrice,
            'productSalesPrice' => $productSalesPrice,
            'productMinimumQuantity' => $productMinimumQuantity,
            'productSKN' => "'" . $productSKN . "'",
            'productHsn' => "'" . $productHsn . "'",
            'productBatch' => "'" . $productBatch . "'"
        ];
        $product->insert($data);
    }
    elseif ($_POST['action'] == 'readone') {

        $id = $_POST['id'];
       echo  $product->readAllById($id);
    }
    elseif(isset($_POST['action']) && $_POST['action'] == 'update') {        
        $data = [
            '`product_id`' =>  "'" . $product_id . "'",
            '`category_id`' => "'" . $product_category_id . "'",
            '`productName`' => "'" . $product_name . "'",
            'productQuantity' => $productQuantity,
            'productPurchasePrice' => $productPurchasePrice,
            'productSalesPrice' => $productSalesPrice,
            'productMinimumQuantity' => $productMinimumQuantity,
            'productSKN' => "'" . $productSKN . "'",
            'productHsn' => "'" . $productHsn . "'",
            'productBatch' => "'" . $productBatch . "'"
        ];
        $result = $product->update($data,'id',$id);      
    }
    elseif ($_POST['action'] == 'delete') {

        $id = $_POST['id'];
    echo $result= $product->delete('id',$id);
    }
}
