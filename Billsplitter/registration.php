<?php
  session_start();
  header("Location:mybill.php");
  require "database.php";
  $db = new Database();
  $name = $_POST["name"];
  $pw = $_POST["user_password"];
  $email = $_POST["email"];
  $salt = sha1(time());
  $encrypted_password = sha1($salt."--".$pw);
  $query = "INSERT INTO user (salt,name,password,email) VALUES('".$salt."','".$name."','".$encrypted_password."','".$email.");";
  $db->exec($query);
  $row = $db->querySingle("SELECT * FROM user WHERE(email = '".$email."');");
  $_SESSION['id'] = $row['user_ID'];
?>
