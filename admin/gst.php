<?php
include("partial/header.php");
include("partial/nav.php");

?>






<h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
    </span> <strong>Purchase_GST</strong>
</h3>

<hr>
<div class="row">
    <div class="col-md-6">
        <div class="card ">

            <div class="card-body">

                <form id="gst_record">

                    <div class="mb-3">
                        <label for="supplier_id" class="form-label">Supplier</label>
                        <select id="Supplier" class="form-select" name="Supplier">
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
                    <div class="mb-3">
                        <label for="batch" class="form-label">Batch</label>
                        <input type=text class="form-control" name="batch" id="batch">
                    </div>
                    <div class="mb-3">
                        <label for="gst" class="form-label">Gst</label>
                        <input type="number" class="form-control" name="gst" id="gst">
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">amount</label>
                        <input type="number" class="form-control" name="amount" id="amount">
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">notes</label>
                        <input type=text class="form-control" name="notes" id="notes">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="submit" id='add_pur_history' name='add_pur_history'>add_pur_history</button>
                    </div>
                    <div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive mt-4">
    <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
        <thead class="table-primary">

            <tr>
                <th>supplier</th>
                <th>Batch</th>
                <th>Amount</th>
                <th>Gst</th>
                <th>note</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">

            <?php
            $gst = json_decode($gst_record->joinQuery('SELECT supplier.supplierName as sup_name,gst_record.batch as batch,gst_record.gst as gst,gst_record.amount as amt,gst_record.reg_date as reg_date FROM gst_record JOIN supplier on supplier.id=gst_record.supplier_id;'), true);
            
           // $sql = "select puchase_history.amount as amount,supplier.supplier_name as sup_id,puchase_history.batch as batch,puchase_history.gst as gst,puchase_history.notes as notes from supplier join puchase_history on supplier.supplier_id=puchase_history.supplier_id;";
         
            foreach ($gst as $res) {
                echo "<tr class='table-danger'>";
                // echo"<td scope='row'>" . $res['id'] . "</td>";
                echo "<td>" . $res['sup_name'] . "</td>";
                echo "<td>" . $res['batch'] . "</td>";
                echo "<td>" . $res['amt'] . "</td>";
                echo "<td>" . $res['gst'] . "</td>";
                echo "<td>" . $res['reg_date'] . "</td>";
                echo "</tr>";
                echo '';
            }
            ?>
        </tbody>
    </table>
</div>




<?PHP
include_once("partial/footer.php");
?>
<script src="assets/page-js/gst.js"></script>
