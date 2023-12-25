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



<style>
    .font-dancingScript {
        font-family: 'Dancing Script', cursive;
    }
</style>

<header class="bg-bg fixed w-full top-0 z-50 ">
    <nav class="flex justify-between items-center w-[92%] mx-auto">
        <div class="logo text-2xl font-bold">
            Mihai<span class="font-dancingScript text-3xl">Foods</span>
        </div>
        <div class="nav-links duration-500 md:static absolute md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                <li>
                    <a class="hover:text-gray-500" href="index.php">Home</a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="admin.php">Admin</a>
                </li>
                <li>
                    <a href="category.php" class="hover:text-gray-500" href="category.php">Category</a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="food.php">Food</a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="order.php">Order</a>
                </li>
            </ul>
        </div>
        <div class="flex items-center gap-6">
            <button class="text-black font-bold px-5 py-2 rounded-full transition hover:text-gray-500">Sign in</button>
            <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon>
        </div>
    </nav>
</header>