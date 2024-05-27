<?php include("sections/header.php") ?>


<?php
// session_start();
include('php-action/db_conn.php');

$id = $_GET['updateid'];

if (isset($_POST['submit'])) {
    $category = $_POST['category'];
    $date  = $_POST['date'];

    $update = "UPDATE `category` SET category='$category',added_date='$date' WHERE id = $id";
    $sql = mysqli_query($con, $update);

    if ($sql) {
        // Success msg
        $_SESSION['status'] = "Success";
        $_SESSION['msg']    = "Record Has Been Updated Successfully.";
        $_SESSION['icon']   = "success";

        header("location: category.php");
    } else {
        // Error msg..
        $_SESSION['status'] = "Error";
        $_SESSION['msg']    = "Updating Failed.";
        $_SESSION['icon']   = "error";

        header("location: category.php");
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
                                    <li class="breadcrumb-item"><a href="category.php">Category</a></li>
                                    <li class="breadcrumb-item active">Category Update</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Category</h4>
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
                                            $select = ("SELECT * FROM `category` WHERE id = $id");
                                            $sql = mysqli_query($con, $select);

                                            $row = mysqli_fetch_assoc($sql);
                                            $current_category    = $row['category'];

                                            ?>
                                            <form class="row g-3 px-3 pb-4" method="POST">
                                                <div class="col-md-6">
                                                    <label for="category" class="form-label">category <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="category" placeholder="category" name="category" value="<?php echo $current_category; ?>">
                                                </div>
                                                <div class="col-md-6">
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