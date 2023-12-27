<?php include('partials/menu.php'); ?>

<?php
$id = $_GET['id'];

$sql = "SELECT * FROM tbl_admin WHERE id = $id";

$res = mysqli_query($conn, $sql);

if ($res == TRUE) {
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $rows = mysqli_fetch_assoc($res);
        $full_name = $rows['full_name'];
        $username = $rows['username'];
    }
} else {
    header("location:" . SITEURL . "dist/admin.php");
}




if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $id = $_POST['id'];

    $sql = "UPDATE tbl_admin SET 
    full_name = '$full_name',
    username = '$username' WHERE id = $id";

    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {
        $_SESSION['update'] = "Admin actualizat cu succes.";
        header("location:" . SITEURL . "/dist/admin.php");
    } else {
        $_SESSION['update'] = "Adminul nu a putut fi actualizat.";
        header("location:" . SITEURL . "/dist/admin.php");
    }
}
?>


<section class="container mx-auto my-8 p-8 bg-white shadow-lg rounded-md">
    <div>
        <h1 class="text-4xl font-bold mb-8">Update Admin</h1>
        <form action="" method="POST" class="max-w-md mx-auto">
            <table class="w-full">
                <tr class="mb-4">
                    <td class="pr-4">
                        <label for="full_name" class="block text-sm font-medium text-gray-600">Full Name:</label>
                    </td>
                    <td>
                        <input type="text" name="full_name" id="full_name" value="<?php echo $full_name ?>" class="mt-1 p-2 border rounded-md w-full">
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="pr-4">
                        <label for="username" class="block text-sm font-medium text-gray-600">Username:</label>
                    </td>
                    <td>
                        <input type="text" name="username" id="username" value="<?php echo $username ?>" class="mt-1 p-2 border rounded-md w-full">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</section>


<?php include('partials/footer.php'); ?>