<?php
include_once 'config.php';
// CONNECT TO THE DATABASE
// $mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);
include "functions.php";
function  pre_print($a)
{
    echo "<pre>";
    print_r($a);
    echo "</\pre>";
}
function err($e)
{
    $err = $e->getMessage();
    return $s = $err;
}

function status($status)
{
    if ($status == "1") {
        return "<button class='btn btn-primary btn-sm'>Active</button> ";
    } else {
        return "<button class='btn btn-danger btn-sm'>Disable</button> ";
    }
}
class dbCrud
{
    //protected $db;
    public $db;
    protected $tableName;
    public function __construct($table_name)
    {

        //    public function d b(){
        $this->db = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);
        //    }
        $this->tableName = $table_name;
    }
}

class crud extends dbCrud
{
    public function update($set, $where, $id)
    {
        //pre_print($set);
        $update = "";
        $i = 1;
        foreach ($set as $k => $v) {
            $update .= $k . "=" . $v;
            if ($i < count($set)) {
                $update .= ",";
                $i++;
            }
        }
        try {
            $sql = "update $this->tableName set $update where $where = '$id'";
            $query_run = mysqli_query($this->db, $sql);
            try {
                $sql = "select * from $this->tableName";
                $query_run = mysqli_query($this->db, $sql);
                $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            } catch (mysqli_sql_exception $e) {
                pre_print($e->getMessage());
            }
            echo json_encode(array("status" => "success", "message" => "Successfully Updated", "data" => $res));
        } catch (mysqli_sql_exception $e) {
            err($e);
        }
    }
    public function updatestatus($set, $where, $id)
    {
        //pre_print($set);
        $update = "";
        $i = 1;
        foreach ($set as $k => $v) {
            $update .= $k . "=" . $v;
            if ($i < count($set)) {
                $update .= ",";
                $i++;
            }
        }
        try {
            $sql = "update $this->tableName set $update where $where = '$id'";
            $query_run = mysqli_query($this->db, $sql);
            try {
                $sql = "select * from $this->tableName";
                $query_run = mysqli_query($this->db, $sql);
                $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            } catch (mysqli_sql_exception $e) {
                pre_print($e->getMessage());
            }
            echo json_encode(array("status" => "success", "message" => "Successfully Updated", "data" => $res));
        } catch (mysqli_sql_exception $e) {
            err($e);
        }
    }
    public function delete($feild, $id)
    {

        try {
            $sql = "delete from $this->tableName where $feild = '$id'";

            mysqli_query($this->db, $sql);
            try {
                $sql = "select * from $this->tableName";
                $query_run = mysqli_query($this->db, $sql);
                $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            } catch (mysqli_sql_exception $e) {
                pre_print($e->getMessage());
            }
            return json_encode(array("status" => "success", "message" => "Deleted_succesfully", "data" => $res));
        } catch (mysqli_sql_exception $e) {
            echo err($e);
        }
    }

    public function insert($data)
    {

        try {

            $feilds = implode(",", array_keys($data));
            $values = implode(",", array_values($data));
            $sql = "insert into `$this->tableName` ($feilds) values ($values)";
            mysqli_query($this->db, $sql);
            try {
                $sql = "select * from $this->tableName";
                $query_run = mysqli_query($this->db, $sql);
                $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            } catch (mysqli_sql_exception $e) {
                pre_print($e->getMessage());
            }
            echo json_encode(array("status" => "200", "message" => "inserted_success", "data" => $res));
        } catch (mysqli_sql_exception $e) {
            echo json_encode(array("status" => "400", "message" => err($e)));
        }
    }
    public function purchaseinsert($data)
    {

        try {

            $feilds = implode(",", array_keys($data));
            $values = implode(",", array_values($data));
            $sql = "insert into `$this->tableName` ($feilds) values ($values)";
            mysqli_query($this->db, $sql);
            try {
                $sql = "select * from $this->tableName";
                $query_run = mysqli_query($this->db, $sql);
                $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            } catch (mysqli_sql_exception $e) {
                pre_print($e->getMessage());
            }
            return json_encode(array("status" => "200", "message" => "inserted_success", "data" => $res));
        } catch (mysqli_sql_exception $e) {
            echo json_encode(array("status" => "400", "message" => err($e)));
        }
    }
    public function gstinsert($data)
    {

        try {

            $feilds = implode(",", array_keys($data));
            $values = implode(",", array_values($data));
            $sql = "insert into `$this->tableName` ($feilds) values ($values)";
            mysqli_query($this->db, $sql);
            try {
                $sql = "select * from $this->tableName";
                $query_run = mysqli_query($this->db, $sql);
                $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            } catch (mysqli_sql_exception $e) {
                pre_print($e->getMessage());
            }
            return json_encode(array("status" => "200", "message" => "inserted_success", "data" => $res));
        } catch (mysqli_sql_exception $e) {
            echo json_encode(array("status" => "400", "message" => err($e)));
        }
    }
}
class functions extends crud
{

    public function readAll()
    {

        try {
            $sql = "select * from $this->tableName";
            $query_run = mysqli_query($this->db, $sql);
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            return json_encode($res);
        } catch (mysqli_sql_exception $e) {
            pre_print($e->getMessage());
        }
    }
    public function readAllById($id)
    {
        //echo 
        // res($this->db);
        try {
            $sql = "select * from $this->tableName where id = $id";

            $query_run = mysqli_query($this->db, $sql);
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            $data = [
                'status' => 'success',
                'data' => $res
            ];
            return json_encode($data);
        } catch (mysqli_sql_exception $e) {
            pre_print($e->getMessage());
        }
    }
    public function read($feild, $id)
    {

        try {
            $sql = "select * from $this->tableName where $feild = '$id'";
            $query_run = mysqli_query($this->db, $sql);
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            $data = [
                'status' => 'success',
                'data' => $res
            ];
            return json_encode($data);
        } catch (mysqli_sql_exception $e) {
            pre_print($e->getMessage());
        }
    }

    public function readOne($field)
    {
        try {
            $field_imp = implode(',', $field);
            $sql = "select $field_imp from $this->tableName";
            $query_run = mysqli_query($this->db, $sql);
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            return json_encode($res);
        } catch (mysqli_sql_exception $e) {
            err($e);
        }
    }
    public function totalsum($columnName)
    {
        try {

            $sql = "select SUM($columnName) as total from $this->tableName";
            $query_run = mysqli_query($this->db, $sql);
            // pre_print($query_run);
            $res = mysqli_fetch_assoc($query_run);
            return json_encode($res);
            //return json_encode($res);
        } catch (mysqli_sql_exception $e) {
            err($e);
        }
    }
    public function sqlQuery($sql)
    {
        try {


            $query_run = mysqli_query($this->db, $sql);
            // pre_print($query_run);
            $res = mysqli_fetch_assoc($query_run);
            return json_encode($res);
            //return json_encode($res);
        } catch (mysqli_sql_exception $e) {
            err($e);
        }
    }
    public function rowCount()
    {
        try {
            $sql = "select count('id') as count from `$this->tableName`";
            $query_run = mysqli_query($this->db, $sql);
            // pre_print($query_run);
            $res = mysqli_fetch_assoc($query_run);
            return json_encode($res);
        } catch (mysqli_sql_exception $e) {
            err($e);
        }
    }
    public function joinQuery($sql)
    {
        try {

            $query_run = mysqli_query($this->db, $sql);
            // pre_print($query_run);
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            return json_encode($res);
            //return json_encode($res);
        } catch (mysqli_sql_exception $e) {
            err($e);
        }
    }
    public function getLastId()
    {
        try {
            $table_id = $this->tableName . '_id';
            $query = "select $table_id as lastid from $this->tableName order by id Desc limit 1";
            $query_run = mysqli_query($this->db, $query);
            $res = mysqli_fetch_assoc($query_run);
            return $res['lastid'] ?? '';
        } catch (mysqli_sql_exception $e) {
            echo err($e);
        }
    }
    public function splitLastid()
    {
        try {
            // $str=str_replace(array($this->getLastId()),'',)
            $str = $this->getLastId();
            // $arr = preg_split('/(?<=[a-z])(?=[0-9]+)/i', $str);

            // $id = strval($arr[1]);
            // // Format the new number with leading zeros
            // $newNumber = str_pad($id, 3, '0', STR_PAD_LEFT);
            // return $newNumber;
            $num = (int)substr($str, 3);
            // Increment the numeric part
            $num++;
            // Format the new ID with leading zeros
            $newId = str_pad($num, 3, '0', STR_PAD_LEFT);
            return $newId;
        } catch (mysqli_sql_exception $e) {
            echo err($e);
        }
    }
}


//tableName_List
$customer = new functions('customer');
$supplier = new functions('supplier');
$product = new functions('product');
$category = new functions('category');
$expense = new functions('expense');
$credit = new functions('credit');
$users = new functions('users');
$purchase_products = new functions('purchase_products');
$gst_record = new functions('gst_record');
$gst_amt = new functions('gst_amt');
