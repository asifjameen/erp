<?php
include("partial/header.php");
include("partial/nav.php");

?>
<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Buy Product</b></h3>
        </div>
        <!-- /.card-header -->

        <form id="addByproductForm">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="p_supplier" class="form-label">Supplier Name *</label>
                            <select name="p_supplier" id="p_supplier" class="form-select select2">
                                <option selected disabled>Select a Supplier</option>
                                <?php
                                $all_supplier = json_decode($supplier->readAll(), true);
                                foreach ($all_supplier as $supplier) {
                                ?>
                                    <option value="<?= $supplier['id'] ?>"><?= $supplier['supplierName'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="p_product_name" class="form-label">Purchase Product *</label>
                            <select name="p_product_name" id="p_product_name" class="form-select select2">
                                <option selected disabled>Select a Product</option>
                                <?php
                                $all_product = json_decode($product->readAll(), true);
                                foreach ($all_product as $product) {
                                ?>
                                    <option value="<?= $product['id'] ?>"><?= $product['productName'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <a href="customer.php" target="_blank" class="btn btn-success mt-4">Add New Product</a>
                    </div>

                </div>
                <div class="row mt-3">
                    <h4>New Update</h4>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="p_p_price" class="form-label">Buy Price *</label>
                            <input type="number" class="form-control" id="p_p_price" name="p_p_price" placeholder="Purchase Price">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="p_pn_quantity" class="form-label">Purchase Quantity *</label>
                            <input type="number" class="form-control" id="p_pn_quantity" name="p_pn_quantity" placeholder="Purchase Quantity">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="p_p_sell_price" class="form-label">Sell Price *</label>
                            <input type="number" class="form-control" id="p_p_sell_price" name="p_p_sell_price" placeholder="Sell Price">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <h4>Available</h5>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="prev_avl_stk_qty" class="form-label">Stock Quantity *</label>
                                <input type="number" class="form-control" id="prev_avl_stk_qty" name="prev_avl_stk_qty" disabled placeholder="Stock Quantity" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="prev_pur_price" class="form-label">Buy Price *</label>
                                <input type="number" class="form-control" id="prev_pur_price" name="prev_pur_price" disabled placeholder="Purchase Price">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="prev_sales_price" class="form-label">Sell Price *</label>
                                <input type="number" class="form-control" id="prev_sales_price" name="prev_sales_price" disabled placeholder="Sell Price">
                            </div>
                        </div>
                </div>

            </div>


            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="card" style="background: #f1eaea40;">
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="p_subtotal" class="form-label">Subtotal</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="p_subtotal" id="p_subtotal">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-block mt-4" id="addByproductBtn">Purchase Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>


</div>

<?PHP
include_once("partial/footer.php");
?>

<script src="assets/page-js/purchase.js"></script>