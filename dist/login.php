<?php include('../config/constants.php') ?>




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

<body class="bg-gray-200 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-md shadow-md w-96">
        <h1 class="text-2xl font-bold mb-4">Login</h1>

        <?php

        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        if (isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }

        ?>

        <form action="" method="POST">

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-600">Username:</label>
                <input type="text" name="username" id="username" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
                <input type="password" name="password" id="password" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div>
                <input type="submit" name="submit" value="Login" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition w-full">
            </div>

            <span class="block mb-4 text-sm text-gray-600">
                Back <a href="index.php" class="text-blue-500 hover:underline">Home</a>
            </span>

        </form>
    </div>

</body>

</html>


<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);


    if ($count == 1) {
        $_SESSION['login'] = "Logat cu succes.";
        $_SESSION['user'] = $username;
        header("location:" . SITEURL . "/dist/index.php");
    } else {
        $_SESSION['login'] = "Nume utilizator sau parola incorecte.";
        header("location:" . SITEURL . "/dist/login.php");
    }
}

?>