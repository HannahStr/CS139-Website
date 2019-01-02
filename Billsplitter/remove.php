<?php
session_start();
require('database.php');
$db = new Database();
$name = $_POST["Paid"];
$query= "SELECT * FROM bill WHERE (bill.group_ID = ".$_SESSION['group']." AND bill.bill_name = '".$name."' ;";
$result = $db->query($query);
if ($result == NULL) {} else {
   while($row = $result->fetchArray())
    {
      $db->exec("INSERT INTO log (bill_name, bill_amount, user_ID, type) VALUES ('".$row[bill_name]."','".$row[bill_amount]."','".$row[user_ID]."','REMOVE';");
      $db->exec("DELETE FROM bill WHERE bill.bill_ID = '".$row[bill_ID]."';");
    }
}
header("Location:groupbill.php");
?>
