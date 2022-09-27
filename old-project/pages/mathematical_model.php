<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/index.css">
  <link rel="stylesheet" href="../styles/topic.css">
  <title>Statistics & Computing</title>
</head>
<body>
  <?php include_once("../includes/header.php"); ?>
  <?php include_once("../includes/subheader.php"); ?>
  <?php include_once("../includes/navigation.php"); ?>
  <main class="topic_main">
  <article class="topic_article">
    <p>A mathematical model is a simplified representation of a real world situation.</p>
    <p>They are used to make predictions and by analysing them it provides users with a better understanding of the real situation.</p> 
    <p>An example of mathematical model being used in computer science is scheduling done by operating systems.</p>
    <p>Mathematical models are useful because:</p>
    <ol>
      <li>They are quick and easy to produce</li>
      <li>They are easy to understand</li>
      <li>Variables can be readily changed making them versatile</li>
      <li>They are used to make predictions</li>
      <li>They can help provide control</li>
    </ol>
    <p>
      However they must be treated with caution as they tend to work in certain scenarios only and simplification of problems often leads to omission of variables
    </p>
  </article>
<br>
<iframe class="topic_video" height="450"
src="https://www.youtube.com/embed/xHtsuOB-TPw?controls=1">
</iframe>
</main>

<div class="topic_diagram">
  <p>Diagram:</p>
  <img class="topic_diagram_image" src="../diagrams/mathematical_model.png" alt="Diagram">
</div>

<?php include_once("../includes/footer.php") ?>
<script>
  document.getElementById("subheading_title").innerText = 'Mathematical Models';
</script>

</body>
</html>

