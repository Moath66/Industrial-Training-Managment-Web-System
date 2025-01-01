<?php

require('config.php');

if (isset($_GET['username'])) {
  $username = $_GET['username'];

  $sql = "DELETE FROM users WHERE username='$username'";
  $result = mysqli_query($conn, $sql);
  $sql2 = "DELETE FROM profiles WHERE username='$username'";
  $result2 = mysqli_query($conn, $sql2);

?>

  <script type="text/javascript">
    alert("User Deleted Successfully");
    window.location.href = "viewAllUsers.php?m=1"
  </script>
<?php
}
