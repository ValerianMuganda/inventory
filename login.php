
<?php include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="POST" id="otonde">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value='Login' name='submit' />
        <input type="checkbox" onclick='forHide()'  >Hide Password!
    </form>

    <script>

        function forHide(){
            let x = document.getElementById('password');
            if(x.type === 'password'){
                x.type = 'text';
            }else{
                x.type = 'password';
            }
        }
    </script>


</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM `users` WHERE `name` = '$username'";
    
    $res = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($res) > 0){
        $row = $res -> fetch_assoc();
        $is_valid_password = password_verify($password,$row['passcord']);
        if($is_valid_password==TRUE){
            header("location:welcome.php");
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $row['ID'];
            exit;
       }else{
            echo "<script>alert('Invalid password,please insert the correct passsword')</script>";
       }
    }
}
exit;

?>
