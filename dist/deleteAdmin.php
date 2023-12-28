<?php

include('../config/constants.php');

$id = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id=$id";

$res = mysqli_query($conn, $sql);


if ($res == TRUE) {
    $_SESSION['delete'] = "Admin succesfully deleted.";
    header("location:" . SITEURL . "/dist/admin.php");
} else {
    $_SESSION['delete'] = "Admin could not be added.";
    header("location:" . SITEURL . "/dist/admin.php");
}
