<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <style>
        .font-dancingScript {
            font-family: 'Dancing Script', cursive;
        }

        .text-black {
            color: black;
        }
    </style>
</head>



<?php include('../config/constants.php'); ?>
<?php include('loginCheck.php'); ?>

<header class="bg-bg fixed w-full top-0 z-50">
    <nav class="flex justify-between items-center w-[92%] mx-auto">
        <a href="index.php" class="logo text-2xl font-bold text-black">
            Mihai<span class="font-dancingScript text-3xl text-black">Foods</span>
        </a>
        <div class="md:hidden">
            <ion-icon onclick="onToggleMenu()" name="menu" class="text-3xl cursor-pointer text-black"></ion-icon>
        </div>
        <div id="desktopMenu" class="hidden md:flex md:items-center md:gap-4 gap-8"> <!-- Modificare aici -->
            <ul class="flex text-black justify-center">
                <li>
                    <a class="hover:text-gray-500 mx-4" href="index.php">Home</a> <!-- Modificare aici -->
                </li>
                <li>
                    <a class="hover:text-gray-500 mx-4" href="admin.php">Admin</a> <!-- Modificare aici -->
                </li>
                <li>
                    <a class="hover:text-gray-500 mx-4" href="category.php">Category</a> <!-- Modificare aici -->
                </li>
                <li>
                    <a class="hover:text-gray-500 mx-4" href="food.php">Food</a> <!-- Modificare aici -->
                </li>
                <li>
                    <a class="hover:text-gray-500 mx-4" href="order.php">Order</a> <!-- Modificare aici -->
                </li>
                <li>
                    <a class="hover:text-gray-500 mx-4" href="logout.php">Logout</a> <!-- Modificare aici -->
                </li>
            </ul>
        </div>
    </nav>
</header>

<nav id="mobileMenu" class="hidden md:hidden fixed w-full bg-white text-gray-800">
    <ul class="flex flex-col items-start p-4 space-y-2">
        <li>
            <a href="index.php" class="text-xl hover:text-cyan-500 duration-500">Home</a>
        </li>
        <li>
            <a href="admin.php" class="text-xl hover:text-cyan-500 duration-500">Admin</a>
        </li>
        <li>
            <a href="category.php" class="text-xl hover:text-cyan-500 duration-500">Category</a>
        </li>
        <li>
            <a href="food.php" class="text-xl hover:text-cyan-500 duration-500">Food</a>
        </li>
        <li>
            <a href="order.php" class="text-xl hover:text-cyan-500 duration-500">Order</a>
        </li>
        <li>
            <a href="logout.php" class="text-xl hover:text-cyan-500 duration-500">Logout</a>
        </li>
    </ul>
</nav>

<script>
    function onToggleMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.toggle('hidden');
    }
</script>



</html>