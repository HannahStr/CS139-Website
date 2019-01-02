<?php
session_start();
require('database.php');
$db = new Database();
$name = $_POST["name"];
$amount = $_POST["amount"];

$query3= "SELECT * FROM user WHERE (user.group_ID = ".$_SESSION['group'].");";
$result = $db->query($query3);
if ($result == NULL) {} else {
   while($row = $result->fetchArray())
    {
      $db->exec("INSERT INTO bill (bill_name, bill_amount, user_ID, bill_status) VALUES('".$name."','".$amount."','".$row[user_ID]."',"Unpaid");");
      $db->exec("INSERT INTO log (bill_name, bill_amount, user_ID, type) VALUES ('".$name."','".$amount."','".$row[user_ID]."',"GADD");");

    }
}

header("Location:groupbill.php");
?>
