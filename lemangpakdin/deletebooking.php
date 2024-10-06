<?php

require "conn.php";

if (ISSET($_POST['phone'])) {
    
    $phone  = $_POST['phone'];
 
    // create connection
    $conn = mysqli_connect($server,$username,$password,$dbname);

    // check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM customer WHERE phone = '$phone'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
        header("Location: deletebooking_done.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>