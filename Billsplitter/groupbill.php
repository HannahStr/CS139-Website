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
     <?php
     echo "Your user ID is ".$_SESSION['id']."";
     ?>
      <p>Our bills:</p>
      <ul>
	       <?php
	       require "database.php";
	       $db = new Database();
	       $query= "SELECT * FROM bill WHERE (bill.group_ID = ".$_SESSION['group']." AND bill.user_ID = ".$_SESSION['id'].";";
	       $result = $db->query($query);
	       if ($result == NULL) {} else {
	          while($row = $result->fetchArray())
	           {
	              echo "<br>".$row["bill_name"]."";

               $query2= "SELECT (user.name, bill.bill_amount, bill.bill_status) FROM bill JOIN user ON (bill.group_ID = ".$_SESSION['group']." AND bill.bill_name = ".$row["bill_name"]." AND user.user_ID = bill.user_ID;";
       	       $result2 = $db->query($query2);
       	       if ($result2 == NULL) {} else {
       	          while($row2 = $result2->fetchArray())
       	           {
                     echo "".$row2["name"]." - ".$row2["bill_amount"]." ".$row2["bill_status"]."";
                   }
              }

                echo "<form action="remove.php" method = "post">";
                   echo "<input type="submit" value="Delete" name=".$row["bill_name"].">";
                echo"</form>";
	           }
	       }
         ?>
      </ul>


      <label>Adding a new group bill:</label>
      <form action  = "gadd.php" method = "post">
         <label>Bill:</label>
         <input name = "name"><br>
         <label>Individual Amount:</label>
         <input name="amount"> <br>
         <input type="submit" value="Submit">
      </form>

      <label>Adding a new group member:</label>
      <form action  = "addmember.php" method = "post">
         <label>ID of the new user to add to the group:</label>
         <input name = "id"><br>
         <input type="submit" value="Submit">
      </form>

      <label>Removing a group member:</label>
      <form action  = "addmember.php" method = "post">
         <label>ID of the user to remove from the group:</label>
         <input name = "id"><br>
         <input type="submit" value="Submit">
      </form>

    </div>
  </body>
</html>
