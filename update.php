<?php

    include "connect_sql.php";

    if(isset($_POST["btn"])){
        $lname = $_POST["lastname"];
        $fname = $_POST["firstname"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql_update = "UPDATE users SET lastname='".$lname."',firstname='".$fname."',email='".$email."',password='".$password."' WHERE id=".$_POST["id"];
        echo $sql_update;
        //check the query if its executed well
        if(mysqli_query($conn, $sql_update)){
            echo "Updated new row";
            header("location: users.php");
        }else{
            echo "ERROR: ". mysqli_error($conn);
        }

    }
    if(isset($_GET["id"])){
        $sql = "SELECT * FROM users WHERE id=".$_GET['id'];
        $result = mysqli_query($conn,$sql);
        $users = mysqli_fetch_assoc($result);
        
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
       
        <form method="POST" style="width:32%" action="update.php">
                <input type="hidden" name="id" value="<?php echo $users['id'];?>">
                <div class="form-group">
                <label>First Name</label>
                    <input class="input-field" type="text" value="<?php echo $users['firstname'];?>" name="firstname" placeholder="First Name" required minlength=2 maxlength=25>
                </div>
                <div class="form-group">
                <label>Last Name</label>
                    <input class="input-field" type="text" name="lastname" placeholder="Last Name" value="<?php echo $users['lastname'];?>" required minlength=2 maxlength=25>
                </div>           
                <div class="form-group">
                <label>Email</label>
                    <input class="input-field" type="email" name="email" placeholder="Email Address" value="<?php echo $users['email'];?>" required>
                </div>
                <div class="form-group">
                <label>Confirm Email</label>
                    <input class="input-field" type="email" name="confirmemail" placeholder="Confirm Email Address" value="<?php echo $users['email'];?>" required>
                </div>
                <div class="form-group">
                <label>Password</label>
                    <input class="input-field" type="password" name="password" placeholder="Password" value="<?php echo $users['password'];?>" required minlength=8>
                </div>
                <div class="form-group">
                <label>Confirm Password</label>
                    <input class="input-field" type="password" name="confirmpassword" placeholder="Confirm Password" value="<?php echo $users['password'];?>" required minlength=8>
                </div>
                <div class="input-group">
                <button type="submit" name="btn" class="btn">Update</button>
            </div>
            <p>
                Already a member? <a href="index.php">Register</a>
            </p>
            </form>
    </div>



</body>

</html>