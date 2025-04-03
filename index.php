<?php
$insert=false;
if(isset($_POST["name"])){

//SET CONNECTION VARIABLES
$server="localhost";
$username="root";
$password="";

//CREATE A DATABASE CONNECTION
$con = mysqli_connect($server,$username,$password);

//CHECK FOR CONNECTION SUCCESS
if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
}
// echo "connection to the database is successfully completed";

//COLLECT POST VARIABLES
$name = $_POST["name"];
$gender = $_POST["gender"];
$age = $_POST["age"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$desc = $_POST["desc"];
$sql = "INSERT INTO `travel_form`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) 
VALUES ('$name', '$age', '$gender', '$email', 
'$phone', '$desc', current_timestamp());";
// $sql;

//EXECUTE THE QUERY
if($con->query($sql)==TRUE){
    // echo "successfully executed";

    //FLAG FOR SUCCESSFUL INSERTION
    $insert=true;
}
else{
    echo "ERROR : $sql <br> $con->error";
}

//CLOSE THE DATABASE CONNECTION
$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpeg" alt="IIT Kharagpur">
    <div class="container">
        <h1>Welcome to IIT Kharagpur Trip form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the trip.</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
</body>
</html>