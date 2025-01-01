<?php
require('config.php');
// session_start(); // Start up your PHP Session


if(isset($_POST['submit'])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $userType = $_POST['userType'];
    $userFullName = $_POST['fullName'];
    $userEmail = $_POST['email'];
    $userPhone = $_POST['phoneNo'];

    if($userType == "Student"){
        $type = '2';
    }else if($userType == "Coordinator"){
        $type = '3';
    }
    

    // $sql = "INSERT INTO users (username, password, level)
    // VALUES ('admin', '111', 1);";
    $sql = "INSERT INTO users (username, password, level) VALUES ('$username', '$password', '$type')";
    mysqli_query($conn, $sql);
    $sql2 = "INSERT INTO profiles (username, userEmail, userFullName, userPhone) VALUES ('$username' ,'$userEmail','$userFullName', '$userPhone')";
    mysqli_query($conn, $sql2);
    echo '<script type="text/javascript">';
    echo 'alert("User Added Successfully");';
    echo 'window.location.href = "addUser.php   "';
    echo '</script>';
    // header('Location: addStud.html');

}

?>