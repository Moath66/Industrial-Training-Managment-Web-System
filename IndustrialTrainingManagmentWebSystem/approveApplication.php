<?php
require('config.php');


session_start(); // Start up your PHP Session

$userId = $_SESSION['id'];
$username = $_GET['studentUsername'];
if (isset($_SESSION['id'])) {

    // $sql = "SELECT * FROM applications WHERE studentUsername ='$username'";
    // $result = mysqli_query($conn, $sql);

    $sql = "UPDATE applications SET applicationStatus = 'Approved' WHERE studentUsername = '$username'";
    $result = mysqli_query($conn, $sql);
?>
    <script type="text/javascript">
        alert("Application Approved Successfully");
        window.location.href = "manageApplications.php?m=1"
    </script>
<?php
} else {
    header('Location: signUp.html');
    exit();
}
