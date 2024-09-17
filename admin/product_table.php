<div class="table-responsive mt-4">
    <table id="product_list_table" class="table table-bordered display nowrap" style="width:100%">
        <thead class="table-primary ">

            <tr>
                <th>Id</th>
                <th>Product_id</th>
                <th>Name</th>
                <th>Category</th>
                <th>Qty</th>
                <th>HSN</th>
                <th>SKN</th>
                <th>Batch</th>
                <th>Buy</th>
                <th>Sale</th>
                <th>Mstk</th>
                <th>status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody class="table-group-divider tt">
            <?php
            include("partial/config/db_config.php");
            $sql = "select product.id, `product_id`, category.categoryName, `productName`, `productQuantity`, `productPurchasePrice`, `productSalesPrice`, `productStatus`, `productMinimumQuantity`, `productSKN`, `productHsn`, `productBatch`,`productStatus` from product join category on category.category_id=product.category_id";
            $productList = json_decode($product->joinQuery($sql), true);


            foreach ($productList as $productListitem) {
                echo "<tr class='table-danger'>";
                echo "<td scope='row'>" . $productListitem['id'] . "</td>";
                echo "<td scope='row'>" . $productListitem['product_id'] . "</td>";
                echo "<td scope='row'>" . $productListitem['productName'] . "</td>";
                echo "<td scope='row'>" . $productListitem['categoryName'] . "</td>";
                echo "<td scope='row'>" . $productListitem['productQuantity'] . "</td>";
                echo "<td scope='row'>" . $productListitem['productHsn'] . "</td>";
                echo "<td scope='row'>" . $productListitem['productSKN'] . "</td>";
                echo "<td scope='row'>" . $productListitem['productBatch'] . "</td>";
                echo "<td scope='row'>" . $productListitem['productPurchasePrice'] . "</td>";
                echo "<td scope='row'>" . $productListitem['productSalesPrice'] . "</td>";
                echo "<td scope='row'>" . $productListitem['productMinimumQuantity'] . "</td>";
                echo "<td scope='row'>" . status($productListitem['productStatus']) . "</td>";
                echo "<td scope='row' class='model-button'>
        <input type='button' class='btn btn-success btn-sm edit-btn' data-id='" . $productListitem['id'] . "' value='Edit'>
      </td>";

                echo "<td scope='row'><input type='button' class='btn btn-danger delete-btn btn-sm' data-id='" . $productListitem['id'] . "' value='Delete'></td>";



                echo "</tr>";
                echo '</form>';
            }
            ?>

        </tbody>
        <tfoot>

        </tfoot>
    </table>
</div>
<script>
    $('#product_list_table').DataTable({
        dom: 'Bfrtip',
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
            {
                extend: 'print',
                text: 'Print',
                title: 'SA HYDRAULIC FITTINGS',
                //messageTop: '<div><strong>SA HYDRAULIC FITTINGS</strong></div><div>#640A, Pillayar Kovil Street,</div><div>Mannurpet, Chennai-600050</div><div>State: Tamil Nadu</div><div>Email: sahydraulicfittings@gmail.com</div><div>Phone no: 7871517751 / 9524493786</div><div><strong>GST NO: 33AKZPI3901M1ZR</strong></div>',
                customize: function(win) {
                    $(win.document.body)
                        .css('font-size', '10pt')
                        .css('margin', '0')
                        .prepend(
                            '<div style="text-align: center; padding: 0;">#640A, Pillayar Kovil Street, Mannurpet, Chennai-600050,State: Tamil Nadu</div>' +
                            '<div style="text-align: center; padding: 0;">Email: sahydraulicfittings@gmail.com, Phone no: 7871517751 / 9524493786</div>' +
                            '<div style="text-align: center; padding: 0;">GST NO: 33AKZPI3901M1ZR</div>'
                        );

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit')
                        .css('');
                }
            },
        ]
    });
    //    new DataTable('#product_list_table', {
    //   layout: {
    //       topStart: {
    //           buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    //       }
    //   }
    // });
    // new DataTable('#product_list_table', {
    //     "paging": true,
    //               "lengthMenu": [25, 50, 75, 100],
    //               "ordering": true,
    //               "info": true,
    //               "responsive": true,
    //               "dom": 'Bfrtip', // Add the buttons to the DOM
    //               "buttons": [{
    //                 extend: "csv",
    //                 exportOptions: {
    //                   columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
    //                 }
    //               },
    //               {
    //                 extend: 'excelHtml5',
    //                 exportOptions: {
    //                   columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
    //                 }
    //               },
    //               {
    //                 extend: 'pdfHtml5',
    //                 orientation: 'landscape',
    //                 pageSize: 'A4',
    //                 exportOptions: {
    //                   columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
    //                 }
    //               },
    //               {
    //                 extend: 'print',
    //                  orientation: 'portrait',
    //                 pageSize: 'A4',
    //                 exportOptions: {
    //                   columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
    //                 }
    //               }
    //               ],
    //               "columnDefs": [
    //                 { "className": "dt-center", "targets": "_all" } // Center align all columns
    //               ]
    // });
</script>