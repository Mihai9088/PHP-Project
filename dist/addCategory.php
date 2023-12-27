<?php
include('partials/menu.php');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];

    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];

        if ($image_name != "") {
            $ext = explode('.', $image_name);
            $image_name = "Food_Category_" . rand(000, 999) . '.' . $ext;
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/" . $image_name;
            $upload = move_uploaded_file($source_path, $destination_path);

            if ($upload == false) {
                $_SESSION['upload'] = "Failed to upload image";
                header('location:' . SITEURL . '/dist/addCategory.php');
                die();
            }
        }
    } else {
        $image_name = "";
    }

    $sql = "INSERT INTO tbl_category SET
        title = '$title',
        image_name = '$image_name',
        featured = '$featured',
        active = '$active'";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['add'] = "Category Added Successfully";
        header('location:' . SITEURL . '/dist/category.php');
    } else {
        $_SESSION['add'] = "Failed to Add Category";
        header('location:' . SITEURL . '/dist/category.php');
    }
}
?>

<div class="container mx-auto my-8 p-8 bg-white shadow-lg rounded-md">
    <h1 class="text-4xl font-bold mb-8">Add Category</h1>

    <form action="" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto">
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-600">Title:</label>
            <input type="text" name="title" id="title" placeholder="Category Title" class="mt-1 p-2 border rounded-md w-full">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-600">File:</label>
            <input type="file" name="image" id="image" class="mt-1 p-2 border rounded-md w-full">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Featured:</label>
            <div class="flex items-center space-x-4">
                <label for="featured_yes" class="inline-flex items-center">
                    <input type="radio" name="featured" id="featured_yes" value="yes" class="form-radio text-blue-500">
                    <span class="ml-1 text-gray-700">Yes</span>
                </label>
                <label for="featured_no" class="inline-flex items-center">
                    <input type="radio" name="featured" id="featured_no" value="no" class="form-radio text-blue-500">
                    <span class="ml-1 text-gray-700">No</span>
                </label>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Active:</label>
            <div class="flex items-center space-x-4">
                <label for="active_yes" class="inline-flex items-center">
                    <input type="radio" name="active" id="active_yes" value="yes" class="form-radio text-blue-500">
                    <span class="ml-1 text-gray-700">Yes</span>
                </label>
                <label for="active_no" class="inline-flex items-center">
                    <input type="radio" name="active" id="active_no" value="no" class="form-radio text-blue-500">
                    <span class="ml-1 text-gray-700">No</span>
                </label>
            </div>
        </div>

        <div>
            <input type="submit" name="submit" value="Add Category" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition w-full">
        </div>
    </form>
</div>

<?php include('partials/footer.php') ?>