<?php
require_once('include/header.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Yazıyı seç
    $select = $db->prepare('SELECT * FROM text WHERE id = ?');
    $select->execute([$id]);
    $text = $select->fetch(PDO::FETCH_ASSOC);

    // Kategori seçeneklerini al
    $selectcategory = $db->prepare('SELECT * FROM category');
    $selectcategory->execute();
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="process.php" method="POST" enctype="multipart/form-data">
                <h3>Blog İçerik</h3>
                <div class="mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Yazı Başlığı giriniz.." value="<?php echo $text['title']; ?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="contents" placeholder="Yazı İçeriği Giriniz.." value="<?php echo $text['contents']; ?>">
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control-file" name="image" placeholder="Resim yükleyiniz..">
                </div>
                <div class="mb-3">
                    <select class="form-select" name="category_id" aria-label="Default select example">
                        <?php foreach ($selectcategory as $cat) { ?>
                            <option value="<?php echo $cat['id']; ?>" <?php if ($text['category_id'] == $cat['id']) echo 'selected'; ?>><?php echo $cat['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="hidden" name="id" value="<?php echo $text['id']; ?>">
                <input type="submit" class="btn btn-success" name="update" value="Güncelle">
            </form>
        </div>
    </div>
</div>


  





   
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>