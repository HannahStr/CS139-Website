<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
    <title>
    Log in
    </title>
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
        <A HREF = "home.php">Home</A>
      </div>
      <div class= 'menu-item'>
        <A HREF = "register.php">Register</A>
      </div>
    </div>
    <div id= 'content'>
      <form action  = "authenticate.php" method = "post">
	       <p>Log in details<p>
	       <label>Email:</label>
	       <input name = "email"><br>
	       <label>Password:</label>
	       <input type="password" name="user_password"> <br>
	       <input type="submit" value="Log in">
      </form>
    </div>
  </body>
</html>
