<?php
session_start();
if(!$_SESSION['username'])
{

  header('Location: login.php');
  exit();
}
?>
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Begin Page Content -->

  <!-- Content Row -->

<?php
include('includes/main.php');
?>







  <?php
include('includes/scripts.php');
?>