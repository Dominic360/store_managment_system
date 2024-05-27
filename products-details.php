<?php include("sections/header.php") ?>


<?php
include('php-action/db_conn.php');
$id = $_GET['detailid'];

// Get all records from the product table..
$product_select = ("SELECT * FROM `product` WHERE id = $id");
$select_sql = mysqli_query($con, $product_select);
// $select_result = mysqli_num_rows($select_sql);
if ($select_sql) {
    # code...
    while ($row = mysqli_fetch_assoc($select_sql)) {
        $product_id                 = $row['id'];
        $product_image              = $row['image'];
        $product_name               = $row['name'];
        $brand                      = $row['brand'];
        $product_selling_price      = $row['selling_price'];
        $product_quantity           = $row['quantity'];
        $product_description        = $row['description'];
        $purchased_price            = $row['purchased_price'];
        $grand_total                = $row['grand_total'];
        $revenue                    = $row['revenue'];
        $status                     = $row['status'];
        $product_added_date         = $row['added_date'];


        // if ($status == "active") {
        //     $myStatus =  '<td>
        //         <span class="badge bg-success p-1">active</span>
        //     </td>';
        // } else {
        //     $myStatus = '<td>
        //         <span class="badge bg-danger p-1">Deactive</span>
        //     </td>';
        // }

        if ($status == "active") {
            $myStatus =  '<td>
            <span class="badge badge-success-lighten p-1">active</span>
        </td>';
        } else {
            $myStatus = '<td>
            <span class="badge badge-danger-lighten p-1">Deactive</span>
        </td>';
        }
    }
}

// Get all record from the purchase table for this particular product ID...
// $select = ("SELECT * FROM `purchase` WHERE id = $id");
// $sql = mysqli_query($con, $select);
// $result = mysqli_num_rows($sql);
// if ($sql) {
//     # code...
//     while ($row = mysqli_fetch_assoc($sql)) {
//         $purchase_id                 = $row['id'];
//         $purchase_name               = $row['name'];
//         $purchase_quantity           = $row['quantity'];
//         $purchase_cost_price         = $row['cost_price'];
//         $purchase_total_amount       = $row['total_amount'];
//         $purchase_discount           = $row['discount'];
//         $purchase_purchased_price    = $row['purchased_price'];
//         $purchase_selling_price      = $row['selling_price'];
//         $purchase_added_date         = $row['added_date'];
//     }
// }
?>




<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <?php include("sections/left-sidebar.php") ?>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            <?php include('sections/topbar.php') ?>
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                                    <li class="breadcrumb-item active">Product Details</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Product Details </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <!-- Product image -->
                                        <a href="javascript: void(0);" class="text-center d-block mb-4">
                                            <img src="assets/images/products/<?php echo $product_image ?>" class="img-fluid" style="max-width: 280px;" alt="Product-img" />
                                        </a>

                                        <!-- <div class="d-lg-flex d-none justify-content-center">
                                            <a href="javascript: void(0);">
                                                <img src="assets/images/products/product-1.jpg" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img" />
                                            </a>
                                            <a href="javascript: void(0);" class="ms-2">
                                                <img src="assets/images/products/product-6.jpg" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img" />
                                            </a>
                                            <a href="javascript: void(0);" class="ms-2">
                                                <img src="assets/images/products/product-3.jpg" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img" />
                                            </a>
                                        </div> -->
                                    </div> <!-- end col -->
                                    <div class="col-lg-7">
                                        <form class="ps-lg-4">
                                            <!-- Product title -->
                                            <h3 class="mt-0"><?php echo $product_name . '<a href="product_update.php?updateid=' . $id . '" class="text-muted"><i class="mdi mdi-square-edit-outline ms-2 text-info"></i></a>' ?> </h3>
                                            <p class="mb-1">Added Date: <?php echo $product_added_date ?></p>
                                            <p class="font-16">
                                                <!-- <span class="text-warning mdi mdi-star"></span>
                                                <span class="text-warning mdi mdi-star"></span>
                                                <span class="text-warning mdi mdi-star"></span>
                                                <span class="text-warning mdi mdi-star"></span>
                                                <span class="text-warning mdi mdi-star"></span> -->
                                            </p>

                                            <!-- Product stock -->
                                            <div class="mt-3">
                                                <h4>
                                                    <!-- <span class="badge badge-success-lighten">Instock</span> -->
                                                    <?php echo $myStatus ?>
                                                </h4>
                                            </div>

                                            <!-- Product description -->
                                            <div class="mt-4">
                                                <h6 class="font-14">Selling Price:</h6>
                                                <h3> $<?php echo $product_selling_price ?></h3>
                                            </div>

                                            <!-- Quantity -->
                                            <div class="mt-4">
                                                <h6 class="font-14">Quantity</h6>
                                                <?php echo $product_quantity ?>
                                                <!-- <div class="d-flex">
                                                    <input type="number" min="1" value="1" class="form-control" placeholder="Qty" style="width: 90px;">
                                                    <button type="button" class="btn btn-danger ms-2"><i class="mdi mdi-cart me-1"></i> Add to cart</button>
                                                </div> -->
                                            </div>

                                            <!-- Product description -->
                                            <div class="mt-4">
                                                <h6 class="font-14">Description:</h6>
                                                <p><?php echo $product_description ?></p>
                                            </div>

                                            <!-- Product information -->
                                            <div class="mt-4">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h6 class="font-14">Purchased Price:</h6>
                                                        <p class="text-sm lh-150">$<?php echo $purchased_price ?></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6 class="font-14">Grand Total:</h6>
                                                        <p class="text-sm lh-150">$<?php echo $grand_total ?></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6 class="font-14">Revenue:</h6>
                                                        <p class="text-sm lh-150">$<?php echo $revenue ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, quas cupiditate atque ipsum praesentium accusamus error tempora illo voluptas beatae ab incidunt id ratione est vero culpa ea natus architecto. -->
                                        </form>
                                    </div> <!-- end col -->
                                </div> <!-- end row-->

                                <!-- <div class="table-responsive mt-4">
                                    <table class="table table-bordered table-centered mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Outlets</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Revenue</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ASOS Ridley Outlet - NYC</td>
                                                <td>$139.58</td>
                                                <td>
                                                    <div class="progress-w-percent mb-0">
                                                        <span class="progress-value">478 </span>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 56%;" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>$1,89,547</td>
                                            </tr>
                                            <tr>
                                                <td>Marco Outlet - SRT</td>
                                                <td>$149.99</td>
                                                <td>
                                                    <div class="progress-w-percent mb-0">
                                                        <span class="progress-value">73 </span>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 16%;" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>$87,245</td>
                                            </tr>
                                            <tr>
                                                <td>Chairtest Outlet - HY</td>
                                                <td>$135.87</td>
                                                <td>
                                                    <div class="progress-w-percent mb-0">
                                                        <span class="progress-value">781 </span>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>$5,87,478</td>
                                            </tr>
                                            <tr>
                                                <td>Nworld Group - India</td>
                                                <td>$159.89</td>
                                                <td>
                                                    <div class="progress-w-percent mb-0">
                                                        <span class="progress-value">815 </span>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>$55,781</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>  -->
                                <!-- end table-responsive-->

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <?php include("sections/footer-detail.php") ?>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->


<!-- Right Sidebar -->
<?php include("sections/right-sidebar.php") ?>
<!-- /End-bar -->

<?php include("sections/footer.php") ?>