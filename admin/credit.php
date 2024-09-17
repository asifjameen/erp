<?php
include ("partial/header.php");
include ("partial/nav.php");

?>

<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span> <strong>Customer</strong>
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
                $customerTotalBuy = json_decode($customer->totalsum('customerTotalBuy'), true);

                ?>


                <h2 class="mb-5"><?php echo $customerTotalBuy['total'];
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

                $customertotalPaid = json_decode($customer->totalsum('customerTotalPaid'), true);

                ?>
                <h2 class="mb-5"><?php // echo $res[0]
                echo $customertotalPaid['total'];
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
                $customertotalDue = json_decode($customer->totalsum('customerTotalDue'), true);

                ?>
                <h2 class="mb-5"><?php // echo $res[0]
                echo $customertotalDue['total'];
                ?> </h2>
                <h6 class="card-text"></h6>
                <h6 class="card-text"></h6>
            </div>
        </div>
    </div>
</div>
<hr>


<div class="page-header mt-3">
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
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <b>Add_Customer</b>
</button>

<!-- Modal -->
<div>
    <div class="table-responsive table-striped mt-4">
        <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
            <thead class="table-primary">

                <tr>
                    <th>id</th>
                    <th>customer_id</th>
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

            <tbody class="table-group-divider">

                <?php
                $customerList = json_decode($customer->readAll(), true);
                //pre_print($customerList);
                
                foreach ($customerList as $customer) {
                    echo "<tr class='table-danger'>";
                    echo "<td scope='row'>" . $customer['id'] . "</td>";
                    echo "<td scope='row'>" . $customer['customer_id'] . "</td>";
                    echo "<td>" . $customer['customerName'] . "</td>";
                    echo "<td>" . $customer['customerCompanyName'] . "</td>";
                    echo "<td>" . $customer['customerGst'] . "</td>";
                    echo "<td>" . $customer['customerPhoneNo'] . "</td>";
                    echo "<td>
                    <div class='dropdown'>
                        <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown'
                            aria-expanded='false'>
                            " . $customer['customerState'] . "
                        </button>
                        <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                            <li class='dropdown-item'><b>Address</b> : " . $customer['customerAddress1'] . "</li>
                            <li class='dropdown-item'> " . $customer['customerAddress2'] . "</li>
                            <li class='dropdown-item'><b>Street</b>: " . $customer['customerStreet'] . " </li>
                            <li class='dropdown-item'><b> Area</b> : " . $customer['customerArea'] . " </li>
                
                            <li class='dropdown-item'><b>State</b> : " . $customer['customerState'] . " </li>
                            <li class='dropdown-item'><b>Pincode</b> : " . $customer['customerPincode'] . "</li>
                        </ul>
                    </div>
                </td>";
                    echo "<td>" . $customer['customerTotalBuy'] . "</td>";
                    echo "<td>" . $customer['customerTotalPaid'] . "</td>";
                    echo "<td>" . $customer['customerTotalDue'] . "</td>";
                    echo "<td>" . $customer['customerRegDate'] . "</td>";
                    echo ' <form action="code.php" method="post">';
                    echo "<td><input type='submit'id='doc_edit' name='doc_delete' value='Edit' class='btn btn-success btn-sm'></td>";

                    echo "<td><input type='submit'id='doc_delete' name='doc_delete' value='Delete' class='btn btn-danger btn-sm'></td>";

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





<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title">Add_New_Customer</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="adMemberForm">
                    <div class="row">
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="name">Name *:</label>
                                <input type="text" class="form-control add-member" id="name" placeholder="Member name"
                                    name="name">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="company">Company :</label>
                                <input type="text" class="form-control add-member" id="company"
                                    placeholder="Company name" name="company">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="contact">Contact number :</label>
                                <input type="text" class="form-control add-member" id="contact"
                                    placeholder="Contact member" name="contact">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control add-member" id="email"
                                    placeholder="Email optional" name="email">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="cus_open_blacnce">previous due :</label>
                                <input type="number" class="form-control" name="cus_open_blacnce" id="cus_open_blacnce"
                                    value="0.00">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="reg_date">Registration Date :</label>
                                <input type="date" class="form-control add-member" id="reg_date" name="reg_date">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea rows="3" class="form-control" placeholder="Member complect Address"
                                    id="address" name="address"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block rounded-0">Add customer</button>
                </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<?PHP
include_once ("partial/footer.php");
?>