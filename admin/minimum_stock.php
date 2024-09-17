<?php
include("partial/header.php");
include("partial/nav.php");

?>

<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-trade"></i>
        </span> <strong>Product</strong>
    </h3>
</div>
<hr>



<div class="card mt-4">

    <div class="card-header">
        <h2 class="card-tite mb-0 fw-bold">Minimum_stock</h2>
    </div>
    <div class="card-body pt-0">
        <div class="table-responsive table-striped mt-4">
            <table id="minimum_stk_product_list_table" class="table table-striped dt-responsive nowrap" style="width:100%">
                <thead class="table-primary ">

                    <tr>
                        <th>Id</th>
                        <th>Product_id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Quantity</th>

                    </tr>
                </thead>

                <tbody class="table-group-divider tt">
                    <?php

                    $sql = "SELECT product.id, product.product_id, category.categoryName, product.productName, product.productQuantity FROM product JOIN category ON category.category_id = product.category_id WHERE product.productQuantity >= product.productMinimumQuantity";
                    $productList = json_decode($product->joinQuery($sql), true);
                   

                    foreach ($productList as $productListitem) {
                        echo "<tr class='table-danger'>";
                        echo "<td scope='row'>" . $productListitem['id'] . "</td>";
                        echo "<td scope='row'>" . $productListitem['product_id'] . "</td>";
                        echo "<td scope='row'>" . $productListitem['productName'] . "</td>";
                        echo "<td scope='row'>" . $productListitem['categoryName'] . "</td>";
                        echo "<td scope='row'>" . $productListitem['productQuantity'] . "</td>";



                        echo "</tr>";
                    }
                    ?>

                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>

    </div>

</div>











<?PHP
include_once("partial/footer.php");
?>
<script>
    $('#minimum_stk_product_list_table').dataTable();
</script>
