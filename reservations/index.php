<?php
//Require music data to use variable in this file
/** @var $db */
require_once "../DB.php";

//Get the result set from the database with a SQL query
$query = "SELECT * FROM reservations";
$result = mysqli_query($db, $query);

//Loop through the result to create a custom array
$beautyReservations = [];
while ($row = mysqli_fetch_assoc($result)) {
    $beautyReservations[] = $row;
}

//Close connection
mysqli_close($db);

?>
<!doctype html>
<html lang="en">
<head>
    <title>Reservations</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>


<body>
<div class="container px-4">
    <h1 class="title mt-4">Reservations</h1>
    <hr>
    <table class="table is-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>email</th>
            <th>number</th>
            <th>message</th>
            <th></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="6" class="has-text-centered">&copy; Bodyroutine</td>
        </tr>
        </tfoot>
        <tbody>
        <?php foreach ($beautyReservations as $index => $reservationsId) { ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $reservationsId['first_name'] ?></td>
                <td><?= $reservationsId['last_name'] ?></td>
                <td><?= $reservationsId['email'] ?></td>
                <td><?= $reservationsId['number'] ?></td>
                <td><?= $reservationsId['message'] ?></td>
                <td><a href="../reservations/details.php?id=<?= $reservations['id'] ?>">Details</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
