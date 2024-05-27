<?php include("sections/header.php") ?>

<?php
session_start();
include('php-action/db_conn.php');

$id = $_GET['salesid'];

$_SESSION['productid'] = "";

$_SESSION['productid'] = $id;

// The Script that check if product record has been inserted before using the record or product ID....
if ($id) {
    $check_productid = "SELECT * FROM `sales` WHERE `id` = '$id'";
    $check_sql = mysqli_query($con, $check_productid);
    $check_result = mysqli_num_rows($check_sql);

    if ($check_result > 0) {
        header("location: sales.php");

        // Error msg..
        $_SESSION['status'] = "Error";
        $_SESSION['msg']    = "Record already exist.";
        $_SESSION['icon']   = "error";

    }
}



// The Script that get all records from the Product TABLE and Assign them to a variable each...
$product_select = ("SELECT * FROM `product` WHERE id = '$id'");
$product_sql = mysqli_query($con, $product_select);
$product_result = mysqli_num_rows($product_sql);
if ($product_result > 0) {
    # code...
    while ($row = mysqli_fetch_assoc($product_sql)) {
        // $product_id                 = $row['id'];
        $product_name               = $row['name'];
        $product_selling_price      = $row['selling_price'];
        $current_quantity           = $row['quantity'];
    }
}




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
                                    <li class="breadcrumb-item active">Add New Sale</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Add Sales</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                

                                <div class="col-xl-10">
                                    <div class=" text-xl-start mt-xl-0 mt-2">
                                        <form class="row g-3 px-3 pb-4" action="php-action/new_sales_action.php" method="POST">
                                            <div class="col-md-6">
                                                <label for="product_name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="product_name" placeholder="Product Name" name="product_name" value="<?php echo $product_name ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputPassword4" class="form-label">Current Quantity <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" readonly value="<?php echo $current_quantity ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputPassword4" class="form-label">Quantity <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputZip" class="form-label">Selling Price <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="selling_price" placeholder="Selling Price" name="selling_price" value="<?php echo $product_selling_price ?>" readonly>
                                            </div>
                                            <div class="col-6">
                                                <label for="inputAddress2" class="form-label">Total Amount <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="total_amount" placeholder="Total Amount" name="total_amount" readonly onclick="totalAmount()">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="customer_name" class="form-label">Customer Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="customer_name" placeholder="Customer Name" name="customer_name">
                                            </div>
                                            <div class="col-6">
                                                <label for="phone" class="form-label">Phone NO. <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="phone" placeholder="Customer Phone NO." name="phone">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputZip" class="form-label">Added Date</label>
                                                <input type="text" class="form-control" id="added_date" placeholder="Added Date" name="added_date" value="<?php echo date("Y-m-j"); ?>" readonly>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                            </div>


                                            <!-- JAVASCRIPT functional scripting ---------->
                                            <script>
                                                // Solve for Total Amount
                                                function totalAmount() {
                                                    const num1 = parseInt(document.getElementById('quantity').value);
                                                    const num2 = parseInt(document.getElementById('selling_price').value);
                                                    const result = document.getElementById('total_amount');

                                                    if (num1 && num2 !== NaN) {
                                                        return result.value = num1 * num2;
                                                    }
                                                }
                                            </script>


                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

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


<?php include("sections/footer.php"); ?>