<link rel="stylesheet" href="assets/css/custom/print.css">

<?php
include("sections/header.php");
include("php-action/db_conn.php");

?>
<div class="w-100">
    <div class="p-5">
        <div class="row">
            <div class="col-6 d-flex align-items-center justify-content-start">
                <a href="#" class="btn btn-primary mb-2 no-print" onclick="window.print();" id="print-btn">Print</a>
                <a href="products.php" class="btn btn-danger mb-2 mx-2 no-print" >Back</a>
            </div>
        </div>
        <div class="table-responsive">
            <!-- <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable"> -->
            <table class="table table-centered dt-responsive nowrap">
                <thead class="table-light">
                    <tr>
                        <!-- <th>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck13">
                                <label class="form-check-label" for="customCheck13">&nbsp;</label>
                            </div>
                        </th> -->

                        <th>ID</th>
                        <th>Product</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Selling Price</th>
                        <th>Status</th>
                        <th>Added Date</th>
                        <!-- <th style="width: 75px;">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $product_select = ("SELECT * FROM `product` WHERE 1");
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
                                ' . $product_id . '
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
                            </td> 
                                </tr> ';
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("sections/footer.php") ?>