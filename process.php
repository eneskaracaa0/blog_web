<?php
require_once('config/db.php');
$db = new DatabaseConnection();

//Üye Ekle
if (isset($_POST['memberinsert'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];

    
    $insertMember = $db->prepare('INSERT INTO member (firstname, lastname, email, password) VALUES (?, ?, ?, ?)');
    $insertMember->execute([$firstname, $lastname, $email, $password]);
   
  

  $memberId=$db->lastInsertId();



   
    $insertRoleAuth = $db->prepare('INSERT INTO role_auth (member_id, role_id) VALUES (?, ?)');
    $insertRoleAuth->execute([$memberId, $role_id]);

    if ($insertMember && $insertRoleAuth) {
        echo '<script>alert("Üye başarıyla eklendi")</script>';
        header('Location: member_list.php');
    } else {
        echo '<script>alert("Üzgünüz, bir hata oluştu")</script>';
    }
}


//Yazı Ekleme
if(isset($_POST['insert'])){
    $title=$_POST['title'];
    $contents=$_POST['contents'];
    $category_id=$_POST['category_id'];

    //resim yükleme
    $image=$_FILES['image']['name'];
    $image_tmp=$_FILES['image']['tmp_name'];
    $image_path='images/'.$image;
    move_uploaded_file($image_tmp,$image_path);

    $insert=$db->prepare('INSERT INTO text (title,contents,category_id,image) VALUES(?,?,?,?) ');
    $insert->execute(array($title,$contents,$category_id,$image));

   if($insert){
    header('location:admin.php');
    echo 'Başarılı';
   }else{
     header('location:admin.php');
    echo 'Başarısız';
   }
}

//Yazı Silme
if(isset($_GET['id']) && isset($_GET['req']) && $_GET['req'] == 'delete'){
    $id = $_GET['id'];

    $dlt = $db->prepare('DELETE FROM text WHERE id = ?');
    $dlt->execute([$id]);

    if($dlt){
        echo '<script>window.alert("Silme İşlemi Başarılı");</script>';
        header('Location: list.php');
        exit();
    } else{
        echo '<script>window.alert("Üzgünüm, bir hata oluştu.");</script>';
    }
}


//Yazı Güncelleme
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $contents = $_POST['contents'];
    $category_id = $_POST['category_id'];

  
    $old_image_path = $text['image'];

   
    if ($_FILES['image']['name'] != '') {
        
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = 'images/' . $image;
        move_uploaded_file($image_tmp, $image_path);
    } else {
       
        $image = $old_image_path;
    }

    $update = $db->prepare('UPDATE text SET title=?, contents=?, category_id=?, image=? WHERE id=?');
    $update->execute([$title, $contents, $category_id, $image, $id]);


    if ($old_image_path != '' && $old_image_path != $image) {
        unlink($old_image_path);
    }

    // İşlem başarılı ise yönlendirme yap
    header('Location: list.php');
}





?>
