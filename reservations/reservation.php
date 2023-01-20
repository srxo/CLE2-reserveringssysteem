<?php

/** @var $db */
require_once "../DB.php";

if (isset($_POST['submit'])) {

    $first_name = htmlspecialchars(mysqli_real_escape_string($db, $_POST['firstname']));
    $last_name = htmlspecialchars(mysqli_real_escape_string($db, $_POST['lastname']));
    $email = htmlspecialchars(mysqli_real_escape_string($db, $_POST['email']));
    $number = htmlspecialchars(mysqli_real_escape_string($db, $_POST['number']));
    $message = htmlspecialchars(mysqli_real_escape_string($db, $_POST['message']));

    $errors = [];

    if ($first_name == "") {
        $errors['firstname'] = 'U moet uw voornaam invullen';
    }

    if ($last_name == "") {
        $errors['lastname'] = 'U moet uw achternaam invullen';
    }

    if ($email == "") {
        $errors['email'] = 'U moet uw email invullen';
    }

    if ($number == "") {
        $errors['number'] = 'U moet uw telefoonnummer invullen';
    }

    if (empty($errors)) {
        $query = "INSERT INTO reservations (first_name, last_name, email, number, message)
                VALUES ('$first_name', '$last_name', '$email', '$number', '$message')";
        $result = mysqli_query($db, $query) or die ('Error: ' . $query);
        if ($result) {
            header('Location: ../index.html');
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Body Routine</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="reservation.css">
</head>

<body id="reservation">
<form action="reservation.php" method="post">


    <div class="field">
        <label class="label" for="firstname">Voornaam</label>
        <div class="control">
            <input class="input" type="text" name="firstname" placeholder="Uw voornaam..">
            <span class="help is-danger"><?= $errors['firstname'] ?? "" ?></span>
        </div>
    </div>

    <div class="field">
        <label class="label" for="lastname">Achternaam</label>
        <div class="control">
            <input class="input" type="text" name="lastname" placeholder="Uw achternaam..">
            <span class="help is-danger"><?= $errors['lastname'] ?? "" ?></span>
        </div>
    </div>

    <div class="field">
        <label class="label" for="number">Telefoonnummer</label>
        <div class="control has-icons-left has-icons-right">
            <input class="input" type="tel" name="number" placeholder="Text input">
            <span class="help is-danger"><?= $errors['number'] ?? "" ?></span>
            <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>

        </div>

        <div class="field">
            <label class="label" for="email">Email</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" name="email" type="email" placeholder="Email input">
                <span class="help is-danger"><?= $errors['email'] ?? "" ?></span>
                <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>

            </div>
        </div>

        <div class="field">
            <label class="label">Behandeling</label>
            <div class="control">
                <div class="select">
                    <select>
                        <option>Wax afspraak</option>
                        <option>Laser afspraak</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Opmerkingen</label>
            <div class="control">
                <textarea class="textarea" name="message" placeholder="Textarea"></textarea>
                <span class="help is-danger"><?= $errors['message'] ?? "" ?></span>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <label class="checkbox">
                    <input type="checkbox">
                    I agree to the <a href="#">terms and conditions</a>
                </label>
            </div>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button type="submit" name="submit" class="button is-link">Submit</button>
            </div>
            <div class="control">
                <button class="button is-link is-light">Cancel</button>
            </div>
        </div>
</form>

</body>
</html>