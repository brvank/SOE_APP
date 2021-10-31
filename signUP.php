<?php 

    include 'sqlConnection.php';

    $my_number = $_GET["mobile"];
    $referral = $_GET["referral"];
    $username = $_GET["username"];
    $about = $_GET["about"];

    $querry = "SELECT COUNT(mobile) FROM record WHERE mobile=$my_number;";
    $result = $conn->query($querry);

    $row = mysqli_fetch_array($result);

    $exist = false;

    if($row[0] == 1){
        $exist = true;
    }else{
        if($referral != null){
            $querry = "SELECT COUNT(mobile) FROM record WHERE mobile=$referral;";
            $result = $conn->query($querry);
            $row = mysqli_fetch_array($result);
            if($row[0] == 1){
                $querry = "UPDATE record SET score = score + 1 WHERE mobile=$referral;";
                $conn->query($querry);
            }else{
                echo "<h1>No referral number like ".$referral.".<h1>";
            }
        }

        $querry = "INSERT INTO record(mobile,username,about,score) VALUES('{$my_number}', '{$username}', '{$about}', 0)";
        if($conn->query($querry)){
            echo "<p>Logged in successfully!</p>";
        }
        echo "<br>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if($exist){
            echo "<h1>User already exist, do login!</h1>";
            echo "<a href='index.html'>HOME</a>";
            echo "<a href='singUP.html'>SIGNUP</a>";
        }else{
            echo "Mobile: <h1>{$my_number}</h1>";
            echo "Username: <h1>{$username}</h1>";
            echo "About: <h1>{$about}</h1>";
            echo "Referral Score: <h1>0</h1>";
            echo "<a href='index.html'>LOGOUT</a>";
        }
    ?>
</body>
</html>