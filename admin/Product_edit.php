
<?php
$title="Customers";
include "includes/header.php";
include "includes/slide.php";
include "includes/nav.php";
?>
<div class="main-panel"> 

    <div class="content-wrapper">
    <div class="page-header">
                            <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-home"></i>
                        </span> <strong>Product</strong>
                    </h3>
                </div>
                <hr>
                <?php
                echo $id=$_GET['pid'];
                                $sql = "select * from product where pid='$id'";
                                $res = $con->query($sql);
                                $res->setFetchMode(PDO::FETCH_ASSOC);
                                $rowss= $res->fetchall();
                                
                                echo $rowss[0]['product_name'];
                                ?>
                            <div class="modal-body">
                                <form action="code.php" method="post" class='frm'>
                                    <div class="mb-3">
                                        <label for="product_name" class="form-label">Name</label>
                                        <input type=text class="form-control" name="product_name" id="product_name" value='<?php echo $rowss[0]['product_name']?>'>
                                    </div>

                                    <div class="mb-3">
                                        <label for="product_category" class="form-label">Category</label>
                                        <select id="category" class="form-select"  name="category">

    <?php
    $query = "select * from category";
    $res = $con->query($query);
    $res->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $res->fetchall();
    foreach ($rows as $row) {
    ?>
    <option value="<?php echo $row['id'];?>"><?php echo $row['category_name'];?></option>

    <?php
    } 
    ?>
</select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">quantity</label>
                                        <input type=text class="form-control" name="quantity" id="quantity"value='<?php echo $rowss[0]['quantity']?>'>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mini_stk" class="form-label">Minimum_stock</label>
                                        <input type=number class="form-control" name="mini_stk" id="mini_stk"value='<?php echo $rowss[0]['minimum_stock']?>'>
                                    </div> 
                                    <div class="mb-3">
                                        <label for="purchase_price" class="form-label">Purchase_Price</label>
                                        <input type=text class="form-control" name="purchase_price" id="purchase_price"value='<?php echo $rowss[0]['purchase_price']?>'>
                                    </div>

                                    <div class="mb-3">
                                        <label for="sales_price" class="form-label">price</label>
                                        <input type=text class="form-control" name="sales_price" id="sales_price"value='<?php echo $rowss[0]['sales_price']?>'>
                                    </div>
                                    <div class="mb-3">
                                        <label for="batch" class="form-label">Batch</label>
                                        <input type=text class="form-control" name="batch" id="batch"value='<?php echo $rowss[0]['batch']?>'>
                                    </div>
                                    <input type='hidden'id='id' name='id' value="<?php echo $_GET['pid'] ?>">


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" value="product_edit" id='product_edit' name='product_edit'>product_edit</button>
                            </div> </form>
                        </div>
                   
<?php
include "includes/footer.php";
?> 
