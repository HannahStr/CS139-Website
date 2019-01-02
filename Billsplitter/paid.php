<?php
session_start();
require('database.php');
$db = new Database();
$id = $_POST["Paid"];
var_dump($_POST);
$query = "DELETE FROM bill WHERE bill_ID=".$id.";"; //Remove the Brackets and the ‘ ‘
$row = $db->querySingle("SELECT * FROM bill WHERE bill_ID=".$id.";"); //Also remove
echo $id;
$db->exec($query);
echo "SELECT * FROM bill WHERE bill_ID='".$id."';";
$query2 = "INSERT INTO log (bill_name, bill_amount,user_ID,type) VALUES ('".$row[bill_name]."','".$row[bill_amount]."',".$_SESSION['id'].",'".PAID."');"; //Should be using bind statements
$db->exec($query2);
//header("Location:mybill.php");
?>
