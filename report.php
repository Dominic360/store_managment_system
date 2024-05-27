<?php include("sections/header.php") ?>
<link rel="stylesheet" href="assets/css/custom/print.css">


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
            <?php include("sections/topbar.php") ?>
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
                                    <li class="breadcrumb-item active">Report</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Daily Report</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="card no-print">
                    <div class="card-body">
                        <form class="row g-3 px-3 pb-4 d-flex justify-content-between align-items-center mb-2" action="#" method="post">
                            <div class="col-12 col-lg-5 col-md-6 col-sm-12">
                                <label for="Module" class="form-label">Select Module</label>
                                <Select name="module" class="form-control">
                                    <option></option>
                                    <option>Sales</option>
                                    <option>Purchases</option>
                                </Select>
                            </div>
                            <div class="col-12 col-lg-5 col-md-6 col-sm-12">
                                <label for="date" class="form-label">Get Date</label>
                                <input type="text" class="form-control" value="<?php echo date("Y-m-j"); ?>" name="date">
                            </div>
                            <div class="col-12 col-lg-2 col-md-6 col-sm-12 mt-4 pt-2">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                        </form>


                    </div> <!-- end card-body-->
                </div>

                <div class="card">
                    <div class="card-body">
                        <a href="#" class="btn btn-primary mb-2 no-print" onclick="window.print();" id="print-btn">Print</a>

                        <?php
                        // session_start();
                        include('php-action/db_conn.php');

                        if (isset($_POST['submit'])) {
                            $module = $_POST['module'];
                            $date   = $_POST['date'];

                            if (empty($module)) {
                                $_SESSION['status'] = "Error";
                                $_SESSION['msg']    = "Module is required!";
                                $_SESSION['icon']   = "error";
                                // header("location: report.php");
                            } elseif (empty($date)) {
                                $_SESSION['status'] = "Error";
                                $_SESSION['msg']    = "Date is required!";
                                $_SESSION['icon']   = "error";
                                // header("Location: report.php");
                            } else {
                                if ($module == "Sales") {
                                    // echo $date;
                                    echo '<h1 class="text-center mt-3">Sales</h1>';
                                    echo '  <div class="table-responsive mt-2">
                                        <table class="table table-centered dt-responsive nowrap">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Product</th>
                                                    
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th>Customer</th>
                                                    <th>Phone No</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>';

                                    $product_select = ("SELECT * FROM `sales` WHERE `added_date` = '$date'");
                                    $select_sql = mysqli_query($con, $product_select);
                                    $select_result = mysqli_num_rows($select_sql);
                                    if ($select_result > 0) {
                                        # code...
                                        while ($row = mysqli_fetch_assoc($select_sql)) {
                                            $product_id                 = $row['id'];
                                            $product_name               = $row['product_name'];
                                            $product_selling_price      = $row['selling_price'];
                                            $quantity_sold              = $row['quantity_sold'];
                                            $total_amount               = $row['total_amount'];
                                            $customer_name              = $row['customer_name'];
                                            $customer_phone             = $row['customer_phone'];
                                            $product_added_date         = $row['added_date'];


                                            echo '
                                                    <tbody>
                                                                <tr>
                                                                </td>
                                                            <td>
                                                                <h3 class="m-0 d-inline-block align-middle font-16">
                                                                ' . $product_name . '
                                                                </h3>
                                                            </td>
                                                            <td>
                                                                $' . $product_selling_price . '
                                                            </td>
                                                            
                                                            <td>
                                                                ' . $quantity_sold . '
                                                            </td>
                                                            <td>
                                                                $' . $total_amount . '
                                                            </td>
                                                            <td>
                                                            ' . $customer_name . '
                                                            </td>
                                                            <td>
                                                            ' . $customer_phone . '
                                                            </td>   
                                                            <td>
                                                                ' . $product_added_date . '
                                                            </td></tr>
                                                                    
                                                    </tbody>
                                                    
                                                    ';
                                        }
                                    } else {
                                        echo '<p class="text-center">No Records to Display</p>';
                                    }
                                    echo '   </table>
                                        </div>';
                                } elseif ($module == "Purchases") {
                                    echo '<h1 class="text-center mt-3">Purchases</h1>';
                                    echo '<div class="table-responsive mt-2">
                                        <table class="table table-centered table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                
                                                <!-- <th>ID</th> -->
                                                <th class="all">Product</th>
                                                <th>Quantity</th>
                                                <th title="Price per product">Price</th>
                                                <th>Total</th>
                                                <th>Discount</th>
                                                <th>Purchased</th>
                                                <th>Selling Price</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

                                    $select = ("SELECT * FROM `purchase` WHERE `added_date` = '$date'");
                                    $sql = mysqli_query($con, $select);
                                    $result = mysqli_num_rows($sql);
                                    if ($result > 0) {
                                        # code...
                                        while ($row = mysqli_fetch_assoc($sql)) {
                                            $id                 = $row['id'];
                                            $name               = $row['name'];
                                            $quantity           = $row['quantity'];
                                            $cost_price         = $row['cost_price'];
                                            $total_amount       = $row['total_amount'];
                                            $discount           = $row['discount'];
                                            $purchased_price    = $row['purchased_price'];
                                            $selling_price      = $row['selling_price'];
                                            $added_date         = $row['added_date'];


                                            echo '
                                                    <tr>
                                                    
                                                    <td>' . $name . '</td>
                                                    <td>' . $quantity . '</td>
                                                    <td>$' . $cost_price . '</td>
                                                    <td>$' . $total_amount . '</td>
                                                    <td>' . $discount . '%</td>
                                                    <td>$' . $purchased_price . '</td>
                                                    <td>$' . $selling_price . '</td>
                                                    <td>' . $added_date . "</td></tr>
                                                    
                                                    ";
                                        }
                                    }
                                    // else {
                                    //     echo '
                                    //         <div class="p-5 text-center">No Records</div>
                                    //         ';
                                    // }

                                    echo '  </tbody>
                                            </table>
                                        </div>';
                                }
                            }
                        }
                        ?>

                    </div> <!-- end card-body-->
                </div>

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


<?php include("sections/footer.php") ?>