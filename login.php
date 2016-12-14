<?php
session_start();
        $username = $_POST["username"];
        $password = $_POST["password"];
// Connect to the database
  $host = "fall-2016.cs.utexas.edu";
  $user = "cy4562";
  $pwd = "jw.iL_HoqB";
  $dbs = "cs329e_cy4562";

  $connect = mysqli_connect ($host, $user, $pwd, $dbs);
  
  
if(!array_key_exists("page", $_POST)){
        $usernamecheck = false;
        $passwordcheck = false;
        $usernames= array();
        $passwords= array();
        $index=0;
        $table = "user";
        $result = mysqli_query($connect, "SELECT * from $table");
        while ($row = $result->fetch_row())
        {
          array_push($usernames, $row[3]);
          array_push($passwords, $row[4]);
          $index=$index+1;
        }
        for($i = 0; $i < $index; $i++){
                if($username === $usernames[$i])
                {
                        $usernamecheck = true;
                }
                if($password === $passwords[$i])
                {
                        $passwordcheck = true;
                }
        }
}

if (!array_key_exists("username", $_POST) && !array_key_exists("page", $_SESSION)){
   if($_POST["register"] == "Register" ){
   $table = "user";
   $firstname = $_POST["firstname"];
   $lastname = $_POST["lastname"];
   $phone = $_POST["phone"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   $address = $_POST["address"];
   $stmt = mysqli_prepare ($connect, "INSERT INTO $table VALUES (?, ?, ?, ?, ?, ?)");
   mysqli_stmt_bind_param ($stmt, 'ssssss', $firstname, $lastname, $phone, $email,     $password, $address);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   }
   print <<<LOGIN
   <html>
   <head>
      <title> Log in or Sign Up </title>
      <link rel="stylesheet" type="text/css" href="login.css">
   </head>
   </body>
      <h1> Sign In </h1>
      <form id="signin" action="./login.php" method="post">
      <table>
         <tr><td> Username </td><td><input type="text" name="username" value=""></td></tr>
         <tr><td> Password </td><td><input type="text" name="password" value=""></td></tr>
         <tr><td> <input type="submit" name="login" value="Login"></td><td><input type="reset" name="reset" value="Reset"></td></tr>
      </table>
      </form>
      <h1> Register </h1>
      <form id="register" action="./login.php" method="post">
      <table>
         <tr><td> First Name </td><td><input type="text" name="firstname" value=""></td></tr>
         <tr><td> Last Name </td><td><input type="text" name="lastname" value=""></td></tr>
         <tr><td> Email (username) </td><td><input type="email" name="email" value=""></td></tr>
         <tr><td> Confirm Email </td><td><input type="email" name="cemail" value=""></td></tr>
         <tr><td> Phone </td><td><input type="tel" name="phone" value=""></td></tr>
         <tr><td> Password </td><td><input type="text" name="password" value=""></td></tr>
         <tr><td> Confirm Password </td><td><input type="text" name="cpassword" value=""></td></tr>
         <tr><td> Address </td><td><input type="text" name="address" value=""></td></tr>
         <tr><td> <input type="submit" name="register" value="Register"></td><td><input type="reset" name="reset" value="Reset"></td></tr>
      </table>
      </form>
      <script src="./login.js" type="text/javascript"> </script>
   </body>
   </html>
LOGIN;
}
else if($usernamecheck==True && $passwordcheck == True && !array_key_exists("page", $_SESSION)){

      print <<<SUCCESSREGISTER
   <html>
   <head>
      <title> Thank You</title>
      <link rel="stylesheet" type="text/css" href="login.css">      
   </head>
   </body>
      <h3> Thank you for Choosing us!</h3>
      <p> Register for transport times or go back to the homepage </p>
      <form action="./register.php" method="post">
         <input type="submit" name="register" value="Register">
      </form>
      <form action="./homepage.html" method="post">
         <input type="submit" name="home" value="Home">
      </form>
   </body>
   </html>
SUCCESSREGISTER;
   if (!isset($_SESSION["page"]))
   {
      $_SESSION["page"] = 0;
      $_SESSION["error"] = false;
   }

}
else if (($usernamecheck == False || $passwordcheck == False) && !array_key_exists("page", $_SESSION)){
      print <<<FAILEDLOGIN
   <html>
   <head>
      <title> Log in or Sign Up </title>
      <h1> Username or Password is Incorrect <br> Please try again or sign up</h1>
      
      <link rel="stylesheet" type="text/css" href="login.css">
   </head>
   </body>
      <h1> Sign In </h1>
      <form id="signin" action="./login.php" method="post">
      <table>
         <tr><td> Username </td><td><input type="text" name="username" value=""></td></tr>
         <tr><td> Password </td><td><input type="text" name="password" value=""></td></tr>
         <tr><td> <input type="submit" name="login" value="Login"></td><td><input type="reset" name="reset" value="Reset"></td></tr>
      </table>
      </form>
      <h1> Register </h1>
      <form id="register" action="./login.php" method="post">
      <table>
         <tr><td> First Name </td><td><input type="text" name="firstname" value=""></td></tr>
         <tr><td> Last Name </td><td><input type="text" name="lastname" value=""></td></tr>
         <tr><td> Email (username)</td><td><input type="email" name="email" value=""></td></tr>
         <tr><td> Confirm Email </td><td><input type="email" name="cemail" value=""></td></tr>
         <tr><td> Phone </td><td><input type="tel" name="phone" value=""></td></tr>
         <tr><td> Password </td><td><input type="text" name="password" value=""></td></tr>
         <tr><td> Confirm Password </td><td><input type="text" name="cpassword" value=""></td></tr>
         <tr><td> Address </td><td><input type="text" name="address" value=""></td></tr>
         <tr><td> <input type="submit" name="register" value="Register"></td><td><input type="reset" name="reset" value="Reset"></td></tr>
      </table>
      </form>
      <script src="./login.js" type="text/javascript"> </script>
   </body>
   </html>
FAILEDLOGIN;
}

   session_destroy();
   
?>