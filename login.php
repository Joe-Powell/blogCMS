<?php session_start(); // Top Of Page
require './database/db_conn.php';


// Handle Register signup
if (isset($_POST['submitRegistration'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email) || empty($username) || empty($password)) {
        $message = "Please fill all fields";
        header("Location: signup.php");
        exit();
    }
    // check if email exists in database already..
    $user_check_query = "SELECT * FROM users  WHERE
      email='$email' ";
    $result = $conn->query($user_check_query);
    $user = mysqli_fetch_assoc($result);
    if ($result->num_rows > 0) {
        $message = 'email or username already exists';
    } else {
        $sql = "INSERT INTO users (username, email, password)
         VALUES('$username', '$email', '$password')";
        $result = $conn->query($sql);
    }
}


if (isset($_POST['submitLogin'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $message = "Please fill all fields";
    }
    $query = "SELECT * FROM users
    WHERE email='$email' AND password='$password' ";
    $result = $conn->query($query);
    $user =  $result->fetch_assoc();

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['uid'] = $user['id'];
        header('Location: ./?loggedin=true');
    }
}


if (isset($_POST['logout'])) {

    session_destroy();
    header('Location: ./?loggedOut=true');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styleNavBar.css">
</head>

<body>
    <!-- Nav bar -->
    <?php include './includes/navbar.php'; ?>
    <!-- End Nav bar -->
    <div class="containAll">
        <form class='loginForm' action='./login.php' method='post'>
            <h2>Login</h2>
            <input type="text" name='email' placeholder='Email'>
            <input type="password" name='password' placeholder="Password">
            <button type="submit" name='submitLogin'>Submit</button>
        </form>

    </div>




</body>

</html>