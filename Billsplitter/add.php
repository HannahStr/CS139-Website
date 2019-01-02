<?php
session_start();
require('database.php');
$db = new Database();
$name = $_POST["name"];
$amount = $_POST["amount"];
$query = "INSERT INTO bill (bill_name, bill_amount, user_ID, bill_status) VALUES('".$name."','".$amount."',".$_SESSION['id'].", "Unpaid");";
$db->exec($query);
$row = $db->querySingle("SELECT * FROM bill WHERE("bill_ID"='".$id."');");
$query2 = "INSERT INTO log (bill_name, bill_amount,user_ID,type) VALUES ('".$row[bill_name]."','".$row[bill_amount]."',".$_SESSION['id'].","ADD");";
$db->exec($query2);
header("Location:mybill.php");
?>
