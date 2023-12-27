<?php

if (!isset($_SESSION['user'])) {

    $_SESSION['no-login-message'] = 'Login to acces admin panel';
    header('location:' . SITEURL . '/dist/login.php');
}
