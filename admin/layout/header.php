<?php include '../config/DBconnection.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <script defer src="./js/index.js"></script>
    <title>Admin</title>
</head>
<body>

<nav id="navbar">
    <a href="">
        <h2>Online Food Ordering System</h2>
    </a>

    <ul>
        <li>
            <a
                class="<?= !isset($_GET['table']) ? 'active' : '' ?>" 
                href="/food-ordering-system/admin/index.php?page=home">Orders</a>
        </li>
        <li>
            <a 
                class="<?= isset($_GET['table']) && $_GET['table'] == 'toship' ? 'active' : '' ?>"
                href="/food-ordering-system/admin/index.php?page=home&table=toship">To Ship</a>
        </li>
        <li>
            <a 
                class="<?= isset($_GET['table']) && $_GET['table'] == 'toreceive' ? 'active' : '' ?>"
                href="/food-ordering-system/admin/index.php?page=home&table=toreceive">To Receive</a>
        </li>
        <li>
            <a 
                class="<?= isset($_GET['table']) && $_GET['table'] == 'completed' ? 'active' : '' ?>" 
                href="/food-ordering-system/admin/index.php?page=home&table=completed">Completed</a>
        </li>
        <li>
            <a
                class="<?= isset($_GET['table']) && $_GET['table'] == 'rejected' ? 'active' : '' ?>" 
                href="/food-ordering-system/admin/index.php?page=home&table=rejected">Rejected</a>
        </li>
    </ul>
</nav>
