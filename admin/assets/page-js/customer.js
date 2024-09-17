	

$(document).ready(function () {
    
function getData(data){
    row='';
                    data.forEach(function(customer) {
                     row += "<tr class='table-danger'>";
                    row += "<td scope='row' id='customer_id'>" + customer.id + "</td>";
                    row += "<td scope='row'>" + customer.customer_id + "</td>";
                    row += "<td>" + customer.customerName + "</td>";
                    row += "<td>" + customer.customerCompanyName + "</td>";
                    row += "<td>" + customer.customerGst + "</td>";
                    row += "<td>" + customer.customerPhoneNo + "</td>";
                    row += "<td><div class='dropdown'><button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>" + customer.customerState + "</button><ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'><li class='dropdown-item'><b>Address</b> : " + customer.customerAddress1 + "</li><li class='dropdown-item'>" + customer.customerAddress2 + "</li><li class='dropdown-item'><b>Street</b>: " + customer.customerStreet + "</li><li class='dropdown-item'><b> Area</b> : " + customer.customerArea + "</li><li class='dropdown-item'><b>State</b> : " + customer.customerState + "</li><li class='dropdown-item'><b>Pincode</b> : " + customer.customerPincode + "</li></ul></div></td>";
                    row += "<td>" + customer.customerTotalBuy + "</td>";
                    row += "<td>" + customer.customerTotalPaid + "</td>";
                    row += "<td>" + customer.customerTotalDue + "</td>";
                    row += "<td>" + customer.customerRegDate + "</td>";
                    row += "<td><input type='button' id='customer-edit-btn' name='customer-edit-btn' value='Edit' data-id='" + customer.customer_id + "' class='btn btn-success btn-sm'></td>";
                    row += "<td><input type='submit' id='customer-delete' name='delete' value='Delete' data-id='" + customer.customer_id + "' class='btn btn-danger btn-sm'></td>";
                    row += "</tr>";  
                   
                }); 
               return $('#customer_table_body').html(row);
              
        
}




$(document).on('click', '.add-customer-data', function (e) {
    e.preventDefault(); // Prevent default form submission

    // Serialize form data
    var form_data = $('#add-customer-data').serialize();
    console.log(form_data); // Check if form data is correctly serialized

    // AJAX request
    $.ajax({
        type: "POST",
        url: "controller/customer.php", // Check if this URL is correct
        data: form_data,
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                
                // Success message
                swal({
                    title: "Success",
                    text: "Customer data added successfully!",
                    icon: "success"
                }).then((willReload) => {
                    if (willReload) {
                    //    window.location.reload();
                    getData(response.data);
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


$(document).on('click', '#customer-edit-btn', function (e) {
    e.preventDefault();

    var getcustomerId = $(this).data('id'); // Get the ID dynamically from the button
    console.log(getcustomerId);

    $.ajax({
        type: "POST",
        url: "controller/customer.php",
        data: {
            id: getcustomerId ? getcustomerId : 1, // Use the dynamic ID
            action: 'readone'
        },
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response.status === "success" && response.data.length > 0) {
                var customer = response.data[0]; // Get the first customer
                $('#customer_tableModal').modal('show');
                $('#add_Cus_model_button').addClass('update-btn');
                $('#add_Cus_model_button').text('Update')
                // $('#add_Cus_model_button').removeClass('add-customer');
                //$('#model-submit-btn').hide();
                // Populate the form with the retrieved data
                $('#customerName').val(customer.customerName);
                $('#customerCompanyName').val(customer.customerCompanyName);
                $('#customerGst').val(customer.customerGst);
                $('#customerAddress1').val(customer.customerAddress1);
                $('#customerAddress2').val(customer.customerAddress2);
                $('#customerStreet').val(customer.customerStreet);
                $('#customerArea').val(customer.customerArea);
                $('#customerPincode').val(customer.customerPincode);
                $('#customerPhoneNo').val(customer.customerPhoneNo);
                $('#customerState').val(customer.customerState);

                $('#action').val('update')

            }
            else {
                alert("customer not found.");
            }
        }, complete: function () {
            $(document).on('click', '.update-btn', function (event) {
                event.preventDefault(); // Prevent default form submission
                // console.log(getcustomerId);

                // Get the customer ID
                console.log($("#add-customer-data").serialize());
                $.ajax({
                    type: "POST",
                    url: "controller/customer.php",
                    data: $("#add-customer-data").serialize() + '&customer_id=' + getcustomerId, // Include action and ID
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
                            $('#customer_category').prop('selectedIndex', 0);
                            $('#tt').load('customer_table.php');

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

$(document).on('click', '#customer-delete', function (event) {
    event.preventDefault(); // Prevent default form submission
    // console.log(getcustomerId);

    // Get the customer ID
    var confirmed = confirm("Do you really want to delete this record?");
                
    // If the user did not confirm, prevent the form submission
    if (!confirmed) {
        event.preventDefault();
    }else{
         var getcustomerId = $(this).data('id');
    $.ajax({
        type: "POST",
        url: "controller/customer.php",
        data: { customer_id: getcustomerId, action: 'delete' },// Include action and ID
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
