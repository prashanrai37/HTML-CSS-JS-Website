<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/index.css">
  <link rel="stylesheet" href="../styles/topic.css">
  <link rel="stylesheet" type="text/css" href="../styles/error.css">
  <title>Statistics & Computingg</title>
</head>
<body>
  <?php include_once ("../includes/header.php") ?>
<?php include_once ("../includes/subheader.php") ?>
<?php include_once ("../includes/navigation.php") ?>
<main class="topic_main">
<article class="topic_article">
  <p>In statistics you collect observation or measurements of variables.</p>
  <p>These observations are known as data.</p> 
  <p>Variables can be categorised as discrete or continuous data types.</p>
  <p>From these data values a single number can be used to describe its centre – measure of location, also known as Averages</p>
  <p>There are three types of averages mode, median and mean. Watch the video to learn more on these averages.</p>
</article>
<iframe class="topic_video" height="400"
src="https://www.youtube.com/embed/B1HEzNTGeZ4?controls=1">
</iframe>
</main>

<div class="topic_diagram">
<p>Diagram:</p>
<div class="box_wrapper">
  <input type="number" min="1" class="box" style="text-align: center; font-size: 32px;" ></input>
  <input type="number" min="1" class="box" style="text-align: center; font-size: 32px;" ></input>
  <input type="number" min="1" class="box" style="text-align: center; font-size: 32px;" ></input>
  <input type="number" min="1" class="box" style="text-align: center; font-size: 32px;" ></input>
  <input type="number" min="1" class="box" style="text-align: center; font-size: 32px;" ></input>
</div>
<div class="box_inputs">
<button id="box_input_btn">Calculate</button>
<div id="output" style="margin-top: 25px;"></div>
</div>
</div>

<?php
// Quiz
if (isset($_SESSION['success']))
{
    include_once ("../questions/summary_of_data.php");
}
?>
<?php include_once ("../includes/footer.php") ?>
<script src="../diagrams/summary_of_data.js"></script>
<script>
  document.getElementById("subheading_title").innerText = 'Summary Of Data';
</script>

</body>
</html>

