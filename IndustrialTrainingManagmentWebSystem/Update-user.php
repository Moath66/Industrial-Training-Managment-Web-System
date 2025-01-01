<?php
require('config.php');
session_start(); // Start up your PHP Session

$userId = $_SESSION['id'];
if (isset($_GET['username'])) {
  $username = $_GET['username'];
  $query = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $query);

  $query2 = "SELECT * FROM profiles WHERE username = '$username'";
  $result2 = mysqli_query($conn, $query2);

  if (mysqli_num_rows($result) > 0) {
    foreach ($result as $row) {
      foreach ($result2 as $row2) {
?>

        <!DOCTYPE html>
        <html>

        <head>
          <title>Update <?= $row2['userFullName']; ?></title>
          <link rel="stylesheet" href="./CSS/admin.css">
          <link rel="stylesheet" href="./CSS/mainTable.css">
          <link rel="stylesheet" href="./CSS/updateform.css">
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
                <span class="logo-name">Admin View</span>
              </div>

              <div class="sidebar-content">
                <ul class="lists">
                  <li class="list">
                    <a href="admin.php" class="nav-link">
                      <i class="bx bx-home-alt icon"></i>
                      <span class="link">Dashboard</span>
                    </a>
                  </li>

                  <li class="list">
                    <a href="addUser.php" class="nav-link">
                      <i class="bx bx-user-plus icon"></i>
                      <span class="link">Add User</span>
                    </a>
                  </li>

                  <li class="list">
                    <a href="viewAllUsers.php" class="nav-link">
                      <i class="bx bxs-user-rectangle icon"></i>
                      <span class="link">View All Users</span>
                    </a>
                  </li>

                <div class="bottom-cotent">

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

    <?php



        if (isset($_POST['update'])) {
          $userType = $_POST['level'];
          $userFullName = $_POST['userFullName'];
          $userEmail = $_POST['userEmail'];
          $userPhoneNo = $_POST['userPhone'];
          $update_query = mysqli_query($conn, "UPDATE profiles SET userFullName = '$userFullName', userEmail = '$userEmail', userPhone = '$userPhoneNo' WHERE username = '$username'");
          if ($update_query) {
            echo "
            <script>
            alert('User Updated Successfully');
            document.location.href = 'viewAllUsers.php';
            </script>
            ";
          } else {
            $message[] = 'User could not be updated';
            header('location:viewAllUsers.php');
          }
        }
      }
    }
  }
    ?>


    <form class="form" action="" method="POST">
      <p class="title">Update</p>
      <p class="message">Update User Information</p>
      <div class="flex">
        <label>
          <input required="" placeholder="" type="text" class="input" disabled value="<?= $row['username']; ?>">
          <!-- <span>Username</span> -->
        </label>

        <label>
          <?php
          if ($row['level'] == '2') {
            $level = "Student";
          } else if ($row['level'] == '3') {
            $level = "Coordinator";
          }
          ?>
          <input required="" placeholder="" type="text" class="input" name="level" disabled value="<?= $level ?>">
          <!-- <span>Level</span> -->
        </label>
      </div>

      <label>
        <input required="" placeholder="" type="text" class="input" name="userFullName" value="<?= $row2['userFullName']; ?>">
        <span>Full Name</span>
      </label>

      <label>
        <input required="" placeholder="" type="email" class="input" name="userEmail" value="<?= $row2['userEmail']; ?>">
        <span>Email</span>
      </label>
      <label>
        <input required="" placeholder="" type="text" class="input" name="userPhone" value="<?= $row2['userPhone']; ?>">
        <span>Phone No</span>
      </label>
      <button class="submit" name="update">Submit</button>
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
    } else {
      header('Location: signUp.html');
      exit();
    }
      ?>