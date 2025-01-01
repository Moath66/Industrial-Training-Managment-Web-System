<?php
require('config.php');
session_start(); // Start up your PHP Session


if (isset($_POST['apply'])) {
    $username = $_SESSION["username"];
    $userFullName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userPhone = $_POST['phone'];
    $Organization = $_POST['organization'];
    $Dob = $_POST['dob'];



    // $sql = "INSERT INTO users (username, password, level)
    // VALUES ('admin', '111', 1);";
    $sql = "INSERT INTO applications (studentUsername, studentName, studentEmail ,studentPhone, organization_Name, date, applicationStatus) VALUES ('$username', '$userFullName', '$userEmail', '$userPhone', '$Organization', '$Dob' , 'Pending')";
    mysqli_query($conn, $sql);
    echo '<script type="text/javascript">';
    echo 'alert("Application Submitted Successfully");';
    echo 'window.location.href = "Student.php   "';
    echo '</script>';
    // header('Location: addStud.html');

}
