<?php

$sname = "sql110.infinityfree.com";
$uname = "if0_37123700";
$password = "Moath2001";


$conn = mysqli_connect($sname, $uname, $password);


if (!$result1) {
  echo '<script type="text/javascript">';
  echo 'window.location.href = "signUp.html"';
  echo '</script>';
}


$sql = "CREATE DATABASE if0_37123700_trainingapplication";
$result1 = mysqli_query($conn, $sql);

echo "Database Training created successfully\n";


mysqli_select_db($conn, "if0_37123700_trainingapplication") or header("Location: signUp.html" . getenv("HTTP_REFERER"));;




$sqla = "CREATE TABLE profiles (
  id int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(id),
  username varchar(255)NOT NULL,
  userEmail varchar(255)NOT NULL,
  userFullName varchar(255)NOT NULL,
  unique(username),
  userPhone varchar(255)NOT NULL
)";

$result = mysqli_query($conn, $sqla) or die(header("Location: signUp.html" . getenv("HTTP_REFERER")));

if (!$result) {
  echo '<script type="text/javascript">';
  echo 'window.location.href = "signUp.html"';
  echo '</script>';
}

$profile1 = "INSERT INTO profiles (username, userEmail, userPhone, userFullName)
  VALUES ('student', 'student@gmail.com', '2255681025', ' Mohamed')";
$profile2 = "INSERT INTO profiles (username, userEmail, userPhone, userFullName)
  VALUES ('coordinator', 'coordinator@gmail.com', '01121314111', 'Ali Mohamed')";

mysqli_query($conn, $profile1);
mysqli_query($conn, $profile2);






$sql2 = "CREATE TABLE applications(
    id INT PRIMARY KEY AUTO_INCREMENT,
    studentName varchar (20)NOT NULL,
    studentUsername VARCHAR (100)NOT NULL,
    unique(studentUsername),
    studentPhone VARCHAR (100) NOT NULL,
    studentEmail VARCHAR (100) NOT NULL,
    organization_Name VARCHAR (100) NOT NULL,
    date DATE NOT NULL,
    applicationStatus VARCHAR (100)NOT NULL,
    applicationReason VARCHAR(100) NOT NULL
  )";

$result2 = mysqli_query($conn, $sql2);




$sql3 = "CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50),
    unique(username),
    password VARCHAR(255),
    level INT (4)
  )";

$result3 = mysqli_query($conn, $sql3);

$user1 = "INSERT INTO users (username, password, level)
  VALUES ('admin', '111', 1);";
$user2 = "INSERT INTO users (username, password, level)
  VALUES ('student', '222', 2)";
$user3 = "INSERT INTO users (username, password, level)
  VALUES ('coordinator', '333', 3)";

mysqli_query($conn, $user1);
mysqli_query($conn, $user2);
mysqli_query($conn, $user3);
