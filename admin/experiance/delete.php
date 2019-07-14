<?php

include '../initilize.php';

$id = $_GET['id'] ?? '';

session_start();

if (!isset($_SESSION['adminEmail'])) {
    redirect_to('login');
} else {
    $adminEmail = $_SESSION['adminEmail'];
    $adminName = $_SESSION['adminName'];
}
$tblName = "tbl_about_more";
$result = aboutDelete($id,$tblName);
// print_r($about_us);
// exit;

?>