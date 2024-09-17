<?php
include("partial/header.php");
include("partial/nav.php");

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


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customer_tableModal" id="add_button">
    <b>Add_Customer</b>
</button>
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#insert">
    <b>status_update</b>
</button>

<!-- Modal -->
<div>
    <div class="table-responsive mt-4">
    <table id="product_list_table" class="table table-bordered display nowrap" style="width:100%">
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

            <tbody class="table-group-divider" id="customer_table_body">

                <?php
                $customerList = json_decode($customer->readAll(), true);
                //pre_print($customerList);

                foreach ($customerList as $customer) {
                    echo "<tr class='table-danger'>";
                    echo "<td scope='row' id='customer_id'>" . $customer['id'] . "</td>";
                    echo "<td scope='row'>" . $customer['customer_id'] . "</td>";
                    echo "<td>" . $customer['customerName'] . "</td>";
                    echo "<td>" . $customer['customerCompanyName'] . "</td>";
                    echo "<td>" . $customer['customerGst'] . "</td>";
                    echo "<td>" . $customer['customerPhoneNo'] . "</td>";
                    echo "<td>
                    <div class='dropdown'>
                        <button class='btn btn-primary btn-sm dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown'
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
                    echo "<td><input type='button' id='customer-edit-btn' name='customer-edit-btn' value='Edit' data-id='" . $customer['customer_id'] . "'class='btn btn-success btn-sm'></td>";
                    echo "<td><input type='submit'id='customer-delete' name='delete' value='Delete'data-id='" . $customer['customer_id'] . "' class='btn btn-danger btn-sm'></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>

</div>


<div id="insert" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Product</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>



            </div>
            <div class="modal-body">
                <!-- #region -->
                <table>
                    <thead class="table-primary">

                        <tr>

                            <th>Product_id</th>
                            <th>Name</th>

                            <th>status</th>
                            <th>update</th>

                        </tr>
                    </thead>

                    <tbody class="table-group-divider">

                        <?php


                        foreach ($customerList as $customerListitem) {
                           echo "<tr class='table-danger'>";
                            echo "<td scope='row'>" . $customerListitem['customer_id'] . "</td>";
                            echo "<td scope='row'>" . $customerListitem['customerName'] . "</td>";
                            echo '<td><select class="form-select" name=customer_status">';
                            if ($customerListitem['status'] == '1') {
                                echo '<option value="1" selected>Active</option>';
                                echo '<option value="0" >Disable</option>';
                            } else {
                                echo '<option value="0" selected>Disable</option>';
                                echo '<option value="1" >Active</option>';
                            }
                            echo '</select></td>';
                            //echo "<td scope='row'>".status($productListitem['productStatus'])."</td>";
                            echo "<td><input type='button' id='update_product_statuss' name='update_product_statuss' class='btn btn-danger btn-sm'value='update'> </td>";
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
        <div class="modal-footer">
     
            <button type="button" data-dismiss="modal" class="btn">Cancel</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>



<div class="modal fade bd-customer_table-modal-xl" id="customer_tableModal" tabindex="-1" aria-labelledby="customer_tableModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title">
                    <h2>Customer Form</h2>
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="add-customer-data">
                    <div class="row">
                        <!-- Column 1 -->
                        <div class="col-md-6">
                            <!-- Customer ID -->
                            <!-- Customer Name -->
                            <div class="form-group">
                                <label for="customerName">Customer Name</label>
                                <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Enter Customer Name" required>
                            </div>

                            <!-- Customer Company Name -->
                            <div class="form-group">
                                <label for="customerCompanyName">Customer Company Name</label>
                                <input type="text" class="form-control" id="customerCompanyName" name="customerCompanyName" placeholder="Enter Company Name" required>
                            </div>

                            <!-- Customer GST -->
                            <div class="form-group">
                                <label for="customerGst">Customer GST</label>
                                <input type="text" class="form-control" id="customerGst" name="customerGst" placeholder="Enter GST Number" required>
                            </div>

                            <!-- Customer Address 1 -->
                            <div class="form-group">
                                <label for="customerAddress1">Customer Address 1</label>
                                <input type="text" class="form-control" id="customerAddress1" name="customerAddress1" placeholder="Enter Address 1" required>
                            </div>

                            <!-- Customer Address 2 -->
                            <div class="form-group">
                                <label for="customerAddress2">Customer Address 2</label>
                                <input type="text" class="form-control" id="customerAddress2" name="customerAddress2" placeholder="Enter Address 2">
                            </div>

                            <!-- Customer Street -->

                        </div>

                        <!-- Column 2 -->
                        <div class="col-md-6">
                            <!-- Customer Area -->
                            <div class="form-group">
                                <label for="customerStreet">Customer Street</label>
                                <input type="text" class="form-control" id="customerStreet" name="customerStreet" placeholder="Enter Street" required>
                            </div>
                            <div class="form-group">
                                <label for="customerArea">Customer Area</label>
                                <input type="text" class="form-control" id="customerArea" name="customerArea" placeholder="Enter Area" required>
                            </div>

                            <!-- Customer Pincode -->
                            <div class="form-group">
                                <label for="customerPincode">Customer Pincode</label>
                                <input type="number" class="form-control" id="customerPincode" name="customerPincode" placeholder="Enter Pincode" required>
                            </div>

                            <!-- Customer Phone Number -->
                            <div class="form-group">
                                <label for="customerPhoneNo">Customer Phone Number</label>
                                <input type="number" class="form-control" id="customerPhoneNo" name="customerPhoneNo" placeholder="Enter Phone Number" required>
                            </div>

                            <!-- Customer State -->
                            <div class="form-group">
                                <label for="customerState">Customer State</label>
                                <input type="text" class="form-control" id="customerState" name="customerState" placeholder="Enter State" required>
                            </div>
                            <input type="hidden" name="action" id='action' value="insert">
                            <!-- Submit Button -->
                            <button type="button" id="add_Cus_model_button" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<?PHP
include_once("partial/footer.php");
?>
<script src="assets/page-js/customer.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.print.min.js"></script>
<script>

new DataTable('#product_list_table', {
    layout: {
        topStart: {
            //buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            buttons: [{
                extend: 'copy',
                text: '<i class="fas fa-copy"></i> Copy',
                className: 'btn-export'
            },
            {
                extend: 'csv',
                text: '<i class="fas fa-file-csv"></i> CSV',
                className: 'btn-export'
            },
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> Excel',
                className: 'btn-export'
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
                text: 'PDF',
                title: 'SA HYDRAULIC FITTINGS',
                messageTop: '#640A, Pillayar Kovil Street, Mannurpet, Chennai-600050, State: Tamil Nadu\nEmail: sahydraulicfittings@gmail.com, Phone no: 7871517751 / 9524493786\nGST NO: 33AKZPI3901M1ZR',
                customize: function(doc) {
                    doc.styles.title = {
                        fontSize: '18',
                        alignment: 'center',
                        padding: '0px'
                    };
                    doc.styles.message = {
                        fontSize: '12',
                        alignment: 'center'
                    };
                }
            },
            
        ]
        }}
});
    //  $('#product_list_table').DataTable({
    //     dom: 'Bfrtip',
    //     buttons: [{
    //             extend: 'copy',
    //             text: '<i class="fas fa-copy"></i> Copy',
    //             className: 'btn-export'
    //         },
    //         {
    //             extend: 'csv',
    //             text: '<i class="fas fa-file-csv"></i> CSV',
    //             className: 'btn-export'
    //         },
    //         {
    //             extend: 'excel',
    //             text: '<i class="fas fa-file-excel"></i> Excel',
    //             className: 'btn-export'
    //         },
    //         {
    //             extend: 'pdf',
    //             exportOptions: {
    //                 columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
    //             },
    //             text: 'PDF',
    //             title: 'SA HYDRAULIC FITTINGS',
    //             messageTop: '#640A, Pillayar Kovil Street, Mannurpet, Chennai-600050, State: Tamil Nadu\nEmail: sahydraulicfittings@gmail.com, Phone no: 7871517751 / 9524493786\nGST NO: 33AKZPI3901M1ZR',
    //             customize: function(doc) {
    //                 doc.styles.title = {
    //                     fontSize: '18',
    //                     alignment: 'center',
    //                     padding: '0px'
    //                 };
    //                 doc.styles.message = {
    //                     fontSize: '12',
    //                     alignment: 'center'
    //                 };
    //             }
    //         },
    //         {
    //             extend: 'print',
    //             text: 'Print',
    //             title: 'SA HYDRAULIC FITTINGS',
    //             //messageTop: '<div><strong>SA HYDRAULIC FITTINGS</strong></div><div>#640A, Pillayar Kovil Street,</div><div>Mannurpet, Chennai-600050</div><div>State: Tamil Nadu</div><div>Email: sahydraulicfittings@gmail.com</div><div>Phone no: 7871517751 / 9524493786</div><div><strong>GST NO: 33AKZPI3901M1ZR</strong></div>',
    //             customize: function(win) {
    //                 $(win.document.body)
    //                     .css('font-size', '10pt')
    //                     .css('margin', '0')
    //                     .prepend(
    //                         '<div style="text-align: center; padding: 0;">#640A, Pillayar Kovil Street, Mannurpet, Chennai-600050,State: Tamil Nadu</div>' +
    //                         '<div style="text-align: center; padding: 0;">Email: sahydraulicfittings@gmail.com, Phone no: 7871517751 / 9524493786</div>' +
    //                         '<div style="text-align: center; padding: 0;">GST NO: 33AKZPI3901M1ZR</div>'
    //                     );

    //                 $(win.document.body).find('table')
    //                     .addClass('compact')
    //                     .css('font-size', 'inherit')
    //                     .css('');
    //             }
    //         },
    //     ]
    // });

</script>