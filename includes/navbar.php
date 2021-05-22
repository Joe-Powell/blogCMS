<?php   ?>

<nav>
    <h3>BlogLogo</h3>
    <ul>
        <li><a href="http://localhost/blogCMS/admin.php"><button class='linkToAdmin'>Admin Page</button></a></li>
        <li><a href='./'>Home</a></li>
        <li>About</li>
        <li>Shop</li>

    </ul>
    <ul>
        <?php if (!isset($_SESSION['uid'])) { ?>
            <li><a href="./login.php"><button>Login</button></a></li>
            <li><a href="./signup.php"><button>Sign-up</button></a></li>
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