<?php
    include 'sqlConnection.php';

    $my_number = $_GET['mobile'];
    session_start();
    $_SESSION['MOBILE'] = $my_number;

    $querry = "SELECT COUNT(mobile) FROM record WHERE mobile = $my_number;";
    $response = $conn->query($querry);

    $row = mysqli_fetch_array($response);

    $exist = false;
    if($row[0] == 1){
        $exist = true;
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
        $otp = rand(1000,9999);
        $_SESSION['OTP'] = $otp;
        $message = "Your OTP for number ending with ".substr($my_number,6)." is ".$otp;
        echo "<h4>$message</h4>";

        echo "<form method='post' action='details.php'> <label for='otp'>OTP: </label><input type='text' id='otp' name='otp' required=true placeholder='xxxx' maxlength=4> <input type='submit' value='SUBMIT'> </form>";
    }else{
        echo "<h1>No user with ".$my_number.". Signup please!</h1>";
        echo "<a href='index.html'>HOME</a>";
        echo "<a href='login.html'>LOGIN</a>";
    }
    ?>
</body>

</html>
