<?php
session_start();
include('php-action/db_conn.php');

if(isset($_SESSION['user_id'])){
    header("location: dashboard.php");
}

$_SESSION['warning'] = '';
$_SESSION['success'] = '';

if (isset($_POST['submit'])) {
    $email      = $_POST['email'];
    $password   = $_POST['password'];

    if (empty($email)) {
        $_SESSION['warning'] = "Enter your Email";
    } elseif (empty($password)) {
        $_SESSION['warning'] = 'Password required';
    } else {
        $select = "SELECT * FROM users WHERE email = '$email'";
        $sql = mysqli_query($con, $select);
        $result = mysqli_num_rows($sql);

        if ($result == 1) {
            // $password = md5($password);

            // exists
            $main_select = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $main_sql = mysqli_query($con, $main_select);
            $main_result = mysqli_num_rows($main_sql);

            if ($main_result == 1) {
                $row = mysqli_fetch_assoc($main_sql);

                // set session
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['emp_img'] = $row['emp_img'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['role'] = $row['role'];

                // Location
                header('location: dashboard.php');
            } else {
                $_SESSION['warning'] = 'User email and password incorrect';
            }
        } else {
            $_SESSION['warning'] = 'User doesn\'t exist';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/hyper/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jul 2022 20:29:40 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/storma-favicon.png">

    <!-- third party css -->
    <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- Datatables css -->
    <link href="assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/vendor/datatables.min.css">


    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Custom Css -->
    <!-- <link rel="stylesheet" href="assets/css/custom/login.css"> -->

</head>

<body class="" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">

<style>
    * {
        padding: 0;
        margin: 0;
        overflow: hidden;
    }

    .main {
        width: 100%;
        height: 100vh;
    }

    .login-content .left {
        width: 100%;
        min-height: 100vh;
        background-image: url("assets/images/login-bg1.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .my-quote {
        letter-spacing: 2px;
        font-family: 'Dancing Script', cursive;
        font-weight: 500;
        padding: 20px;
        text-align: right;
        /* display: flex; */
        margin-left: auto;
        /* justify-content: right;
    align-items: center; */
    }

    .right {
        width: 100%;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-flow: column;
    }
</style>

<section class="main">
    <div class="login-wrapper">
        <div class="login-content row">
            <div class="left col d-none d-sm-none d-md-none d-lg-block">
                <div class="left-text text-light p-3">
                    <h3 class="display-3  fw-bolder py-4">
                        Manage your <span class="text-info">Business Activities</span>
                        with <span class="text-primary">STORMA</span>
                    </h3>
                    <div class="quote bg-secondary py-3 px-2">
                        <p class="w-75 pt-2 pb-2 my-quote">
                            “Success is not final; failure is not fatal: it is the courage to continue that counts.”
                            <br>
                            Winston Churchill.
                        </p>

                    </div>
                    <p class="pt-3 text-capitalize text-muted">Let Us Serve You well</p>
                </div>
            </div>
            <div class="right col">
                <div class=" right-wrapper w-75 m-auto">
                    <div class="col-3 m-auto">
                        <img src="assets/images/storma-logo.png" alt="SMS-LOGO" title="Store Management System Logo" class="img-fluid m-auto">
                    </div>
                    <div class="mt-2 button-group">
                        <!-- <a href="/assets/pages/user-reg.html" class="btn my-btn">register</a> -->
                        <a hr   ef="#" class="btn text-muted fw-bold fs-2">Log In</a>
                    </div>

                    <?php
                    if ($_SESSION['warning']) {
                        echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
                        <i class="mdi mdi-exclamation bi flex-shrink-0 me-2" role="img" aria-label="Warning"></i>
                        <div>' . $_SESSION['warning'] . '</div>
                        </div>';

                        // echo '<div class="alert alert-warning" role="alert">
                        // <i class="mdi mdi-exclamation  rounded-circle bg-warning text-light fw-bolder fs-4"></i>' .
                        //     $_SESSION['warning'] . '</div>';
                        unset($_SESSION['warning']);
                    }
                    if ($_SESSION['success']) {
                        echo '<div class="p-2 text-success list-group-item-success rounded">' . $_SESSION['success'] . '</div>';
                        unset($_SESSION['success']);
                    }
                    ?>
                    <form action="login.php" method="POST" class=" mt-3">
                        <div class="mb-2 ">
                            <!-- <i class="mdi mdi-exclamation"></i> -->
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control p-2" id="formGroupExampleInput" placeholder="UserName">
                        </div>
                        <div class="mb-2">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control p-2" id="formGroupExampleInput2" placeholder="Password">
                        </div>
                        <div class="mb-2">
                            <button type="submit" name="submit" class="btn btn-outline-primary">Submit</button>
                            <!-- <a href="/assets/pages/dashboard.html" type="submit" name="submit" class="btn btn-outline-primary">Submit</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('sections/footer.php') ?>