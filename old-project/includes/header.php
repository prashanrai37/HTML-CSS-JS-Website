<header class="header">
    <div class="auth">
        <?php
        function generateHREF($pathname)
        {
            $current_path = $_SERVER['SCRIPT_NAME'];
            if (strpos($current_path, "pages") == true)
            {
                return "./" . $pathname;
            }
            else
            {
                return "./pages/" . $pathname;
            }
        }

        if (!isset($_SESSION['success']))
        {
            echo '<p><a href="' . generateHREF("register.php") . '">Register</a> or <a href="' . generateHREF("login.php") . '">log in</a></p>';
        }
        else
        {
            echo '<p>' . '<a href="' . generateHREF("account.php") . '">' . $_SESSION["email_address"] . '</a>' . ' | <a href="' . generateHREF("logout.php") . '">Log out</a></p>';
        }
        ?>
    </div>
    <h1 class="header_title">Statistics & Computing</h1>
</header>