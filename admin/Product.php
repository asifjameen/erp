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
<div class="card">

    <div class="card-body">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card bg-gradient-danger card-img-holder text-white pat">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Minimum_stock <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <?php
                        $minimumStock = $product->sqlQuery("select count(productMinimumQuantity) as minimumQty from product where productQuantity >= productMinimumQuantity");
                        $minimumStock = json_decode($minimumStock, true);
                        ?>


                        <h2 class="mb-5"><?php echo $minimumStock['minimumQty'];
                                            ?></h2>
                        <h6 class="card-text"></h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card bg-gradient-info card-img-holder text-white doc">
                    <div class="card-body">

                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total_Products <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <?php

                        $product_count = json_decode($product->sqlQuery("select count(product_id) as product_count from product"), true);

                        ?>
                        <h2 class="mb-5"><?php // echo $res[0]
                                            echo $product_count['product_count'];
                                            ?> </h2>
                        <h6 class="card-text"></h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4 ">
                <div class="card bg-gradient-success card-img-holder text-white app">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total_Category<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <?php
                        $category_count = json_decode($product->sqlQuery("select count(category_id) as category_count from category"), true);

                        ?>
                        <h2 class="mb-5"><?php // echo $res[0]
                                            echo $category_count['category_count'];
                                            ?> </h2>
                        <h6 class="card-text"></h6>
                        <h6 class="card-text"></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<hr>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <b>Add_Product</b>
</button>
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#insert">
    <b>status_update</b>
</button>
<!-- Modal -->
<div>
    <div class="card mt-4">

        <div class="card-header">
            Product List
        </div>
        <div class="card-body pt-0">
            <div class="tt" id="tt">

            </div>

        </div>

    </div>

</div>





<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title">Add_New_Customer</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form action="" id="add-product-form" method="post">
                    <div class="row">
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="product_name">Name *:</label>
                                <input type="text" class="form-control add-product-name" id="product_name" placeholder="Enter Product name" name="product_name" required>
                            </div>
                        </div>

                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="product_category">product_category :</label>
                                <select class="form-control add-product-category" id="product_category" name="product_category" required>
                                    <option value="">Select Category</option>
                                    <?php
                                    $category_readall = $category->readAll();

                                    $category = json_decode($category_readall, true);

                                    // Assuming $category is fetched and decoded properly
                                    foreach ($category as $key) {
                                        echo '<option value="' . $key['category_id'] . '">' . $key['categoryName'] . '</option>';
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="product_quantity">product_quantity :</label>
                                <input type="number" class="form-control add-product-quantity" id="product_quantity" placeholder="Quantity" name="product_quantity">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="purchase-price">purchase-price :</label>
                                <input type="number" class="form-control add-purchase-price" id="purchase-price" placeholder="purchase-price" name="purchase-price">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="sales-price">sales-price :</label>
                                <input type="number" class="form-control add-sales-price" id="sales-price" placeholder="sales-price" name="sales-price">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="product-minimum-quantity">Minimum_stock :</label>
                                <input type="number" class="form-control" name="product-minimum-quantity" id="product-minimum-quantity" value="0.00">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="product-skn">Shortcut name</label>
                                <input type="text" class="form-control add-member" id="product-skn" name="product-skn" placeholder="Shortcut-Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="product-hsn">product-hsn:</label>
                                <input type="text" class="form-control" placeholder=" product-hsn" id="product-hsn" name="product-hsn">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="product-batch">product-batch:</label>
                                <input type="text" class="form-control" placeholder=" product-batch" id="product-batch" name="product-batch">
                            </div>
                        </div>
                        <div class="edit-product-id">

                        </div>
                    </div>
                    <input type="hidden" class="action" name="action" value="insert">
                    <button type="submit" id='model-submit-btn' class="btn btn-primary btn-block  rounded-0 add-product" data-id=''>Add Product</button>
                </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>



<div id="insert" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Product</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>



            </div>
            <div class="modal-body">
                <!-- #region -->
                <thead class="table-primary">

                    <tr>

                        <th>Product_id</th>
                        <th>Name</th>
                        <th>Category</th>

                        <th>status</th>
                        <th>update</th>

                    </tr>
                </thead>

                <tbody class="table-group-divider">

                    <?php
                    $sql = "select product.id, `product_id`, category.categoryName, `productName`, `productQuantity`, `productPurchasePrice`, `productSalesPrice`, `productStatus`, `productMinimumQuantity`, `productSKN`, `productHsn`, `productBatch`,`productStatus` from product join category on category.category_id=product.category_id";
                    $productList = json_decode($product->joinQuery($sql), true);


                    foreach ($productList as $productListitem) {
                        echo "<tr class='table-danger'>";
                        echo "<td scope='row'>" . $productListitem['product_id'] . "</td>";
                        echo "<td scope='row'>" . $productListitem['productName'] . "</td>";
                        echo "<td scope='row'>" . $productListitem['categoryName'] . "</td>";
                        echo '<td><select class="form-select" name=product_status">';
                        if ($productListitem['productStatus'] == '1') {
                            echo '<option value="1" selected>Active</option>';
                            echo '<option value="0" >Disable</option>';
                        } else {
                            echo '<option value="0" selected>Disable</option>';
                            echo '<option value="1" >Active</option>';
                        }
                        echo '</select></td>';
                        //echo "<td scope='row'>".status($productListitem['productStatus'])."</td>";
                        echo "<td><input type='button' id='update_product_statuss' name='update_product_statuss' class='btn btn-danger btn-sm'value='update'> </td>";
                        echo "</tr>";
                        echo '</form>';
                    }
                    ?>
                </tbody>
                <tfoot>

                </tfoot>
                </table>
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-primary" id="selected">Add</button>
            <button type="button" data-dismiss="modal" class="btn">Cancel</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
</div>
<?PHP
include_once("partial/footer.php");
?>
<script src='assets/page-js/product.js'></script>