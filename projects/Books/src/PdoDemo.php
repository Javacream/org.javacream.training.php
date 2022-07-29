<?php
$username = "user";
$password = "user";
$db_url = "mysql:host=h2908727.stratoserver.net:3406;dbname=javacream";
$pdo = new PDO($db_url, $username, $password);
$statement = $pdo->prepare("select * from BOOKS");
$statement->execute();
while($row = $statement->fetch()) {
  echo $row['isbn']." ".$row['title'];
}
?>