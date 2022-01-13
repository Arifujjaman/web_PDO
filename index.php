<?php 
$con = new PDO('mysql:host=sql6.freesqldatabase.com;dbname=sql6465201', 'sql6465201', 'u1R4fKiMrH');
$statement = $con->prepare('select * from booklists');
$statement->execute();
$booklists = $statement->fetchAll(PDO::FETCH_OBJ);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
 <div class="container">
 
   <div class="card mt-7">
   
     <div class="card-body">

     <div class="form-group">
         <a class="btn btn-info" href="create.php">Add new record</a>
      </div>

      <div class="form-group">
         <p align="right"><a class="btn btn-info" href="">search</a></p>
      </div>
      <table class="table table-dark table-striped">
        <tr>
          <th>Id</th>
          <th>Title</th>
          <th>Author</th>
          <th>Available</th>
          <th>Pages</th>
          <th>Isbn</th>
          <th>Action</th>
        </tr>
        <?php foreach($booklists as $book): ?>
        <tr>
          <td><?= $book->id; ?></td>
          <td><?= $book->title; ?></td>
          <td><?= $book->author; ?></td>
          <td><?= $book->available; ?></td>
          <td><?= $book->pages; ?></td>
          <td><?= $book->isbn; ?></td>
          <td>
            <a class="btn btn-info" href="edit.php?id=<?= $book->id; ?>">Edit</a>
            <a class="btn btn-danger" href="delete.php?id=<?= $book->id; ?>">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
      </table>
     </div>
   </div>
 </div> 
</body>
</html>