<?php 
include('php-action/db_conn.php');

session_start();

// remove all session variables
// session_unset();

// destroy all session variables
session_destroy();

header("location: login.php");
