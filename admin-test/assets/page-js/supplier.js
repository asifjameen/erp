$(document).ready(function () {

    function getData(data) {
        console.log(data);
        row = '';
        $.each(data, function (index, supplier) {
            row += "<tr class='table-danger'>";
            row += "<td scope='row'>" + supplier.id + "</td>";
            row += "<td scope='row'>" + supplier.supplier_id + "</td>";
            row += "<td>" + supplier.supplierName + "</td>";
            row += "<td>" + supplier.supplierCompanyName + "</td>";
            row += "<td>" + supplier.supplierGst + "</td>";
            row += "<td>" + supplier.supplierPhoneNo + "</td>";
            row += "<td><div class='dropdown'>";
            row += "<button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton" + index + "' data-bs-toggle='dropdown' aria-expanded='false'>";
            row += supplier.supplierState;
            row += "</button>";
            row += "<ul class='dropdown-menu' aria-labelledby='dropdownMenuButton" + index + "'>";
            row += "<li class='dropdown-item'><b>Address</b> : " + supplier.supplierAddress1 + "</li>";
            row += "<li class='dropdown-item'>" + supplier.supplierAddress2 + "</li>";
            row += "<li class='dropdown-item'><b>Street</b>: " + supplier.supplierStreet + "</li>";
            row += "<li class='dropdown-item'><b>Area</b> : " + supplier.supplierArea + "</li>";
            row += "<li class='dropdown-item'><b>State</b> : " + supplier.supplierState + "</li>";
            row += "<li class='dropdown-item'><b>Pincode</b> : " + supplier.supplierPincode + "</li>";
            row += "</ul></div></td>";
            row += "<td>" + supplier.supplierTotalBuy + "</td>";
            row += "<td>" + supplier.supplierTotalPaid + "</td>";
            row += "<td>" + supplier.supplierTotalDue + "</td>";
            row += "<td>" + supplier.supplierRegDate + "</td>";
            row += "<td><form action='code.php' method='post'>";
            row += "<input type='submit' id='supplier_edit' name='supplier_edit' value='Edit' data-id=" + supplier.id + " class='btn btn-success btn-sm'></td>";
            row += "<td><input type='submit' id='supplier_delete' name='supplier_delete' value='Delete' data-id=" + supplier.id + " class='btn btn-danger btn-sm'></td>";
            row += "</form></tr>";

        });
        console.log(row);
        return $('#supplierTableBody').html(row);
    }




    $(document).on('click', '.add_supplier', function (e) {
        e.preventDefault(); // Prevent default form submission

        // Serialize form data
        var form_data = $('#supplier_frm').serialize();
        console.log(form_data); // Check if form data is correctly serialized

        // AJAX request
        $.ajax({
            type: "POST",
            url: "controller/supplier.php", // Check if this URL is correct
            data: form_data,
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {

                    // Success message
                    swal({
                        title: "Success",
                        text: "Supplier data added successfully!",
                        icon: "success"
                    }).then((willReload) => {
                        if (willReload) {
                            //    window.location.reload();
                            getData(response.data);
                            console.log(response.data)
                        }
                    });

                    // Hide modal and clear form fields
                    $('.modal').modal('hide');
                    $('.modal input[type="text"], .modal input[type="number"]').val('');

                    //window.location.reload();
                    // Reset select dropdown if needed
                } else {
                    // Error message
                    swal({
                        title: "Error",
                        text: response.message, // Display error message from server
                        icon: "error"
                    });
                }
            },
            error: function (xhr, status, error) {
                // Handle AJAX errors
                console.error("AJAX Error:", error);
                swal({
                    title: "Error",
                    text: "An error occurred while processing your request.",
                    icon: "error"
                });
            }
        });
    });


    $(document).on('click', '#supplier_edit', function (e) {
        e.preventDefault();

        var getsupplierId = $(this).data('id'); // Get the ID dynamically from the button
        console.log(getsupplierId);

        $.ajax({
            type: "POST",
            url: "controller/supplier.php",
            data: {
                id: getsupplierId ? getsupplierId : 1, // Use the dynamic ID
                action: 'readone'
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.status === "success" && response.data.length > 0) {
                    var supplier = response.data[0]; // Get the first supplier
                    $('#suppliertableModal').modal('show');
                    $('#supplier_submit').addClass('update-btn');
                    $('#supplier_submit').text('Update')
                     $('#supplier_submit').removeClass('add_supplier');
                    //$('#model-submit-btn').hide();
                    // Populate the form with the retrieved data
                    $('#supplierName').val(supplier.supplierName);
                    $('#supplierCompanyName').val(supplier.supplierCompanyName);
                    $('#supplierGst').val(supplier.supplierGst);
                    $('#supplierAddress1').val(supplier.supplierAddress1);
                    $('#supplierAddress2').val(supplier.supplierAddress2);
                    $('#supplierStreet').val(supplier.supplierStreet);
                    $('#supplierArea').val(supplier.supplierArea);
                    $('#supplierPincode').val(supplier.supplierPincode);
                    $('#supplierPhoneNo').val(supplier.supplierPhoneNo);
                    $('#supplierState').val(supplier.supplierState);

                    $('#action').val('update')

                }
                else {
                    alert("supplier not found.");
                }
            }, complete: function () {
                $(document).on('click', '.update-btn', function (event) {
                    event.preventDefault(); // Prevent default form submission
                    // console.log(getsupplierId);

                    // Get the supplier ID
                    console.log($("#supplier_frm").serialize());
                    $.ajax({
                        type: "POST",
                        url: "controller/supplier.php",
                        data: $("#supplier_frm").serialize() + '&id=' + getsupplierId, // Include action and ID
                        dataType: "json",
                        success: function (response) {
                            if (response.status === "success") {
                                swal({
                                    title: "Good job!",
                                    text: "Updated Successfully!",
                                    icon: "success"

                                }).then((willReload) => {
                                    if (willReload) {
                                        //    window.location.reload();
                                        getData(response.data);
                                    }
                                });
                                $('.modal').modal('hide');
                                $('.modal input[type="text"]').val(''); // Clear textboxes
                                $('.modal input[type="number"]').val('');
                                $('#supplier_category').prop('selectedIndex', 0);
                                $('#tt').load('supplier_table.php');

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

    $(document).on('click', '#supplier_delete', function (event) {
        event.preventDefault(); // Prevent default form submission
        // console.log(getsupplierId);

        // Get the supplier ID
        var confirmed = confirm("Do you really want to delete this record?");

        // If the user did not confirm, prevent the form submission
        if (!confirmed) {
            event.preventDefault();
        } else {
            var getsupplierId = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "controller/supplier.php",
                data: { id: getsupplierId, action: 'delete' },// Include action and ID
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
                                //    window.location.reload();
                                getData(response.data);
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


});
