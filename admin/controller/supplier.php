<?php
include("../partial/config/db_config.php");


$id = $_POST['id'] ?? '';
$supplier_id = $_POST['supplier_id'] ?? '';
$supplierName = $_POST['supplierName'] ?? '';
$supplierCompanyName = $_POST['supplierCompanyName'] ?? '';
$supplierGst = $_POST['supplierGst'] ?? '';
$supplierAddress1 = $_POST['supplierAddress1'] ?? '';
$supplierAddress2 = $_POST['supplierAddress2'] ?? '';
$supplierStreet = $_POST['supplierStreet'] ?? '';
$supplierArea = $_POST['supplierArea'] ?? '';
$supplierPincode = $_POST['supplierPincode'] ?? '';
$supplierPhoneNo = $_POST['supplierPhoneNo'] ?? '';
$supplierState = $_POST['supplierState'] ?? '';
//$supplierRegDate = $_POST['supplierRegDate']?? '';


if (isset($_POST["action"])) {


    if ($_POST['action'] == 'insert') {
        $supplier_id = $supplier->splitLastid();

        $data = [
                                              
            '`supplier_id`' => "'SUP" . $supplier_id . "'",
            '`supplierName`' => "'" . $supplierName . "'",
            '`supplierCompanyName`' => "'" . $supplierCompanyName . "'",
            '`supplierGst`' => "'" . $supplierGst . "'",
            '`supplierAddress1`' => "'" . $supplierAddress1 . "'",
            '`supplierAddress2`' => "'" . $supplierAddress2 . "'",
            '`supplierStreet`' => "'" . $supplierStreet . "'",
            '`supplierArea`' => "'" . $supplierArea . "'",
            '`supplierPincode`' => "'" . $supplierPincode . "'",
            '`supplierPhoneNo`' => "'" . $supplierPhoneNo . "'",
            '`supplierState`' => "'" . $supplierState . "'"
        ];
        $supplier->insert($data);
    } elseif ($_POST['action'] == 'readone') {

        $id = $_POST['id'];
        echo $supplier->read('id', $id);
    } elseif (isset($_POST['action']) && $_POST['action'] == 'update') {

        $data = [
            '`supplierName`' => "'" . $supplierName . "'",
            '`supplierCompanyName`' => "'" . $supplierCompanyName . "'",
            '`supplierGst`' => "'" . $supplierGst . "'",
            '`supplierAddress1`' => "'" . $supplierAddress1 . "'",
            '`supplierAddress2`' => "'" . $supplierAddress2 . "'",
            '`supplierStreet`' => "'" . $supplierStreet . "'",
            '`supplierArea`' => "'" . $supplierArea . "'",
            '`supplierPincode`' => "'" . $supplierPincode . "'",
            '`supplierPhoneNo`' => "'" . $supplierPhoneNo . "'",
            '`supplierState`' => "'" . $supplierState . "'"
        ];
        echo $supplier->update($data, 'id', $id);
    } elseif ($_POST['action'] == 'delete') {
        $data = [
            '`status`' => "'0'",
        ];
        echo $supplier->updatestatus($data, 'id', $id);
    }
}
