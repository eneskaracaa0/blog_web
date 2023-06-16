<?php
require_once('config/db.php');
$db=new DatabaseConnection();

$select=$db->prepare('SELECT * FROM text ');
$select->execute();

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BLOG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    <style>
      .custom-img {
    height:200px; 
    object-fit: cover; 
   
}
    </style>
  </head>
  <body>

<div class="container">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategoriler
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Backend Diller</a></li>
            <li><a class="dropdown-item" href="#">Frontend Diller</a></li>
           
          </ul>
        </li>
       
      </ul>
    </div>
  </div>
</nav>




    <div class="row justify-content-center mt-5">
        <?php foreach ($select as $text) { ?>
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                   <img class="card-img-top custom-img" src="<?php echo 'images/'.$text['image']; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $text['title']; ?></h5>
                        <p class="card-text"><?php echo substr($text['contents'],0,50).'...'; ?></p>
                        <p class="card-text"><?php echo $text['text_date']; ?></p>
                        <a href="#" class="btn btn-primary">Oku</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>










 




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>