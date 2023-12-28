<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MihaiFood-Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100 font-sans">

    <?php include('partials/menu.php') ?>

    <div class="container mx-auto my-8 p-4 lg:p-8 bg-white shadow-lg rounded-md">
        <h1 class="text-4xl font-bold mb-8">Category Management</h1>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        if (isset($_SESSION['remove'])) {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['no-category-found'])) {
            echo $_SESSION['no-category-found'];
            unset($_SESSION['no-category-found']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>

        <a href="<?php echo SITEURL; ?>/dist/addCategory.php?id=" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700 transition mb-4 inline-block">Add Category</a>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2 border">S.N</th>
                        <th class="p-2 border">Title</th>
                        <th class="p-2 border">Image</th>
                        <th class="p-2 border">Featured</th>
                        <th class="p-2 border">Active</th>
                        <th class="p-2 border">Actions</th>
                    </tr>
                </thead>

                <?php
                $sql = "SELECT * FROM tbl_category";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                $sn = 1;

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        $title = $row['title'];
                ?>

                        <tbody>
                            <tr>
                                <td class="p-2 border"><?php echo $sn++ ?></td>
                                <td class="p-2 border"><?php echo $title ?></td>
                                <td class="p-2 border">
                                    <?php if ($image_name != "") { ?>
                                        <img src="<?php echo SITEURL; ?>../images/<?php echo $image_name; ?>" class="w-16 h-auto">
                                    <?php } ?>
                                </td>
                                <td class="p-2 border"><?php echo $featured ?></td>
                                <td class="p-2 border"><?php echo $active ?></td>
                                <td class="p-2 border">
                                    <a href="<?php echo SITEURL . '/dist/updateCategory.php?id=' . $id; ?>" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Update Category</a>
                                    <a href="<?php echo SITEURL . '/dist/deleteCategory.php?id=' . $id . '&image_name=' . $image_name; ?>" class="bg-red-500 text-white px-4 py-2 rounded-md ml-2 hover:bg-red-700 transition">Delete Category</a>
                                </td>
                            </tr>
                        </tbody>

                    <?php
                    }
                } else { ?>
                    <tr>
                        <td colspan="6">
                            <div class="p-2 border"> No Category Added</div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <?php include('partials/footer.php') ?>
</body>

</html>