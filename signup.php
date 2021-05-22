  <!-- Nav bar -->
  <?php include './includes/navbar.php'; ?>
  <!-- End Nav bar -->

  <form class='registerForm' action='./login.php' method='post'>
      <h2>Register</h2>
      <input type="text" name='username' placeholder="Username">
      <input type="email" name='email' placeholder="Email">

      <input type="password" name='password' placeholder="Password">
      <button type="submit" name='submitRegistration'>Submit</button>
  </form>