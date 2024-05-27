<?php include("sections/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
    <?php include("sections/left-sidebar.php") ?>


    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            <?php include("sections/topbar.php") ?>
            <!-- End Topbar Start -->


            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Products</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Products</h4>
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
                                        <!-- <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Products</a> -->

                                        <!-- Button trigger modal -->
                                        <?php
                                        if ($_SESSION['role'] == "Admin" || $_SESSION['role'] == "Developer") {
                                        ?>
                                            <button type="button" class="btn btn-secondary my-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <i class="mdi mdi-plus-circle me-2"></i>
                                                Add Product
                                            </button>
                                        <?php } ?>

                                        <!-- Modal -->

                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl shadow">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary text-light">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Add New Product</h5>
                                                        <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-centered table-nowrap mb-0">
                                                                <thead class="table-light">
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Product Name</th>
                                                                        <th>Quantity</th>
                                                                        <th title="Price per product">Price</th>
                                                                        <th>Total</th>
                                                                        <th>Discount</th>
                                                                        <th>Purchased Price</th>
                                                                        <th>Selling Price</th>
                                                                        <th>Added Date</th>
                                                                        <th style="width: 125px;">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $select = ("SELECT * FROM `purchase` ORDER by id DESC");
                                                                    $sql = mysqli_query($con, $select);
                                                                    $result = mysqli_num_rows($sql);
                                                                    if ($result > 0) {
                                                                        # code...
                                                                        while ($row = mysqli_fetch_assoc($sql)) {
                                                                            $id                 = $row['id'];
                                                                            $name               = $row['name'];
                                                                            $quantity           = $row['quantity'];
                                                                            $cost_price         = $row['cost_price'];
                                                                            $total_amount       = $row['total_amount'];
                                                                            $discount           = $row['discount'];
                                                                            $purchased_price    = $row['purchased_price'];
                                                                            $selling_price      = $row['selling_price'];
                                                                            $added_date         = $row['added_date'];


                                                                            echo "
                                                                            <tr>
                                                                            <td>$id</td>
                                                                            <td>$name</td>
                                                                            <td>$quantity</td>
                                                                            <td>$$cost_price</td>
                                                                            <td>$$total_amount</td>
                                                                            <td>$discount%</td>
                                                                            <td>$$purchased_price</td>
                                                                            <td>$$selling_price</td>
                                                                            <td>$added_date</td>" .
                                                                                '<td>
                                                                            <button class="btn btn-light" title="Add Product"><a href="new_product.php?purchaseid=' . $id . '" class="text-secondary text-decoration-none"><i class="mdi mdi-basket me-1"></i> Cart</a></button>
                                                                                </td>'
                                                                                . "</tr>
                                                                            
                                                                            ";
                                                                        }
                                                                    } else {
                                                                        echo '
                                                                    <div class="p-5 text-center">No Records</div>
                                                                    ';
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-sm-7">
                                        <div class="text-sm-end">
                                            <!-- <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog-outline"></i></button> -->
                                            <!-- <button type="button" class="btn btn-light mb-2 me-1" onclick="">Import</button> -->
                                            <a href="print_products.php" class="btn btn-light mb-2">Print</a>
                                        </div>
                                    </div>
                                    <!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <!-- <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable"> -->
                                    <table class="table table-centered dt-responsive nowrap" id="products-datatable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck13">
                                                        <label class="form-check-label" for="customCheck13">&nbsp;</label>
                                                    </div>
                                                </th>

                                                <!-- <th>ID</th> -->
                                                <th>Product</th>
                                                <th>Brand</th>
                                                <th>Quantity</th>
                                                <th>Selling Price</th>
                                                <th>Status</th>
                                                <th>Added Date</th>
                                                <?php
                                                if ($_SESSION['role'] == "Admin" || $_SESSION['role'] == "Developer") {
                                                ?>
                                                    <th style="width: 75px;">Action</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $product_select = ("SELECT * FROM `product` ORDER by id DESC");
                                            $select_sql = mysqli_query($con, $product_select);
                                            $select_result = mysqli_num_rows($select_sql);
                                            if ($select_result > 0) {
                                                # code...
                                                while ($row = mysqli_fetch_assoc($select_sql)) {
                                                    $product_id                 = $row['id'];
                                                    $product_image              = $row['image'];
                                                    $product_name               = $row['name'];
                                                    $brand                      = $row['brand'];
                                                    $product_quantity           = $row['quantity'];
                                                    $product_selling_price      = $row['selling_price'];
                                                    $status                     = $row['status'];
                                                    $product_added_date         = $row['added_date'];


                                                    if ($status == "active") {
                                                        $myStatus =  '<td>
                                                        <span class="badge badge-success-lighten p-1">active</span>
                                                    </td>';
                                                    } else {
                                                        $myStatus = '<td>
                                                        <span class="badge badge-danger-lighten p-1">Deactive</span>
                                                    </td>';
                                                    }

                                                    echo '
                                                    <tr>
                                                    <td>
                                                    <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck13">
                                                    <label class="form-check-label" for="customCheck13">&nbsp;</label>
                                                </div>
                                                    </td>
                                                <td>
                                                    <img src="assets/images/products/' . $product_image . '" alt="product-img" title="product-img" class="rounded me-3" height="48" />
                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                        <a href="products-details.php?detailid=' . $product_id . '" class="text-body">' . $product_name . '</a>
                                                        
                                                    </p>
                                                </td>
                                                <td>
                                                    ' . $brand . '
                                                </td>
                                                <td>
                                                    ' . $product_quantity . '
                                                </td>
                                                <td>
                                                    $' . $product_selling_price . '
                                                </td>
    
                                                    ' . $myStatus . '
                                                <td>
                                                    ' . $product_added_date . '
                                                </td> ';

                                                    if ($_SESSION['role'] == "Admin" || $_SESSION['role'] == "Developer") {
                                                        echo '<td>
                                                    <a href="products-details.php?detailid=' . $product_id  . '" class="fs-6 text-light text-decoration-none bg-info p-2 rounded" data-toggle="tooltip" data-placement="top" title="Product Details"><i class="mdi mdi-eye"></i></a>
                                                    <a href="product_update.php?updateid=' . $product_id  . '" class="fs-6 text-light text-decoration-none bg-primary p-2 rounded" data-toggle="tooltip" data-placement="top" title="Update Product"><i class="mdi mdi-square-edit-outline"></i></a>
                                                    <a href="php-action/product_delete.php?deleteid=' . $product_id  . '" class="action-icon fs-6 text-light text-decoration-none bg-danger p-2 rounded" data-toggle="tooltip" data-placement="top" title="Delete Product"><i class="mdi mdi-delete"></i></a>
                                                        </td>';
                                                    }

                                                    echo '</tr>';
                                                }
                                            }
                                            ?>


                                            <!-- var link = a.href = "php-action/employee_delete.php?deleteid='<?php // $id 
                                                                                                                ?>'"; -->

                                            <!-- <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck13">
                                                    <label class="form-check-label" for="customCheck13">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="assets/images/products/product-6.jpg" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">Unpowered aircraft</a>
                                                    
                                                </p>
                                            </td>
                                            <td>
                                                Wing Chairs
                                            </td>
                                            <td>
                                                03/24/2018
                                            </td>
                                            <td>
                                                $49
                                            </td>

                                            <td>
                                                204
                                            </td>
                                            <td>
                                                <span class="badge bg-danger">Deactive</span>
                                            </td>

                                            <td class="table-action">
                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
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
<!-- Bootstrap Tooltip Type Defined -->
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>