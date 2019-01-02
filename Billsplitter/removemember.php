<?php
session_start();
require('database.php');
$db = new Database();
$id = $_POST["id"];
//If the group does not current exist for the user redirects back
if ($_SESSION['group'] = NULL) {
} else {
//Sets the group_ID for the user to be null
$updatequery = "UPDATE user SET (group_ID = "NULL") WHERE (user_ID = '".$id."');";
$db->exec($updatequery);
//Adds an event for the user removed from the group
$logquery = "INSERT INTO log (user_ID,type) VALUES ('".$id."',"REMOVEGROUP");";
$db->exec($logquery);
//Removes the group bills for the user
$deletequery= "DELETE * FROM bill WHERE (bill.group_ID = ".$_SESSION['group']." AND bill.user_ID = '".$id."';";
$db->exec($deletequery);
}
header("Location:groupbill.php");
?>
