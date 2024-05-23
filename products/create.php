<?php 
    session_start();

if(!isset($_SESSION['id'])){

header("location:login.php");


}

   $user_id = $_SESSION['id'] ;

   
     ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>HELLO, <?php echo $_SESSION['username'] ?> WELCOME TO THE CREATE PRODUCT PAGE</h1>
    

    <form action="create.php" method="post" id="max">
    <label for="name">name</label>
    <input type="text" name="name" ><br><br>

    <label for="price">price</label>
    <input  type="number" name="price" ><br><br>

    <label for="description">description</label>
    <input type="text" name="description" ><br><br>

    <a href="view.php">VIEW</a>
    <input type="submit" value="submit" name='sub' >
</form>

    <?php
    include("../connection.php");
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $name= $_POST["name"];
        
        $price = $_POST["price"];
        $description= $_POST["description"];
        
        //Validate user input
        
        

        $query = "INSERT INTO `products`(`name`,`price`,`description`,`user_id`) VALUES ('$name',$price,'$description',$user_id)";
        $result = $conn->query($query);
        if($result){
            //header('location:view.php');
           echo <<<ROW
            <p>You have submitted your products successfully now you can click the below link to view your products</p>
            



            ROW;
        }else{
            echo "Data not inserted: " . $conn->error;
        }
    }

    ?>

   
    <a href="login.php">Logout</a>
 </body>
 </html>
