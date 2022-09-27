<?php require ('../server.php'); ?>
<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['success']))
{
    $_SESSION['success'] = false;
    session_destroy();
    $_SESSION = array();
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/index.css">
  <link rel="stylesheet" href="../styles/account.css">
  <link rel="stylesheet" href="../styles/footer.css">
  <title>Statistics & Computing</title>
</head>
<body>
<?php include_once ("../includes/header.php") ?>
<?php include_once ("../includes/subheader.php") ?>
<?php include_once ("../includes/navigation.php") ?>
<main class="account_main">
<img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png" alt="Avatar">
<aside class="account_details">
<?php
$email = $_SESSION['email_address'];
$id = $_SESSION['id'];
echo '<p>Name: ' . $_SESSION['first_name'] . ' ' . $_SESSION['surname'] . '</p>';
echo '<p>Age: ' . $_SESSION['age'] . '</p>';
echo '<p>Email: ' . $email . '</p>';
$query = mysqli_query($db, "SELECT * FROM user_level WHERE User_Details = '$id' LIMIT 1");
$level_record = mysqli_fetch_assoc($query);
$points = $level_record['points_earned'];
$level = $level_record['user_level'];
echo '<p>Points: ' . $points . '</p>';
echo '<p>Level: ' . $level . '</p>';
?>
</aside>
</main>
<?php include_once ("../includes/footer.php") ?>
<script>
  const footer = document.querySelector("footer.footer");
  footer.style.position = "fixed";
  footer.style.bottom = 0;
  document.getElementById("subheading_title").innerText = 'My Account';
</script>
</body>
</html>