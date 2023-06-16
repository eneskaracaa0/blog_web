<?php

require_once('include/header.php');
$select=$db->prepare('SELECT member.id, member.firstname,member.lastname,member.email,role_auth.role_id FROM member INNER JOIN role_auth ON member.id=role_auth.member_id');
$select->execute();


?>

  <div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ad</th>
      <th scope="col">Soyad</th>
      <th scope="col">Email</th>
      <th scope="col">Rolü</th>
      <th scope="col">İşlem</th>
    </tr>
  </thead>
  <tbody>
   <?php
   while ($row =$select->fetch(PDO::FETCH_ASSOC)) {
   ?>
    <tr>
      
      <td>
         <th scope="row"><?php echo $row['id'];?></th> 
        </td>
      <td><?php echo $row['firstname'];?></td>
      <td><?php echo $row['lastname'];?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo ($row['role_id'] =='1' ? 'Admin' : 'Üye' )?></td>
          <td><a class="btn btn-info" href="member.edit.php?id=<?php echo  $row['id'];?>">Güncelle</a>
    </tr>
  <?php  } ?>
    
  </tbody>
</table>
  </div>





   
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>