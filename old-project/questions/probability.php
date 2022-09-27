<?php
error_reporting(0);
if (isset($_POST['probability_question']))
{
    $errors = array();
    $success = array();
    $question_a = $_POST['question-a'];
    $question_b = $_POST['question-b'];
    $question_c = $_POST['question-c'];
    $max_points = 3;
    $points = 0;
    if (empty($question_a))
    {
        array_push($errors, "Please provide an answer for the first question.");
    }
    if (empty($question_b))
    {
        array_push($errors, "Please provide an answer for the second question.");
    }
    if (empty($question_c))
    {
        array_push($errors, "Please provide an answer for the third question.");
    }
    if (sizeof($errors) == 0)
    {
        if ($question_a != "1/6")
        {
            array_push($errors, "3. The correct answer is 1/6. Your answer: " . $question_a);
        }
        else
        {
            $points++;
        }

        if ($question_b != "3/6")
        {
            array_push($errors, "2. The correct answer is 3/6. Your answer: " . $question_b);
        }
        else
        {
            $points++;
        }

        if ($question_c != "1/4")
        {
            array_push($errors, "3. The correct answer is 1/4. Your answer: " . $question_c);
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
  <form class="question_answers" method="post" action="probability.php">
    <div class="question_answer_group">
      <label>1. A fair dice is rolled what is the probability it lands on 6:</label>
      <br>

      <input type="radio" class="question_answer" id="question-a_a" name="question-a" value="1/6">
      <label for="question-a_a">a) 1/6</label>

      <input type="radio" class="question_answer" id="question-a_b" name="question-a" value="2/6">
      <label for="question-a_b">b) 2/6</label>

      <input type="radio" class="question_answer" id="question-a_c" name="question-a" value="5/6">
      <label for="question-a_c">c) 5/6</label>

      <input type="radio" class="question_answer" id="question-a_d" name="question-a" value="6/6">
      <label for="question-a_d">d) 6/6</label>

    </div>

    <div class="question_answer_group" style="margin-top: 25px;">
      <label>2. A fair dice is rolled what is the probability it will land on an even number:</label>
      <br>

      <input type="radio" class="question_answer" id="question-b_a" name="question-b" value="1/6">
      <label for="question-b_a">a) 1/6</label>

      <input type="radio" class="question_answer" id="question-b_b" name="question-b" value="2/6">
      <label for="question-b_b">b) 2/6</label>

      <input type="radio" class="question_answer" id="question-b_c" name="question-b" value="3/6">
      <label for="question-b_c">c) 3/6</label>

      <input type="radio" class="question_answer" id="question-b_d" name="question-b" value="10/6">
      <label for="question-b_d">d) 10/6</label>
    </div>
    <div class="question_answer_group" style="margin-top: 25px;">
     <label>3. A coin is flipped 3 times, what is the probability it will land on heads twice:</label>
     <br>

      <input type="radio" class="question_answer" id="question-c_a" name="question-c" value="1/4">
      <label for="question-c_a">a) 1/4</label>

      <input type="radio" class="question_answer" id="question-c_b" name="question-c" value="2/6">
      <label for="question-c_b">b) 2/6</label>

      <input type="radio" class="question_answer" id="question-c_c" name="question-c" value="5/8">
      <label for="question-c_c">c) 5/8</label>

      <input type="radio" class="question_answer" id="question-c_d" name="question-c" value="4/8">
      <label for="question-c_d">d) 4/8</label>
    </div>
  <button class="question_answer_submit" type="submit" name="probability_question">Submit Answers</button>
  </form>
  <?php include ('../includes/errors.php'); ?>
</section>
