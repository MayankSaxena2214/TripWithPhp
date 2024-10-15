<?php
    $insert=false;
    if(isset($_POST['name'])){
    $server="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($server,$username,$password);

    if(!$con){
        die("Connection to this database failed due to ".mysqli_connect_error());

    }
    // echo "Successfully connected to db";

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $other=$_POST['desc'];
    $sql="INSERT INTO `test`.`tour` ( `name`, `age`, `gender`, `email`, `phone`, `other`,`dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other',current_timestamp());";
    // echo $sql;

    if($con->query($sql)==true){
        $insert=true;
    }
    else{
        echo "Error: $sql <br> $con->error";
    }
    $con->close();
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="bg.avif" alt="">
    <div class="container">
        <h3>Welcome to College Tour Form </h3>
        <p>Enter your details to confirm your participation in trip</p>
        <?php
            if($insert==true){
                echo "<p id='aftersubmit'>Thanks for submitting the form. We will be happy to see you.</p>";
            }
         ?>
        <form action="index.php" method="post">
            <input type="text" id="name" name="name" placeholder="Enter your name">
            <input type="number" id="age" name="age" placeholder="Enter your age" >
            <input type="text" id="gender" name="gender" placeholder="Enter your gender">
            <input type="email" id="email" name="email" placeholder="Enter your email">
            <input type="number" id="phone" name="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter other information"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>