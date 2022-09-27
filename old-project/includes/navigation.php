<nav class="navigation_bar">
<?php
if (strpos($_SERVER['SCRIPT_NAME'], "index.php") == false)
{
    echo '<a href="../index.php" class="navigation_bar_topics">Home</a>';
}


//Responive links
if (isset($_SESSION['success']))
{
    echo '<a href="' . generateHREF("account.php") . '" class="navigation_bar_topics responsive_link">My Account</a>';
    echo '<a href="' . generateHREF("logout.php") . '" class="navigation_bar_topics responsive_link">Log Out</a>';
} else 
{
    echo '<a href="' . generateHREF("register.php") . '" class="navigation_bar_topics responsive_link">Register</a>';
    echo '<a href="' . generateHREF("login.php") . '" class="navigation_bar_topics responsive_link">Log In</a>';
}
// Links
echo '<a href="' . generateHREF("mathematical_model.php") . '" class="navigation_bar_topics">Mathematical Models</a>';
echo '<a href="' . generateHREF("measurement_of_dispersion.php") . '" class="navigation_bar_topics">Measurement Of Dispersion</a>';
echo '<a href="' . generateHREF("probability.php") . '" class="navigation_bar_topics">Probability</a>';
echo '<a href="' . generateHREF("summary_of_data.php") . '" class="navigation_bar_topics">Summary Of Data</a>';
echo '<a href="' . generateHREF("wip.php") . '" class="navigation_bar_topics">Representation Of Data</a>';
echo '<a href="' . generateHREF("wip.php") . '" class="navigation_bar_topics">Correlation</a>';
echo '<a href="' . generateHREF("quiz.php") . '" class="navigation_bar_topics">Quiz</a>';
?>
</nav>
