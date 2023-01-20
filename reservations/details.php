<?php
//Require database in this file
/** @var $db */
require_once "../DB.php";

//If the ID isn't given, redirect to the homepage
if (!isset($_GET['id']) || $_GET['id'] === '') {
    header('Location: reservations/index.php');
    exit;
}

//Retrieve the GET parameter from the 'Super global'
$reservationsId = $_GET['id'];

//Get the record from the database result
$query = "SELECT * FROM RESERVATIONS WHERE id = " . $reservationsId;
$result = mysqli_query($db, $query);

//If the album doesn't exist, redirect back to the homepage
if (mysqli_num_rows($result) == 0) {
    header('Location: reservations/index.php');
    exit;
}

//Transform the row in the DB table to a PHP array
$reservations = mysqli_fetch_assoc($result);

//Close connection
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>Details - <?= $reservations['name'] ?></title>
</head>
<body>
<div class="container px-4">
    <h1 class="title mt-4"><?= $reservations['first_name'] ?></h1>
    <section class="content">
        <ul>
            <li>Lastname: <?= $reservations['last_name'] ?></li>
            <li>email: <?= $reservations['email'] ?></li>
            <li>number: <?= $reservations['number'] ?></li>
            <li>message: <?= $reservations['message'] ?></li>
        </ul>
    </section>
    <div>
        <a class="button" href="reservations/index.php">Go back to the list</a>
    </div>
</div>
</body>
</html>
