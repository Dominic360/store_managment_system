<?php include("sections/header.php") ?>


<?php
// session_start();
include('php-action/db_conn.php');

$_SESSION['purchaseid'] = "";
// $_SESSION['status_value'] = "";

$id = $_GET['purchaseid'];

$_SESSION['purchaseid'] = $id;
// $_SESSION['status_value'] = "<script>parseInt(document.getElementById('pstatus').value)</script>";

// The Script that check if product record has been inserted before using the record or product ID....
if ($id) {
    $check_productid = "SELECT * FROM `product` WHERE id = $id";
    $check_sql = mysqli_query($con, $check_productid);
    $check_result = mysqli_num_rows($check_sql);

    if ($check_result > 0) {
        // Error msg..
        $_SESSION['status'] = "Error";
        $_SESSION['msg']    = "Record already exist.";
        $_SESSION['icon']   = "error";

        header("location: products.php");
    }
}


// The Script that get all records from the PURCHASE TABLE and Assign them to a variable each...
$purchase_select = ("SELECT * FROM `purchase` WHERE id = '$id'");
$purchase_sql = mysqli_query($con, $purchase_select);
$purchase_result = mysqli_num_rows($purchase_sql);
if ($purchase_result > 0) {
    # code...
    while ($row = mysqli_fetch_assoc($purchase_sql)) {
        $purchase_id                 = $row['id'];
        $purchase_name               = $row['name'];
        $purchase_quantity           = $row['quantity'];
        $purchase_cost_price         = $row['cost_price'];
        // $purchase_total_amount       = $row['total_amount'];
        $purchase_discount           = $row['discount'];
        $purchase_purchased_price    = $row['purchased_price'];
        $purchase_selling_price      = $row['selling_price'];
        // $added_date         = $row['added_date'];
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
                                    <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                                    <li class="breadcrumb-item active">Inserting Product Info</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Inserting "<?php echo $purchase_name; ?>"</h4>
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

                                            <form class="row g-3 px-3 pb-4" action="php-action/new_product_action.php" method="POST">
                                                <div class="col-md-6">
                                                    <label for="product_name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="product_name" placeholder="Product Name" name="product_name" value="<?php echo $purchase_name; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="brand" class="form-label">Brand</label>
                                                    <select class="form-select" id="brand" name="brand">
                                                        <option selected>Choose...</option>
                                                        <?php
                                                        $brand_select = ("SELECT * FROM `brand` ORDER by id DESC");
                                                        $brand_sql = mysqli_query($con, $brand_select);
                                                        $brand_result = mysqli_num_rows($brand_sql);
                                                        if ($brand_result > 0) {
                                                            # code...
                                                            while ($brand_row = mysqli_fetch_assoc($brand_sql)) {
                                                                // $brand_id      = $brand_row['id'];
                                                                $brand         = $brand_row['brand'];

                                                                echo "<option>" . $brand . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="category" class="form-label">Category</label>
                                                    <select class="form-select" id="category" name="category">
                                                        <option selected>Choose...</option>
                                                        <?php
                                                        $category_select = ("SELECT * FROM `category` ORDER by id DESC");
                                                        $category_sql = mysqli_query($con, $category_select);
                                                        $category_result = mysqli_num_rows($category_sql);
                                                        if ($category_result > 0) {
                                                            # code...
                                                            while ($category_row = mysqli_fetch_assoc($category_sql)) {
                                                                // $category_id    = $category_row['id'];
                                                                $category       = $category_row['category'];

                                                                echo "<option>" . $category . "</option>";
                                                            }
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="purchased_price" class="form-label">Purchased Price <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="purchased_price" placeholder="Total Amount" name="purchased_price" readonly value="<?php echo $purchase_purchased_price; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="quantity" class="form-label">Quantity <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" value="<?php echo $purchase_quantity; ?>" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-select" id="pstatus" name="status">
                                                        <!-- <option selected>Choose...</option> -->
                                                        <option value="active">Active</option>
                                                        <option value="deactive">Deactive</option>
                                                    </select>
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="pstatus" placeholder="Status" name="status">
                                                </div> -->
                                                <!-- <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Purchased Price <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="purchased_price" placeholder="Purchased Price" name="purchased_price" readonly value="">
                                                </div> -->
                                                <div class="col-6">
                                                    <label for="inputAddress" class="form-label">Cost Price <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="cost_price" placeholder="Cost Price" name="cost_price" readonly value="<?php echo $purchase_cost_price; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Selling Price <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="selling_price" placeholder="Selling Price" name="selling_price" readonly value="<?php echo $purchase_selling_price; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="supplier" class="form-label">Supplier</label>
                                                    <select class="form-select" id="supplier" name="supplier">
                                                        <option selected>Choose...</option>
                                                        <?php
                                                        $supplier_select = ("SELECT * FROM `supplier` ORDER by supplier_id DESC");
                                                        $supplier_sql = mysqli_query($con, $supplier_select);
                                                        $supplier_result = mysqli_num_rows($supplier_sql);
                                                        if ($supplier_result > 0) {
                                                            # code...
                                                            while ($supplier_row = mysqli_fetch_assoc($supplier_sql)) {
                                                                $supplier_id    = $supplier_row['supplier_id'];
                                                                $supplier       = $supplier_row['name'];

                                                                echo "<option value=" . $supplier_id . ">" . $supplier . "</option>";
                                                            }
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Added Date</label>
                                                    <input type="text" class="form-control" id="added_date" placeholder="Added Date" name="added_date" value="<?php echo date("Y-m-j"); ?>" readonly>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="inputCity" class="form-label">Description <span class="text-danger">*</span></label>
                                                    <textarea id="description" class="form-control" rows="8" placeholder="Description" name="description"></textarea>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded w-50 shadow-sm mx-auto d-block"></div>

                                                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                                        <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0" name="ProductImage">
                                                        <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                                                        <div class="input-group-append">
                                                            <label for="upload" class="btn btn-secondary m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-light"></i><small class="text-uppercase font-weight-bold text-light">Choose file</small></label>
                                                        </div>
                                                    </div>
                                                    <!-- Uploaded image area-->
                                                    <!-- <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p> -->
                                                </div>
                                                <!-- <div class="col-md-6">
                                                                        <label for="inputState" class="form-label">State</label>
                                                                        <select id="inputState" class="form-select">
                                                                            <option selected>Choose...</option>
                                                                            <option>...</option>
                                                                        </select>
                                                                    </div> -->
                                                <div class="col-12">
                                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                                </div>
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