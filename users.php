<?php
    include "connect_sql.php";

    if(isset($_POST['update'])){
        header('location: update.php?id='.$_POST['id']);
    }

    if(isset($_POST['delete'])){
        $sql_delete = "DELETE FROM users WHERE id=". $_POST['id'];
      
        //check query if executed well
        if(mysqli_query($conn, $sql_delete)){
            // echo "Deleted Successfully";
        }else{
            echo "ERROR: ". mysqli_error($conn);
        }
    }
    $sql = "SELECT * FROM `users`";

    $result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Alegreya SC' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Form Handler</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(mysqli_num_rows($result) > 0){
                    //output data each row
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?php echo $row["id"];?></td>
                            <td><?php echo $row["lastname"];?></td>
                            <td><?php echo $row["firstname"];?></td>
                            <td><?php echo $row["email"];?></td>
                            <td>
                                <form action="./users.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                    <button type="submit" name="update">UPDATE</button>
                                    <button type="submit" name="delete">DELETE</button>
                                </form>
                            </td>
                        </tr>
                <?php
                    }
                }else{
                    echo " 0 results";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
