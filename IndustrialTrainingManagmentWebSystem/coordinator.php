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
      <html>

      <head>
        <title>Coordinator Dashboard</title>
        <link rel="stylesheet" href="./CSS/Style.css">


        <link rel="stylesheet" href="./CSS/coordinator.css">

        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />



        <!-- Boxicons CSS -->
        <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

      </head>

      <body>
      <div id="bg"></div>


      <nav>
            <div class="logo">
              <i class="bx bx-menu menu-icon"></i>
              <span class="logo-name">Coordinator Dashboard</span>
            </div>

            <main>
              <h1>Welcome <?= $row['userFullName']; ?></h1>

            </main>

            <div class="sidebar">
              <div class="logo">
                <i class="bx bx-menu menu-icon"></i>
                <span class="logo-name" style="font-size: 20px;">Coordinator view</span>
              </div>

              <div class="sidebar-content">
                <ul class="lists">
                  <li class="list">
                    <a href="coordinator.php" class="nav-link">
                      <i class="bx bx-home-alt icon" style="color: red;"></i>
                      <span class="link" ; style="color: red;">Dashboard</span>
                    </a>
                  </li>


                  <li class="list">
                    <a href="coordinatorProfile.php" class="nav-link" class="btn">
                      <i class="bx bx-user-circle icon"></i>
                      <span class="link">Profile</span>
                    </a>
                  </li>

                  <li class="list">
                    <a href="manageApplications.php" class="nav-link">
                      <i class="bx bx-folder-open icon"></i>
                      <span class="link">Manage Applications</span>
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














        <script src="./JS/admin/admin.js"></script>
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