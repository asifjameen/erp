<?php
include("partial/header.php");
include("partial/nav.php");

?>
<h2>Create New <span class="invoice_type">Invoice</span> </h2>
<!-- <hr> -->

<div id="response" class="alert alert-success" style="display:none;">
    <a href="#" class="close" data-dismiss="alert">×</a>
    <div class="message"></div>
</div>
<form method="post" id="create_invoice_frm">
    <input type="hidden" name="action" value="create_invoice">

    <div class="row">
        <div class="col-md-4">
            <label for="invoice_half">Check</label>
            <input type="checkbox" name="invoice_half" id="invoice_half">
        </div>
        <div class="col-md-8 text-right">
            <div class="row">
                <div class="col-2">
                    <h2 class="">Select Type:</h2>
                </div>
                <div class="col-md-4    ">
                    <select name="invoice_type" id="invoice_type" class="form-control">
                        <option value="invoice" selected="">Invoice</option>
                        <option value="quote">Quotation</option>
                        <option value="Estimate">Estimate</option>

                    </select>
                </div>
                <div class="col-6">
                    <input type="text" name="invoice_id" id="invoice_id" class="form-control "
                        placeholder="Invoice Number" aria-describedby="sizing-addon1" value="">
                </div>

                <!--<div class="col-md-3">
                            <select name="invoice_status" id="invoice_status" class="form-control">
                                <option value="open" selected>Open</option>
                                <option value="paid">Paid</option>
                            </select>
                        </div>
                    -->
            </div>


        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-4 no-padding-right mb-0">
            <div class="form-group">
                <div class="input-group date" id="invoice_date">
                    <input type="text" class="form-control "  name="invoice_date" placeholder="Invoice Date" data-date-format="<?php echo DATE_FORMAT ?>">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="form-group">

                <div class="input-group date due_date" id="invoice_due_date">
                    <input type="text" class="form-control "  name="invoice_due_date" placeholder="Due Date" data-date-format="<?php echo DATE_FORMAT ?>">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
    </div> -->
    <hr>

    <div class="row mt-4 mb-4">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">
                    <h4 class="float-left">Customer Information</h4>
                    <a href="#" class="float-right select-customer"><b>OR</b> Select Existing Customer</a>
                    <div class="clear"></div>
                </div>
                <div class="card-body form-group form-group-sm mb-0 p-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control margin-bottom copy-input " name="customer_name"
                                    id="customer_name" placeholder="Enter Name" tabindex="1">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control margin-bottom copy-input "
                                    name="customer_address_1" id="customer_address_1" placeholder="Company_name"
                                    tabindex="3">
                            </div>

                            <div class="form-group ">
                                <input type="text" class="form-control copy-input " name="customer_postcode"
                                    id="customer_postcode" placeholder="Postcode" tabindex="7">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control margin-bottom copy-input " name="customer_town"
                                    id="customer_town" placeholder="GST_NO" tabindex="5">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="input-group float-right mb-4">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="text" class="form-control copy-input " name="customer_email"
                                    id="customer_email" placeholder="Customer_id" aria-describedby="sizing-addon1"
                                    tabindex="2">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control margin-bottom copy-input "
                                    name="customer_address_2" id="customer_address_2" placeholder="address"
                                    tabindex="6">
                            </div>
                            <div class="form-group no-margin-bottom">
                                <input type="text" class="form-control " name="customer_phone" id="customer_phone"
                                    placeholder="Phone Number" tabindex="8">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4 text-right">
            <div class="card card-default">
                <div class="card-header">
                    <h4>Transport</h4>
                </div>
                <div class="card-body form-group mb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type='text' id="transport_name" class="form-select form-control margin-bottom "
                                    name="transport_name" placeholder="Transport_name" tabindex="15">


                            </div>
                            <!--	<div class="form-group">
                                        <input type="text" class="form-control margin-bottom" name="weight" id="weight" placeholder="Weight" tabindex="16">	
                                    </div>
                                                                    -->
                            <div class="form-group no-margin-bottom">
                                <input type="text" class="form-control " name="bags" id="bags" placeholder="bags"
                                    tabindex="17">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control margin-bottom " name="ewaysno" id="ewaysno"
                                    placeholder="E-Way_no" tabindex="18">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control margin-bottom " name="destination"
                                    id="destination" placeholder="Destination" tabindex="19">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / end client details section -->
    <a href="#" class="btn btn-success add-product-btn"><i class="bi bi-plus"></i>Add</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" id="invoice_table">
            <thead>
                <tr>
                    <th width="auto">
                        <h4><span class="glyphicon glyphicon-plus"
                                    aria-hidden="true"></span>Products</h4>
                    </th>
                    <th>
                        <h4>AVL_Qty</h4>
                    </th>
                    <th>
                        <h4>Qty</h4>
                    </th>
                    <th>
                        <h4>Price</h4>
                    </th>
                    <th>
                        <h4>Discount</h4>
                    </th>
                    <th>
                        <h4>Sub Total</h4>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="sub-row">
                    <style>
                        .sub-row td{
                            position: relative;
                        }
                        .sub-row td input{
                            width: max-content;
                        }
                        .input-group-addon{
                            position: absolute;
                            top:50%;
                            left: 20px;
                            transform: translateY(-50%);
                        }
                        .add-product-btn{
                            padding: 5px 20px;
                            border-radius: 5px;
                            margin: 10px;
                        }
                    </style>
                    <td>
                        <input type="text" class="form-control" required name="invoice_product[]"
                            placeholder="Enter Product Name OR Description">
                        <div class="button-area-queen">
                            <a href="#" value="Add_pro" name="ss" id="add-row"><i class="bi bi-plus"></i>a</a>
                            <a href="#"><i class="bi bi-dash"></i>a</a>
                            <a href="#"><i class="bi bi-cart"></i>a</a>
                        </div>



                    </td>
                    <td>
                        <input type="text" class="form-control invoice_product_avl_qty calculate"
                            name="invoice_product_avl_qty[]" value="1">
                        <input type="hidden" class="pid" name="pid[]" id="pid[]">
                        <input type="hidden" class="purchase_price" name="purchase_price[]" id="purchase_price[]">
                    </td>
                    <td>
                        <input type="text" class="form-control invoice_product_qty calculate"
                            name="invoice_product_qty[]" value="1">
                    </td>
                    <td>
                        <span class="input-group-addon">₹</span>
                        <input type="number" class="form-control calculate invoice_product_price "
                            name="invoice_product_price[]" aria-describedby="sizing-addon1" value="0"
                            placeholder="0.00">
                    </td>
                    <td>
                        <input type="text" class="form-control calculate" name="invoice_product_discount[]" value='0'>
                    </td>
                    <td >
                        <span class="input-group-addon">₹</span>
                        <input type="text" class="form-control subbb calculate-sub" name="invoice_product_sub[]"
                            id="invoice_product_sub" value="0.00" aria-describedby="sizing-addon1">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
    <div class="container">
        <div class="row justify-content-between mb-2">
        <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <!-- <div id="invoice_totals" class="padding-right row text-right">
                            <div class="col-xs-6">

                                <div class="margin-top ">
                                    <label for="tax_type" class="">Select Tax Type:</label>
                                    <select id="tax_type" name="tax_type">
                                        <option value="gst">GST</option>
                                        <option value="igst">IGST</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-xs-6 no-padding-right">
                                <div class="row">
                                    <div class="col-xs-4 col-xs-offset-5">
                                        <strong>Sub Total:</strong>

                                        ₹<span class="invoice-sub-total">0.00</span>
                                        <input type="hidden" name="invoice_subtotal" id="invoice_subtotal">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 col-xs-offset-5">
                                        <strong>Discount:</strong>

                                        ₹<span class="invoice-discount">0.00</span>
                                        <input type="hidden" name="invoice_discount" id="invoice_discount">
                                    </div>
                                </div>

                                <div class="row tax">
                                    <div class="col ">
                                        <strong class="cgst ">cgst:</strong>
                                    </div>
                                    <div class="col-8 margin-bottom">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon">₹</span>
                                            <input type="text" class="form-control calculate_cgst margin-bottom-1" id="invoice_sgst" name="invoice_sgst" aria-describedby="sizing-addon1" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                                <div class="row tax ">
                                    <div class="col">
                                        <strong class="sgst ">sgst:</strong>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group input-group-sm margin-bottom">
                                            <span class="input-group-addon">₹</span>
                                            <input type="text" class="form-control calculate_cgst " id="invoice_cgst" name="invoice_cgst" aria-describedby="sizing-addon1" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                                <?php if (ENABLE_VAT == true) { ?>
                                    <div class="row tax">
                                        <div class="col-xs-4 col-xs-offset-5">
                                            <strong>IGST:</strong><br>Remove TAX/ <input type="checkbox" class="remove_vat">
                                        </div>
                                        <div class="col-xs-3">
                                            ₹<span class="invoice-vat" data-enable-vat="<?php echo ENABLE_VAT ?>" data-vat-rate="<?php echo VAT_RATE ?>" data-vat-method="<?php echo VAT_INCLUDED ?>">0.00</span>
                                            <input type="text" name="invoice_vat" id="invoice_vat" class="ss">
                                        </div>
                                    </div>
                                <?php } ?>


                                <div class="row">
                                    <div class="col">
                                        <strong>Total:</strong>
                                    </div>
                                    <div class="col-8">
                                        ₹<span class="invoice-total">0.00</span>
                                        <input type="hidden" name="invoice_total" id="invoice_total">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6 margin-top btn-group">
                                <button type="submit" id="add_bill" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-xs-4 col-xs-offset-5">
                                <strong>Total cardredit:</strong>
                                ₹<span class="invoice-sub-total">0.00</span>
                                <input type="hidden" name="invoice_subtotal" id="invoice_subtotal">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-xs-offset-5">
                                <strong>Balance:</strong>
                                ₹<span class="invoice-discount">0.00</span>
                                <input type="hidden" name="invoice_discount" id="invoice_discount">
                            </div>
                                </div>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <!-- <div id="invoice_totals" class="padding-right row text-right">
                            <div class="col-xs-6">

                                <div class="margin-top ">
                                    <label for="tax_type" class="">Select Tax Type:</label>
                                    <select id="tax_type" name="tax_type">
                                        <option value="gst">GST</option>
                                        <option value="igst">IGST</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-xs-6 no-padding-right">
                                <div class="row">
                                    <div class="col-xs-4 col-xs-offset-5">
                                        <strong>Sub Total:</strong>

                                        ₹<span class="invoice-sub-total">0.00</span>
                                        <input type="hidden" name="invoice_subtotal" id="invoice_subtotal">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 col-xs-offset-5">
                                        <strong>Discount:</strong>

                                        ₹<span class="invoice-discount">0.00</span>
                                        <input type="hidden" name="invoice_discount" id="invoice_discount">
                                    </div>
                                </div>

                                <div class="row tax">
                                    <div class="col ">
                                        <strong class="cgst ">cgst:</strong>
                                    </div>
                                    <div class="col-8 margin-bottom">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon">₹</span>
                                            <input type="text" class="form-control calculate_cgst margin-bottom-1" id="invoice_sgst" name="invoice_sgst" aria-describedby="sizing-addon1" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                                <div class="row tax ">
                                    <div class="col">
                                        <strong class="sgst ">sgst:</strong>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group input-group-sm margin-bottom">
                                            <span class="input-group-addon">₹</span>
                                            <input type="text" class="form-control calculate_cgst " id="invoice_cgst" name="invoice_cgst" aria-describedby="sizing-addon1" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                                <?php if (ENABLE_VAT == true) { ?>
                                    <div class="row tax">
                                        <div class="col-xs-4 col-xs-offset-5">
                                            <strong>IGST:</strong><br>Remove TAX/ <input type="checkbox" class="remove_vat">
                                        </div>
                                        <div class="col-xs-3">
                                            ₹<span class="invoice-vat" data-enable-vat="<?php echo ENABLE_VAT ?>" data-vat-rate="<?php echo VAT_RATE ?>" data-vat-method="<?php echo VAT_INCLUDED ?>">0.00</span>
                                            <input type="text" name="invoice_vat" id="invoice_vat" class="ss">
                                        </div>
                                    </div>
                                <?php } ?>


                                <div class="row">
                                    <div class="col">
                                        <strong>Total:</strong>
                                    </div>
                                    <div class="col-8">
                                        ₹<span class="invoice-total">0.00</span>
                                        <input type="hidden" name="invoice_total" id="invoice_total">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6 margin-top btn-group">
                                <button type="submit" id="add_bill" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-xs-4 col-xs-offset-5">
                                <strong>Sub Total:</strong>
                                ₹<span class="invoice-sub-total">0.00</span>
                                <input type="hidden" name="invoice_subtotal" id="invoice_subtotal">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-xs-offset-5">
                                <strong>Discount:</strong>
                                ₹<span class="invoice-discount">0.00</span>
                                <input type="hidden" name="invoice_discount" id="invoice_discount">
                            </div>
                        </div>
                        <div class="row tax">
                            <div class="col">
                                <strong class="cgst">CGST:</strong>
                            </div>
                            <div class="col-8 margin-bottom">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon">₹</span>
                                    <input type="text" class="form-control calculate_cgst" id="invoice_sgst"
                                        name="invoice_sgst" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                        <div class="row tax">
                            <div class="col">
                                <strong class="sgst">SGST:</strong>
                            </div>
                            <div class="col-8">
                                <div class="input-group input-group-sm margin-bottom">
                                    <span class="input-group-addon">₹</span>
                                    <input type="text" class="form-control calculate_cgst" id="invoice_cgst"
                                        name="invoice_cgst" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <strong>Total:</strong>
                            </div>
                            <div class="col-8">
                                ₹<span class="invoice-total">0.00</span>
                                <input type="hidden" name="invoice_total" id="invoice_total">
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
       
    </div>

    <button type="submit" value="submit" id="invoice_create" class="btn btn-primary my-2">Submit</button>


    <!-- <input type="submit" value="submit" id='invoice_create' class="btn btn-primary"> -->


</form>

<!-- Button trigger modal -->














<div id="insert" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                <h4 class="modal-title">Select Product</h4>
            </div>
            <div class="modal-body">
                <?php popProductsList(); ?>



            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary" id="selected">Add</button>
                <button type="button" data-dismiss="modal" class="btn">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Custom CSS -->

<div id="insert_customer" class="modal fade">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <?php popCustomersList(); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>


</div>
<!-- /.modal -->

<?PHP
include_once("partial/footer.php");
?>
<script src="assets/page-js/scripts.js"></script>

<script>
    $("#data-table").dataTable();

    // $('#product_list_table').dataTable();
    // $("#selUser").select2();
    $(document).ready(function () {
        $('#insert_customer').modal('show');
    });
</script>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- <script>
    $(document).ready(function() {

        // Add new row
        $('.add-row').on('click', function(e) {
            e.preventDefault();
            let newRow = $('.sub-row:first').clone();
            newRow.find('input').val('');
            newRow.find('input.invoice_product_qty').val('1');
            newRow.find('input.calculate-sub').val('0.00');
            $('#invoice_table tbody').append(newRow);
        });

        // Delete row
        $('#invoice_table').on('click', '.delete-row', function() {
            $(this).closest('tr').remove();
            calculateTotal();
        });

        // Calculate subtotal and total
        $('#invoice_table').on('input', '.calculate', function() {
            calculateRow($(this).closest('tr'));
            calculateTotal();
        });

        function calculateRow(row) {
            let qty = parseFloat(row.find('.invoice_product_qty').val()) || 0;
            let price = parseFloat(row.find('.invoice_product_price').val()) || 0;
            let discount = row.find('.calculate').val();
            let discountValue = 0;

            if (discount.includes('%')) {
                discountValue = (parseFloat(discount) / 100) * (qty * price);
            } else {
                discountValue = parseFloat(discount) || 0;
            }

            let subTotal = (qty * price) - discountValue;
            row.find('.calculate-sub').val(subTotal.toFixed(2));
        }

        function calculateTotal() {
            let total = 0;
            $('.calculate-sub').each(function() {
                total += parseFloat($(this).val()) || 0;
            });
            // Display the total somewhere in your UI
            console.log('Total:', total.toFixed(2));
        }
    }); -->
</script>
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     const calculateSubtotal = () => {
    //         let subtotal = 0;
    //         let totalDiscount = 0;

    //         document.querySelectorAll('.sub-row').forEach(row => {
    //             const qty = parseFloat(row.querySelector('.invoice_product_qty')?.value) || 0;
    //             const price = parseFloat(row.querySelector('.invoice_product_price')?.value) || 0;

    //             const discountElement = row.querySelector('.invoice_product_discount');
    //             const discountInput = discountElement ? discountElement.value.trim() : '';

    //             let discount = 0;

    //             if (discountInput.endsWith('%')) {
    //                 const percentage = parseFloat(discountInput.replace('%', ''));
    //                 discount = (percentage / 100) * (qty * price);
    //             } else {
    //                 discount = parseFloat(discountInput) || 0;
    //             }

    //             const subtotalRow = (qty * price) - discount;
    //             row.querySelector('.subbb').value = subtotalRow.toFixed(2);
    //             subtotal += subtotalRow;
    //             totalDiscount += discount;
    //         });

    //         document.querySelector('.invoice-sub-total').innerText = subtotal.toFixed(2);
    //         document.querySelector('#invoice_subtotal').value = subtotal.toFixed(2);
    //         document.querySelector('.invoice-discount').innerText = totalDiscount.toFixed(2);
    //         document.querySelector('#invoice_discount').value = totalDiscount.toFixed(2);

    //         // Debugging line
    //         console.log("Total Discount: ", totalDiscount);

    //         return {
    //             subtotal,
    //             totalDiscount
    //         };
    //     };


    //     // Attach input event listeners
    //     document.querySelectorAll('.calculate, .calculate_cgst').forEach(input => {
    //         input.addEventListener('input', calculateTotal);
    //     });

    //     // Attach change event listener for remove VAT checkbox
    //     document.querySelector('.remove_vat').addEventListener('change', calculateTotal);

    //     // Initial calculation
    //     calculateTotal();

    // });

    // $(document).ready(function() {
    //     const calculateSubtotal = () => {
    //         let subtotal = 0;
    //         let totalDiscount = 0;

    //         $('.sub-row').each(function() {
    //             const qty = parseFloat($(this).find('.invoice_product_qty').val()) || 0;
    //             const price = parseFloat($(this).find('.invoice_product_price').val()) || 0;

    //             // const discountInput = $(this).find('.invoice_product_discount').val().trim() || '';
    //             const discountInput = $(this).find('.invoice_product_discount').val() || '';

    //             if (discountInput) {
    //                 if (discountInput.endsWith('%')) {
    //                     const percentage = parseFloat(discountInput.replace('%', ''));
    //                     discount = (percentage / 100) * (qty * price);
    //                 } else {
    //                     discount = parseFloat(discountInput) || 0;
    //                 }
    //             } else {
    //                 discount = 0; // or handle the undefined case appropriately
    //             }
    //             // Now `d

    //             const subtotalRow = (qty * price) - discount;
    //             $(this).find('.subbb').val(subtotalRow.toFixed(2));
    //             subtotal += subtotalRow;
    //             totalDiscount += discount;
    //         });

    //         $('.invoice-sub-total').text(subtotal.toFixed(2));
    //         $('#invoice_subtotal').val(subtotal.toFixed(2));
    //         $('.invoice-discount').text(totalDiscount.toFixed(2));
    //         $('#invoice_discount').val(totalDiscount.toFixed(2));

    //         return {
    //             subtotal,
    //             totalDiscount
    //         };
    //     };

    //     const calculateTotal = () => {
    //         const {
    //             subtotal
    //         } = calculateSubtotal();

    //         const shipping = parseFloat($('[name="invoice_shippping"]').val()) || 0;

    //         // Check if VAT should be removed
    //         const vatRemoved = $('.remove_vat').is(':checked');

    //         let sgst = 0;
    //         let cgst = 0;

    //         if (!vatRemoved) {
    //             sgst = subtotal * 0.09;
    //             cgst = subtotal * 0.09;
    //         }

    //         const igst = parseFloat($('#invoice_vat').val()) || 0;

    //         // Update the CGST and SGST values in the HTML
    //         $('#invoice_sgst').val(sgst.toFixed(2));
    //         $('.invoice-sgst-amount').text(sgst.toFixed(2));
    //         $('#invoice_cgst').val(cgst.toFixed(2));
    //         $('.invoice-cgst-amount').text(cgst.toFixed(2));

    //         const total = subtotal + shipping + sgst + cgst + igst;

    //         // Update the total value in the HTML
    //         $('.invoice-total').text(total.toFixed(2));
    //         $('#invoice_total').val(total.toFixed(2));
    //     };

    //     // Attach event listeners using jQuery
    //     $('.calculate, .calculate_cgst').on('input', calculateTotal);
    //     $('.remove_vat').on('change', calculateTotal);

    //     // Initial calculation
    //     calculateTotal();
    // });
</script>