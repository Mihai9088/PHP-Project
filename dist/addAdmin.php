<?php include('partials/menu.php') ?>

<?php
if (isset($_POST['submit'])) {
    $full_name = isset($_POST["full_name"]) ? $_POST["full_name"] : '';
    $username = isset($_POST["username"]) ? $_POST["username"] : '';
    $password = isset($_POST["password"]) ? md5($_POST["password"]) : '';

    if (empty($full_name) || empty($username) || empty($password)) {
        $errorMessage = "All fields are mandatory.";
    } else {
        $sql = "INSERT INTO tbl_admin SET 
        full_name = '$full_name',
        username = '$username',
        password = '$password'";

        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if ($res == true) {
            $_SESSION['add'] = "Admin succesfully added.";
            header("location:" . SITEURL . "/dist/admin.php");
        } else {
            $_SESSION['add'] = "Admin could not be added.";
            header("location:" . SITEURL . "/dist/addAdmin.php");
        }
    }
}
?>

<section class="container mx-auto my-8 p-8 bg-white shadow-lg rounded-md">
    <div>
        <h1 class="text-4xl font-bold mb-8">Add Admin</h1>

        <?php if (!empty($errorMessage)) : ?>
            <p class="text-red-500 mb-4"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

        <form action="" method="POST" class="max-w-md mx-auto">
            <div class="mb-4">
                <label for="full_name" class="block text-sm font-medium text-gray-600">Full Name:</label>
                <input type="text" name="full_name" id="full_name" placeholder="Enter Full Name" class="mt-1 p-2 border rounded-md w-full">
            </div>
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-600">Username:</label>
                <input type="text" name="username" id="username" placeholder="Enter Username" class="mt-1 p-2 border rounded-md w-full">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
                <input type="password" name="password" id="password" placeholder="Enter Password" class="mt-1 p-2 border rounded-md w-full">
            </div>
            <button type="submit" name="submit" value="Add Admin" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700 transition w-full">Submit</button>
        </form>
    </div>
</section>

<?php include('partials/footer.php') ?>