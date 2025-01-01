<?php
require('config.php');


session_start(); // Start up your PHP Session

$userId = $_SESSION['id'];
$username = $_SESSION['username'];
if (isset($_SESSION['id'])) {

  $sql = "SELECT * FROM profiles WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    foreach ($result as $row) {


?>

      <html>

      <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="modules/semantic-ui/dist/semantic.min.css" />
        <script src="modules/jquery/jquery-3.3.1.min.js"></script>
        <script src="modules/semantic-ui/dist/semantic.min.js"></script>
        <title>student Dashboard</title>
        <link rel="stylesheet" href="./CSS/student.css">
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sidebar Menu | Side Navigation Bar</title>


        <!-- Boxicons CSS -->
        <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

      </head>

      <body>
      <div id="bg"></div>


          <nav>
            <div class="logo">
              <i class="bx bx-menu menu-icon"></i>
              <span class="logo-name">Student Dashboard</span>
            </div>

            <main>
              <h1>Welcome <?= $row['userFullName']; ?></h1>

            </main>

            <div class="sidebar">
              <div class="logo">
                <i class="bx bx-menu menu-icon"></i>
                <span class="logo-name">student View</span>
              </div>

              <div class="sidebar-content">
                <ul class="lists">
                  <li class="list">
                    <a href="student.php" class="nav-link">
                      <i class="bx bx-home-alt icon" style="color: blue;"></i>
                      <span class="link" style="color: blue; font-size: 20px;" style="color: blue;">Dashboard</span>
                    </a>
                  </li>
                  <li class="list">
                    <a href="StudentProfile.php" class="nav-link">
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
                      <span class="link">Application Result</span>
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
        </form>
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