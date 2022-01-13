<?php 
$id = $_GET['id'];
$con = new PDO('mysql:dbname=sql6465201;host=sql6.freesqldatabase.com', 'sql6465201', 'u1R4fKiMrH');
$statement = $con->prepare('delete from booklists where id=:id');
$statement->execute([
  ':id' => $id
]);

header('location: index.php');
