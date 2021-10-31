<?php

    $servername = "localhost";
    $user = "root";
    $password = "pG/g.RrQ9)gCw@V";

    $database = "soe";

    // Create connection
    $conn = new mysqli($servername, $user, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

/*

<?php  
$querry = "SELECT * FROM students;";
$result = $conn->query($querry);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo $row["name"]."<br>";
    }
  } else {
    echo "0 results";
  }
?>


*/

?>

