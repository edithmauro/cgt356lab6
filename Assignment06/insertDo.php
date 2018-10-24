<?php
    session_start();

    $name = addslashes($_POST["name"]);
    $role = addslashes($_POST["role"]);
    $color = addslashes($_POST["color"]);
    $killcount = addslashes($_POST["killcount"]);
    $uniqueID = addslashes($_POST["uniqueID"]);

    if (($name == "") || ($role == "") || ($color == "") || ($killcount == "") || ($uniqueID == "")){
        $_SESSION["errorMessage"] = "You Must Enter A Value For All Boxes!!";
        header("Location:insert.php");
        exit;
    }

    else if (!is_numeric($uniqueID)){
        $_SESSION["errorMessage"] = "You much enter a number for unique id";
        header("Location:insert.php");
        exit;
    }
    else if (!is_numeric($killcount)){
        $_SESSION["errorMessage"] = "You much enter a number for unique id";
        header("Location:insert.php");
        exit;
    }

    else{
        $_SESSION["errorMessage"] = "";
    }


    include("includes/openDBconn.php");

    $sql = "SELECT UniqueID FROM Members WHERE UniqueID=".$uniqueID;

    //echo($sql);

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $_SESSION["errorMessage"] = "You cannot enter duplicate data";
        header("Location:insert.php");
        exit;
    }
    else{
        $_SESSION["errorMessage"] = "";
    }

    $sql = "INSERT INTO Members (UniqueID, Name, Role, Color, KillCount) VALUES ('".$uniqueID."', '".$name."', '".$role."', '".$color."', '".$killcount."')"; 
    //put ` before and after each variable name in the myadmin page
    //echo($sql);

    $result = $conn->query($sql);
    include("includes/closeDBconn.php");

    header("Location:select.php");
?>