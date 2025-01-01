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
      $sql2 = "SELECT * FROM applications WHERE studentUsername = '$username'";
      $result2 = mysqli_query($conn, $sql2);

      if (mysqli_num_rows($result2) > 0) {
        $application = mysqli_fetch_assoc($result2);
        $status = $application['applicationStatus'];
?>
        <h1>You have already submitted an application</h1>
        <h2 style="color:red;">Status: <?php echo $status; ?></h2>
        <a href="Student.php"><button>Go Back</button></a>
      <?php
      } else {

      ?>

        <!DOCTYPE html>
        <html>

        <head>
          <title>Application Dashboard</title>
          <link rel="stylesheet" href="./CSS/Style.css">
          <link rel="stylesheet" href="./CSS/application.css">

          <meta charset="UTF-8" />
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <title>Sidebar Menu | Side Navigation Bar</title>


          <!-- Boxicons CSS -->
          <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />





        </head>

        <body>
          <nav>
            <div class="logo">
              <i class="bx bx-menu menu-icon"></i>
              <span class="logo-name">Application form</span>
            </div>

            <div class="sidebar">
              <div class="logo">
                <i class="bx bx-menu menu-icon"></i>
                <span class="logo-name">User view</span>
              </div>

              <div class="sidebar-content">
                <ul class="lists">
                  <li class="list">
                    <a href="student.php" class="nav-link">
                      <i class="bx bx-home-alt icon"></i>
                      <span class="link">Dashboard</span>
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
                      <i class="bx bxs-report icon" style="color: blue;"></i>
                      <span class="link" style="color: blue; font-size: 17px;">Training Application</span>
                    </a>
                  </li>
                  <li class="list">
                    <a href="applicationResult.php" class="nav-link">
                      <i class="bx bx-check-square icon"></i>
                      <span class="link">Application Result</span>
                    </a>
                  </li>

                

                <div class="bottom-cotent">
                  <li class="list">
                    <a href="./index.html" class="nav-link">
                      <i class="bx bx-log-out icon"></i>
                      <span class="link">Logout</span>
                    </a>
                  </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>

          <div class="formbold-main-wrapper">
            <div class="formbold-form-wrapper">
              <img src="./media/application/main.jpg">
              <form action="addApplication.php" method="POST">
                <div class="formbold-mb-3">
                  <label for="age" class="formbold-form-label"> Username: </label>
                  <input type="text" disabled name="username" id="username" class="formbold-form-input" required value="<?= $row['username']; ?>" />
                </div>

                <div class="formbold-mb-3">
                  <label for="age" class="formbold-form-label"> Full Name: </label>
                  <input type="text" name="name" id="name" class="formbold-form-input" required value="<?= $row['userFullName']; ?>" />
                </div>

                <div class="formbold-mb-3">
                  <label for="age" class="formbold-form-label"> Phone: </label>
                  <input type="text" name="phone" id="phone" class="formbold-form-input" required value="<?= $row['userPhone']; ?>" />
                </div>

                <div class="formbold-mb-3">
                  <label for="age" class="formbold-form-label"> Email: </label>
                  <input type="email" name="email" id="email" class="formbold-form-input" required value="<?= $row['userEmail']; ?>" />
                </div>

                <div class="formbold-mb-3">
                  <label for="age" class="formbold-form-label"> Organization: </label>
                  <input type="text" name="organization" id="organization" class="formbold-form-input" required />
                </div>

                <div class="formbold-mb-3">
                  <label for="dob" class="formbold-form-label"> Date </label>
                  <input type="date" name="dob" id="dob" class="formbold-form-input" required />
                </div>

                <button class="formbold-btn" name="apply">Apply Now</button>
              </form>
            </div>
          </div>

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
  }
} else {
  header('Location: signUp.html');
  exit();
}
?>