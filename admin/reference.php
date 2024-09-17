<h3>Supplier</h3>

<div class="page-header mt-3">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span> <strong>Supplier</strong>
    </h3>
</div>
<hr>
<div class="row">
    <div class="col-md-4 ">
        <div class="card bg-gradient-danger card-img-holder text-white pat">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total_Buy <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                </h4>
                <?php
                $supplierTotalBuy = json_decode($supplier->totalsum('supplierTotalBuy'), true);

                ?>


                <h2 class="mb-5"><?php echo $supplierTotalBuy['total'];
                ?></h2>
                <h6 class="card-text"></h6>
            </div>
        </div>
    </div>

    <div class="col-md-4 ">
        <div class="card bg-gradient-info card-img-holder text-white doc">
            <div class="card-body">

                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total_Paid <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                </h4>
                <?php

                $suppliertotalPaid = json_decode($supplier->totalsum('supplierTotalPaid'), true);

                ?>
                <h2 class="mb-5"><?php // echo $res[0]
                echo $suppliertotalPaid['total'];
                ?> </h2>
                <h6 class="card-text"></h6>
            </div>
        </div>
    </div>

    <div class="col-md-4 ">
        <div class="card bg-gradient-success card-img-holder text-white app">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total_credit<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                </h4>
                <?php
                $suppliertotalDue = json_decode($supplier->totalsum('supplierTotalDue'), true);

                ?>
                <h2 class="mb-5"><?php // echo $res[0]
                echo $suppliertotalDue['total'];
                ?> </h2>
                <h6 class="card-text"></h6>
                <h6 class="card-text"></h6>
            </div>
        </div>
    </div>
</div>
<hr>
