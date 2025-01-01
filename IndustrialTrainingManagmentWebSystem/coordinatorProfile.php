<?php
require('config.php');


session_start(); // Start up your PHP Session

$userId = $_SESSION['id'];
$username = $_SESSION['username'];
if (isset($_SESSION['id'])) {

    $sql = "SELECT p.*, t.*
    FROM profiles p
    JOIN users t ON p.username = t.username
    WHERE p.username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {


?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title><?= $row['userFullName']; ?> Profile Page</title>

                <!-- Custom Css -->
                <link rel="stylesheet" href="./CSS/profile.css">

                <!-- FontAwesome 5 -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
                <style>
                    .previous-page {
                        padding: 10px;
                        border: none;
                        background: none;
                        font-size: 20px;
                        cursor: pointer;
                        color: #000;
                    }

                    .previous-page::before {
                        font-family: "Font Awesome 5 Free";
                        font-weight: 900;
                        content: "\f060";
                        margin-right: 5px;
                    }
                </style>

                <a onclick="goBack()" class="previous-page"></a>

                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>


            </head>

            <body>
                <!-- Navbar top -->
                <div class="navbar-top">
                    <div class="title">
                        <h1>Coordinator Profile Page</h1>
                    </div>
                </div>
                <!-- End -->

                <!-- Sidenav -->
                <div class="sidenav">
                    <div class="profile">
                        <div class="name">
                            <?= $row['userFullName']; ?> Profile
                        </div>
                    </div>

                    <div class="sidenav-url">
                        <div class="url">
                            <a href="#profile" class="nav-link">Profile</a>
                            <hr align="center">
                        </div>

                        <div class="url">
                            <a href="profileEditCordinator.php" class="nav-link">Edit Data</a>
                            <hr align="center">
                        </div>

                        <div class="url">
                            <a href="coordinator.php" class="nav-link">Dashboard</a>
                            <hr align="center">
                        </div>
                    </div>
                </div>
                <!-- End -->

                <!-- Main -->

                <div class="main">
                    <h2>Personal Info</h2>
                    <div class="card">
                        <div class="card-body">
                            <form id="studentForm">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Username</td>
                                            <td>:</td>
                                            <td><b> <?= $row['username']; ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td>:</td>
                                            <td><b> <?= $row['userFullName']; ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td><b> <?= $row['userEmail']; ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td>:</td>
                                            <td><b><input type="password" id="password" autocomplete="off" style="font-weight: 600; border:none; width: 50px" value="<?= $row['password']; ?>"></b>
                                                <i class="far fa-eye" id="togglePassword"></i>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>:</td>
                                            <td><b> <?= $row['userPhone']; ?></b></td>
                                        </tr>

                                        <!-- <tr>
                                            <td>Application Status</td>
                                            <td>:</td>
                                            <?php
                                            if ($row['applicationStatus'] === "Pending") {
                                            ?>

                                                <td style="color: Orange;"><b> <?= $row['applicationStatus']; ?></b></td>
                                            <?php } else if ($row['applicationStatus'] === "Approved") { ?>

                                                <td style="color: Green;"><b> <?= $row['applicationStatus']; ?></b></td>


                                            <?php  } else if ($row['applicationStatus'] === "Rejected") { ?>

                                                <td style="color: Red;"><b> <?= $row['applicationStatus']; ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Reason</td>
                                            <td>:</td>
                                            <td>Reason</td>


                                        <?php  } else { ?>
                                            <td style="color: gold;"><b> Nothing Submitted</b></td>
                                        <?php } ?>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End -->

                <script>
                    const togglePassword = document.querySelector('#togglePassword');
                    const password = document.getElementById("password");
                    togglePassword.addEventListener('click', function(e) {
                        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                        password.setAttribute('type', type);
                        this.classList.toggle('fa-eye-slash');
                    });
                </script>
            </body>

            </html>

<?php
        }
    }
} else {
    header('Location: signUp.html');
    exit();
}
?>