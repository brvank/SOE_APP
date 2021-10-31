<?php

    include 'sqlConnection.php';
    session_start();

    $my_number = $_SESSION['MOBILE'];
    $otp = $_POST['otp'];

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

        if($otp == $_SESSION['OTP']){
            $querry = "SELECT * FROM record WHERE mobile = $my_number;";
            $response = $conn->query($querry);
            $response = mysqli_fetch_array($response);

            echo "Mobile: <h1>{$response[0]}</h1>";
            echo "Username: <h1>{$response[1]}</h1>";
            echo "About: <h1>{$response[2]}</h1>";
            echo "Referral Score: <h1>{$response[3]}</h1>";
            echo "<a href='index.html'>LOGOUT</a>";
        }else{
            $otp = rand(1000,9999);
            $_SESSION['OTP'] = $otp;
            $message = "Your OTP for number ending with ".substr($my_number,6)." is ".$otp;
            echo "<h4>$message</h4>";

            echo "<form method='post' action='details.php'> <label for='otp'>OTP: </label><input type='text' id='otp' name='otp' required=true placeholder='xxxx' maxlength=4> <input type='submit' value='SUBMIT'> </form>";
        }

    ?>
</body>
</html>