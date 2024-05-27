    <?php
    include("sections/header.php");
    ?>

    <?php
    include("php-action/db_conn.php");

    // Calculate the total amount of purchased product available in store...
    $purchased_select = "SELECT `purchased_price` FROM `purchase` WHERE 1";
    $purchased_sql = mysqli_query($con, $purchased_select);

    $purchased = mysqli_num_rows($purchased_sql);


    // Calculate the total amount of product available in store...
    $product_select = "SELECT `grand_total` FROM `product` WHERE 1";
    $product_sql = mysqli_query($con, $product_select);

    $product = mysqli_num_rows($product_sql);


    // Calculate the total amount of sale...
    $sale_select = "SELECT `total_amount` FROM `sales` WHERE 1";
    $sale_sql = mysqli_query($con, $sale_select);

    $sale = mysqli_num_rows($sale_sql);



    // Calculate the total amount of employee available in store...
    $employee_select = "SELECT `salary` FROM `employee` WHERE 1";
    $employee_sql = mysqli_query($con, $employee_select);

    $employee = mysqli_num_rows($employee_sql);






    ?>

    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <?php include("sections/left-sidebar.php");
        echo $_SESSION["user_id"];
        ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include("sections/topbar.php"); ?>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <form class="d-flex">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-light" id="dash-daterange">
                                            <span class="input-group-text bg-primary border-primary text-white">
                                                <i class="mdi mdi-calendar-range font-13"></i>
                                            </span>
                                        </div>
                                        <a href="javascript: window.location.reload();" class="btn btn-primary ms-2" title="Reload Page">
                                            <i class="mdi mdi-autorenew"></i>
                                        </a>
                                        <!-- <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                            <i class="mdi mdi-filter-variant"></i>
                                        </a> -->
                                    </form>
                                </div>
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <!-- <div class="col-xl-5 col-lg-6"> -->

                        <div class="col-xl-6 col-lg-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card widget-flat bg-success text-white">
                                        <div class="card-body">
                                            <div class="float-end">
                                                <i class="mdi mdi-cart-plus"></i>
                                            </div>
                                            <h5 class=" fw-normal mt-0" title="Number of Orders">Purchased</h5>
                                            <h3 class="display-4 fw-bolder"><?php echo $purchased; ?></h3>
                                            <!-- <h3 class="mt-3 mb-3">36,254</h3> -->
                                            <p class="mb-0">
                                                <!-- <span class="text-dark me-2 fw-bold fs-4"> </span> -->
                                                <span class="text-nowrap">Purchased Products</span>
                                            </p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->

                                <div class="col-sm-6">
                                    <div class="card widget-flat text-white bg-danger">
                                        <div class="card-body">
                                            <div class="float-end">
                                                <i class="mdi mdi-cart"></i>
                                            </div>
                                            <h5 class=" fw-normal mt-0" title="Number of Products">Products</h5>
                                            <h3 class="display-4 fw-bolder"><?php echo $product; ?></h3>
                                            <p class="mb-0">
                                                <!-- <span class="text-dark me-2 fw-bold fs-4"> </span> -->
                                                <!-- <i class="mdi mdi-arrow-down-bold"></i>  -->
                                                <span class="text-nowrap">products in Store</span>
                                            </p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                            </div> <!-- end row -->
                        </div>

                        <div class="col-xl-6 col-lg-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card widget-flat text-white bg-info">
                                        <div class="card-body">
                                            <div class="float-end">
                                                <i class="mdi mdi-list-status"></i>
                                            </div>
                                            <h5 class=" fw-normal mt-0" title="Number of CUstomer">Sales</h5>
                                            <h3 class="display-4 fw-bolder"> <?php echo $sale; ?></h3>
                                            <p class="mb-0">
                                                <!-- <span class="text-dark me-2 fw-bold fs-4"></span> -->
                                                <span class="text-nowrap">Since last months</span>
                                            </p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->

                                <div class="col-sm-6">
                                    <div class="card widget-flat bg-warning text-white">
                                        <div class="card-body">
                                            <div class="float-end">
                                                <i class="mdi mdi-account-multiple"></i>
                                                <!-- <i class="uil-globe widget-icon text-primary"></i> -->
                                            </div>
                                            <h5 class=" fw-normal mt-0" title="Number of Sellers">Employees</h5>
                                            <h3 class="display-4 fw-bolder"> <?php echo $employee; ?></h3>
                                            <p class="mb-0">
                                                <!-- <span class="text-dark me-2 fw-bold fs-4"></span> -->
                                                <span class="text-nowrap">Since last months</span>
                                            </p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                            </div> <!-- end row -->
                        </div>

                        <!-- </div> end col -->


                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-8 col-lg-12 order-lg-2 order-xl-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h4 class="header-title">Products</h4>
                                        <a href="products.php" class="btn btn-sm btn-link">View all <i class="mdi mdi-arrow-right ms-1"></i></a>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap table-hover mb-0">
                                            <tbody>
                                                <?php

                                                // Getting all the Product details from the database
                                                $select = ("SELECT * FROM `product` LIMIT 5");
                                                $sql = mysqli_query($con, $select);
                                                $result = mysqli_num_rows($sql);
                                                if ($result > 0) {
                                                    # code...

                                                    # code...
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        // $id                 = $row['id'];
                                                        $name               = $row['name'];
                                                        $quantity           = $row['quantity'];
                                                        // $cost_price         = $row['cost_price'];
                                                        $total_amount       = $row['grand_total'];
                                                        // $discount           = $row['discount'];
                                                        // $purchased_price    = $row['purchased_price'];
                                                        $selling_price      = $row['selling_price'];
                                                        $added_date         = $row['added_date'];

                                                        echo '
                                                            <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">' . $name . '</h5>
                                                            <span class="text-muted font-13">' . $added_date . '</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">$' . $selling_price . '</h5>
                                                            <span class="text-muted font-13">Price</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">' . $quantity . '</h5>
                                                            <span class="text-muted font-13">Quantity</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">$' . $total_amount . '</h5>
                                                            <span class="text-muted font-13">Amount</span>
                                                        </td>
                                                    </tr>
                                                            ';
                                                    }
                                                }
                                                ?>
                                                <!-- <tr>
                                                    <td>
                                                        <h5 class="font-14 my-1 fw-normal">ASOS Ridley High Waist</h5>
                                                        <span class="text-muted font-13">07 April 2018</span>
                                                    </td>
                                                    <td>
                                                        <h5 class="font-14 my-1 fw-normal">$79.49</h5>
                                                        <span class="text-muted font-13">Price</span>
                                                    </td>
                                                    <td>
                                                        <h5 class="font-14 my-1 fw-normal">82</h5>
                                                        <span class="text-muted font-13">Quantity</span>
                                                    </td>
                                                    <td>
                                                        <h5 class="font-14 my-1 fw-normal">$6,518.18</h5>
                                                        <span class="text-muted font-13">Amount</span>
                                                    </td>
                                                </tr> -->

                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->



                        <div class="col-xl-4 col-lg-6 order-lg-1">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h4 class="header-title">Suppliers</h4>
                                    </div>
                                </div>

                                <div class="card-body py-0" data-simplebar style="max-height: 405px;">
                                    <div class="timeline-alt py-0">
                                        <?php
                                        // include('php-action/db_conn.php');

                                        $select = "SELECT * FROM `supplier` LIMIT 10";
                                        $sql = mysqli_query($con, $select);
                                        $result = mysqli_num_rows($sql);
                                        if ($result > 0) {
                                            # code...
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                // $id                 = $row['supplier_id'];
                                                $supplier               = $row['name'];
                                                // $phone              = $row['phone'];
                                                $email              = $row['email'];
                                                // $company            = $row['company'];
                                                $date               = $row['added_date'];

                                                echo '
                                                <div class="timeline-item">
                                            <i class="mdi mdi-account bg-info-lighten text-info timeline-icon"></i>
                                            <div class="timeline-item-info">
                                                <a href="javascript:void(0);" class="text-info fw-bold mb-1 d-block">' . $supplier . '</a>
                                                <small>' . $email . '</small>
                                                <p class="mb-0 pb-2">
                                                    <small class="text-muted">' . $date . '</small>
                                                </p>
                                            </div>
                                        </div>
                                                ';

                                                // <div class="timeline-item">
                                                //     <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                                                //     <div class="timeline-item-info">
                                                //         <a href="javascript:void(0);" class="text-info fw-bold mb-1 d-block">You sold an item</a>
                                                //         <small>Paul Burgess just purchased “Hyper - Admin Dashboard”!</small>
                                                //         <p class="mb-0 pb-2">
                                                //             <small class="text-muted">5 minutes ago</small>
                                                //         </p>
                                                //     </div>
                                                // </div>
                                            }
                                        }
                                        ?>


                                    </div>
                                    <!-- end timeline -->
                                </div> <!-- end slimscroll -->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- container -->
            </div>
            <!-- content -->

            <!-- Footer Start -->
            <?php include("sections/footer-detail.php"); ?>
            <!-- end Footer -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    <!-- HTML Footer Ending -->
    <?php include("sections/footer.php"); ?>