<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables with Custom Print and PDF Header</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
</head>
<body>

<div class="container mt-5">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<!-- Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.pdfmake.min.js"></script>
<script src="../admin/assets/jquery/jquery.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    title: '<div style="padding: 10px;"><strong>SA HYDRAULIC FITTINGS</strong></div>',
                    messageTop: `
                        <div style="padding: 10px;">
                            <div>#640A, Pillayar Kovil Street,</div>
                            <div>Mannurpet, Chennai-600050</div>
                            <div>State: Tamil Nadu</div>
                            <div>Email: sahydraulicfittings@gmail.com</div>
                            <div>Phone no: 7871517751 / 9524493786</div>
                            <div><strong>GST NO: 33AKZPI3901M1ZR</strong></div>
                        </div>
                    `,
                    customize: function(win) {
                        $(win.document.body).find('h1').css('font-size', '18px');
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'SA HYDRAULIC FITTINGS',
                    messageTop: `
                        #640A, Pillayar Kovil Street,
                        Mannurpet, Chennai-600050
                        State: Tamil Nadu
                        Email: sahydraulicfittings@gmail.com
                        Phone no: 7871517751 / 9524493786
                        GST NO: 33AKZPI3901M1ZR
                    `,
                    customize: function(doc) {
                        doc.styles.title = {
                            fontSize: '18',
                            alignment: 'center'
                        };
                        doc.content[1].margin = [0, 0, 0, 10];
                    }
                }
            ]
        });
    });
</script>

</body>
</html>































































