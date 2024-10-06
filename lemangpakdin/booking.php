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

                require "conn.php";

                if (ISSET($_POST['phone'])) {

                    $phone          = $_POST['phone'];

                    // create connection
                    $conn = mysqli_connect($server,$username,$password,$dbname);

                    // check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM customer WHERE phone = $phone";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $name = $row['name'];
                            $lemang = $row['lemang'];

                            echo "<h3>Booking details for " . $name . "</h3>";

                            echo "<label for='name'>Name:</label>";
                            echo "<input id='name' name='name' type='text' value='" . $name . "' disabled>";

                            echo "<label for='phone'>Phone No:</label>";
                            echo "<input id='phone' name='phone' type='text' value='" . $phone . "' disabled>";

                            echo "<label for='lemang'>How many lemang:</label>";
                            echo "<input id='lemang' name='lemang' type='text' value='" . $lemang . "' disabled>";
                        }
                    } else {
                        header("Location: recordnotfound.php");
                    }

                    session_start();
                    $_SESSION['phone'] = $phone;
                    $_SESSION['name'] = $name;
                    $_SESSION['lemang'] = $lemang;

                }

                mysqli_close($conn);

            ?>

            <form method='POST' action='updatebooking.php' class='noborder'>

                <?php

                    session_start();
                    $_SESSION['phone'] = $phone;
                    $_SESSION['name'] = $name;
                    $_SESSION['lemang'] = $lemang;
                    echo "<input id='phone' name='phone' type='hidden' value='" . $phone . "'>";
                    echo "<input id='name' name='name' type='hidden' value='" . $name . "'>";
                    echo "<input id='lemang' name='lemang' type='hidden' value='" . $lemang . "'>";

                ?>

                <input type="submit" class="button" value="Edit Booking">
            </form>

            <form method='POST' action='deletebooking.php' class='noborder'>

                <?php

                    session_start();
                    $_SESSION['phone'] = $phone;
                    echo "<input id='phone' name='phone' type='hidden' value='" . $phone . "'>";

                ?>

                <input type="submit" class="buttondelete" value="Delete Booking">
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