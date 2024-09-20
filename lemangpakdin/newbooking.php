<?php

require "conn.php";

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname",$username,$password);

    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare("SELECT * from customer");
    $sql->execute();

    $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo $e;
}

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="app/scss/style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;600;700&display=swap" rel="stylesheet">

    <title>Lemang Pak Din</title>
</head>

<body>

    <header>
        <div class="logo" onclick="window.location.href='index.php'"></div>
    </header>

    <hr>

    <div class="customer">
        <center>
            <form method="POST" action="submitbooking.php" class="noborder">

                <h3>New Booking</h3>
                <label for="name">Name:</label>
                <input id="name" name="name" type="text" placeholder="e.g: naim" autofocus required>

                <label for="phone">Phone No:</label>
                <input id="phone" name="phone" type="text" placeholder="e.g: 01125129082" autofocus required>

                <label for="lemang">How many lemang:</label>
                <input id="lemang" name="lemang" type="text" placeholder="e.g: 5" autofocus required>

                <!-- <button type="submit" value="Submit">Place Booking</button> -->
                <input type="submit" class="button" value="Place Booking">

            </form>

            <hr>

            <form action="index.php" class="button">
                <a href="index.php" class="button">Already booked?</a>
            </form>
        </center>
    </div>

</body>

</html>