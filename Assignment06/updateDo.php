<?php
    session_start();

    $name = addslashes($_POST["name"]);
    $role = addslashes($_POST["role"]);
    $color = addslashes($_POST["color"]);
    $killcount = addslashes($_POST["killcount"]);
    $uniqueID = addslashes($_POST["uniqueID"]);

    if (($uniqueID == "")){
        $_SESSION["errorMessage"] = "You Must Enter A Value For All Boxes!!";
        header("Location:select.php");
        exit;
    }

    else{
        $_SESSION["errorMessage"] = "";
    }


    include("includes/openDBconn.php");

    $sql = "SELECT UniqueID FROM Members WHERE UniqueID=".$uniqueID;

    //echo($sql);

    $result = $conn->query($sql);

    if($result->num_rows == 0){
        $_SESSION["errorMessage"] = "You must create a goblin with an id of 2!!";
        header("Location:insert.php");
        exit;
    }
    else{
        $_SESSION["errorMessage"] = "";
    }

    $sql = "UPDATE Members SET Name = '".$name."', Role = '".$role."', Color = '".$color."', KillCount = '".$killcount."' WHERE Members.UniqueID = " . $uniqueID; 
    //put ` before and after each variable name when seen in myadmin
    //echo($sql);

    $result = $conn->query($sql);
    include("includes/closeDBconn.php");

    header("Location:select.php");
?>