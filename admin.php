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


$selectcategory=$db->prepare('SELECT * FROM category');
$selectcategory->execute();

?>




<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="process.php" method="POST" enctype="multipart/form-data">
                <h3>Blog İçerik</h3>
                <div class="mb-3">
                     <input type="text" class="form-control" name="title" placeholder="Yazı Başlığı giriniz..">
                </div>
               <div class="mb-3">
            <input type="text" class="form-control" name="contents"  placeholder="Yazı İçeriği Giriniz..">
               </div>        
               <div class="mb-3">
            <input type="file" class="form-control-file" name="image"  placeholder="Resim yükleyiniz..">
               </div>
                 <div class="mb-3">
                <select class="form-select" name="category_id" aria-label="Default select example">
                    <?php
                    foreach($selectcategory as $cat){

                    ?>
                   
                     <option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
                  
                    <?php }?>
                </select>
                 </div>
                 <input type="submit" class="btn btn-success" name="insert">
                 
                 
            </form>
        </div>
    </div>
</div>





   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>