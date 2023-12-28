<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MihaiFood-Home</title>
    <link rel="stylesheet" href="output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=AR+One+Sans&family=Dancing+Script:wght@400;500&family=Ephesis&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">

    <?php include('partials/menu.php') ?>

    <div class="container mx-auto mt-14">

        <h1 class="text-4xl font-bold mb-8">Food Management</h1>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2 border">Serial Number</th>
                        <th class="p-2 border">Full Name</th>
                        <th class="p-2 border">Username</th>
                        <th class="p-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-2 border">1.</td>
                        <td class="p-2 border">Dummy name</td>
                        <td class="p-2 border">dummy user</td>
                        <td class="p-2 border">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Update Admin</button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded-md ml-2 hover:bg-red-700 transition">Delete Admin</button>
                        </td>
                    </tr>

                    <tr>
                        <td class="p-2 border">2.</td>
                        <td class="p-2 border">Dummy name</td>
                        <td class="p-2 border">dummy user</td>
                        <td class="p-2 border">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Update Admin</button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded-md ml-2 hover:bg-red-700 transition">Delete Admin</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <?php include('partials/footer.php') ?>

</body>

</html>