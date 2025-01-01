<?php

require('config.php');
session_start();
$userid = $_SESSION['id'];


// Set the cookie with the user ID
setcookie('userid', $userid, time() + (86400 * 30), '/'); // Cookie will expire in 30 days




if (isset($_SESSION['id'])) {
?>
  <!DOCTYPE html>
  <html>

  <head>
    
    <title style="text-transform: uppercase;"><?php echo $_SESSION['username']; ?> Dashboard</title>
    <link rel="stylesheet" href="./CSS/admin.css">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <title>Sidebar Menu | Side Navigation Bar</title> -->


    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

  </head>

  <body>
    
    <nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name;" style="color: blue;">Admin Dashboard</span>
      </div>
      <?php
$userid = $_COOKIE['userid'];
echo '<span class="user-id">User ID: ' . $userid . '</span>';
?>
      <div class="container" style="padding-top: 500px" ; padding-left:10px;>
   

        <!-- <h1><?php echo $_SESSION['username']; ?></h1> -->
        <a class="MyButton" href="addUser.php"  >Add user</a>
<br></br>
<a class="MyButton2" href="viewAllUsers.php" >view all users</a>



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

    <script src="./JS/admin.js"></script>
  </body>

  </html>
<?php
} else {
  header('Location: signUp.html');
  exit();
}
