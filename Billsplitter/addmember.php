<?php
session_start();
require('database.php');
$db = new Database();
$id = $_POST["id"];
//If the group does not current exist for the user
if ($_SESSION['group'] = NULL) {
  //Set the group_ID for the current user as the next availible id
  $maxrow = $db->querySingle("SELECT MAX(group_ID) FROM user;");
  $updatequery = "UPDATE user SET (group_ID = '".($maxrow[group_ID]+1)."') WHERE (user_ID = ".$_SESSION['id'].");";
  $db->exec($updatequery);
  //Sets the session group value as the new group
  $userrow = $db->querySingle("SELECT * FROM user WHERE(user_ID = ".$_SESSION['id'].");");
  $_SESSION['group'] = $userrow['group_ID'];
  //Adds an event for the user joining a group
  $logquery = "INSERT INTO log (user_ID,type) VALUES (".$_SESSION['id'].","NEWGROUP");";
  $db->exec($logquery);
}
//Sets the group_ID for the added user to the id
$updatequery2 = "UPDATE user SET (group_ID = ".$_SESSION['group'].") WHERE (user_ID = '".$id."');";
$db->exec($updatequery2);
//Adds an event for the user given joining a group
$logquery2 = "INSERT INTO log (user_ID,type) VALUES ('".$id."',"NEWGROUP");";
$db->exec($logquery2);
header("Location:mybill.php");
?>
