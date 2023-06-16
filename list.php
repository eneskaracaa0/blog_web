<?php

require_once('include/header.php');
$select=$db->prepare('SELECT * FROM text ');
$select->execute();
?>

  <div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Resim</th>
      <th scope="col">Başlık</th>
      <th scope="col">Açıklama</th>
      <th scope="col">Oluşturulduğu Tarih</th>
      <th scope="col">İşlem</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($select as $text) {
    
    ?>
    <tr>
      <th scope="row"><?php echo $text['id'];?></th>
      <td>
          <?php if ($text['image']) {
            $imagePath = 'images/' . $text['image'];
            if (file_exists($imagePath)) {
              ?>
              <img class="list-img" src="<?php echo $imagePath; ?>" alt="Resim">
            <?php } else { ?>
              Resim Bulunamadı
            <?php }
          } else { ?>
            Resim Yok
          <?php } ?>
        </td>
      <td><?php echo $text['title'];?></td>
      <td><?php echo $text['contents'];?></td>
      <td><?php echo $text['text_date']?></td>
         <td><a class="btn btn-danger" href="process.php?id=<?php echo $text['id'];?>&req=delete">Delete</a>
          </td>
          <td><a class="btn btn-info" href="edit.php?id=<?php echo $text['id'];?>">Düzenle</a>
      </td>
    </tr>
    <?php }?>
    
  </tbody>
</table>
  </div>





   
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>