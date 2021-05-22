<?php session_start();
require './database/db_conn.php';

if (isset($_POST['submitForm'])) {

    $title = $_POST['title'];
    $readmore = $_POST['readmore'];

    //$blog_url = $_POST['blog_url'];
    //$blog_url = $_POST['blog_url'];
    //$upload1 = $_POST['upload1'];
    //$upload2 = $_POST['upload2'];

    if (empty($title) || empty($readmore)) {
        $message = "Please fill all fields";

        // needs javascript  validation too so no submission
    }

    //___ FILE UPLOADs

    if ($_FILES['upload1']['size'] !== 0) {

        echo 'upload1 isset';
        $file = $_FILES['upload1'];
        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileTmpName = $file['tmp_name'];

        echo $fileName . '<br>';
        echo $fileType . '<br>';
        echo $fileTmpName . '<br>';

        $file_destination = './uploads/' . mt_rand() . $fileName;
        move_uploaded_file($fileTmpName, $file_destination);
    } else {
        $file_destination = '';
    }

    if (isset($_FILES['upload2'])) {
        $files = $_FILES['upload2'];
        $fileNames = $files['name'];
        $fileTypes = $files['type'];
        $fileTmpNames = $files['tmp_name'];

        echo $fileNames . '<br>';
        echo $fileTypes . '<br>';
        echo $fileTmpNames . '<br>';

        if (!empty($fileNames)) {
            $file_destinations = './blogs/' . mt_rand() .  $fileNames;
        }
        move_uploaded_file($fileTmpNames, $file_destinations);
    }

    $sql = "INSERT INTO posts (title, filename, readmore, blog_url) VALUES ('$title', '$file_destination', '$readmore', '$file_destinations')";
    $conn->query($sql);
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>


    <link rel="stylesheet" href="styleAdmin.css">
</head>

<body>

    <!-- Nav bar -->
    <?php require './includes/navbar.php'; ?>
    <!-- End Nav bar -->


    <section class="containAll">
        <form type='text' name='postForm' action='admin.php' method='post' class='postForm' id='postForm' enctype="multipart/form-data">

            <div class='titleDiv'>
                <h3>Blog Post</h3>
                <h5 id='msg'></h5>
            </div>

            <div class='titleDiv'>
                <label for='title'>Title:</label>
                <input type="text" name='title' id='title' class='title'>
            </div>


            <div class='uploadFileDiv'>
                <label for="upload1">Image:</label>
                <input type="file" name='upload1' class='upload1' id='upload1'>
            </div>
            <div class='uploadFileDiv'>
                <label for="upload2"><span class='mustFill'>*</span>Blog ( .txt .html .php extensions)</label>
                <input type="file" name='upload2' class='upload2' id='upload2'>
            </div>

            <div class='readmoreDiv'>
                <h5><span class='mustFill'>*</span>Type below for the intro to the Read More:</h5>

                <textarea name="readmore" class='readmore' id='readmore' type='text'></textarea>
            </div>

            <div class='SubmitDiv'>
                <input type="submit" value="submit" name='submitForm' class='submitForm'>
            </div>


        </form>


        <h4>Just another div</h4>
    </section>












    <script src='admin.js'></script>
</body>

</html>