<?php
session_start();
require('database.php');
$db = new Database();
$id = $_POST["Submit"];
$query = "UPDATE bill SET bill_status ='Paid' WHERE ("bill_ID"='".$id."');";
$db->exec($query);
$row = $db->querySingle("SELECT * FROM bill WHERE("bill_ID"='".$id."');");
$query2 = "INSERT INTO log (bill_name, bill_amount,user_ID,type) VALUES ('".$row[bill_name]."','".$row[bill_amount]."',".$_SESSION['id'].","GPAID");";
$db->exec($query2);
header("Location:mybill.php");
?>
