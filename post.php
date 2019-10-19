<?php
if(!isset($_GET['slug'])) {
    echo "no title";
    die;
}
require("db.php");

$slug = $_GET['slug'];
$sql = "SELECT * FROM posts WHERE slug='$slug' LIMIT 1";

//$title = $_GET['title'];
//$sql = "SELECT * FROM posts WHERE title='$title'";

$result = $GLOBALS['mysqli']->query($sql);
if($result->num_rows  <= 0 ) {
    echo "NO DATA!";
    die;
}
$row = $result->fetch_assoc();

echo ' <!DOCTYPE html>
 <html lang="en" dir="ltr">
     <head>
         <meta charset="utf-8">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         <link rel="stylesheet" href="css/styles.css"/>
         <title></title>
     </head>
     <body>
         <div class="page-wrapper">
            <div class="header-posts">
                <img src="images/blogpic.png" class="logo" alt="logo">

                 <h1>
                    '. $row['title']. '

                </h1>


                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="#">

                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedcontent" aria-controls="navbarSupportedcontent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedcontent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role"button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Previous Posts
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDrobdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another Action</a>
                                    <a class="dropdown-item" href="#">One Action</a>
                                </div>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Contact<span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link disabled" href="#">ADMIN<span class="sr-only"></span></a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div>
            <div class="content-wrapper">
                '. $row['content']. '
            </div>
            <div>
                '. $row['date']. '
            </div>
            <div class="form-group">
                <a href="index.php" type="submit" class="btn btn-primary">Back</a>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     </body>
 </html>';

 ?>
