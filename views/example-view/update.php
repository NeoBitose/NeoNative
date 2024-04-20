<?php 
  require '../../app/controllers/Controller.php';
  $data = Controller::detail($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="<?=$app_name?>/app/controllers/PortofolioController.php?action=update&id=<?=$_GET['id']?>" method="POST" enctype="multipart/form-data">
    <input type="text" value="<?= $data ?>">
    <button type="submit">Submit</button>
  </form>
</body>
</html>