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

            <?php

                if (ISSET($_POST['phone'])) {
    
                    $phone  = $_POST['phone'];
                    $name  = $_POST['name'];
                    $lemang  = $_POST['lemang'];
                }
            ?>

            <form method='POST' action='submitbooking.php' class='noborder'>

                <h3>Booking details for <?php echo $name; ?></h3>

                <label for='name'>Name:</label>
                <input id='name' name='name' type='text' value='<?php echo $name; ?>' autofocus required>

                <input id='phone' name='phone' type='hidden' value='<?php echo $phone; ?>'>

                <label for='lemang'>How many lemang:</label>
                <input id='lemang' name='lemang' type='text' value='<?php echo $lemang; ?>' autofocus required>

                <input id='update' name='update' type='hidden' value='1'>

                <input type="submit" class="button" value="Update Booking">

            </form>

            <br />

            <hr>

            <form class="button">
                <a href="index.php" class="button">Already booked?</a>
            </form>

        </center>
    </div>

</body>

</html>