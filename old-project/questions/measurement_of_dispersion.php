<?php
error_reporting(0);
if (isset($_POST['measurement_of_dispersion_question']))
{
    $errors = array();
    $success = array();
    $upper_quartile = $_POST['upper_quartile'];
    $lower_quartile = $_POST['lower_quartile'];
    $range = $_POST['range'];
    $max_points = 3;
    $points = 0;
    if (empty($upper_quartile))
    {
        array_push($errors, "Please provide an answer for the upper quartile.");
    }
    if (empty($lower_quartile))
    {
        array_push($errors, "Please provide an answer for the lower quartile.");
    }
    if (empty($range))
    {
        array_push($errors, "Please provide an answer for the range.");
    }
    if (sizeof($errors) == 0)
    {
        if ($upper_quartile != 2)
        {
            array_push($errors, "Upper Quartile is 2. Your answer: " . $upper_quartile);
        }
        else
        {
            $points++;
        }

        if ($lower_quartile != 8)
        {
            array_push($errors, "Lower Quartile is 8. Your answer: " . $lower_quartile);
        }
        else
        {
            $points++;
        }

        if ($range != 9)
        {
            array_push($errors, "Range is 9. Your answer: " . $range);
        }
        else
        {
            $points++;
        }
        if (sizeof($errors) < $max_points)
        {
            array_push($success, "Points earned: " . $points);
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
        }
    }
}
?>

<section class="question">
  <p class="question_title">Calculate the upper quartile, lower quartile and range of these numbers: 1, 2, 2, 5, 6, 8, 10</p>

  <form class="question_answers" method="post" action="measurement_of_dispersion.php">
    <div class="question_answer_group">
      <label>Upper Quartile:</label>
      <br>

      <input type="radio" class="question_answer" id="upper_quartile_a" name="upper_quartile" value="1">
      <label for="upper_quartile_a">a) 1</label>

      <input type="radio" class="question_answer" id="upper_quartile_b" name="upper_quartile" value="2">
      <label for="upper_quartile_b">b) 2</label>

      <input type="radio" class="question_answer" id="upper_quartile_c" name="upper_quartile" value="5">
      <label for="upper_quartile_c">c) 5</label>

      <input type="radio" class="question_answer" id="upper_quartile_d" name="upper_quartile" value="6">
      <label for="upper_quartile_d">d) 6</label>

    </div>

    <div class="question_answer_group" style="margin-top: 25px;">
      <label>Lower Quartile:</label>
      <br>

      <input type="radio" class="question_answer" id="lower_quartile_a" name="lower_quartile" value="1">
      <label for="lower_quartile_a">a) 1</label>

      <input type="radio" class="question_answer" id="lower_quartile_b" name="lower_quartile" value="2">
      <label for="lower_quartile_b">b) 2</label>

      <input type="radio" class="question_answer" id="lower_quartile_c" name="lower_quartile" value="8">
      <label for="lower_quartile_c">c) 8</label>

      <input type="radio" class="question_answer" id="lower_quartile_d" name="lower_quartile" value="10">
      <label for="lower_quartile_d">d) 10</label>
    </div>
    <div class="question_answer_group" style="margin-top: 25px;">
     <label>Range:</label>
     <br>

      <input type="radio" class="question_answer" id="range_a" name="range" value="5">
      <label for="range_a">a) 5</label>

      <input type="radio" class="question_answer" id="range_b" name="range" value="6">
      <label for="range_b">b) 6</label>

      <input type="radio" class="question_answer" id="range_c" name="range" value="8">
      <label for="range_c">c) 8</label>

      <input type="radio" class="question_answer" id="range_d" name="range" value="9">
      <label for="range_d">d) 9</label>
    </div>
  <button class="question_answer_submit" type="submit" name="measurement_of_dispersion_question">Submit Answers</button>
  </form>
  <?php include ('../includes/errors.php'); ?>
</section>
