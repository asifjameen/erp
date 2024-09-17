$('#add_pur_history').click(function (e) {
    e.preventDefault(); // Prevent default form submission

    var form_data = $('#gst_record').serialize();
    console.log(form_data);
    $.ajax({
        type: "post",
        url: "controller/gst.php",
        data: form_data+'&action=insert',
        dataType: "json",
        success: function (response) {

            if (response.status == 'success ') {
                swal({
                    title: "Good job!",
                    text: "You clicked the button!",
                    icon: "success"
                }).then((willReload) => {
                    if (willReload) {
                    location.reload();
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