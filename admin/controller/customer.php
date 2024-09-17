<?php
include("../partial/config/db_config.php");

$customer_id = $_POST['customer_id'] ?? '';
$customerName = $_POST['customerName'] ?? '';
$customerCompanyName = $_POST['customerCompanyName'] ?? '';
$customerGst = $_POST['customerGst'] ?? '';
$customerAddress1 = $_POST['customerAddress1'] ?? '';
$customerAddress2 = $_POST['customerAddress2'] ?? '';
$customerStreet = $_POST['customerStreet'] ?? '';
$customerArea = $_POST['customerArea'] ?? '';
$customerPincode = $_POST['customerPincode'] ?? '';
$customerPhoneNo = $_POST['customerPhoneNo'] ?? '';
$customerState = $_POST['customerState'] ?? '';
//$customerRegDate = $_POST['customerRegDate']?? '';


if (isset($_POST["action"])) {


    if ($_POST['action'] == 'insert') {
        $customer_id = $customer->splitLastid();

        $data = [
            '`customer_id`' => "'CUS" . $customer_id . "'",
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
        $customer->insert($data);
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
        $data=[
            '`status`' => "'0'",
        ];
        echo $customer->updatestatus($data, 'customer_id', $customer_id);
    }
}
