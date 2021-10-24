<?php 


session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>
<?php include 'header.php';?>
  <div class="signup-form">
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    <div>
      <a href="/admin/recipe-list.php">Recipe's View</a>
      <br/>
      <a href="/admin/user-list.php">User View</a>
    </div>
  </div>
<?php include 'footer.php';?>