<?php
//include("..\includes\config1.php");
$inv_id = 1;
//$sql="select "
// ?>
// <?php
//                                     $sql = "SELECT customer.customer_name as customer_name,invoices.invoice_date as inv_date,customer.gst_no as gst,customer.phone_no as phno,customer.street as street,customer.area as area,customer.district as district,customer.pincode as pincode from customer join invoices on customer.customer_id=invoices.customer_id where invoices.invoice='$inv_id'";
//                                     $res = $con->query($sql);
//                                     $res->setFetchMode(PDO::FETCH_ASSOC);
//                                     $rows = $res->fetchall();

// //print_r($row);

// $sqlll = "SELECT * from invoice_items where invoice='$inv_id'";
//                                                         $con2=mysqli_connect('localhost','root','','billing_ims');
//                                             $resss = mysqli_query($con2,$sqlll);
//                                             //$resss->setFetchMode(PDO::FETCH_ASSOC);
//                                              $row_conunt=mysqli_num_rows($resss);
//                                             echo "<br>";
//                                     ?>

// <?php
//                                 $sql = "SELECT shipping.name as name,shipping.address_1 as address_1,shipping.address_2 as address_2,shipping.state as state,shipping.postcode as pincode,shipping.phone_no as phone_no,transport.transportName as transport_name,invoices.weight as weight,invoices.gst_type as gst_type,invoices.bags as bags,invoices.ewaybillNo as ewayno,invoices.notes as notes,invoices.subtotal as subtotal,invoices.discount as discount,invoices.gst as gst,invoices.total as total from shipping join transport on shipping.transport_id=transport.id join invoices on invoices.invoice=shipping.invoice_id where invoices.invoice='$inv_id'";
//                                 $res = $con->query($sql);
//                                 $res->setFetchMode(PDO::FETCH_ASSOC);
//                                 $shipping = $res->fetchall();
// //echo $rows['customer_name'];
// //print_r($row);
//                                 ?>
// <?php
//                                         include("word.php");
//                                         $aa = $shipping[0]['total'];
//                                          $bb = round($aa);
//                                                         $cc = $aa - $bb;
//                                         $obj = new IndianCurrency($bb);
                                       
//                                         ?>



<?php

$a=20;
$count=0;

$loop_count=0;

//for($i=1;$i<)
$mod=$a%10;
 $div=$a/10;
if($mod>0){
    $loop_count=$div+1;
}
else{
    $loop_count=$div;
}

echo round($loop_count);

 for($i=0;$i<$loop_count;$i++){ 
    echo "titile"."comntent";

    ?>
    <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </head>
    <style>
        tr,td{
            border-style:solid;
        }
        html{
            height:100%
        }
         body{
            position:relative;
            margin:0;
            min-height:100%

         }
         footer{
            
            position:absolute;
            right:0;
            left:0;
            bottom:0;

         }
    </style>
    <body>
        <main>
        <div class="container-wrapper">
            <div id="ui-view" data-select2-id="ui-view">
                <div>
                    <div class="card">
                        <div class="card-header">Invoice
                            <strong><?php echo $_GET['inv_id'] ?></strong>
                            <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
                                <i class="fa fa-print"></i> Print</a>
                            <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="#" onclick="location.href = '../../invoice_details.php'" data-abc="true">
                                <i class="fa fa-save"></i> Save</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-3">From:</h6>
                                    <div>
                                        <strong>SA HYDRAULIC FITTINGS</strong>
                                    </div>

                                    <div>#640A,Pillayar Kovil Street,</div>
                                    <div>Mannurpet,Chennai-600050</div>
                                    <div> State : Tamil Nadu</div>
                                    <div>Email: sahydraulicfittings@gmail.com</div>
                                    <div>Phone no: 7871517751 / 9524493786</div>
                                    <div><strong> GST NO: 33AKZPI3901M1ZR</strong> </div>
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Invoice Details:</h6>
                                    <div>Invoice
                                        <strong><?php echo $_GET['inv_id'] ?></strong>
                                    </div>
                                    <div>Date : <?php echo $rows[0]['inv_date']?></div>


                                </div>

                                <div class="col-sm-4">

                                    <div>

                                    </div>
                                    <div>

                                    </div>
                                    <div class="mb-3"><strong>Bank_Details</strong></div>

                                    <div>Bank Name: HDFC Bank</div>
                                    <div>Holder Name :S A HYDRAULIC FITTINGS</div>
                                    <div>
                                        <strong>AC_NO: 50200080353939 </strong>
                                    </div>
                                    <div>
                                        <strong>IFSC_code: HDFC0006712</strong>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-2">
                                <strong>To:</strong> 
                            </div> 
                            <div class="row mb-2">  

                                <div class="col-sm-6">
                                    <?php
                                    $sql = "SELECT customer.customer_name as customer_name,customer.gst_no as gst,customer.phone_no as phno,customer.street as street,customer.area as area,customer.district as district,customer.pincode as pincode from customer join invoices on customer.customer_id=invoices.customer_id where invoices.invoice='$inv_id'";
                                    $res = $con->query($sql);
                                    $res->setFetchMode(PDO::FETCH_ASSOC);
                                    $rows = $res->fetchall();

//print_r($row);
                                    ?>

                                    <h6 class="">Customer_Details</h6>
                                    <div>
                                        <strong><?php echo $rows[0]['customer_name']; ?></strong>
                                    </div>

                                    <div><?php echo $rows[0]['street'].", ". $rows[0]['district']?> </div>
                                    
                                    <div><strong>Pincode : </strong><?php echo $rows[0]['pincode'] ?>,</div>
                                    <div>Phone: <?php echo $rows[0]['phno'] ?></div>
                                    <div><strong>GST : <?php echo $rows[0]['gst'] ?></strong> </div>
                                </div>
                               
                               <!-- <div class="col-sm-4" >
                                    <h6 class="">Shipping Address:</h6>
                                    <div>
                                        <?php //echo $shipping[0]['name'] ?>
                                    </div>
                                    <div><?php //echo $shipping[0]['address_1'] ?></div>
                                    <div><?php //echo $shipping[0]['address_2'] ?> </div>
                                    <div> <?php //echo $shipping[0]['state'] ?></div>
                                    <div> <?php //echo $shipping[0]['pincode'] ?></div>
                                    <div>
                                        <strong>Phone_no:<?php //echo $shipping[0]['phone_no'] ?> </strong>
                                    </div>
                                </div>-->
                                <div class="col-sm-4">
                                    <h6 class="">Transport Details:</h6>
                                    <div>Transport :
                                        <strong> <?php echo $shipping[0]['transport_name'] ?></strong>
                                    </div>
                                    <div>Weight :<?php echo $shipping[0]['weight'] ?> kg</div>
                                    <div>Bags : <?php echo $shipping[0]['bags'] ?> Nos</div>
                                    <div>E-Way Ref.No : <?php echo $shipping[0]['ewayno'] ?></div>

                                </div>


                            </div> 
                            <hr>
                           
                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>Product</th>
                                                <th>HSN/SAC</th>
                                                <th>Quantity</th>
                                                <th class="center">Price</th>
                                                <th class="right">Discount</th>
                                                <th class="right">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            
                                            $sql = "SELECT * from invoice_items where invoice='$inv_id'";
                                            $res = $con->query($sql);
                                            $res->setFetchMode(PDO::FETCH_ASSOC);
                                            $row = $res->fetchall();
                                            $a=1;
                                           $b=1;
                                    
                                            foreach ($row as $res) {
                                                    
                                                   
                                                echo "<tr class='table-danger'>";
                                                echo"<td scope='row'>" . $a . "</td>";
                                                echo"<td scope='row'>" . $res['product'] . "</td>";
                                                echo"<td>7307 </td>";
                                                echo"<td>" . $res['qty'] . "</td>";
                                                echo "<td>" . $res['price'] . "</td>";
                                                echo "<td>" . $res['discount'] . "</td>";
                                                echo "<td>" . $res['subtotal'] . "</td> </tr>"; 
                                                $a=$a+1;
                                            }
                                            ?>

                                        </tbody>

                                        <tr>

                                            <th class="center"></th>
                                            <th><strong>Total</strong></th>
                                            <th class="center"></th>
                                            <th>
                                                <?php
                                                $result = "SELECT SUM(qty) AS value_sum FROM invoice_items Where invoice='$inv_id'";
                                                $res = $con->query($result);
                                                $res->setFetchMode(PDO::FETCH_ASSOC);
                                                $rows = $res->fetchall();
                                                $sum = $rows[0]['value_sum'];
                                                echo $sum;
                                                ?>
                                            </th>

                                            <th class="center"><?php
                                                $result = "SELECT SUM(price) AS value_sum FROM invoice_items Where invoice='$inv_id'";
                                                $res = $con->query($result);
                                                $res->setFetchMode(PDO::FETCH_ASSOC);
                                                $rows = $res->fetchall();
                                                $sum = $rows[0]['value_sum'];
                                                echo $sum;
                                                ?></th>
                                            <th class="right"><?php
                                                $result = "SELECT SUM(discount) AS value_sum FROM invoice_items Where invoice='$inv_id'";
                                                $res = $con->query($result);
                                                $res->setFetchMode(PDO::FETCH_ASSOC);
                                                $rows = $res->fetchall();
                                                $sum = $rows[0]['value_sum'];
                                                echo $sum;
                                                ?></th>
                                            <th class="right">Subtotal</th>
                                        </tr>
                                    </table>

                                    <table>

                                    </table>
                                </div>
                            
                            <div class="row">
                                <div class="col-lg-4 col-sm-5"><div class="card"><div class="card-header"> Notes : <?php echo $shipping[0]['notes'] ?></div></div></div>
                                <br>

                                </strong>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </main>
        <fooater>
                                <div id="footer" > 
                                    <strong> 
                                    <?php  echo "Amount : " . $obj->get_words();
?>
                           

                                        <div class="col-lg-4 col-sm-5 ml-auto">
                                            <table class="table table-clear">
                                                <tbody>
                                                    <tr>
                                                        <td class="left">
                                                            <strong>Sub_Total</strong>
                                                        </td>
                                                        <td class="right"><div> <?php echo $shipping[0]['subtotal'] ?></div></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="left">
                                                            <strong>Discount</strong>
                                                        </td>
                                                        <td class="right"><div> <?php echo $shipping[0]['discount'] ?></div></td>
                                                    </tr>

                                                    <?php
                                                    if ($shipping[0]['gst_type'] == 'gst') {

                                                        echo "<tr><td class='left'><strong>CGST 9%</strong></td><td class='right'><div>" . $shipping[0]['gst'] / 2 . "</div></td></tr><tr>";
                                                        echo "<tr><td class='left'><strong>SGST 9%</strong></td><td class='right'><div>" . $shipping[0]['gst'] / 2 . "</div></td></tr><tr>";
                                                    } elseif ($shipping[0]['gst_type'] == 'igst') {
                                                        echo "<tr>
                                                    <td class='left'>
                                                        <strong>IGST</strong>
                                                    </td>
                                                    <td class='right'><div>" . $shipping[0]['gst'] . "</div></td>
                                                </tr>
                                    ";
                                                    }
                                                    ?>





                                                    <tr>
                                                        <td class="left">
                                                            <strong>Round_off</strong>
                                                        </td>
                                                        <?php
//$shipping[0]['total']='15.45';
                                                        $a = $shipping[0]['total'];
                                                        $b = round($a);
                                                        $c = $a - $b;
                                                        ?>      
                                                        <td class="right">
                                                            <strong><div> <?php echo $c ?></div></strong>
                                                        </td>

                                                    </tr>
                                                    </tr>
                                                <td class="left">
                                                    <strong>GRAND_TOTAL</strong>
                                                </td>

                                                <td class="right">
                                                    <strong><div> <?php echo $b ?></div></strong>
                                                </td>
                                                </tr>
                                                </tbody>
                                                <tr>
                                            </table>
                                        </div>
                                        <br>
                                        <br>
                                       
                                        <div class="mt-8" align="right">
                                            <strong> Authorized Signature</strong>
                                        </div>
                                    </strong>
                                </div>
                            </fooater>
                           
    </body>
</html>
    
    
    <?php
    for($j=0;$j<10;$j++){
        echo $count=$count+1;

        echo "<br>";
        if($count==$a){
            break;
        }
    }
    if($count==$a){
        break;
    }
    echo "<br>";
 }

?>
