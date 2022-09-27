<?php
session_start();

function getGUID()
{
    if (function_exists('com_create_guid'))
    {
        return com_create_guid();
    }
    else
    {
        mt_srand((double)microtime() * 10000); //optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand() , true)));
        $hyphen = chr(45); // "-"
        $uuid = chr(123) // "{"
         . substr($charid, 0, 8) . $hyphen . substr($charid, 8, 4) . $hyphen . substr($charid, 12, 4) . $hyphen . substr($charid, 16, 4) . $hyphen . substr($charid, 20, 12) . chr(125); // "}"
        return $uuid;
    }
}

// Hoist variables
$first_name = "";
$surname = "";
$email = "";
$errors = array();

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'coursework-2');

if (isset($_POST['reg_user']))
{
    // Store values from form into memory
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $surname = mysqli_real_escape_string($db, $_POST['surname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $age = mysqli_real_escape_string($db, $_POST['age']);

    // Validate form by using an array for holding errors
    if (empty($first_name))
    {
        array_push($errors, "Please provide your first name");
    }
    if (empty($surname))
    {
        array_push($errors, "Please provide your surname");
    }
    if (empty($email))
    {
        array_push($errors, "Email is required");
    }
    if (empty($password_1))
    {
        array_push($errors, "Password is required");
    }
    if (strlen($password_1) < 8)
    {
        array_push($errors, "Password must be longer than 8 characters");
    }
    if ($password_1 != $password_2)
    {
        array_push($errors, "The two passwords do not match");
    }
    if (empty($age))
    {
        array_push($errors, "Please provide your age");
    }

    // Check if the email address is in use
    $user_check_query = "SELECT * FROM user_details WHERE email_address='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if ($user)
    {
        if ($user['email_address'] === $email)
        {
            array_push($errors, "This email address is already in use.");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0)
    {
        $password = md5($password_1); // Encrypt the password before saving in the database
        $user_id = substr(getGUID() , 0, 20);

        $query = "INSERT INTO user_details (User_id, first_name, surname, email_address, password, age) 
  			  VALUES('$user_id', '$first_name', '$surname', '$email', '$password', '$age')";
        mysqli_query($db, $query);
        $_SESSION['email_address'] = $email;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['surname'] = $surname;
        $_SESSION['age'] = $age;
        $_SESSION['id'] = $user_id;
        $_SESSION['success'] = true;
        $date = date("Y-m-d");
        $time = date("H:i:s");
        mysqli_query($db, "INSERT INTO user_level (User_Details, points_earned, user_level) VALUES ('$user_id', 0, 0)");
        $login = "INSERT INTO login_history (User_Details, login_date, login_time) VALUES ('$user_id', '$date', '$time')";
        mysqli_query($db, $login);
        header('location: ../index.php');
    }
}

if (isset($_POST['login_user']))
{
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email))
    {
        array_push($errors, "Email address is required");
    }
    if (empty($password))
    {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0)
    {
        $password = md5($password);
        $query = "SELECT * FROM user_details WHERE email_address='$email' AND password='$password' LIMIT 1";
        $result = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($result);
        if ($user)
        {
            $_SESSION['email_address'] = $email;
            $_SESSION['success'] = true;
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['surname'] = $user['surname'];
            $_SESSION['age'] = $user['age'];
            $_SESSION['id'] = $user['User_id'];
            $user_id = $_SESSION['id'];
            $date = date("Y-m-d");
            $time = date("H:i:s");
            $login = "INSERT INTO login_history (User_Details, login_date, login_time) VALUES ('$user_id', '$date', '$time')";
            mysqli_query($db, $login);
            header('location: ../index.php');
        }
        else
        {
            array_push($errors, "Wrong username/password combination");
        }
    }

}
?>
