<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/index.css">
  <link rel="stylesheet" href="../styles/topic.css">
  <link rel="stylesheet" type="text/css" href="../styles/error.css">
  <title>Statistics & Computing</title>
</head>
<body>
  <?php include_once ("../includes/header.php") ?>
<?php include_once ("../includes/subheader.php") ?>
<?php include_once ("../includes/navigation.php") ?>
<main class="topic_main">
<article class="topic_article">
  <p>Range: The range of a set of data = highest value – lowest value.</p>
  <p>The spread of data can be further spilt into quartiles.</p> 
  <p>To calculate quartiles for discrete data types:</p>
  <ol>
    <li>Lower quartile – divide n by 4. 
      When n is a whole number calculate the midpoint between the term and the term above. When n is not a whole number round up.</li>
    <li>Upper quartile – divide n by 4 and multiply by 3. When n is a whole number calculate the midpoint between the term and the term above. When n is not a whole number round up.</li>
  </ol>
  <p>For continuous data interpolation is required, watch the video to use how you can interpolate.</p>
  <p>Sometimes you may be asked to find the standard deviation; this is a measure of how far the data is in comparison to the mean</p>
</article>
<iframe class="topic_video" height="400"
src="https://www.youtube.com/embed/ip0XBBBY6A8?controls=1">
</iframe>
</main>
<?php
// Quiz
if (isset($_SESSION['success']))
{
    include_once ("../questions/measurement_of_dispersion.php");
}
?>
<?php include_once ("../includes/footer.php") ?>
<script>
  document.getElementById("subheading_title").innerText = 'Measurement Of Dispersion';
    const footer = document.querySelector("footer.footer");
    const quiz = document.querySelector("section.question");
    if(!quiz) {
      footer.style.position = "absolute";
      footer.style.bottom = 0;
    }
</script>
</body>
</html>


