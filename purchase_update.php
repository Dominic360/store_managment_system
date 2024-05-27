<?php include("sections/header.php") ?>


<?php
// session_start();
include('php-action/db_conn.php');

$id = $_GET['updateid'];

if (isset($_POST['submit'])) {
    $product_name       = $_POST['product_name'];
    $quantity           = $_POST['quantity'];
    $cost_price         = $_POST['cost_price'];
    $total_amount       = $_POST['total_amount'];
    $discount           = $_POST['discount'];
    $purchased_price    = $_POST['purchased_price'];
    $selling_price      = $_POST['selling_price'];
    $added_date         = $_POST['added_date'];

    $update = "UPDATE `purchase` SET `name`='$product_name',`quantity`='$quantity',`cost_price`='$cost_price',`total_amount`='$total_amount',`discount`='$discount',`purchased_price`='$purchased_price',`selling_price`='$selling_price',`added_date`='$added_date' WHERE `id` = $id";
    $sql = mysqli_query($con, $update);

    if ($sql) {
        // Success msg
        $_SESSION['status'] = "Success";
        $_SESSION['msg']    = "Record Has Been Updated Successfully.";
        $_SESSION['icon']   = "success";

        header("location: purchase.php");
    } else {
        // Error msg..
        $_SESSION['status'] = "Error";
        $_SESSION['msg']    = "Updating Failed.";
        $_SESSION['icon']   = "error";

        header("location: purchase.php");
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
                                    <li class="breadcrumb-item"><a href="purchase.php">Purchases</a></li>
                                    <li class="breadcrumb-item active">Purchases Update</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Purchases Update</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <!-- <div class="col-xl-8">
                                        <form class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                            <div class="col-auto">
                                                <label for="inputPassword2" class="visually-hidden">Search</label>
                                                <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                            </div>
                                            <div class="col-auto">
                                                <div class="d-flex align-items-center">
                                                    <label for="status-select" class="me-2">Status</label>
                                                    <select class="form-select" id="status-select">
                                                        <option selected>Choose...</option>
                                                        <option value="1">Paid</option>
                                                        <option value="2">Awaiting Authorization</option>
                                                        <option value="3">Payment failed</option>
                                                        <option value="4">Cash On Delivery</option>
                                                        <option value="5">Fulfilled</option>
                                                        <option value="6">Unfulfilled</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div> -->
                                    <div class="col-xl-10">
                                        <div class=" text-xl-start mt-xl-0 mt-2">
                                            <?php
                                            $select = ("SELECT * FROM `purchase` WHERE `id` = $id");
                                            $sql = mysqli_query($con, $select);
                                            $row = mysqli_fetch_assoc($sql);
                                            // $current_id                 = $row['id'];
                                            $current_name               = $row['name'];
                                            $current_quantity           = $row['quantity'];
                                            $current_cost_price         = $row['cost_price'];
                                            $current_total_amount       = $row['total_amount'];
                                            $current_discount           = $row['discount'];
                                            $current_purchased_price    = $row['purchased_price'];
                                            $current_selling_price      = $row['selling_price'];
                                            // $current_added_date         = $row['added_date'];

                                            ?>
                                            <form class="row g-3 px-3 pb-4" method="POST">
                                                <div class="col-md-6">
                                                    <label for="product_name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="product_name" placeholder="Product Name" name="product_name" value="<?php echo $current_name; ?>">
                                                </div>
                                                <div class="col-6">
                                                    <label for="inputAddress2" class="form-label">Total Amount <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="total_amount" placeholder="Total Amount" name="total_amount" readonly onclick="totalAmount()" value="<?php echo $current_total_amount; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputPassword4" class="form-label">Quantity <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" value="<?php echo $current_quantity; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Purchased Price <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="purchased_price" placeholder="Purchased Price" name="purchased_price" readonly onclick="purchasedPrice()" value="<?php echo $current_purchased_price; ?>">
                                                </div>
                                                <div class="col-6">
                                                    <label for="inputAddress" class="form-label">Cost Price <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="cost_price" placeholder="Cost Price" name="cost_price" value="<?php echo $current_cost_price; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Selling Price <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="selling_price" placeholder="Selling Price" name="selling_price" readonly onclick="sellingPrice()" value="<?php echo $current_selling_price; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputCity" class="form-label">Discount (percentage) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="discount" placeholder="Discount (percentage)" name="discount" value="<?php echo $current_discount; ?>">
                                                </div>
                                                <!-- <div class="col-md-6">
                                                                        <label for="inputState" class="form-label">State</label>
                                                                        <select id="inputState" class="form-select">
                                                                            <option selected>Choose...</option>
                                                                            <option>...</option>
                                                                        </select>
                                                                    </div> -->


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
                                                        const num2 = parseInt(document.getElementById('cost_price').value);
                                                        const result = document.getElementById('total_amount');

                                                        if (num1 && num2 !== NaN) {
                                                            return result.value = num1 * num2;
                                                        }
                                                    }

                                                    // Calculate DISCOUNT
                                                    function discount() {
                                                        const totalAmount = parseInt(document.getElementById('total_amount').value);
                                                        const discount = parseInt(document.getElementById('discount').value);

                                                        return (discount / 100) * totalAmount;
                                                    }

                                                    // Solve for PURCHASED PRICE
                                                    function purchasedPrice() {
                                                        const totalAmount = parseInt(document.getElementById('total_amount').value);
                                                        const result = document.getElementById('purchased_price');

                                                        if (totalAmount && discount !== NaN) {
                                                            const discountNum = discount();

                                                            return result.value = totalAmount - discountNum;
                                                        }

                                                    }

                                                    // Solve for SELLING PRICE
                                                    function sellingPrice() {
                                                        const price = parseInt(document.getElementById('cost_price').value);
                                                        const quantity = parseInt(document.getElementById('quantity').value);
                                                        const sellingPrice = document.getElementById('selling_price');
                                                        const mackup_price = 2;

                                                        if (price && quantity !== NaN) {
                                                            discount = discount();
                                                            const solution = price + (discount / quantity) + 2;

                                                            return sellingPrice.value = solution;
                                                        }
                                                    }
                                                </script>


                                            </form>
                                        </div>
                                    </div><!-- end col-->
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