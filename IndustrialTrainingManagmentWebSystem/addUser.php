<?php
require('config.php');


session_start(); // Start up your PHP Session

$userId = $_SESSION['id'];
if (isset($_SESSION['id'])) {
?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./CSS/admin.css">
    <link rel="stylesheet" href="./CSS/updateform.css">

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar Menu | Side Navigation Bar</title>


    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


  </head>

  <body>
    <nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">Admin Dashboard</span>
      </div>

      <div class="container" style="text-align: center; padding-top: 500px">
        <br>
        <h2>Add New user</h2>


        <form id="adminForm" action="insert_user.php" method="POST" class="form">
          <p class="title">Add User</p>
          <p class="message" style="text-align: left;">Add New User</p>
          <div class="flex">
            <label>
              <input required="" placeholder="" type="text" class="input" name="username">
              <span>Username</span>
            </label>

            <label>
              <input required="" placeholder="" id="password" type="password" class="input" name="password">
              <span>Password</span>
              <i class="far fa-eye" id="togglePassword"></i>
            </label>
          </div>

          <label>
            <input required="" placeholder="" type="email" class="input" name="email">
            <span>Email</span>
          </label>

          <label>
            <input required="" placeholder="" type="text" class="input" name="fullName">
            <span>Full Name</span>
          </label>
          <label>
            <input required="" placeholder="" type="password" class="input" name="phoneNo">
            <span>Phone No</span>
          </label>
          <label>
            <select name="userType" class="input">
              <option selected disabled hidden>Choose a User</option>
              <option>Student</option>
              <option>Coordinator</option>
            </select>
          </label>
       
          <button class="submit1" name="submit">Submit</button>

        </form>
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

      const togglePassword = document.querySelector('#togglePassword');
      const password = document.getElementById("password");
      togglePassword.addEventListener('click', function(e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
      });
    </script>

    <script src="./JS/addUser.js"></script>

  </body>

  </html>

<?php
} else {
  header('Location: signUp.html');
  exit();
}
?>