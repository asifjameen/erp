<?php
include("partial/header.php");
include("partial/nav.php");

?>
<hr>
<div class="content-header">
 
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="row mb-4">
      <div class="col-12 col-sm-6 col-md-4">

        <div class="card bg-gradient-danger card-img-holder text-white pat">
          <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Total Expense<i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <?php $expense_total = json_decode($expense->totalsum("expenseAmount"), true); ?>


            <h2 class="mb-5"><?php echo $expense_total['total'] ?? '0';
                              ?></h2>
            <h6 class="card-text"></h6>
          </div>
        </div>



        <!-- /.info-box -->
      </div>


    </div>
  </div>


  <!-- .row -->
  <div class="card">
    <div class="card-body">
      <div class="card-header">
        <h3 class="card-title "><b>Expense</b></h3>
    
        <a href="index.php?page=add_expense" class="btn btn-primary ">Add expense</a>
      
        <a href="index.php?page=add_expense" class="btn btn-warning float-end">Add Expense Category</a>
      </div>
      <!-- /.card-header -->




      <div class="table-responsive table-striped mt-4">
        <table id="product_list_table" class="table table-striped dt-responsive nowrap" style="width:100%">
          <thead class="table-primary ">
            <tr>
              <th>SI</th>
              <th>Date</th>
              <th>Expense For</th>
              <th>Amount</th>
              <th>Catagory</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <div class="expense_table">
              <?php $expense_list = json_decode($expense->joinQuery('-- Active: 1716357005781@@127.0.0.1@3306@project_billing
SELECT expense.expense_id,expense.`expenseDate`,expense.`expenseAmount`,expense_category.`expense_categoryName`,expense.expense_for,expense.`expenseDescription`,expense.`expenseCreated_at` from expense INNER JOIN expense_category ON expense.expense_category_id =expense_category.expense_category_id'), true);

              ?>
              <?php foreach ($expense_list as $expense_list) : ?>
                <tr>

                  <td><?php echo trim($expense_list['expense_id']) ?></td>
                  <td><?= $expense_list['expenseDate'] ?></td>
                  <td><?= $expense_list['expense_for'] ?></td>
                  <td><?= $expense_list['expenseAmount'] ?></td>
                  <td><?= $expense_list['expense_categoryName'] ?></td>
                  <td><?= $expense_list['expenseDescription'] ?></td>
                  <td>
                    <button type="button" class="btn btn-primary " id="expense_list_edit">Edit</button>
                    <button type="button" class="btn btn-danger" id="expense_list_delete">Delete</button>
                  </td>
                <?php endforeach ?>
                </tr>
            </div>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
  <!-- /.card-body -->
  <!-- /.row -->
  </div><!--/. container-fluid -->
</section>
<?PHP
include_once("partial/footer.php");
?>