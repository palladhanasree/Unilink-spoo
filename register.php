<!DOCTYPE html>
<?php
require_once('connection.php');
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport", content="width=device-width, initial-scale=1.0">
        <title>Home | Unilink</title>
        <link rel="stylesheet" href="css/register.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>

    <body>
        <h1>Register</h1>
        <div class="box">
        <form class="" method="post" autocomplete="off">
        <div><label for="email" class="lemail">EMAIL<input id="email" name="email" type="email" placeholder="Enter your email" required/></label></div>
        <div><label for="name" class="lname">Name<input id="name" name="name" type="text" placeholder="Enter your name" required/></label></div>
        <div><label for="username" class="luname">User Name<input id="username" name="username" type="text" placeholder="Enter your username" required/></label></div>
        <div><label for="password" class="lpassword">Password<input id="password" name="password" type="password" placeholder="Enter your password"  required/></label></div>
        <div class="from-group margin-top20">
            <button type="submit" id="ex3" name="register" class="btn-primary">Register</button>
        </div>
         </form>
        </div>
      
    </body>
    <?php
    if (isset($_POST["register"])){
    $email=$_POST["email"];
    $username=$_POST["username"];
    $name=$_POST["name"];
    $password=$_POST["password"];
    

    $sql="INSERT INTO  userdetail (`email`, `username`,`name`,`password`) VALUES ('$email','$username','$name','$password')";
    $query=mysqli_query($con,$sql);
    if($query){
       
      ?>
      <script>
          alert("Successfully Registered!");
      </script>
      
      <?php
       header("Location:intex.php");
      }
      else{
        ?>
        <script>
        alert('registration failed');
        </script>
        <?php
        }
        }
        ?>
    </html>