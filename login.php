<?php
  $login=false;
  $alertshow=false;
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'parcials/_dbconnect.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
  
    //run sql query 
    $sql="select * from users where username = '$username' and password ='$password'";
    $result= mysqli_query($conn , $sql);
    $num=mysqli_num_rows($result);
    if($num==1){
      $login=true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;
      //direct throught users on the page
      header("location: welcome.php");
    }
    else{
      $alertshow="invalid credentials";
    }
  }

?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
    <link rel="stylesheet" href="login.css" type="text/css" />
    <script src="https://kit.fontawesome.com/425763763b.js" crossorigin="anonymous"></script>
  </head>
  <body>
      <!-- add external file in php -->
  <?php require 'parcials/_nav.php'?>
  <?php
  //show alert 
  if($login){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account is logged in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($alertshow){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error</strong> '.$alertshow.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>


 <!-- login form create  -->
  <div class="container">
  <h1><span><img class="m1"src="dr.png" /></span><br />Login</h1>
  <form action="/registerform/login.php" method="post">
  <div class="mb-3 col-md-6">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username">
    
  <div class="mb-3 ">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
  <!-- <hr> -->
 



</form>
</div>




















    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
</body>
</html>