<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../styles/index.css">
  <link rel="stylesheet" href="../styles/footer.css">
  <title>Statistics and Computing</title>
</head>
<body>
  <?php include_once('../includes/header.php') ?>
  <?php include_once('../includes/subheader.php') ?>
  <?php include_once('../includes/navigation.php') ?>

  <main class="wip" style="text-align: center; margin-top: 100px;">
    <h1>This page is currently being developed.</h1>
    <h3>Sorry for the inconvenience.</h3>
  </main> 

<?php include_once("../includes/footer.php") ?>
<script>
  document.getElementById("subheading_title").innerText = 'Work In Progress!';
  const footer = document.querySelector("footer.footer");
  footer.style.position = "fixed";
  footer.style.bottom = 0;
</script>
</body>
</html>