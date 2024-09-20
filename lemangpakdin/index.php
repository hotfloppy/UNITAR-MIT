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

            <h3>Already booked?</h3>

            <form method="POST" action="booking.php" class="noborder">
            <label for="phone">Phone No:</label>
            <input id="phone" name="phone" type="text" placeholder="e.g: 01125129082" autofocus required>

                <!-- <a href="listbooking.php" class="button">Submit</a> -->
                <input type="submit" class="button" value="Check Booking">
            </form>

            <hr>

            <form class="button">
                <a href="newbooking.php" class="button">New Booking?</a>
            </form>

        </center>
    </div>

</body>

</html>