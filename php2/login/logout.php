<?php 
  include "../connect/session.php";

  unset($_SESSION['memberID']);
  unset($_SESSION['userEmail']);
  unset($_SESSION['userName']);
  Header("Location: ../main/main.php");
?>

<!-- <script>
</script> -->
