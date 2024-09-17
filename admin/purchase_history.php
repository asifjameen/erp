<?php
include("partial/header.php");
include("partial/nav.php");

?>
<div>
    <div class="table-responsive table-striped mt-4">
        <table id="customer_table" class="table table-striped dt-responsive nowrap" style="width:100%">
            <thead class="table-primary">

                <tr>
                    <th>Id</th>
                    <th>Product name</th>
                    <th>purchase date</th>
                    <th>quantity</th>
                    <th>purchase price</th>
                    <th>sell price</th>
                    <th>purchase total</th>
                </tr>
            </thead>

            <tbody class="table-group-divider" id="customer_table_body">

                <?php
                $purchase_his = json_decode($purchase_products->readAll(), true);
                //pre_print($customerList);

                foreach ($purchase_his as $purchase_data) {
                    echo "<tr class='table-danger'>";
                    echo "<td scope='row' id='customer_id'>" . $purchase_data['id'] . "</td>";
                    echo "<td scope='row'>" . $purchase_data['product_name'] . "</td>";
                    echo "<td>" . $purchase_data['purchase_date'] . "</td>";
                    echo "<td>" . $purchase_data['purchase_quantity'] . "</td>";
                    echo "<td>" . $purchase_data['purchase_price'] . "</td>";
                    echo "<td>" . $purchase_data['purchase_sell_price'] . "</td>";
                    echo "<td>" . $purchase_data['purchase_subtotal'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>

</div>

<?PHP
include_once("partial/footer.php");
?>