<?php
$dev_server = "http://127.0.0.1:5173";
?>
<!doctype html>
<html lang="en">

<head>
  <?php include 'src/master/links.php'; ?>
</head>

<body>
  <?php include 'src/master/header.php'; ?>














  <script type="module" src="<?php echo $dev_server; ?>/src/main.js"></script>
</body>

</html>