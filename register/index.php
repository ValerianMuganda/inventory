<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login form</title>
    <link rel="stylesheet" href="style.css">
    <style>
      #vale {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <h1>Register Now</h1>
    <div></div>
    <div
      class="div"
      style="border: 1px solid grey; width: 50%; margin: auto; padding: 20px">
      <form action="index.php" method="POST" id="vale">
        <label for="name">Name</label>
        <input type="text" name="names" /><br /><br /><br />
        <label for="email">Email</label>
        <input type="email" name="emaill" /><br /><br /><br />
        <label for="password">Password</label>
        <input type="password" name="password" /><br /><br /><br />
        <input type="submit" name='submit' value = "submit" id="button"/>
      <a href="login.php">login</a>
      </form>
    </div>
    </body>
</html> 

    <?php
include("../connection.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $name = $_POST["names"];
  $email = $_POST["emaill"];
 if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $email_msg = "Invalid email address";
  }
  $password = $_POST["password"];
  $id = $_POST["id"];

  $_SESSION['id'] = $id;
  //check if user exixts
  $sql = "SELECT * FROM users WHERE email = '$email' ";
  $result = $conn->query($sql);

  if($result -> num_rows > 0){
    echo "<script>alert('Email already used')</script>";
  }else{
    $hashed_password = password_hash($password,PASSWORD_DEFAULT);
    $query = "INSERT INTO `users`(`name`,`email`,`passcord`) VALUES ('$name','$email','$hashed_password')";
    $result = $conn -> query($query);

  }
  if($result){
    echo '<script>alert("Data inserted successfully")</script>';
  }else{
    echo '<script>alert("Data was not inserted successfully")</script>';
  }
  }

?>
