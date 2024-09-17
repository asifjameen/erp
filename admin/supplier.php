<?php
include ("partial/header.php");
include ("partial/nav.php");

?>
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span> <strong>Supplier</strong>
    </h3>
</div>
<hr>
<div class="row">
    <div class="col-md-4 ">
        <div class="card bg-gradient-danger card-img-holder text-white pat">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total_Buy <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                </h4>
                <?php
                $supplierTotalBuy = json_decode($supplier->totalsum('supplierTotalBuy'), true);

                ?>


                <h2 class="mb-5"><?php echo $supplierTotalBuy['total'];
                ?></h2>
                <h6 class="card-text"></h6>
            </div>
        </div>
    </div>

    <div class="col-md-4 ">
        <div class="card bg-gradient-info card-img-holder text-white doc">
            <div class="card-body">

                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total_Paid <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                </h4>
                <?php

                $suppliertotalPaid = json_decode($supplier->totalsum('supplierTotalPaid'), true);

                ?>
                <h2 class="mb-5"><?php // echo $res[0]
                echo $suppliertotalPaid['total'];
                ?> </h2>
                <h6 class="card-text"></h6>
            </div>
        </div>
    </div>

    <div class="col-md-4 ">
        <div class="card bg-gradient-success card-img-holder text-white app">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total_credit<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                </h4>
                <?php
                $suppliertotalDue = json_decode($supplier->totalsum('supplierTotalDue'), true);

                ?>
                <h2 class="mb-5"><?php // echo $res[0]
                echo $suppliertotalDue['total'];
                ?> </h2>
                <h6 class="card-text"></h6>
                <h6 class="card-text"></h6>
            </div>
        </div>
    </div>
</div>
<hr>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#suppliertableModal">
    <b>Add_supplier</b>
</button>

<!-- Modal -->
<div>
    <div class="table-responsive table-striped mt-4">
        <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
            <thead class="table-primary">

                <tr>
                    <th>id</th>
                    <th>supplier_id</th>
                    <th>Name</th>
                    <th>Company_name</th>
                    <th>Gst</th>
                    <th>Phone_No</th>
                    <th>Address</th>
                    <th>Total_Buy</th>
                    <th>total paid</th>
                    <th>total due</th>
                    <th>Registration_date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody class="table-group-divider" id="supplierTableBody">

                <?php
                $supplierList = json_decode($supplier->readAll(), true);
                //pre_print($supplierList);
                
                foreach ($supplierList as $supplier) {
                    echo "<tr class='table-danger'>";
                    echo "<td scope='row'>" . $supplier['id'] . "</td>";
                    echo "<td scope='row'>" . $supplier['supplier_id'] . "</td>";
                    echo "<td>" . $supplier['supplierName'] . "</td>";
                    echo "<td>" . $supplier['supplierCompanyName'] . "</td>";
                    echo "<td>" . $supplier['supplierGst'] . "</td>";
                    echo "<td>" . $supplier['supplierPhoneNo'] . "</td>";
                    echo "<td>
                    <div class='dropdown'>
                        <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown'
                            aria-expanded='false'>
                            " . $supplier['supplierState'] . "
                        </button>
                        <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                            <li class='dropdown-item'><b>Address</b> : " . $supplier['supplierAddress1'] . "</li>
                            <li class='dropdown-item'> " . $supplier['supplierAddress2'] . "</li>
                            <li class='dropdown-item'><b>Street</b>: " . $supplier['supplierStreet'] . " </li>
                            <li class='dropdown-item'><b> Area</b> : " . $supplier['supplierArea'] . " </li>
                
                            <li class='dropdown-item'><b>State</b> : " . $supplier['supplierState'] . " </li>
                            <li class='dropdown-item'><b>Pincode</b> : " . $supplier['supplierPincode'] . "</li>
                        </ul>
                    </div>
                </td>";
                    echo "<td>" . $supplier['supplierTotalBuy'] . "</td>";
                    echo "<td>" . $supplier['supplierTotalPaid'] . "</td>";
                    echo "<td>" . $supplier['supplierTotalDue'] . "</td>";
                    echo "<td>" . $supplier['supplierRegDate'] . "</td>";
                    echo ' <form action="code.php" method="post">';
                    echo "<td><input type='submit' id='supplier_edit' name='supplier_edit' value='Edit' data-id=" . $supplier['id'] ." class='btn btn-success btn-sm'></td>";

                    echo "<td><input type='submit' id='supplier_delete' name='supplier_delete' value='Delete' data-id=". $supplier['id'] ." class='btn btn-danger btn-sm'></td>";

                    echo "</tr>";
                    echo '</form>';
                }
                ?>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>

</div>





<div class="modal fade bd-example-modal-xl" id="suppliertableModal" tabindex="-1" aria-labelledby="supplierTableLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title">Add_New_supplier</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            <form id="supplier_frm">
            <div class="row">
                <div class="col-md-6">
                    
                    <div class="form-group">
                        <label for="supplierName">Supplier Name</label>
                        <input type="text" class="form-control" id="supplierName" name="supplierName">
                    </div>
                    <div class="form-group">
                        <label for="supplierCompanyName">Supplier Company Name</label>
                        <input type="text" class="form-control" id="supplierCompanyName" name="supplierCompanyName">
                    </div>
                    <div class="form-group">
                        <label for="supplierGst">Supplier GST</label>
                        <input type="text" class="form-control" id="supplierGst" name="supplierGst">
                    </div>
                    <div class="form-group">
                        <label for="supplierAddress1">Supplier Address 1</label>
                        <input type="text" class="form-control" id="supplierAddress1" name="supplierAddress1">
                    </div>
                       <div class="form-group">
                        <label for="supplierAddress2">Supplier Address 2</label>
                        <input type="text" class="form-control" id="supplierAddress2" name="supplierAddress2">
                    </div>
                </div>
                <div class="col-md-6">
                 
                    <div class="form-group">
                        <label for="supplierStreet">Supplier Street</label>
                        <input type="text" class="form-control" id="supplierStreet" name="supplierStreet">
                    </div>
                    <div class="form-group">
                        <label for="supplierArea">Supplier Area</label>
                        <input type="text" class="form-control" id="supplierArea" name="supplierArea">
                    </div>
                    <div class="form-group">
                        <label for="supplierPincode">Supplier Pincode</label>
                        <input type="text" class="form-control" id="supplierPincode" name="supplierPincode">
                    </div>
                    <div class="form-group">
                        <label for="supplierPhoneNo">Supplier Phone Number</label>
                        <input type="text" class="form-control" id="supplierPhoneNo" name="supplierPhoneNo">
                    </div>
                    <div class="form-group">
                        <label for="supplierState">Supplier State</label>
                        <input type="text" class="form-control" id="supplierState" name="supplierState">
                    </div>
                </div>
            </div>
            <input type="hidden" name="action" value="insert"id="action">
            <button type="submit" class="btn btn-primary add_supplier" id="supplier_submit">Submit</button>
        </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<?PHP
include_once ("partial/footer.php");
?>
<script src="assets/page-js/supplier.js"></script>