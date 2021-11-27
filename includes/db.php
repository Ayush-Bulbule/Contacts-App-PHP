<?php

function db_connect()
{
    $host = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "contactsapp";
    $conn = mysqli_connect($host, $dbUser, $dbPass, $dbName) or die("DB Connection Error :" . mysqli_connect_error());

    echo "<script>onnection succsee</script>";
    return $conn;
}


function db_close($conn)
{
    mysqli_close($conn);
}


?>
