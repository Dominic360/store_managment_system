<?php include("sections/header.php") ?>


<?php
// session_start();
include('php-action/db_conn.php');

$id = $_GET['updateid'];

if (isset($_POST['submit'])) {
    $store          = $_POST['store'];
    $store_code     = $_POST['store_code'];
    $date           = $_POST['date'];

    $update = "UPDATE `store` SET store_branch='$store', store_code = '$store_code', added_date='$date' WHERE id = $id";
    $sql = mysqli_query($con, $update);

    if ($sql) {
        // Success msg
        $_SESSION['status'] = "Success";
        $_SESSION['msg']    = "Record Has Been Updated Successfully.";
        $_SESSION['icon']   = "success";

        header("location: store.php");
    } else {
        // Error msg..
        $_SESSION['status'] = "Error";
        $_SESSION['msg']    = "Updating Failed.";
        $_SESSION['icon']   = "error";

        header("location: store.php");
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
                                    <li class="breadcrumb-item"><a href="store.php">Store Branches</a></li>
                                    <li class="breadcrumb-item active">Store Branches Update</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Store Branches Update</h4>
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
                                            $select = ("SELECT * FROM `store` WHERE id = $id");
                                            $sql = mysqli_query($con, $select);
                                            $result = mysqli_num_rows($sql);
                                            $row = mysqli_fetch_assoc($sql);
                                            $current_store    = $row['store_branch'];
                                            $current_store_code    = $row['store_code'];

                                            ?>
                                            <form class="row g-3 px-3 pb-4" method="POST">
                                                <div class="col-md-12">
                                                    <label for="store" class="form-label">Store Branch <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="store" placeholder="Store Branch" name="store" value="<?php echo $current_store; ?>">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="store_code" class="form-label">Store Code <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="store_code" placeholder="Store Code" name="store_code" value="<?php echo $current_store_code; ?>">
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <label for="no_of_emp" class="form-label">Number of Employee <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="no_of_emp" placeholder="Number of Employee" name="no_of_emp">
                                                </div> -->
                                                <div class="col-md-12">
                                                    <label for="date" class="form-label">Added Date</label>
                                                    <input type="text" class="form-control" id="added_date" placeholder="Added Date" name="date" value="<?php echo date("Y-m-j"); ?>" readonly>
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