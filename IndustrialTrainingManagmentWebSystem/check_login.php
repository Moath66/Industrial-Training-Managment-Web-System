<?php
session_start(); // Start up your PHP Session

require('config.php'); //read up on php includes https://www.w3schools.com/php/php_includes.asp

// username and password sent from form

if (isset($_POST['username']) && isset($_POST['password'])) {
    $myusername = $_POST["username"];
    $mypassword = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$myusername' AND password ='$mypassword'";

    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['username'] == $myusername && $row['password'] == $mypassword) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['level'] = $row['level'];
            $_SESSION['id'] = $row['id'];

            if ($row['level'] == 1) {
                header('Location: admin.php');
            } else if ($row['level'] == 2) {
                header('Location: student.php');
            } else {
                header('Location: coordinator.php');
            }
            exit();
        } else {
            header('Location: signUp.html?error = Incorrect Information');
            exit();
        }
    } else {
        // $_SESSION["Login"] = "NO";
        header("Location: signUp.html");
    }
}
mysqli_close($conn);
