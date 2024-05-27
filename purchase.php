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
                                    <li class="breadcrumb-item active">Purchases</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Purchases</h4>
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
                                        <!-- <form class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
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
                                        </form> -->
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="row justify-content-end text-xl-end mt-xl-0 mt-2">
                                            <!-- <button type="button" class="btn btn-danger mb-2 me-2"><i class="mdi mdi-basket me-1"></i> Add New Order</button> -->

                                            <div class="col-8">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    <i class="mdi mdi-basket me-1"></i>
                                                    Add New Record
                                                </button>

                                                <!-- Modal -->

                                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg shadow">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary text-light">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Add New Record</h5>
                                                                <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">


                                                                <form class="row g-3 px-3 pb-4" action="php-action/purchase_action.php" method="POST">
                                                                    <div class="col-md-6">
                                                                        <label for="product_name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" id="product_name" placeholder="Product Name" name="product_name">
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="inputAddress2" class="form-label">Total Amount <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" id="total_amount" placeholder="Total Amount" name="total_amount" readonly onclick="totalAmount()">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="inputPassword4" class="form-label">Quantity <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="inputZip" class="form-label">Purchased Price <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" id="purchased_price" placeholder="Purchased Price" name="purchased_price" readonly onclick="purchasedPrice()">
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="inputAddress" class="form-label">Cost Price <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" id="cost_price" placeholder="Cost Price" name="cost_price">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="inputZip" class="form-label">Selling Price <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" id="selling_price" placeholder="Selling Price" name="selling_price" readonly onclick="sellingPrice()">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="inputCity" class="form-label">Discount (percentage) <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" id="discount" placeholder="Discount (percentage)" name="discount">
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
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                                                            </div>
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
                                    <!-- <table class="table table-centered dt-responsive nowrap" id="products-datatable"> -->
                                        <!-- <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable"> -->
                                        <table class="table table-centered table-nowrap mb-0" id="products-datatable">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 20px;">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <!-- <th>ID</th> -->
                                                <th class="all">Product Name</th>
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


                                                    echo '
                                                    <tr>
                                                    <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                    </div>
                                                </td>
                                                    
                                                    <td>' . $name . '</td>
                                                    <td>' . $quantity . '</td>
                                                    <td>$' . $cost_price . '</td>
                                                    <td>$' . $total_amount . '</td>
                                                    <td>' . $discount . '%</td>
                                                    <td>$' . $purchased_price . '</td>
                                                    <td>$' . $selling_price . '</td>
                                                    <td>' . $added_date . '</td>' .
                                                        '<td>
                                                    <a href="purchase_update.php?updateid=' . $id . '" class=" text-light text-decoration-none bg-primary rounded p-2"><i class="mdi mdi-square-edit-outline"></i></a></button>
                                                    <a href="php-action/purchase_delete.php?deleteid=' . $id  . '" class=" text-light text-decoration-none bg-danger rounded p-2"><i class="mdi mdi-delete"></i></a>
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