<?php
session_start();
echo ("<?xml version = \"1.0\" encoding = \"UTF-8\"?>"); 
?>
<!DOCTYPE html>
<html xmls = "http://wwww.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta charset="utf-8" />
<title>Select</title>
</head>

<body>
<h1 style = "text-align:center; "> Assignment 06 - Select </h1>
<?php 

include("includes/menu.php"); 

$servername = "localhost";
$username = "emauro";
$password = "Converse<3";
$dbname = "Goblins";

include("includes/openDBconn.php");

$sql = "SELECT UniqueID, Name, Role, Color, KillCount FROM Members"; /* sql commands need to be in all caps; also COLOR - row (one instance) MEMBERS - column      no dinstinct = all colors listed */

$result = $conn->query($sql);
?>

<table style = "border: 0px; width: 550px; padding: 0px; margin:0 auto; border-spacing: 0px; " title ="Goblins Campaign Kill Count">

<thead>
    <tr> 
        <th colspan = "5" style = "font-weight: bold; background-color: #b1946c; text-align: center; text-decoration: underline;">Goblin Campaign Kill Count</th>
        </tr>
    <tr> 
        <th style = "background-color: #b1946c; font-weight: bold;">Unique ID</th>
        <th style = "background-color: #b1946c; font-weight: bold;">Name</th>
        <th style = "background-color: #b1946c; font-weight: bold;">Roles</th>
        <th style = "background-color: #b1946c; font-weight: bold;">Color</th>
        <th style = "background-color: #b1946c; font-weight: bold;">Kill Count</th>
    </tr>
</thead>
<tfoot>
    <tr> 
        <td colspan = "5" style = "text-align: center; font-style: italic;">Information was pulled from the Goblins Campaign data base
        </td>
    </tr>
</tfoot>
<tbody>
    <?php
        if ($result->num_rows>0){
            while($row = $result->fetch_assoc()){
    ?>
        <tr>
            <td style = "border-right: 1px solid #000;"><?php echo(trim($row["UniqueID"]));    ?></td>
            <td style = "border-right: 1px solid #000;"><?php echo(trim($row["Name"]));    ?></td>
            <td style = "border-right: 1px solid #000;"><?php echo(trim($row["Role"]));    ?></td>
            <td style = "border-right: 1px solid #000;"><?php echo(trim($row["Color"]));    ?></td>
            <td><?php echo(trim($row["KillCount"]));    ?></td> <!--Based on Column Headings-->
        </tr>
    <?php
            }
        }

        else{
            echo("0 results");
        }
    ?>
</tbody>

</table>

<?php
mysql_free_results($result);
include("includes/closeDBconn.php");
?>

</body>

</html>