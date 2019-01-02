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
        <A HREF = "notifications.php">Activity log</A>
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

      <p>My bills:</p>
      <ul>
	       <?php
	       require "database.php";
	       $db = new Database();
	       $query= "SELECT * FROM bill WHERE bill.user_ID = ".$_SESSION['id'].";";
	       $result = $db->query($query);
	       if ($result == NULL) {} else {
	          while($row = $result->fetchArray())
	           {
	              echo "<li>".$row["bill_name"]." - ".$row["bill_amount"]."</li>";
                echo "<form action='paid.php' method = 'post'>";
                   echo "<input type="submit" value="Paid" name='".$row["bill_ID"]."'>";
                echo"</form>";
	           }
	       }
         ?>
      </ul>

      <p>Group bills:</p>
      <ul>
	       <?php
	       require "database.php";
	       $db = new Database();
         //$row = $db->querySingle("SELECT * FROM user WHERE (user.user_ID = ".$_SESSION['id'].");");
	       $query= "SELECT * FROM bill WHERE bill.group_ID = ".$_SESSION['group'].";";
	       $result = $db->query($query);
	       if ($result == NULL) {} else {
	          while($row = $result->fetchArray())
	           {
	              echo "<li>".$row["bill_name"]." - ".$row["bill_amount"]." : ".$row["bill_status"]."</li>";
                echo "<form action="gpaid.php" method = "post">";
                   echo "<input type="submit" value="Paid" name=".$row["bill_ID"].">";
                echo"</form>";
	           }
	       }
         echo "xxx";
         ?>
      </ul>

      <label>Adding a new personal bill:</label>
      <form action  = "add.php" method = "post">
         <label>Bill:</label>
         <input name = "name"><br>
         <label>Amount:</label>
         <input name="amount"> <br>
         <input type="submit" value="Submit">
      </form>



    </div>
  </body>
</html>
