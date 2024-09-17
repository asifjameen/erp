<?php
include "partial/header.php";
include "partial/nav.php";

?>
<h2>Invoice Report</span> </h2>
<hr>

<div class="card">
    <div class="card-body">

        <!-- search method start -->
        <div class="box-body">
            <div id="allSearchMethods" class="box-body">
                <div class="row">
                    <div class="col-md-5 issueDateMethod" id="issueDateMethod">
                        <div class="mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <div class="input-group">
                                <div id="reportrange" class="form-control"
                                    style="background: #fff; cursor: pointer; padding: 6px 10px;">
                                    <i class="fa fa-calendar"></i>&nbsp;
                                    <span id="search_date"></span> <i class="fa fa-caret-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 customer" id="customer">
                        <div class="mb-3">
                            <label for="customerSelect" class="form-label">Select Customer</label>
                            <select name="customer" id="customerSelect" class="form-select">
                                <option value="all">-All-</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-2" id="form-submit-btn" style="margin-top: 30px;">
                        <div class="mb-3">
                            <input type="submit" id="search_sales_report" class="btn btn-primary rounded-0"
                                value="Show">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="card mt-4">

    <div class="card-body pt-0">
        <div class="inv_table">
            <div class="table-responsive mt-4">
                <table id="product_list_table" class="table table-bordered display nowrap" style="width:100%">
                    <thead class="table-primary ">

                        <tr>
                            <th>Id</th>
                            <th>Customer Id</th>
                            <th>Customer Name</th>
                            <th>Invoice Id</th>
                            <th>Invoice Date</th>
                            <th>Sub total</th>
                            <th>GST</th>
                            <th>Total</th>

                        </tr>
                    </thead>


                    <tbody class="table-group-divider tt">
                        <?php
                        // include("partial/config/db_config.php");
                        $sql = "select customer.customerName,customer.id,invoices.invoice,invoices.subtotal,invoices.gst,invoices.total,invoices.invoice_date from invoices join customer on customer.id = invoices.customer_id;";
                        $customerjoin = json_decode($customer->joinQuery($sql), true);

                        $id = 1;
                        foreach ($customerjoin as $customer_join) {
                            echo "<tr class='table-danger'>";
                            echo "<td scope='row'>" . $id . "</td>";
                            echo "<td scope='row'>" . $customer_join['id'] . "</td>";
                            echo "<td scope='row'>" . $customer_join['customerName'] . "</td>";
                            echo "<td scope='row'>" . $customer_join['invoice'] . "</td>";
                            echo "<td scope='row'>" . $customer_join['invoice_date'] . "</td>";
                            echo "<td scope='row'>" . $customer_join['subtotal'] . "</td>";
                            echo "<td scope='row'>" . $customer_join['gst'] . "</td>";
                            echo "<td scope='row'>" . $customer_join['total'] . "</td>";

                            //                     echo "<td scope='row' class='model-button'>
                            //     <input type='button' class='btn btn-success btn-sm edit-btn' data-id='" . $customer_join['id'] . "' value='Edit'>
                            //   </td>";
                        
                            // echo "<td scope='row'><input type='button' class='btn btn-danger delete-btn btn-sm' data-id='" . $customer_join['id'] . "' value='Delete'></td>";
                        


                            echo "</tr>";
                            echo '</form>';
                            $id++;
                        }
                        ?>

                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>


    </div>

</div>

<?PHP
include_once("partial/footer.php");

?>
<script>
    //$(document).ready(function () {
    //$("#product_list_table").dataTable();

    //});
</script>
<!-- .content-wrapper -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script type="text/javascript">


    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);
</script>

<script type="text/javascript">
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrangeEnd span').html(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
    }

    $('#reportrangeEnd').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);
</script>
<script>
    alert("s");

    $(document).on('click', '#search_sales_report', function (event) {
        event.preventDefault();

        issuedate = $.trim($("#search_date").text());
        // var customer = $("#customer option:selected").val();
        var customer = '1';
        // $.ajax({
        //     type: "POST",
        //     url: "invoice_report_table.php",
        //     data: { customer: customer, issuedate: issuedate },
        //     dataType: "json",
        //     success: function (response) {
        //         alert("d");
        //         $('.inv_table').load('invoice_report_table.php');
        //     },
        //     error :function(e){
        //         alert('W');
        //         $('.inv_table').load('invoice_report_table.php');
        //     }
        // });
        $.ajax({
    type: "POST",
    url: "invoice_report_table.php", // The script that handles the POST request and returns HTML
    data: { customer: customer, issuedate: issuedate }, // Data sent to the server
    dataType: "html", // Expect HTML as the response
    success: function(response) {
        // Inject the response HTML into the desired element on your page
        $('.inv_table').html(response);
    },
    error: function(e) {
        alert('Error occurred');
        console.log(e); // Log the error for debugging
    }
});
        // $.post('invoice_report_table.php', {
        //     customer: customer,
        //     issuedate: issuedate
        // }, function (data) {
        //     $('.inv_table').load('invoice_report_table.php');
        // });



    });

</script>