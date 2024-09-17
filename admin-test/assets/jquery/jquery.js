
$(document).on('click', '#update_product_statuss', function (e) {
    e.preventDefault();
    product = $(this).closest('tr');
    a = product.find('option:selected').val();
    b = product.find('td:eq(0)').text();
    $.ajax({
        type: "post",
        url: "controller/product.php",
        data: { id: b, status: a, action: 'update_status' },
        success: function (response) {
            $('#tt').load('product_table.php');
            $('#insert').modal('toggle');
        }
    });
});



// $(document).ready(function () {
//    // $('#product_list_table').dataTable();
//    // $('#example').dataTable();

// });
// new DataTable('#product_list_table', {
//   layout: {
//       topStart: {
//           buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
//       }
//   }
// });

// new DataTable('#example', {
//     layout: {
//         topStart: {
//             buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
//         }
//     }
// });
$(document).ready(function () {

    $('#add_button').click(() => {
        $('#add_Cus_model_button').addClass('add-customer-data');
    })
    $('#tt').load('product_table.php');
    function calculateSubtotal() {
        let subtotal = 0;
        $('input[name="invoice_product_price[]"]').each(function (index) {
            let qty = $('input[name="invoice_product_qty[]"]').eq(index).val();
            let price = $(this).val();
            let discount = $('input[name="invoice_product_discount[]"]').eq(index).val();
            let discountValue = 0;

            if (discount.includes('%')) {
                discountValue = (parseFloat(price) * parseFloat(discount) / 100) * qty;
            } else {
                discountValue = parseFloat(discount) * qty;
            }

            let productTotal = (parseFloat(price) * qty) - discountValue;
            subtotal += productTotal;

            $('input[name="invoice_product_sub[]"]').eq(index).val(productTotal.toFixed(2));
        });
        return subtotal;
    }

    function calculateTotal() {
        let subtotal = calculateSubtotal();
        let discount = parseFloat($('#invoice_discount').val()) || 0;
        let shipping = parseFloat($('input[name="invoice_shippping"]').val()) || 0;
        let cgst = parseFloat($('#invoice_cgst').val()) || 0;
        let sgst = parseFloat($('#invoice_sgst').val()) || 0;
        let igst = parseFloat($('#invoice_vat').val()) || 0;

        let totalTax = cgst + sgst + igst;
        let total = subtotal - discount + shipping + totalTax;

        $('.invoice-sub-total').text(subtotal.toFixed(2));
        $('.invoice-discount').text(discount.toFixed(2));
        $('.invoice-total').text(total.toFixed(2));
    }

    // Calculate on document ready
    calculateTotal();

    // Event listeners
    $(document).on('input', '.calculate, .calculate-sub', calculateTotal);
    $(document).on('input', '.calculate_cgst', function () {
        let subtotal = calculateSubtotal();
        let cgstRate = parseFloat($('#invoice_cgst').val()) || 0;
        let sgstRate = parseFloat($('#invoice_sgst').val()) || 0;

        let cgstValue = (subtotal * cgstRate / 100).toFixed(2);
        let sgstValue = (subtotal * sgstRate / 100).toFixed(2);

        $('#invoice_cgst').val(cgstValue);
        $('#invoice_sgst').val(sgstValue);

        calculateTotal();
    });

    // Add event listener to buttons for adding and removing rows
    // $(document).on('click', '.btn-success', function() {
    //     let row = $(this).closest('tr').clone();
    //     row.find('input').val('');
    //     row.find('input[name="invoice_product_qty[]"]').val('1');
    //     row.find('input[name="invoice_product_discount[]"]').val('0');
    //     row.find('input[name="invoice_product_sub[]"]').val('0.00');
    //     $(this).closest('tr').after(row);
    //     calculateTotal();
    // });

    // $(document).on('click', '.btn-danger', function() {
    //     if ($('tr.sub-row').length > 1) {
    //         $(this).closest('tr').remove();
    //         calculateTotal();
    //     }
    // });





});