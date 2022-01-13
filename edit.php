<?php 
$id = $_GET['id'];

$con = new PDO('mysql:host=sql6.freesqldatabase.com;dbname=sql6465201', 'sql6465201', 'u1R4fKiMrH');
$statement = $con->prepare('select * from booklists where id=:id');
$statement->execute([
  ':id' => $id
]);
if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['available']) && isset($_POST['pages']) && isset($_POST['isbn'])) {
  $title = $_POST['title'];
  $author = $_POST['author'];
  $available = $_POST['available'];
  $pages = $_POST['pages'];
  $isbn = $_POST['isbn'];
  $statement = $con->prepare("update booklists set title=:title, author=:author, available=:available, pages=:pages, isbn=:isbn where id=:id");
  $statement->execute([
    ':title' => $title,
    ':author' => $author,
    ':available' => $available,
    ':pages' => $pages,
    ':isbn' => $isbn,
    ':id' => $id,
  ]);
  header('location: index.php');
}


$book = $statement->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
 <div class="container">
   <div class="card mt-8">
     <div class="card-body">
     <form action="" method="post">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
          <label for="author">Author</label>
          <input type="text" name="author" id="author" class="form-control">
        </div>
        <div class="form-group">
          <label for="available">Available</label>
          <input type="text" name="available" id="available" class="form-control">
        </div>
        <div class="form-group">
          <label for="pages">Pages</label>
          <input type="text" name="pages" id="pages" class="form-control">
        </div>
        <div class="form-group">
          <label for="isbn">Isbn</label>
          <input type="text" name="isbn" id="isbn" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-outline-info">Update a book</button>
         <p align="right"><a  href="index.php" >go back</a></p>
        </div>
      </form>
     </div>
   </div>
 </div> 
</body>
</html>