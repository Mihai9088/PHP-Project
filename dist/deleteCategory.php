<?php
include('../config/constants.php');

if (isset($_GET['id']) && isset($_GET['image_name'])) {

    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if ($image_name != "") {
        $path = "../images/" . $image_name;
        $remove = unlink($path);

        if ($remove == false) {
            $_SESSION['remove'] = "Failed to remove category image";
            header('location:' . SITEURL . '/dist/category.php');
            die();
        }


        $sql = "DELETE FROM tbl_category WHERE id = $id";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            $_SESSION['delete'] = "Category Deleted Successfully";
            header('location:' . SITEURL . '/dist/category.php');
        } else {
            $_SESSION['delete'] = "Failed to Delete Category";
            header('location:' . SITEURL . '/dist/category.php');
        }
    } else {
        header('location:' . SITEURL . '/dist/category.php');
    }
}
