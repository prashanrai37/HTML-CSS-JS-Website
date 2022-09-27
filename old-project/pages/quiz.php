<?php require ('../server.php'); ?>
<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['success']))
{
    $_SESSION['success'] = false;
    session_destroy();
    $_SESSION = array();
    header('location: login.php');
}
if (isset($_POST['quiz']))
{
    $errors = array();
    $success = array();
    $question_1 = $_POST['question-1'];
    $question_2 = $_POST['question-2'];
    $question_3 = $_POST['question-3'];
    $question_4 = $_POST['question-4'];
    $question_5 = $_POST['question-5'];
    $question_6 = $_POST['question-6'];
    $question_7 = $_POST['question-7'];
    $question_8 = $_POST['question-8'];
    $question_9 = $_POST['question-9'];
    $question_10 = $_POST['question-10'];
    $range = $_POST['range'];
    $max_points = 10;
    $points = 0;
    if (empty($question_1))
    {
        array_push($errors, "Please provide an answer for the first question.");
    }
    if (empty($question_2))
    {
        array_push($errors, "Please provide an answer for the second question.");
    }
    if (empty($question_3))
    {
        array_push($errors, "Please provide an answer for the third question.");
    }
    if (empty($question_4))
    {
        array_push($errors, "Please provide an answer for the fourth question.");
    }
    if (empty($question_5))
    {
        array_push($errors, "Please provide an answer for the fifth question.");
    }
    if (empty($question_6))
    {
        array_push($errors, "Please provide an answer for the sixth question.");
    }
    if (empty($question_7))
    {
        array_push($errors, "Please provide an answer for the seventh question.");
    }
    if (empty($question_8))
    {
        array_push($errors, "Please provide an answer for the eighth question.");
    }
    if (empty($question_9))
    {
        array_push($errors, "Please provide an answer for the ninth question.");
    }
    if (empty($question_10))
    {
        array_push($errors, "Please provide an answer for the tenth question.");
    }
    if (sizeof($errors) == 0)
    {
        if ($question_1 != "true")
        {
            array_push($errors, "1. Correct Answer: True. Your answer: " . $question_1);
        }
        else
        {
            $points++;
        }

        if ($question_2 != "c")
        {
            array_push($errors, "2. Correct Answer: c) . Your answer: " . $question_2 . ")");
        }
        else
        {
            $points++;
        }

        if ($question_3 != "Omission")
        {
            array_push($errors, "3. Correct Answer: Omission . Your answer: " . $question_3);
        }
        else
        {
            $points++;
        }

        if ($question_4 != 4)
        {
            array_push($errors, "4. Correct Answer: 4. Your answer: " . $question_4);
        }
        else
        {
            $points++;
        }

        if ($question_5 != 7)
        {
            array_push($errors, "5. Correct Answer: 7. Your answer: " . $question_5);
        }
        else
        {
            $points++;
        }

        if ($question_6 != 5)
        {
            array_push($errors, "6. Correct Answer: 5. Your answer: " . $question_6);
        }
        else
        {
            $points++;
        }

        if ($question_7 != "1.88")
        {
            array_push($errors, "7. Correct Answer: 1.88. Your answer: " . $question_7);
        }
        else
        {
            $points++;
        }

        if ($question_8 != "0.25")
        {
            array_push($errors, "8. Correct Answer: 0.25. Your answer: " . $question_8);
        }
        else
        {
            $points++;
        }

        if ($question_9 != "0.5")
        {
            array_push($errors, "9. Correct Answer: 0.5. Your answer: " . $question_9);
        }
        else
        {
            $points++;
        }

        if ($question_10 != 100)
        {
            array_push($errors, "10. Correct Answer: 100. Your answer: " . $question_10);
        }
        else
        {
            $points++;
        }

        if (sizeof($errors) < $max_points)
        {
            array_push($success, "You earned " . $points . " points.");
            // Add to user_level
            $user_id = $_SESSION['id'];
            $user_check_query = "SELECT * FROM user_level WHERE User_Details='$user_id' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $level = mysqli_fetch_assoc($result);
            // Check how many points the user has
            $user_points = $level['points_earned'];
            $user_level = $level['user_level'];
            // If there amount of points is divisible by 5, level the user up by amount of points / 5
            $user_points += $points;
            $user_level = floor($user_points / 5);
            // Update level
            mysqli_query($db, "UPDATE user_level SET points_earned = $user_points, user_level = $user_level WHERE User_Details = '$user_id'");
            // Insert quiz result into database
            $quiz_id = substr(getGUID() , 0, 20);
            $percentage = ($points / $max_points) * 100;
            $date = date("Y-m-d");
            mysqli_query($db, "INSERT INTO quiz_results (Quiz_id, points_earned, percentage, date_completed) VALUES ('$quiz_id', $points, $percentage, '$date')");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/error.css">
    <title>Statistics & Computing</title>
</head>
<body>
<?php include_once ("../includes/header.php") ?>
<?php include_once ("../includes/subheader.php") ?>
<?php include_once ("../includes/navigation.php") ?>
<main class="quiz_main">
<section class="question">
  <form class="question_answers" method="post" action="quiz.php">
  <p class="question_title">Mathematical Model:</p>
    <div class="question_answer_group">
      <label>1. Mathematical models help simplify real world scenarios?</label>
      <br>

      <input type="radio" class="question_answer" id="question-1_a" name="question-1" value="true">
      <label for="question-1_a">a) True</label>
    <br>
      <input type="radio" class="question_answer" id="question-1_b" name="question-1" value="false">
      <label for="question-1_b">b) False</label>

    </div>

    <br>

    <div class="question_answer_group">
      <label>2. Which one of these is not a benefit of mathematical models:</label>
      <br>

      <input type="radio" class="question_answer" id="question-2_a" name="question-2" value="a">
      <label for="question-2_a">a) They are quick and easy to produce</label>
      <br>
      <input type="radio" class="question_answer" id="question-2_b" name="question-2" value="b">
      <label for="question-2_b">b) They are easy to understand</label>
      <br>
      <input type="radio" class="question_answer" id="question-2_c" name="question-2" value="c">
      <label for="question-2_c">c) They provide the accurate representation of the situation</label>
      <br>
      <input type="radio" class="question_answer" id="question-2_d" name="question-2" value="d">
      <label for="question-2_d">d) Variables can be readily changed making them versatile</label>

    </div>

    <br>

      <div class="question_answer_group">
      <label>3. Mathematical models must be treated with caution as simplification of problems often leads to  ______ of variables.</label>
      <br>

      <input type="radio" class="question_answer" id="question-3_a" name="question-3" value="Omission">
      <label for="question-3_a">a) Omission</label>
      <br>
      <input type="radio" class="question_answer" id="question-3_b" name="question-3" value="Reproduction">
      <label for="question-3_b">b) Reproduction</label>
      <br>
      <input type="radio" class="question_answer" id="question-3_c" name="question-3" value="Clarity">
      <label for="question-3_c">c) Clarity</label>
      <br>
      <input type="radio" class="question_answer" id="question-3_d" name="question-3" value="Display">
      <label for="question-3_d">d) Display</label>

    </div>

    <br>
      <hr>
    <br>
      <p class="question_title" style="margin-bottom: 5px;">Measurement Of Dispersion:</p>
      <p class="question_title">Find the quartiles for the following numbers: 5, 7, 4, 4, 6, 2, 8</p>

      <div class="question_answer_group">
        <label>4. Lower Quartile:</label>
        <br>

        <input type="radio" class="question_answer" id="question-4_a" name="question-4" value="5">
        <label for="question-4_a">a) 5</label>
        <br>
        <input type="radio" class="question_answer" id="question-4_b" name="question-4" value="4">
        <label for="question-4_b">b) 4</label>
        <br>
        <input type="radio" class="question_answer" id="question-4_c" name="question-4" value="2">
        <label for="question-4_c">c) 2</label>
        <br>
        <input type="radio" class="question_answer" id="question-4_d" name="question-4" value="8">
        <label for="question-4_d">d) 8</label>
      </div>

      <br>

      <div class="question_answer_group">
        <label>5. Upper Quartile:</label>
        <br>

        <input type="radio" class="question_answer" id="question-5_a" name="question-5" value="4">
        <label for="question-5_a">a) 4</label>
        <br>
        <input type="radio" class="question_answer" id="question-5_b" name="question-5" value="5">
        <label for="question-5_b">b) 5</label>
        <br>
        <input type="radio" class="question_answer" id="question-5_c" name="question-5" value="8">
        <label for="question-5_c">c) 8</label>
        <br>
        <input type="radio" class="question_answer" id="question-5_d" name="question-5" value="7">
        <label for="question-5_d">d) 7</label>
      </div>
      <br>
      
        <div class="question_answer_group">
        <label>6. Median:</label>
        <br>

        <input type="radio" class="question_answer" id="question-6_a" name="question-6" value="5">
        <label for="question-6_a">a) 5</label>
        <br>
        <input type="radio" class="question_answer" id="question-6_b" name="question-6" value="7">
        <label for="question-6_b">b) 7</label>
        <br>
        <input type="radio" class="question_answer" id="question-6_c" name="question-6" value="2">
        <label for="question-6_c">c) 2</label>
        <br>
        <input type="radio" class="question_answer" id="question-6_d" name="question-6" value="4">
        <label for="question-6_d">d) 4</label>
        </div>

        <br>
      
        <div class="question_answer_group">
        <label>7. Standard Deviation:</label>
        <br>

        <input type="radio" class="question_answer" id="question-7_a" name="question-7" value="1.88">
        <label for="question-7_a">a) 1.88</label>
        <br>
        <input type="radio" class="question_answer" id="question-7_b" name="question-7" value="1.25">
        <label for="question-7_b">b) 1.25</label>
        <br>
        <input type="radio" class="question_answer" id="question-7_c" name="question-7" value="1.36">
        <label for="question-7_c">c) 1.36</label>
        <br>
        <input type="radio" class="question_answer" id="question-7_d" name="question-7" value="1.98">
        <label for="question-7_d">d) 1.98</label>
        </div>

      <br>
      <hr>
    <br>

          <p class="question_title">Probability:</p>

<div class="question_answer_group">
        <label>8. What is the probability that when a fair coin is flipped and when a fair dice is rolled the results are heads and a even number?</label>
        <br>

        <input type="radio" class="question_answer" id="question-8_a" name="question-8" value="0.3">
        <label for="question-8_a">a) 0.3</label>
        <br>
        <input type="radio" class="question_answer" id="question-8_b" name="question-8" value="0.25">
        <label for="question-8_b">b) 0.25</label>
        <br>
        <input type="radio" class="question_answer" id="question-8_c" name="question-8" value="0.5">
        <label for="question-8_c">c) 0.5</label>
        <br>
        <input type="radio" class="question_answer" id="question-8_d" name="question-8" value="0.2">
        <label for="question-8_d">d) 0.2</label>
        </div>

      <br>

      <div class="question_answer_group">
        <label>9. What is the probability that when two fair dices are rolled that the result is less than or equal to six?</label>
        <br>

        <input type="radio" class="question_answer" id="question-9_a" name="question-9" value="0.2">
        <label for="question-9_a">a) 0.2</label>
        <br>
        <input type="radio" class="question_answer" id="question-9_b" name="question-9" value="0.75">
        <label for="question-9_b">b) 0.75</label>
        <br>
        <input type="radio" class="question_answer" id="question-9_c" name="question-9" value="0.25">
        <label for="question-9_c">c) 0.25</label>
        <br>
        <input type="radio" class="question_answer" id="question-9_d" name="question-9" value="0.5">
        <label for="question-9_d">d) 0.5</label>
        </div>

      <br>

      <div class="question_answer_group">
        <label>10. A fair dice is rolled 300 times. How many times would you expect to see a 2 or a 5?</label>
        <br>

        <input type="radio" class="question_answer" id="question-10_a" name="question-10" value="100">
        <label for="question-10_a">a) 100</label>
        <br>
        <input type="radio" class="question_answer" id="question-10_b" name="question-10" value="150">
        <label for="question-10_b">b) 150</label>
        <br>
        <input type="radio" class="question_answer" id="question-10_c" name="question-10" value="125">
        <label for="question-10_c">c) 125</label>
        <br>
        <input type="radio" class="question_answer" id="question-10_d" name="question-10" value="80">
        <label for="question-10_d">d) 80</label>
        </div>

      <br>


          <br>
      <hr>
    <br>


  <button class="question_answer_submit" type="submit" name="quiz">Submit Answers</button>
  </form>
  <?php include ('../includes/errors.php'); ?>
</section>
</main>
<?php include_once ("../includes/footer.php") ?>
<script>
  document.getElementById("subheading_title").innerText = 'Quiz';
</script>
</body>
</html>
