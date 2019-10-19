<?php

require("db.php");

$id = $_GET['id'];

// Check to see if the post is being deleted
if($_POST) {
    //assign POST data to variables
    foreach($_POST as $k => $v) {
        $$k = $v;
    }

    $stmt = "DELETE FROM posts WHERE id='$id' LIMIT 1";
    $delete = $mysqli->query($stmt);

    // Check to see if DELETE is successful
    if($delete) {
        echo '<p class="alert alert-success">You have successfully deleted post</p>';

    } else {
        echo $mysqli->error;
    }
}
$stmt = "SELECT title, slug, content FROM posts WHERE id= '$id'";
$result = $mysqli->query($stmt);
$post = $result->fetch_assoc();

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
     <head>
         <meta charset="utf-8">
         <title>Delete Post</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         <link rel="stylesheet" href="css/styles.css"/>
     </head>
     <body>
         <div class="container">
             <h3>DELETE:<?php echo " ". $post['title']; ?></h3>
             <form action="delete.php?id=<?php echo $id ?>" method="POST">
                 <div class="form-group">
                     <input type="text" name="title" class="form-control" placeholder="<?php echo $post['title']; ?> " />
                 </div>
                 <div class="form-group">
                     <input type="text" name="slug" class="form-control" placeholder="<?php echo $post['slug']; ?> " />
                 </div>
                 <div class="form-group">
                     <textarea name="content" class="form-control"><?php echo $post['content']; ?></textarea>
                 </div>
                 <button type="submit" class="btn btn-danger">Delete post</button>
                 <a href="admin.php" class="btn btn-link">Back</a>
             </form>
         </div><!-- container -->

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     </body>
 </html>
