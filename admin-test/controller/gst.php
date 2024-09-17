<?php
include("../partial/config/db_config.php");


$supplier_id = $_POST['Supplier'] ?? '';
$batch = $_POST['batch'] ?? '';
$amount = $_POST['amount'] ?? '';
$note = $_POST['notes'] ?? '';
$reg_date = $_POST['reg_date'] ?? '';
$gst = $_POST['gst'] ?? '';

if (isset($_POST["action"])) {


    if ($_POST['action'] == 'insert') {
        // $product_last_id = $product->splitLastid() + 1;

        $data = [
            'supplier_id' => "'" . $supplier_id . "'",
            'batch' => "'" . $batch . "'",
            'amount' => "'" . $amount . "'",
            'note' => "'" . $note . "'",
            'reg_date' => "'" . $reg_date . "'",
            'gst' => "'" . $gst . "'"
        ];
       // $response->gstinsert($data);

        $amt=$gst_amt->readAll();
        $get_amt=json_decode($amt,true);
        // print_r($get_amt[0]['gst_amt']);
        // die();
        $total=$get_amt[0]['gst_amt']+$amount;
        $data1=[
            '`gst_amt`' => "'" . $total . "'"
        ];
        $response = $gst_record->purchaseinsert($data);
        $response = json_decode($response, true);
        if ($response["status"] == "200") {
            $gst_amt->update($data1, 'id','1');
        }
        // } elseif ($_POST['action'] == 'readone') {

        //     $id = $_POST['id'];
        //     echo  $product->readAllById($id);
        // } elseif (isset($_POST['action']) && $_POST['action'] == 'update') {
        //     $data = [
        //         '`product_id`' =>  "'" . $product_id . "'",
        //         '`category_id`' => "'" . $product_category_id . "'",
        //         '`productName`' => "'" . $product_name . "'",
        //         'productQuantity' => $productQuantity,
        //         'productPurchasePrice' => $productPurchasePrice,
        //         'productSalesPrice' => $productSalesPrice,
        //         'productMinimumQuantity' => $productMinimumQuantity,
        //         'productSKN' => "'" . $productSKN . "'",
        //         'productHsn' => "'" . $productHsn . "'",
        //         'productBatch' => "'" . $productBatch . "'"
        //     ];
        //     $result = $product->update($data, 'id', $id);
        // } elseif ($_POST['action'] == 'delete') {

        //     $id = $_POST['id'];
        //     echo $result = $product->delete('id', $id);
        // }
    }
}
