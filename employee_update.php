<?php include("sections/header.php") ?>


<?php
// session_start();
include('php-action/db_conn.php');

$id = $_GET['updateid'];

if (isset($_POST['submit'])) {
    $emp_img            = $_POST['emp_img'];
    $name               = $_POST['name'];
    $email              = $_POST['email'];
    $address            = $_POST['address'];
    $salary             = $_POST['salary'];
    $store_code         = $_POST['store_code'];
    $added_date         = $_POST['added_date'];

    // Form Validation
    if (empty($name)) {
        $_SESSION['status'] = "Error";
        $_SESSION['msg'] = "Employee Name is required";
        $_SESSION['icon'] = "error";
        header('location: employee.php');
    } elseif (empty($emp_img)) {
        $_SESSION['status'] = "Error";
        $_SESSION['msg'] = "Employee Image is required";
        $_SESSION['icon'] = "error";
        header('location: employee.php');
    } elseif (empty($email)) {
        $_SESSION['status'] = "Error";
        $_SESSION['msg'] = "Email is required";
        $_SESSION['icon'] = "error";
        header('location: employee.php');
    } elseif (empty($address)) {
        $_SESSION['status'] = "Error";
        $_SESSION['msg'] = "Employee's Address is required";
        $_SESSION['icon'] = "error";
        header('location: employee.php');
    } elseif ($store_code == "Choose...") {
        $_SESSION['status'] = "Error";
        $_SESSION['msg'] = "Store is required";
        $_SESSION['icon'] = "error";
        header('location: employee.php');
    } elseif (empty($salary)) {
        $_SESSION['status'] = "Error";
        $_SESSION['msg'] = "Salary amount is required";
        $_SESSION['icon'] = "error";
        header('location: employee.php');
    } elseif (empty($added_date)) {
        $_SESSION['status'] = "Error";
        $_SESSION['msg'] = "Added Date is required";
        $_SESSION['icon'] = "error";
        header('location: employee.php');
    } else {
        $update = "UPDATE `employee` SET `emp_img`='$emp_img',`name`='$name',`email`='$email',`address`='$address',`store_code`='$store_code',`salary`='$salary',`added_date`='$added_date' WHERE id = $id";
        $sql = mysqli_query($con, $update);

        if ($sql) {
            // Success msg
            $_SESSION['status'] = "Success";
            $_SESSION['msg']    = "Record Has Been Updated Successfully.";
            $_SESSION['icon']   = "success";

            header("location: employee.php");
        } else {
            // Error msg..
            $_SESSION['status'] = "Error";
            $_SESSION['msg']    = "Updating Failed.";
            $_SESSION['icon']   = "error";

            header("location: employee.php");
        }
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
                                    <li class="breadcrumb-item"><a href="employee.php">Employee</a></li>
                                    <li class="breadcrumb-item active">Employee Update</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Employee</h4>
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
                                            $select = ("SELECT * FROM `employee` WHERE id = $id");
                                            $select_sql = mysqli_query($con, $select);
                                            $row = mysqli_fetch_assoc($select_sql);
                                            // $id                 = $row['id'];
                                            $emp_image              = $row['emp_img'];
                                            $emp_name               = $row['name'];
                                            $emp_email              = $row['email'];
                                            $emp_address            = $row['address'];
                                            $emp_salary             = $row['salary'];
                                            $emp_store_code         = $row['store_code'];

                                            ?>
                                            <form class="row g-3 px-3 pb-4" method="POST">
                                                <div class="col-md-6">
                                                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" value="<?php echo $emp_name ?>">
                                                </div>
                                                <div class="col-6">
                                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $emp_email ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="<?php echo $emp_address ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="salary" class="form-label">Salary <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="salary" placeholder="Salary" name="salary" value="<?php echo $emp_salary ?>">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="store" class="form-label">Store Branch</label>
                                                    <select class="form-select" id="store" name="store_code">
                                                        <option selected>Choose...</option>
                                                        <?php
                                                        $store_select = ("SELECT * FROM `store` ORDER by id DESC");
                                                        $store_sql = mysqli_query($con, $store_select);
                                                        $store_result = mysqli_num_rows($store_sql);
                                                        if ($store_result > 0) {
                                                            # code...
                                                            while ($store_row = mysqli_fetch_assoc($store_sql)) {
                                                                $store       = $store_row['store_branch'];
                                                                $store_code   = $store_row['store_code'];

                                                                echo "<option value=" . $store_code . ">" . $store . "</option>";
                                                            }
                                                        }
                                                        ?>

                                                    </select>
                                                </div>



                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Added Date</label>
                                                    <input type="text" class="form-control" id="added_date" placeholder="Added Date" name="added_date" value="<?php echo date("Y-m-j"); ?>" readonly>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="image-area mt-4"><img id="imageResult" src="assets/images/users/<?php echo $emp_image ?>" alt="" class="img-fluid rounded w-50 shadow-sm mx-auto d-block"></div>

                                                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                                        <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0" name="emp_img" value="<?php echo $emp_image ?>">
                                                        <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file <?php echo $emp_image ?></label>
                                                        <div class="input-group-append">
                                                            <label for="upload" class="btn btn-secondary m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-light"></i><small class="text-uppercase font-weight-bold text-light">Choose file</small></label>
                                                        </div>
                                                    </div>
                                                    <!-- Uploaded image area-->
                                                    <!-- <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p> -->
                                                </div>

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