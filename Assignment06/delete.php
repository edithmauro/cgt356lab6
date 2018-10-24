<?php
    session_start();

    include("includes/openDBconn.php");

    $sql = "DELETE FROM Members WHERE UniqueID = 2";

    //echo($sql);

    $result = $conn->query($sql);

    include("includes/closeDBconn.php");

    header("Location:select.php");
?>