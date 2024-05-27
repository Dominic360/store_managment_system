<?php
include("sections/header.php");
include("php-action/db_conn.php");
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
                                    <li class="breadcrumb-item active">Employee</li>
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
                                    <div class="col-sm-5">

                                        <!-- Button trigger modal -->
                                        <button class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="mdi mdi-plus-circle me-2"></i> Add New Employee </button>

                                        <!-- Modal -->

                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg shadow">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary text-light">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Add New Employee</h5>
                                                        <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">


                                                        <form class="row g-3 px-3 pb-4" action="php-action/employee_action.php" method="POST">
                                                            <div class="col-md-6">
                                                                <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="name" placeholder="Full Name" name="name">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="Email" class="form-label">Email <span class="text-danger">*</span></label>
                                                                <input type="email" class="form-control" id="myEmail" placeholder="Email" name="email">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="address" placeholder="Address" name="address">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="salary" class="form-label">Salary <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="salary" placeholder="Salary" name="salary">
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
                                                                <div class="image-area mt-4"><img id="imageResult" src="assets/images/products/<?php echo $product_image ?>" alt="" class="img-fluid rounded w-50 shadow-sm mx-auto d-block"></div>

                                                                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                                                    <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0" name="emp_img" value="<?php echo $product_image ?>">
                                                                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
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
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-7">
                                        <div class="text-sm-end">
                                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                            <button type="button" class="btn btn-light mb-2">Export</button>
                                        </div>
                                    </div> -->
                                    <!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 20px;">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>Employee</th>
                                                <!-- <th>Number of Products</th> -->
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Salary</th>
                                                <!-- <th>Position</th> -->
                                                <th>Store Branch</th>
                                                <th>Create Date</th>
                                                <th style="width: 75px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $select = ("SELECT * FROM `employee` Where 1");
                                            $select_sql = mysqli_query($con, $select);
                                            $select_result = mysqli_num_rows($select_sql);
                                            if ($select_result > 0) {
                                                # code...
                                                while ($row = mysqli_fetch_assoc($select_sql)) {
                                                    $id                 = $row['id'];
                                                    $emp_img            = $row['emp_img'];
                                                    $name               = $row['name'];
                                                    $email              = $row['email'];
                                                    $address            = $row['address'];
                                                    $salary             = $row['salary'];
                                                    $store_code         = $row['store_code'];
                                                    $added_date         = $row['added_date'];


                                                    echo '
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="table-user">
                                                            <img src="assets/images/users/' . $emp_img . '" alt="table-user" class="me-2 rounded-circle">
                                                            <a href="javascript:void(0);" class="text-body fw-semibold">' . $name . '</a>
                                                        </td>
                                                        <td>
                                                            ' . $email . '
                                                        </td>
                                                        <td>
                                                            ' . $address . '
                                                        </td>
                                                        <td>
                                                            $' . $salary . '
                                                        </td>
                                                        <td>
                                                            ' . $store_code . '
                                                        </td>
                                                        <td>
                                                            ' . $added_date . '
                                                        </td>
                    
                                                        <td>
                                                            <a href="employee_update.php?updateid=' . $id  . '" class="fs-6 text-light text-decoration-none bg-primary p-2 rounded" data-toggle="tooltip" data-placement="top" title="Update Product"><i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="php-action/employee_delete.php?deleteid=' . $id  . '"class="fs-6 text-light text-decoration-none bg-danger p-2 rounded" data-toggle="tooltip" data-placement="top" title="Update Product"><i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    
                                                    ';
                                                }
                                            }
                                            ?>



                                            <!-- <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td class="table-user">
                                                    <img src="assets/images/users/avatar-4.jpg" alt="table-user" class="me-2 rounded-circle">
                                                    <a href="javascript:void(0);" class="text-body fw-semibold">Paul J. Friend</a>
                                                </td>
                                                <td>
                                                    Homovee
                                                </td>
                                                <td>
                                                    <span class="fw-semibold">128</span>
                                                </td>
                                                <td>
                                                    $128,250
                                                </td>
                                                <td>
                                                    07/07/2018
                                                </td>
                                                <td>
                                                    <div class="spark-chart" data-dataset="[25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54]"></div>
                                                </td>

                                                <td>
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr> -->

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


<!-- Right Sidebar -->
<?php include("sections/right-sidebar.php") ?>
<!-- /End-bar -->


<?php include("sections/footer.php") ?>
