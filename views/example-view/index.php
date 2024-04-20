<?php 
  require '../../app/controllers/Controller.php';
  $data = Controller::index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
    for ($i=0; $i < count($data); $i++) { 
  ?>
      <a href="<?=$app_name?>/views/example-view/update.php?id=<?= $data[$i]['id']?>">Edit</a>
      <a href="<?=$app_name?>/app/controllers/Controller.php?action=delete&id=<?= $data[$i]['id']?>"">Hapus</a>
  <?php
    }
  ?>
  
</body>
</html>