<?php
require_once('config/db.php');
$db=new DatabaseConnection();

session_start();

if(isset($_POST['submit'])){
   
    $email=$_POST['email'];
    $password=md5($_POST['password']);
   
        $select=$db->prepare('SELECT * FROM member WHERE  email=? AND password=? ');
     $select->execute(array($email,$password));
     if($select->rowCount() > 0){
        $row=$select->fetch(PDO::FETCH_ASSOC);
        echo $_SESSION['id']=$row['id'];
        header('Location:admin.php');
        
       
     }else{
        echo 'incorrect password';
       

     }
     

       
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
       
        
    </style>
  </head>
  <body>

  <div class="form-container">

    <form action="" method="post">
        <h3>Login</h3>
      
        <input type="text" name="email" required placeholder="enter email" class="box">
        <input type="password" name="password" required placeholder="enter password" class="box">
       
        <input type="submit" name="submit" class="btn" value="register now">
        <p>already have an account <a href="register.php">register now</a></p>


    </form>



    </div>





    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>