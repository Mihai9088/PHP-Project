<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MihaiFood-Home</title>
    <link rel="stylesheet" href="output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin">
    <link href="https://fonts.googleapis.com/css2?family=AR+One+Sans&family=Dancing+Script:wght@400;500&family=Ephesis&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

</head>

<body class="bg-gray-100 font-sans">
    <?php include('partials/menu.php') ?>

    <div class="container mx-auto my-8 p-8 bg-white shadow-lg rounded-md">
        <h1 class="text-4xl font-bold mb-8">Admin Management</h1>

        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }


        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        ?>

        <a href="addAdmin.php" class="bg-green-500 text-white px-4 py-2 rounded-md mb-4 hover:bg-green-700 transition">Add Admin</a>

        <table class="w-full border-collapse border border-gray-300 mt-2">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">Serial Number</th>
                    <th class="p-2 border">Full Name</th>
                    <th class="p-2 border">Username</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $sql = "SELECT * FROM tbl_admin";

                $res = mysqli_query($conn, $sql);

                if ($res == TRUE) {
                    $count = mysqli_num_rows($res);


                    $sn = 1;

                    if ($count > 0) {
                        while ($rows = mysqli_fetch_assoc($res)) {
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username = $rows['username'];

                ?>


                            <tr>
                                <td class="p-2 border"><?php echo $sn++ ?></td>
                                <td class="p-2 border"><?php echo $full_name ?></td>
                                <td class="p-2 border"><?php echo $username ?></td>
                                <td class="p-2 border">
                                    <a href="<?php echo SITEURL . '/dist/updateAdmin.php?id=' . $id . ''; ?>" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Update Admin</a>
                                    <a href="<?php echo SITEURL . '/dist/deleteAdmin.php?id=' . $id . ''; ?>" class="bg-red-500 text-white px-4 py-2 rounded-md ml-2 hover:bg-red-700 transition">Delete Admin</a>
                                </td>
                            </tr>


                <?php


                        }
                    } else {
                    }
                }

                ?>


            </tbody>
        </table>
    </div>

    <?php include('partials/footer.php') ?>



</body>

</html>