<?php
$servername = "h2908727.stratoserver.net:3406";
$username = "user";
$password = "user";
$db = "javacream";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
$query = "SELECT * from messages";

$res = mysqli_query($conn, $query);

if ($res) {

    $row = mysqli_fetch_row($res);
    echo $row[0];
}

mysqli_free_result($res);
mysqli_close($conn);

?>