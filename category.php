<?php include("sections/header.php") ?>

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
                                    <li class="breadcrumb-item active">Categories</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Categories</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-xl-8">
                                        <form class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                            <!-- <div class="col-auto">
                                                <label for="inputPassword2" class="visually-hidden">Search</label>
                                                <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                            </div> -->
                                            <!-- <div class="col-auto">
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
                                            </div> -->
                                        </form>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="row justify-content-end text-xl-end mt-xl-0 mt-2">
                                            <!-- <button type="button" class="btn btn-danger mb-2 me-2"><i class="mdi mdi-basket me-1"></i> Add New Order</button> -->

                                            <div class="col-8">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    <i class="mdi mdi-basket me-1"></i>
                                                    Add New Category
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg shadow">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary text-light">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Add New Category</h5>
                                                                <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="row g-3 px-3 pb-4" action="php-action/category_action.php" method="POST">
                                                                    <div class="col-md-6">
                                                                        <label for="Category" class="form-label">Category<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" id="category" placeholder="Category" name="category">
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
                                                            <!-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Understood</button>
                                                </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-4 ">
                                                <button type="button" class="btn btn-light mb-2">Export</button>

                                            </div> -->
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Category</th>
                                                <th>Added Date</th>
                                                <th style="width: 125px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $select = ("SELECT * FROM `category` WHERE 1");
                                            $sql = mysqli_query($con, $select);
                                            $result = mysqli_num_rows($sql);
                                            if($result > 0) {
                                                # code...
                                                while($row = mysqli_fetch_assoc($sql)){
                                                    $id                 = $row['id'];
                                                    $category              = $row['category'];
                                                    $date               = $row['added_date'];


                                                    echo "
                                                    <tr>
                                                    <td>$id</td>
                                                    <td>$category</td>
                                                    <td>$date</td>" .
                                                        '<td>
                                                    <button class="btn btn-primary" title="Update"><a href="category_update.php?updateid=' . $id . '" class="text-light text-decoration-none"><i class="mdi mdi-square-edit-outline"></i></a></button>
                                                    <button class="btn btn-danger" title="Delete"><a href="php-action/category_delete.php?deleteid=' . $id  . '" class="action-icon fs-6 text-light text-decoration-none" data-toggle="tooltip" data-placement="top" title="Delete Product"><i class="mdi mdi-delete"></i></a></button>
                                                        </td>'
                                                        . "</tr>";
                                                } 
                                                }else {
                                                    echo '
                                                    <tr class="p-5 text-center">No Records</tr>
                                                    ';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
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