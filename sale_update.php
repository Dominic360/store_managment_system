<?php include("sections/header.php") ?>

<?php
// session_start();
include('php-action/db_conn.php');

$id = $_GET['updateid'];

if (isset($_POST['submit'])) {
    $product_name               = $_POST['product_name'];
    $selling_price              = $_POST['selling_price'];
    $quantity            = $_POST['quantity'];
    $total_amount             = $_POST['total_amount'];
    $customer_name              = $_POST['customer_name'];
    $phone              = $_POST['phone'];
    $added_date         = $_POST['added_date'];
    $user           = $_SESSION['user_id'];

    // Form Validation
    if (empty($product_name)) {
        $_SESSION['status'] = "Error";
        $_SESSION['msg'] = "Product Name is required";
        $_SESSION['icon'] = "error";
        header('location: sales.php');
    } elseif (empty($selling_price)) {
        $_SESSION['status'] = "Error";
        $_SESSION['msg'] = "Selling Price is required";
        $_SESSION['icon'] = "error";
        header('location: sales.php');
    } elseif (empty($quantity)) {
        $_SESSION['status'] = "Error";
        $_SESSION['msg'] = "Quantity is required";
        $_SESSION['icon'] = "error";
        header('location: sales.php');
    } elseif (empty($total_amount)) {
        $_SESSION['status'] = "Error";
        $_SESSION['msg'] = "Total Amount is required";
        $_SESSION['icon'] = "error";
        header('location: sales.php');
    } elseif (empty($customer_name)) {
        $_SESSION['status'] = "Error";
        $_SESSION['msg'] = "Customer Name is required";
        $_SESSION['icon'] = "error";
        header('location: sales.php');
    } elseif (empty($phone)) {
        $_SESSION['status'] = "Error";
        $_SESSION['msg'] = "Customer's Phone Number is required";
        $_SESSION['icon'] = "error";
        header('location: sales.php');
    } elseif (empty($added_date)) {
        $_SESSION['status'] = "Error";
        $_SESSION['msg'] = "Added Date is required";
        $_SESSION['icon'] = "error";
        header('location: sales.php');
    } else {
        $update = "UPDATE `sales` SET `product_name`='$product_name',`selling_price`='$selling_price',`quantity_sold`='$quantity',`total_amount`='$total_amount',`customer_name`='$customer_name',`customer_phone`='$phone',`added_date`='$added_date',`user_id`='$user' WHERE `id` = '$id';";
        $sql = mysqli_query($con, $update);

        if ($sql) {
            // Success msg
            $_SESSION['status'] = "Success";
            $_SESSION['msg']    = "Record Has Been Updated Successfully.";
            $_SESSION['icon']   = "success";

            header("location: sales.php");
        } else {
            // Error msg..
            $_SESSION['status'] = "Error";
            $_SESSION['msg']    = "Updating Failed.";
            $_SESSION['icon']   = "error";

            header("location: sales.php");
        }
    }
}


// The Script that get all records from the PURCHASE TABLE and Assign them to a variable each...
$select = ("SELECT * FROM `sales` WHERE id = '$id'");
$select_sql = mysqli_query($con, $select);
$select_result = mysqli_num_rows($select_sql);
if ($select_result > 0) {
    # code...
    while ($row = mysqli_fetch_assoc($select_sql)) {
        $sale_product_name             = $row['product_name'];
        $product_selling_price    = $row['selling_price'];
        $sale_quantity            = $row['quantity_sold'];
        $sale_total_amount             = $row['total_amount'];
        $sale_customer_name            = $row['customer_name'];
        $sale_phone                    = $row['customer_phone'];
        // $user           = $_SESSION['user_id'];
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
                            <h4 class="page-title">Add Sales <?php echo $id ?></h4>
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
                                        <!-- Form for sales update -->
                                        <form class="row g-3 px-3 pb-4" method="POST">
                                            <div class="col-md-6">
                                                <label for="product_name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="product_name" placeholder="Product Name" name="product_name" value="<?php echo $sale_product_name ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputPassword4" class="form-label">Quantity <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" value="<?php echo $sale_quantity ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputZip" class="form-label">Selling Price <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="selling_price" placeholder="Selling Price" name="selling_price" value="<?php echo $product_selling_price ?>" readonly>
                                            </div>
                                            <div class="col-6">
                                                <label for="inputAddress2" class="form-label">Total Amount <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="total_amount" placeholder="Total Amount" name="total_amount" readonly onclick="totalAmount()"  value="<?php echo $sale_total_amount ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="customer_name" class="form-label">Customer Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="customer_name" placeholder="Customer Name" name="customer_name" value="<?php echo $sale_customer_name ?>">
                                            </div>
                                            <div class="col-6">
                                                <label for="phone" class="form-label">Phone NO. <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="phone" placeholder="Customer Phone NO." name="phone" value="<?php echo $sale_phone ?>">
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


<?php include("sections/footer.php") ?>