<?php
include ("partial/header.php");
include ("partial/nav.php");

?>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <b>Add_Customer</b>
</button>

<!-- Modal -->
<div>
    <div class="table-responsive table-striped mt-4">
        <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
            <thead class="table-primary">

                <tr>
                <th>Id</th>
                        <th>Product_id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>HSN</th>
                        <th>SKN</th>
                        <th>Batch</th>
                        <th>Purchase_price</th>
                        <th>Sales_price</th>
                        <th>Minimum_stock</th>
                        <th>status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">

                <?php
                $sql = "select product.id, `product_id`, category.categoryName, `productName`, `productQuantity`, `productPurchasePrice`, `productSalesPrice`, `productStatus`, `productMinimumQuantity`, `productSKN`, `productHsn`, `productBatch`from product join category on category.category_id=product.category_id where product.productStatus=1";
                 $productList = json_decode($product->joinQuery($sql), true);
                
                
                    foreach ($productList as $productListitem) {
                        echo "<tr class='table-danger'>";
                        echo "<td scope='row'>" . $productListitem['id'] . "</td>";
                        echo "<td scope='row'>" . $productListitem['product_id'] . "</td>";
                        echo "<td scope='row'>" . $productListitem['productName'] . "</td>";
                        echo "<td scope='row'>" . $productListitem['categoryName'] . "</td>";
                        echo "<td scope='row'>" . $productListitem['productQuantity'] . "</td>";
                        echo "<td scope='row'>" . $productListitem['productHsn'] . "</td>";
                        echo "<td scope='row'>" . $productListitem['productSKN'] . "</td>";
                        echo "<td scope='row'>" . $productListitem['productBatch'] . "</td>";
                        echo "<td scope='row'>" . $productListitem['productPurchasePrice'] . "</td>";
                        echo "<td scope='row'>" . $productListitem['productSalesPrice'] . "</td>";
                        echo "<td scope='row'>" . $productListitem['productMinimumQuantity'] . "</td>";
                        echo "<td scope='row'>".status($productListitem['productStatus'])."</td>";
                        echo "<td scope='row'>x</td>";
                        echo "<td scope='row'>x</td>";
                    


                        echo ' <form action="code.php" method="post" >';
                        echo ' <form action="code.php" method="post">';
                        //echo "<input type='hidden'id='id' name='id' value='" . $productListitem["id"] . "'>";
                        //  echo "<td><input type='submit'id='doc_edit' name='doc_delete' value='Adddress' class='btn btn-success btn-sm'></td>";
                        // echo "<td><input type='submit'id='doc_edit' name='doc_delete' value='Edit' class='btn btn-success btn-sm'></td>";
                        // echo "<td><input type='submit'id='doc_delete' name='doc_delete' value='Delete' class='btn btn-danger btn-sm'></td>";
                    
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





<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title">Add_New_Customer</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="adMemberForm">
                    <div class="row">
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="name">Name *:</label>
                                <input type="text" class="form-control add-member" id="name" placeholder="Member name"
                                    name="name">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="company">Company :</label>
                                <input type="text" class="form-control add-member" id="company"
                                    placeholder="Company name" name="company">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="contact">Contact number :</label>
                                <input type="text" class="form-control add-member" id="contact"
                                    placeholder="Contact member" name="contact">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control add-member" id="email"
                                    placeholder="Email optional" name="email">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="cus_open_blacnce">previous due :</label>
                                <input type="number" class="form-control" name="cus_open_blacnce" id="cus_open_blacnce"
                                    value="0.00">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-6">
                            <div class="form-group">
                                <label for="reg_date">Registration Date :</label>
                                <input type="date" class="form-control add-member" id="reg_date" name="reg_date">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea rows="3" class="form-control" placeholder="Member complect Address"
                                    id="address" name="address"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block rounded-0">Add customer</button>
                </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<?PHP
include_once ("partial/footer.php");
?>