<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./styles/index.css">
  <link rel="stylesheet" href="./styles/footer.css">
  <title>Statistics and Computing</title>
</head>
<body>
  <?php include_once('./includes/header.php') ?>
  <?php include_once('./includes/subheader.php') ?>
  <?php include_once('./includes/navigation.php') ?>
  <main class="main">
    <article class="article">
    <p>Welcome!</p>
    <p>This website will help you understand statistical concepts which are often used in computer science.</p>
    <p>There are currently six topics for you to look at and all topics are followed up by questions and quizzes you can do.</p>
    <p>Earn points on the quizzes to earn levels.</p>
    </article>
    <iframe class="video" height="450"
src="https://www.youtube.com/embed/oGGYIw_pIj8?controls=1">
</iframe>

  </main>
  <section class="information">
    <p style="margin-bottom: 20px; text-align: center; font-weight: bold; font-size: 30px;">How to use the website?</p>
    <p><span>Nav Bar:</span> Select which topic you would like to learn more about by moving the slider and clicking on the topic.
    </p><br>
<p><span>Videos:</span> Most pages will have videos on the topic, watch these videos for further clarification and more information.
</p><br>
<p><span>Questions:</span> Each topic will have practice questions you can do. These will be multiple choice questions, select which answer you think is the correct one and after selecting one for each question click submit to get answers.
</p></section>
<?php include_once("./includes/footer.php") ?>
<script>
  document.getElementById("subheading_title").innerText = 'Homepage';
</script>
</body>
</html>