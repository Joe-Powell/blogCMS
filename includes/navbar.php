<?php   ?>

<nav>
    <h3>BlogLogo</h3>
    <ul>
        <!-- if logged in there wil be an admin page -->
        <?php if (isset($_SESSION['uid']) && $_SESSION['uid'] == 1) { ?>
            <li><a href="http://localhost/blogCMS/admin.php"><button class='linkToAdmin'>Admin Page</button></a></li>
        <?php } ?>

        <li><a href='./' class='home_btn'>Home</a></li>
        <li>About</li>
        <li>Shop</li>

    </ul>
    <ul>
        <?php if (!isset($_SESSION['uid'])) { ?>
            <li><a href="./login.php" class='login_btn'>Login</a></li>
            <li><a href="./signup.php" class='signup_btn'>Sign-up</a></li>
        <?php } ?>

        <?php if (isset($_SESSION['uid'])) { ?>
            <li>
                <form method='post' action='./login.php'>
                    <button type='submit' name='logout'>LOGOUT</button>
                </form>
            </li>
        <?php } ?>

    </ul>

</nav>