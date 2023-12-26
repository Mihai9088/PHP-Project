<?php

include('../config/constants.php');

$id = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id=$id";

$res = mysqli_query($conn, $sql);


if ($res == TRUE) {
    $_SESSION['delete'] = "Adminul a fost sters cu succes.";
    header("location:" . SITEURL . "/dist/admin.php");
} else {
    $_SESSION['delete'] = "Adminul nu  a fost sters cu succes.";
    header("location:" . SITEURL . "/dist/admin.php");
}
