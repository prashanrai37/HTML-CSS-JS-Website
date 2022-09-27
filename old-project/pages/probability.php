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
  <?php include_once("../includes/header.php") ?>
<?php include_once("../includes/subheader.php") ?>
<?php include_once("../includes/navigation.php") ?>
<main class="topic_main">
<article class="topic_article">
  <p>Many events can't be predicted with total certainty.</p>
  <p>The best we can say is how likely they are to happen, using the idea of probability.</p> 
  <p>In order to understand probability you need to know these three terms:</p>
  <ol>
    <li>Experiment: A repeatable process that gives a number of outcomes</li>
    <li>Event: A collection of one or more outcomes</li>
    <li>Sample Space: A set of all possible outcomes of an experiment</li>
  </ol>
  <p>In general:</p>
  <p>Probability of an event happening = Number of ways it can happen ÷ Total number of outcomes.</p>
</article>
<iframe class="topic_video" height="400"
src="https://www.youtube.com/embed/KzfWUEJjG18?controls=1">
</iframe>
</main>

<div class="topic_diagram">
<p>Diagram:</p>
<div class="box_wrapper">
  <div class="box"></div>
  <div class="box"></div>
  <div class="box"></div>
  <div class="box"></div>
  <div class="box"></div>
  <div class="box"></div>
  <div class="box"></div>
</div>
<div class="box_inputs">
<input type="number" id="box_input" min="0" max="8">
<button id="box_input_btn">Fill in</button>
</div>
</div>

<?php
// Quiz
if (isset($_SESSION['success']))
{
    include_once("../questions/probability.php");
}
?>
<?php include_once("../includes/footer.php") ?>
<script src="../diagrams/probability.js"></script>
<script>
  document.getElementById("subheading_title").innerText = 'Probability';
</script>
</body>
</html>


