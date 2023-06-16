<?php
require_once('config/db.php');

$db=new DatabaseConnection();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .list-img{
            width: 60px;
            height: 50px;
        }
    </style>
  </head>
  <body>


  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="admin.php">Blog CMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin.php">Anasayfa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="list.php">Listele</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kullanıcılar
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="member_insert.php">Kullanıcı Ekle</a></li>
            <li><a class="dropdown-item" href="member_list.php">Kullanıcı Listele</a></li>
            
          </ul>
     
        </li>

        <li><a href="index.php" class="btn btn-danger">Logout</a></li>
       
      </ul>
      
    </div>
  </div>
</nav>