<?php
require_once('include/header.php');

session_start();
$log_id =$_SESSION['id'];

if(!isset($log_id)){
    header('location:login.php');
    echo 'Yetkisiz erişim';
}else{
  //echo 'hoşgeldiniz';
}


$selectrole=$db->prepare('SELECT * FROM role');
$selectrole->execute();

?>




<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="process.php" method="POST">
                <h3>Üye Yönetim Paneli</h3>
                <div class="mb-3">
                     <input type="text" class="form-control" name="firstname" placeholder="Üye adı giriniz..">
                </div>
               <div class="mb-3">
            <input type="text" class="form-control" name="lastname"  placeholder="Üye Soyadı Giriniz..">
               </div>        
               <div class="mb-3">
            <input type="text" class="form-control" name="email"  placeholder="Email giriniz.." required>
               </div>
                <div class="mb-3">
            <input type="text" class="form-control" name="password"  placeholder="Şifre Giriniz..">
               </div>
               <div class="mb-3">
                <select class="form-select" name="role_id" aria-label="Default select example">
                    <?php
                    foreach($selectrole as $role){

                    ?>
                    <option value="<?php echo $role['role_id']?>"><?php echo $role['name']?></option>
                    <?php     } ?>
                </select>
               </div>
                 
                 <input type="submit" class="btn btn-success" name="memberinsert">
                 
                 
            </form>
        </div>
    </div>
</div>





   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>