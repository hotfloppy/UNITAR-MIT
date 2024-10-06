<?php

require("conn.php");

if (ISSET($_POST['phone'])) {

    $update = 0; # default value for submit

    $phone  = $_POST['phone'];
    $name   = $_POST['name'];
    $lemang = $_POST['lemang'];
    $update = $_POST['update']; # 1 is update, 0 is submit

    // create connection
    $conn = mysqli_connect($server,$username,$password,$dbname);

    // check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // update customer's booking
    if ($update > 0) {
        
        $sql = "UPDATE customer
                SET
                name = '$name', lemang = '$lemang'
                WHERE phone = '$phone'";

        if (mysqli_query($conn, $sql)) {
            echo $sql . "<br /><br />";
            echo "Affected rows: " . mysqli_affected_rows($conn);
            echo "Record updated successfully";
            header("Location: updatebooking_done.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        // check if customer already booked
        $sql = "SELECT * FROM customer WHERE phone = '$phone'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            header("Location: alreadybooked.php");
        }

        // submit new booking
        $sql = "INSERT INTO customer VALUES ('$phone',
                                            '$name',
                                            '$lemang')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            header("Location: submitbooking_done.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);

?>