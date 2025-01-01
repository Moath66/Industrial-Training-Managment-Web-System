<?php
require('config.php');

session_start(); // Start up your PHP Session

$userId = $_SESSION['id'];
$username = $_GET['studentUsername'];
if (isset($_GET['studentUsername'])) {

    if (isset($_POST['submit'])) {
        $reason = $_POST['reason'];

        // Update the application status to 'Rejected' and add the rejection reason to the database
        $sql = "UPDATE applications SET applicationStatus = 'Rejected', applicationReason = '$reason' WHERE studentUsername = '$username'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script type='text/javascript'>
              alert('Application Rejected Successfully');
              window.location.href = 'manageApplications.php?m=1';
            </script>";
            exit;
        } else {
            echo "<script type='text/javascript'>
              alert('Failed to reject the application');
              window.location.href = 'manageApplications.php?m=1';
            </script>";
            exit;
        }
    }
} else {
    header('Location: signUp.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reject Reason</title>
</head>

<body>
    <form id="adminForm" action="" method="POST" class="form">
        <link rel="stylesheet" href="./CSS/updateform.css">
        <p class="title">Add A Reason</p>
        <div class="flex">
            <label>
                <textarea rows="4" cols="39" class="input" name="reason"></textarea>
            </label>
        </div>
        <div class="button-container">
            <button type="submit" class="submit" name="submit">Submit</button>
            <button type="button" class="submit" style="width:350px;" onclick="window.location.href = 'manageApplications.php';">Cancel</button>
        </div>

        <script>
            document.getElementById('adminForm').addEventListener('submit', function(event) {
                // Validate the reason field
                var reasonField = document.querySelector('textarea[name="reason"]');
                var reason = reasonField.value.trim();

                if (reason === '') {
                    event.preventDefault(); // Prevent form submission
                    alert('Please provide a reason');
                    reasonField.focus();
                }
            });
        </script>
    </form>
</body>

</html
