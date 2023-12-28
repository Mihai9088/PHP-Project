<?php include('partials/menu.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_category WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $image_name = $row['image_name'];
        $featured = $row['featured'];
        $active = $row['active'];
    } else {
        $_SESSION['no-category-found'] = "No Category Found";
        header('location:' . SITEURL . '/dist/category.php');
    }
} else {
    header('location:' . SITEURL . 'dist/category.php');
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    $sql = "UPDATE tbl_category SET
        title = '$title',
        featured = '$featured',
        active = '$active'
        WHERE id = $id";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['update'] = "Category Updated Successfully";
        header('location:' . SITEURL . '/dist/category.php');
    } else {
        $_SESSION['update'] = "Failed to Update Category";
        header('location:' . SITEURL . '/dist/category.php');
    }
}
?>

<div class="container mx-auto my-8 p-8 bg-white shadow-lg rounded-md">
    <h1 class="text-4xl font-bold mb-8">Update Category</h1>

    <form action="" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto">
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-600">Title:</label>
            <input type="text" name="title" value="<?php echo $title; ?>" class="mt-1 p-2 border rounded-md w-full">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-600">Image:</label>
            <?php if ($image_name != "") : ?>
                <img src="../images/<?php echo $image_name; ?>" class="mb-2 max-w-full h-auto">
            <?php else : ?>
                <p>Image not added</p>
            <?php endif; ?>
        </div>

        <div class="mb-4">
            <label for="new_image" class="block text-sm font-medium text-gray-600">New Image:</label>
            <input type="file" name="new_image" class="mt-1 p-2 border rounded-md w-full">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Featured:</label>
            <div class="flex items-center space-x-4">
                <label for="featured_yes" class="inline-flex items-center">
                    <input <?php echo $featured == "Yes" ? "checked" : ""; ?> type="radio" name="featured" value="Yes" class="form-radio text-blue-500">
                    <span class="ml-1 text-gray-700">Yes</span>
                </label>
                <label for="featured_no" class="inline-flex items-center">
                    <input <?php echo $featured == "No" ? "checked" : ""; ?> type="radio" name="featured" value="No" class="form-radio text-blue-500">
                    <span class="ml-1 text-gray-700">No</span>
                </label>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Active:</label>
            <div class="flex items-center space-x-4">
                <label for="active_yes" class="inline-flex items-center">
                    <input type="radio" name="active" value="Yes" <?php echo $active == "Yes" ? "checked" : ""; ?> class="form-radio text-blue-500">
                    <span class="ml-1 text-gray-700">Yes</span>
                </label>
                <label for="active_no" class="inline-flex items-center">
                    <input type="radio" name="active" value="No" <?php echo $active == "No" ? "checked" : ""; ?> class="form-radio text-blue-500">
                    <span class="ml-1 text-gray-700">No</span>
                </label>
            </div>
        </div>

        <div>
            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Category" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition w-full">
        </div>
    </form>
</div>

<?php include("partials/footer.php"); ?>