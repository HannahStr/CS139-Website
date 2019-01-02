<?php
session_start();
if ($_SESSION['id']==NULL) {
  header("Location:home.php");
}

?>

<!DOCTYPE html>
<html>

  <head>
    <link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
    <title>My bill</title>
    <meta charset="UTF-8">
    <style></style>
  </head>

  <body>
    <div id= 'title'>
      <div class= 'title'>
        <a href="home.php">Bill-splitting</a>
      </div>
    </div>

    <div id= 'menu'>
      <div class= 'menu-item'>
        <A HREF = "notifications.php">Activity Log</A>
      </div>
      <div class= 'menu-item'>
        <A HREF = "mybill.php">My bills</A>
      </div>
      <div class= 'menu-item'>
        <A HREF = "groupbill.php">Group bills</A>
      </div>
      <div class= 'menu-item'>
        <A HREF = "deauthenticate.php">Log out</A>
      </div>
    </div>

    <div id= 'content'>
      <p>My activity log:</p>
      <ul>
	       <?php
	       require "database.php";
	       $db = new Database();
         //$row = $db->querySingle("SELECT * FROM user WHERE (user.user_ID = ".$_SESSION['id'].");");
	       $query= "SELECT * FROM log WHERE (bill.user_ID = ".$_SESSION['id'].") ORDER BY DESC;";
	       $result = $db->query($query);
	       if ($result == NULL) {} else {
	          while($row = $result->fetchArray())
	           {
                CASE
                WHEN ($row["type"] = "ADD") THEN echo'You added a new bill for '".$row["bill_name"]."' for £'".$row["bill_amount"]."'<br>';
                WHEN ($row["type"] = 'GADD') THEN echo'Your group has added a new bill for '".$row["bill_name"]."' for £'".$row["bill_amount"]."'<br>';
                WHEN ($row["type"] = 'PAID') THEN echo'You paid a bill for '".$row["bill_name"]."' for £'".$row["bill_amount"]."'<br>';
                WHEN ($row["type"] = 'GPAID') THEN echo'You paid a group bill for '".$row["bill_name"]."' for £'".$row["bill_amount"]."'<br>';
                WHEN ($row["type"] = 'REMOVE') THEN echo'Your group removed a bill for '".$row["bill_name"]."' for £'".$row["bill_amount"]."'<br>';
                WHEN ($row["type"] = 'NEWGROUP') THEN echo'You have joined a group<br>';
                WHEN ($row["type"] = 'REMOVEGROUP') THEN echo'You been removed from a group<br>';
                END
	           }
	       }
         ?>
      </ul>

    </div>

  </body>
</html>
