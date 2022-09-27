<?php
    error_reporting(0);
    if (isset($_POST['probability_question'])) 
    {
        $errors = array();
        $success = array();
        $question_a = $_POST['question-a'];
        $question_b = $_POST['question-b'];
        $question_c = $_POST['question-c'];
        $question_d = $_POST['question-d'];
        $max_points = 4;
        $points = 0;
        if(empty($question_a))
        {
          array_push($errors, "Please provide an answer for the first question.");
        }
        if(empty($question_b))
        {
          array_push($errors, "Please provide an answer for the second question.");
        }
        if(empty($question_c))
        {
          array_push($errors, "Please provide an answer for the third question.");
        }
        if(empty($question_d))
        {
          array_push($errors, "Please provide an answer for the fourth question.");
        }
        if(sizeof($errors) == 0) {
            if ($question_a != 2)
            {
                array_push($errors, "1. The correct answer is 2. Your answer: " . $question_a);
            } else {
              $points++;
            }

            if ($question_b != 5)
            {
                array_push($errors, "2. The correct answer is 5. Your answer: " . $question_b);
            }
             else {
              $points++;
            }

            if ($question_c != "4.8")
            {
                array_push($errors, "3. The correct answer is 4.8. Your answer: " . $question_c);
            } else {
              $points++;
            }

            if ($question_d != 9)
            {
                array_push($errors, "4. The correct answer is 9. Your answer: " . $question_d);
            }
             else {
              $points++;
            }
            if(sizeof($errors) < $max_points) {
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
  <p class="question_title">Calculate the mode, median, mean and range of these numbers: 1, 2, 2, 5, 6, 8, 10</p>
  <form class="question_answers" method="post" action="summary_of_data.php">
    <div class="question_answer_group">
      <label>1. Mode:</label>
      <br>

      <input type="radio" class="question_answer" id="question-a_a" name="question-a" value="1">
      <label for="question-a_a">a) 1</label>

      <input type="radio" class="question_answer" id="question-a_b" name="question-a" value="2">
      <label for="question-a_b">b) 2</label>

      <input type="radio" class="question_answer" id="question-a_c" name="question-a" value="5">
      <label for="question-a_c">c) 5</label>

      <input type="radio" class="question_answer" id="question-a_d" name="question-a" value="6">
      <label for="question-a_d">d) 6</label>

    </div>

    <div class="question_answer_group" style="margin-top: 25px;">
      <label>2. Median:</label>
      <br>

      <input type="radio" class="question_answer" id="question-b_a" name="question-b" value="1">
      <label for="question-b_a">a) 1</label>

      <input type="radio" class="question_answer" id="question-b_b" name="question-b" value="2">
      <label for="question-b_b">b) 2</label>

      <input type="radio" class="question_answer" id="question-b_c" name="question-b" value="5">
      <label for="question-b_c">c) 5</label>

      <input type="radio" class="question_answer" id="question-b_d" name="question-b" value="10">
      <label for="question-b_d">d) 10</label>
    </div>
    <div class="question_answer_group" style="margin-top: 25px;">
     <label>3. Mean:</label>
     <br>

      <input type="radio" class="question_answer" id="question-c_a" name="question-c" value="3.5">
      <label for="question-c_a">a) 3.5</label>

      <input type="radio" class="question_answer" id="question-c_b" name="question-c" value="4.8">
      <label for="question-c_b">b) 4.8</label>

      <input type="radio" class="question_answer" id="question-c_c" name="question-c" value="5.2">
      <label for="question-c_c">c) 5.2</label>

      <input type="radio" class="question_answer" id="question-c_d" name="question-c" value="6.7">
      <label for="question-c_d">d) 6.7</label>
    </div>
    <div class="question_answer_group" style="margin-top: 25px;">
     <label>4. Range:</label>
     <br>

      <input type="radio" class="question_answer" id="question-d_a" name="question-d" value="5">
      <label for="question-d_a">a) 5</label>

      <input type="radio" class="question_answer" id="question-d_b" name="question-d" value="6">
      <label for="question-d_b">b) 6</label>

      <input type="radio" class="question_answer" id="question-d_c" name="question-d" value="8">
      <label for="question-d_c">c) 8</label>

      <input type="radio" class="question_answer" id="question-d_d" name="question-d" value="9">
      <label for="question-d_d">d) 9</label>
    </div>
  <button class="question_answer_submit" type="submit" name="probability_question">Submit Answers</button>
  </form>
  <?php include('../includes/errors.php'); ?>
</section>