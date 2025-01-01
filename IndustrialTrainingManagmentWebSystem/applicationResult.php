<?php
require('config.php');
session_start(); // Start up your PHP Session

$userId = $_SESSION['id'];
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM applications WHERE studentUsername = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
?>

            <!DOCTYPE html>
            <html>

            <head>
                <title><?= $row['studentName']; ?> Application</title>
                <link rel="stylesheet" href="./CSS/admin.css">
                <link rel="stylesheet" href="./CSS/mainTable.css">
                <link rel="stylesheet" href="./CSS/updateform.css">
                <link rel="stylesheet" href="./CSS/application.css">
                <link rel="stylesheet" href="./CSS/applicationResult.css">

                

                <meta charset="UTF-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />



                <!-- Boxicons CSS -->
                <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />





            </head>

            <body>
                <nav>
                    <div class="logo">
                        <i class="bx bx-menu menu-icon"></i>
                        <span class="logo-name">Admin Dashboard</span>
                    </div>

                    <div class="sidebar">
                        <div class="logo">
                            <i class="bx bx-menu menu-icon"></i>
                            <span class="logo-name">student View</span>
                        </div>

                        <div class="sidebar-content">
                            <ul class="lists">
                                <li class="list">
                                    <a href="student.php" class="nav-link">
                                        <i class="bx bx-home-alt icon" ></i>
                                        <span class="link"  font-size: 20px;">Dashboard</span>
                                    </a>
                                </li>
                                <li class="list">
                                    <a href="profile.php" class="nav-link">
                                        <i class="bx bx-user-circle icon"></i>
                                        <span class="link">Profile</span>
                                    </a>
                                </li>
                                <li class="list">
                                    <a href="Application.php" class="nav-link">
                                        <i class="bx bxs-report icon"></i>
                                        <span class="link">Training Application</span>
                                    </a>
                                </li>
                                <li class="list">
                                    <a href="applicationResult.php" class="nav-link">
                                        <i class="bx bx-check-square icon"></i>
                                        <span class="link" style="color: blue;">Application Result</span>
                                    </a>
                                </li>

                          

                            <div class="bottom-cotent">

                                </li>
                                <li class="list">
                                    <a href="logout.php" class="nav-link">
                                        <i class="bx bx-log-out icon"></i>
                                        <span class="link">Logout</span>
                                    </a>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>


                <form class="form" action="" method="POST">
                    <p class="title">Check Application Information</p>
                    <p class="message">Update User Information</p>
                    <div class="flex">
                        <label>
                            <input required="" placeholder="" type="text" class="input" disabled value="<?= $row['studentUsername']; ?>">
                            <!-- <span>Username</span> -->
                        </label>

                        <label>
                            <?php
                            if ($row['applicationStatus'] === "Pending") {
                            ?>
                                <input required="" placeholder="" type="text" class="input" style="color: orange; font-weight: 600;" disabled value="<?= $row['applicationStatus'] ?>"><?php
                                                                                                                                                                                    }
                                                                                                                                                                                    if ($row['applicationStatus'] === "Approved") {
                                                                                                                                                                                        ?>
                                <input required="" placeholder="" type="text" class="input" style="color: green; font-weight: 600;" disabled value="<?= $row['applicationStatus'] ?>"><?php
                                                                                                                                                                                    }
                                                                                                                                                                                    if ($row['applicationStatus'] === "Rejected") {
                                                                                                                                                                                        ?>
                                <input required="" placeholder="" type="text" class="input" style="color: red; font-weight: 600;" disabled value="<?= $row['applicationStatus'] ?>">

                        </label>
                    </div>
                    <label>
                        <textarea disabled rows="5" cols="80" class="input" placeholder="<?= $row['applicationReason'] ?>"></textarea>
                    </label>

                <?php
                                                                                                                                                                                    }
                ?>
                <!-- <span>Level</span> -->
                </label>
                </div>



                <label>
                    <input required="" type="text" class="input" value="<?= $row['organization_Name']; ?>">
                    <span>Organization</span>
                </label>
                <label>
                    <input required="" type="date" class="input" value="<?= $row['date']; ?>">
                    <span>Date</span>
                </label>
                <!-- <button class="submit" name="update">Submit</button> -->
                </form>

                <section class="overlay"></section>

                <script>
                    const navBar = document.querySelector("nav"),
                        menuBtns = document.querySelectorAll(".menu-icon"),
                        overlay = document.querySelector(".overlay");

                    menuBtns.forEach((menuBtn) => {
                        menuBtn.addEventListener("click", () => {
                            navBar.classList.toggle("open");
                        });
                    });

                    overlay.addEventListener("click", () => {
                        navBar.classList.remove("open");
                    });
                </script>


                <script src="../JS/admin/admin.js"></script>
            </body>

            </html>


        <?php
        }
    } else {
        ?> <h1>No Applications Yet</h1>
        <a href="Student.php"><button>Go Back</button></a> <?php
                                                        }
                                                    } else {
                                                        header('Location: signUp.html');
                                                        exit();
                                                    }
                                                            ?>