<?php

    include "connect_sql.php";

    if(isset($_POST["btn"])){
        $lname = $_POST["lastname"];
        $fname = $_POST["firstname"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        //define sql query
        $sql = "INSERT INTO `users`(`lastname`,`firstname`,`email`,`password`) VALUES('$lname','$fname','$email','$password')";

        //check the query if its executed well
        if(mysqli_query($conn, $sql)){
            echo "Inserted new row";
            header("location: users.php");
        }else{
            echo "ERROR: ". mysqli_error($conn);
        }
    }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="bg container">
        <div class="header">
            <h2>𝓡𝓮𝓰𝓲𝓼𝓽𝓮𝓻</h2>
        </div>
        <form method="post" style="width:32%" action="index.php">
            <div class="form-group ">
                <label>First Name</label>
                <input type="text" name="firstname" class="form-control" place-holder="First Name" required>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lastname" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Confirm Email</label>
                <input type="email" name="confirm email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm password" class="form-control" required>
            </div>
            <div class="input-group">
                <button type="submit" name="btn" class="btn">Register </button>
            </div>
            <p>
                Already a member? <a href="login.php">Log in</a>
            </p>
        </form>
    </div>



</body>

</html>