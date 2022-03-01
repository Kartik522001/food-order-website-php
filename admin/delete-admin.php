<?php

include('../config/constants.php');

$id = $_GET['id'];

$sql = "delete from tbl_admi where id = $id";

$res = mysqli_query($conn, $sql);

if ($res == true) {
    $_SESSION['delete'] = "<div class = 'success'>Admin deleted successfully </div>";
    header('Location:' . SITEURL . 'admin/manage-admin.php');
} else {
    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
    header('location:' . SITEURL . 'admin/manage-admin.php');
}