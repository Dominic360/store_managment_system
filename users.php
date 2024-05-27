<?php include("sections/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <?php include("sections/left-sidebar.php") ?>
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
                                    <li class="breadcrumb-item"><a href="dashboard.php">Deshboard</a></li>
                                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li> -->
                                    <li class="breadcrumb-item active">Users</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Users</h4>
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
                                        <a href="javascript:void(0);" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="mdi mdi-plus-circle me-2"></i> Add Customers</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl shadow">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary text-light">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Add New Employee</h5>
                                                        <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>
                                                                        ID
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
                                                                $select = ("SELECT * FROM `employee` ORDER by id DESC");
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
                                                            ' . $id . '
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
                                                            <a href="new_user.php?userid=' . $id  . '" class="fs-6 text-light text-decoration-none bg-info py-1 px-2 rounded" data-toggle="tooltip" data-placement="top" title="Update Product"><i class="mdi mdi-plus-circle"></i></a>
                                                        </td>
                                                    </tr>
                                                    
                                                    ';
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
                                <div>

                                </div>
                                <!-- id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100" -->
                                <div class="table-responsive">
                                    <!-- <table id="datatable-buttons" class="table table-centered table-striped dt-responsive nowrap w-100"> -->
                                    <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                                        <!-- <table class="table table-centered table-striped dt-responsive nowrap w-100" id="datatable"> -->
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>User</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Role</th>
                                                <th>Store Code</th>
                                                <th>Create Date</th>
                                                <th style="width: 75px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $select = ("SELECT * FROM `users` WHERE 1");
                                            $select_sql = mysqli_query($con, $select);
                                            $select_result = mysqli_num_rows($select_sql);
                                            if ($select_result > 0) {
                                                # code...
                                                while ($row = mysqli_fetch_assoc($select_sql)) {
                                                    $id                 = $row['id'];
                                                    $name               = $row['name'];
                                                    $emp_img            = $row['emp_img'];
                                                    $email              = $row['email'];
                                                    $password           = $row['password'];
                                                    $store              = $row['store'];
                                                    $role               = $row['role'];
                                                    $date               = $row['date'];


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
                                                            ' . $password . '
                                                        </td>
                                                        <td>
                                                            ' . $role . '
                                                        </td>
                                                        <td>
                                                            ' . $store . '
                                                        </td>
                                                        <td>
                                                            ' . $date . '
                                                        </td>
                    
                                                        <td>
                                                            <a href="user_update.php?updateid=' . $id  . '" class="fs-6 text-light text-decoration-none rounded p-2 bg-primary" data-toggle="tooltip" data-placement="top" title="Update Product"><i class="mdi mdi-square-edit-outline"></i></a></button>
                                                            <a href="php-action/user_delete.php?deleteid=' . $id  . '" class="fs-6 text-light text-decoration-none rounded p-2 bg-danger" data-toggle="tooltip" data-placement="top" title="Delete Product" ><i class="mdi mdi-delete"></i></a>
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
                                                            937-330-1634
                                                        </td>
                                                        <td>
                                                            pauljfrnd@jourrapide.com
                                                        </td>
                                                        <td>
                                                            New York
                                                        </td>
                                                        <td>
                                                            07/07/2018
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-success-lighten">Active</span>
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

<div class="rightbar-overlay"></div>
<!-- /End-bar -->

<?php include("sections/footer.php") ?>