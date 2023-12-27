<?php

include('partials/menu.php');



session_destroy();

header("location:" . SITEURL . "/dist/login.php");
