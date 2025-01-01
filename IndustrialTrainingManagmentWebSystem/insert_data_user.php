<?php
 
require ("config.php");

$sql = "INSERT INTO users (username, password, level)
VALUES ('admin', '111', 1);";
$sql .= "INSERT INTO users (username, password, level)
VALUES ('Student', '222', 2);";
$sql .= "INSERT INTO users (username, password, level)
VALUES ('coordinator', '333', 3)";

if (mysqli_multi_query($conn, $sql)) {
  echo "<h3>New records created successfully</h3>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
 
?> 



 