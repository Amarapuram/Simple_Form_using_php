<?php
$insert=false;
if(isset($_POST['name'])){
    $server="localhost";
    $dbname="trip";
    $username="root";
    $password=""; 

    $con=mysqli_connect($server,$username,$password,$dbname);
    if(!$con){
        die("Connection to this database Failed duue to ".mysqli_connect_error());

    }
    // echo"Success Connection to DATABASE";
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];
    $sql="INSERT INTO `trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `date`) 
    VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";
    
    if($con->query($sql)==true){
       $insert=true;
       
    }
    else{
        echo"ERROR :$sql <br> $con->error";
    }
    

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;700&family=Roboto:ital,wght@1,300&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="img1.jpg" alt="img" srcset="">
    <div class="container">
        <h1>
            Welcome to BIT!!  TRIP FORM
        </h1>
        <p>Enter the form to confirm the participation in the trip</p>
        <?php
        if($insert){
            echo"<p class='submitMsg'>Thank You For Filling the form.we are happy to see u joining at the TRIP</p>";
        }
        ?>
        <form action="index.php" method="post" onsubmit="return validateForm()">
        <input type="text" name="name" id="name" placeholder="Enter your Name">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
        <input type="email" name="email" id="email" placeholder="Enter your Email">
        <input type="phone" name="phone" id="Phone" placeholder="Enter your PhNo">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Any Other info if required"></textarea>
        <button class="btn">SUBMIT</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>