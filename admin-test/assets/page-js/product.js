
$(document).ready(function () {
    $('#product_list_table').dataTable();
    $('#example').dataTable();
    $('#tt').load('product_table.php');
});
$('.add-product').click(function (e) {
    e.preventDefault(); // Prevent default form submission

    var form_data = $('#add-product-form').serialize();
    console.log(form_data);
    $.ajax({
        type: "post",
        url: "controller/product.php",
        data: form_data,
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                swal({
                    title: "Good job!",
                    text: "You clicked the button!",
                    icon: "success"
                }).then((willReload) => {
                    if (willReload) {
                        $('.modal').modal('hide');
                        $('.modal input[type="text"]').val(''); // Clear textboxes
                        $('.modal input[type="number"]').val('');
                        $('#product_category').prop('selectedIndex', 0);
                        $('#tt').load('product_table.php');
                    }
                });



            } else {
                swal({
                    title: "error",
                    text: response.message,
                    icon: "error"
                });
            }

        }
    });
})

$(document).on('click', '.edit-btn', function () {
    var getproductId = $(this).data('id'); // Get the ID dynamically from the button
    console.log(getproductId);

    $.ajax({
        type: "POST",
        url: "controller/product.php",
        data: {
            id: getproductId, // Use the dynamic ID
            action: 'readone'
        },
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response.status === "success" && response.data.length > 0) {
                $('.edit-product-id').html(`<div class="form-group">
                                <label for="product_ID">Product_id *:</label>
                                <input type="text" class="form-control add-product-id" id="product_id" placeholder="Enter Product id" name="product_id" required>
                            </div>`);
                $('.edit-product-id').addClass('col-md-6');
                $('.edit-product-id').addClass('col-md-6');
                var product = response.data[0]; // Get the first product
                $('#exampleModal').modal('show');
                $('#model-submit-btn').addClass('update-btn');
                $('#model-submit-btn').text('Update')
                $('#model-submit-btn').removeClass('add-product');
                //$('#model-submit-btn').hide();
                // Populate the form with the retrieved data
                $('#product_name').val(product.productName);
                $('#product_id').val(product.product_id);
                $('#product_category').val(product.category_id);
                $('#product_quantity').val(product.productQuantity);
                $('#purchase-price').val(product.productPurchasePrice);
                $('#sales-price').val(product.productSalesPrice);
                $('#product-minimum-quantity').val(product.productMinimumQuantity);
                $('#product-skn').val(product.productSKN);
                $('#product-hsn').val(product.productHsn);
                $('#product-batch').val(product.productBatch);
                $('#add-product-form').data('id', getproductId);
                $('.action').val('update')

            }
            else {
                alert("Product not found.");
            }
        }, complete: function () {
            $(document).on('click', '.update-btn', function (event) {
                event.preventDefault(); // Prevent default form submission
                // console.log(getproductId);

                // Get the product ID

                $.ajax({
                    type: "POST",
                    url: "controller/product.php",
                    data: $("#add-product-form").serialize() + '&id=' + getproductId, // Include action and ID
                    dataType: "json",
                    success: function (response) {
                        if (response.status === "success") {


                            swal({
                                title: "Good job!",
                                text: "You clicked the button!",
                                icon: "success"
                            }).then((willReload) => {
                                if (willReload) {
                                    $('.modal').modal('hide');
                                    $('.modal input[type="text"]').val(''); // Clear textboxes
                                    $('.modal input[type="number"]').val('');
                                    $('#product_category').prop('selectedIndex', 0);
                                    $('#tt').load('product_table.php');
                                }
                            });

                        } else {
                            swal({
                                title: "error",
                                text: response.message,
                                icon: "error"
                            });
                        }





                        // Optionally, reset the form or close the modal here

                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error: ", status, error);
                    }
                });
            });
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error: ", status, error); // Log error for debugging
        }
    });
});

$(document).on('click', '.delete-btn', function (event) {
    event.preventDefault(); // Prevent default form submission
    // console.log(getproductId);
    var confirmed = confirm("Do you really want to delete this record?");

    // If the user did not confirm, prevent the form submission
    if (!confirmed) {
        event.preventDefault();
    } else {
        // Get the product ID
        var getproductId = $(this).data('id');
        $.ajax({
            type: "POST",
            url: "controller/product.php",
            data: { id: getproductId, action: 'delete' },// Include action and ID
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.status === "success") {


                    swal({
                        title: "Good job!",
                        text: response.message,
                        icon: "success"
                    }).then((willReload) => {
                        if (willReload) {
                            
                            $('#tt').load('product_table.php');
                        }
                    });

                } else {
                    swal({
                        title: "error",
                        text: response.message,
                        icon: "error"
                    });
                }





                // Optionally, reset the form or close the modal here

            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: " + status + error);
            }
        });
    }
});



