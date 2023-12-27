<?php include('partials/menu.php'); ?>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}



if (isset($_POST['submit'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $id = $_POST['id'];
    $sql = "SELECT * FROM tbl_admin WHERE id = $id AND password = '$current_password'";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $count = mysqli_num_rows($res);

        if ($count == 1) {


            if ($new_password == $confirm_password) {


                $sql2 = "UPDATE tbl_admin SET password = '$new_password' WHERE id = $id";
                $res2 = mysqli_query($conn, $sql2);

                if ($res2 == true) {
                    $_SESSION['change-password'] = "Password updated successfully";
                    header('location:' . SITEURL . '/dist/admin.php');
                } else {
                    $_SESSION['change-password'] = "Password not updated";
                    header('location:' . SITEURL . '/dist/admin.php');
                }
            } else {
                $_SESSION['password_not_matched'] = "Password not matched";
                header('location:' . SITEURL . '/dist/admin.php');
            }
        } else {
            $_SESSION['user_not_found'] = "User not found";
            header('location:' . SITEURL . '/dist/admin.php');
        }
    }
}

?>



<section class="container mx-auto my-8 p-8 bg-white shadow-lg rounded-md w-screen">
    <h1 class="text-4xl font-bold mb-8">Change Password</h1>

    <form action="" method="POST" class="max-w-md mx-auto">
        <div class="mb-4">
            <label for="current_password" class="block text-sm font-medium text-gray-600">Current Password:</label>
            <input type="password" name="current_password" id="current_password" placeholder="Old Password" class="mt-1 p-2 border rounded-md w-full">
        </div>

        <div class="mb-4">
            <label for="new_password" class="block text-sm font-medium text-gray-600">New Password:</label>
            <input type="password" name="new_password" id="new_password" placeholder="New Password" class="mt-1 p-2 border rounded-md w-full">
        </div>

        <div class="mb-4">
            <label for="confirm_password" class="block text-sm font-medium text-gray-600">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="mt-1 p-2 border rounded-md w-full">
        </div>

        <div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Change Password" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition w-full">
        </div>
    </form>
</section>



<?php include('partials/footer.php'); ?>