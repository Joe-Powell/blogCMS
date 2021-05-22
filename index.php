<?php session_start();
require './database/db_conn.php';


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Nav bar -->
    <?php include './includes/navbar.php'; ?>
    <!-- End Nav bar -->

    <section class=" containAllPosts">



        <?php
        if (isset($_SESSION['uid'])) {
            echo 'logged in as id# ' . $_SESSION['uid'];
        }

        $sql = "SELECT * FROM posts ORDER BY id DESC";
        $result = $conn->query($sql);


        while ($blogPosts = $result->fetch_assoc()) { ?>



            <div class="parent">

                <h1><?php echo $blogPosts['title'] ?></h1>

                <?php if ($blogPosts['filename']) {  ?>
                    <img src='<?= $blogPosts['filename']  ?>' width='150'>
                <?php } ?>

                <div class="overlay">
                    <p><?php echo $blogPosts['readmore'] ?>
                        <a href='<?php echo $blogPosts['blog_url'] ?>'>Read more.. </a>
                    </p>
                </div>

            </div>




        <?php } ?>

    </section>









</body>

</html>