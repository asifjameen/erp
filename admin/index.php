<?php
include("partial/header.php");
include("partial/nav.php");

?>
 <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>

        </div>
        <hr>
        

        <div class="row">
            <div class="col-md-4 ">
                <div class="card bg-gradient-danger card-img-holder text-white pat">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Customer <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <?php
                        $customer_total=json_decode($customer->rowCount(),true);

                        ?>


                        <h2 class="mb-5"><?php echo $customer_total['count'] ?></h2>
                        <h6 class="card-text"></h6>
                    </div>
                </div>
            </div>`

            <div class="col-md-4 ">
                <div class="card bg-gradient-info card-img-holder text-white doc">
                    <div class="card-body">

                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Suppliers <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <?php
                       $supplier_total=json_decode($supplier->rowCount(),true);
                        //echo $res->rowCount();
                        ?>
                        
                        <h2 class="mb-5"><?php echo $supplier_total['count'] ?> </h2>
                        <h6 class="card-text"></h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4 ">
                <div class="card bg-gradient-success card-img-holder text-white app">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Products <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <?php
                       $product_total=json_decode($product->rowCount(),true);   
                        //echo $res->rowCount();
                        ?>
                        <h2 class="mb-5"><?php echo $product_total['count'] ?></h2>
                        <h6 class="card-text"></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mt-2">
                <div class="card bg-gradient-primary card-img-holder text-white app">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Credit <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <?php
                       $credit_total=json_decode($credit->rowCount(),true);

                        //echo $res->rowCount();
                        ?>
                        <h2 class="mb-5"><?php echo $credit_total['count']; ?></h2>
                        <h6 class="card-text"></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card bg-gradient-danger card-img-holder text-white app">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Sales <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <?php
                        $sql = "select * from Sales ";
                        $res = $con->prepare($sql);
                        $res->execute();

                        //echo $res->rowCount();
                        ?>
                        <h2 class="mb-5"><?php echo $res->rowCount(); ?></h2>
                        <h6 class="card-text"></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card bg-gradient-primary card-img-holder text-white app">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Combo_products <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <?php
                        $sql = "select * from combo_list ";
                        $res = $con->prepare($sql);
                        $res->execute();

                        //echo $res->rowCount();
                        ?>
                        <h2 class="mb-5"><?php echo $res->rowCount(); ?></h2>
                        <h6 class="card-text"></h6>
                    </div>
                </div>
            </div>
        </div>




        <!-- recent_appointment-->

        <div class="mt-4">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Minimum_Stock_Items</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> Product_ID </th>
                                            <th> Product_Name </th>
                                            <th> Quantity </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT pid,product_name,quantity from product where quantity<=minimum_stock";
                                        $res = $con->query($sql);
                                        $res->setFetchMode(PDO::FETCH_ASSOC);
                                        $row = $res->fetchall();
                                        //echo "<pre>";
                                        //print_r($row);
                                        foreach ($row as $res) {
                                            echo '<tr>
                            <td>
                              ' . $res['pid'] . '
                            </td>
                            <td> ' . $res['product_name'] . ' </td>
                        
                            <td> ' . $res['quantity'] . ' </td>
                            
                          </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?PHP
include_once("partial/footer.php");
?>