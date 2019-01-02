<?php
session_start();
require "database.php";
$email = $_POST["email"];
$password = $_POST["user_password"];
$db = new Database();
$row = $db->querySingle("SELECT * FROM user WHERE(email = '".$email."');");
if(sha1($row['salt']."--".$password) == $row['password']) {
$_SESSION['id'] = $row['user_ID'];
$_SESSION['group'] = $row['group_ID'];
header('Location:mybill.php');
} else {
header('Location:home.php');
}
?>
