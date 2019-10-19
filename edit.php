<?php

require('db.php');

$id = $_GET['id'];

// Check to see if the post is being submitted
if($_POST) {

    foreach($_POST as $k => $v) { // this does the same thing above.... I think. It is supposed to insert potentially 110 values etc dynamically
       $$k = $v;
    }

    $stmt = "UPDATE posts SET slug='$slug', content='$content', title='$title', category_id='$category_id' WHERE id='$id'";
    $update = $mysqli->query($stmt);

    // check if INSERT is successful
    if($update) {
        echo 'Changes saved';
    } else {
        echo $mysqli->error;
    }
}
$stmt = "SELECT * FROM posts WHERE id='$id' LIMIT 1";
$result = $mysqli->query($stmt);
$post = $result->fetch_assoc();

$stmt = "SELECT p.*, c.name
        FROM posts p
        JOIN categories c
        ON p.category_id = c.id
        ORDER BY id DESC LIMIT 10";
$result = $mysqli->query($stmt);



 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Edit Post</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css"/>
    </head>
    <body>
        <div class="container">
            <h1>Edit:<?php echo " ". $post['title']; ?></h1>
            <form action="edit.php?id=<?php echo $id ?>" method="POST">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?> " required/>
                </div>
                <div class="form-group">
                    <select name="category_id">
                        <option value="<?php echo $category['name']; ?>"> </option>

                            <?php
                               while($category = $result->fetch_assoc()) {
                                   echo '<option value="' . $category['id'] .'">' . $category['name'] . '</option>';
                               }
                             ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="slug" class="form-control" value="<?php echo $post['slug']; ?> " required/>
                </div>
                <div class="form-group">
                    <textarea name="content" class="form-control" required><?php echo $post['content']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save post</button>
                <a href="admin.php" class="btn btn-primary">Back</a>
            </form>
        </div><!-- container -->

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
