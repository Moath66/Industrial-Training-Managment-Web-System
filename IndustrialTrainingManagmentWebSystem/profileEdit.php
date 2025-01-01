<?php
require('config.php');


session_start(); // Start up your PHP Session

$userId = $_SESSION['id'];
$username = $_SESSION['username'];
if (isset($_SESSION['id'])) {

  $sql = "SELECT p.*, t.*
    FROM profiles p
    JOIN users t ON p.username = t.username
    WHERE p.username = '$username';";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    foreach ($result as $row) {





      if (isset($_POST['update'])) {
        $userFullName = $_POST['fullname'];
        $userEmail = $_POST['email'];
        $userPhoneNo = $_POST['phone'];
        $userPwd = $_POST['password'];
        $update_query = mysqli_query($conn, "UPDATE profiles SET userFullName = '$userFullName', userEmail = '$userEmail', userPhone = '$userPhoneNo' WHERE username = '$username'");
        $update_query2 = mysqli_query($conn, "UPDATE users SET password = '$userPwd' WHERE username = '$username'");
        if ($update_query) {
          echo "
          <script>
          alert('User Updated Successfully');
          document.location.href = 'Profile.php';
          </script>
          ";
        } else {
          $message[] = 'User could not be updated';
          header('location:viewAllUsers.php');
        }
      }


?>

      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Page</title>

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

        <button onclick="goBack()" class="previous-page"></button>

        <script>
          function goBack() {
            window.history.back();
          }
        </script>


      </head>

      <body>
        <!-- Navbar top -->
        <div class="navbar-top" style="background-color: black; color: white">
          <div class="title">
            <h1>Edit Profile Page</h1>
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
              <a href="profile.php" class="nav-link">Profile</a>
              <hr align="center">
            </div>

            <div class="url">
              <a href="profileEdit.php" class="nav-link" style="color: blue;">Edit Data</a>
              <hr align="center">
            </div>

            <div class="url">
              <a href="Student.php" class="nav-link">Dashboard</a>
              <hr align="center">
            </div>
          </div>
        </div>
        <!-- End -->

        <!-- Main -->

        <div class="main">
          <h2>Edit Info</h2>
          <div class="card">
            <div class="card-body">
              <form id="studentForm" action="" method="POST">
                <table>
                  <tbody>
                    <tr>
                      <td>Username</td>
                      <td>:</td>
                      <td style="color: mediumslateblue"><b> <?= $row['username']; ?></b></td>
                    </tr>
                    <tr>
                      <td>Name</td>
                      <td>:</td>
                      <td><input required="" type="text" name="fullname" autocomplete="off" class="input" value="<?= $row['userFullName']; ?>"></td>

                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td><input required="" type="email" name="email" autocomplete="off" class="input" value="<?= $row['userEmail']; ?>"></td>

                    </tr>
                    <tr>
                      <td>Password</td>
                      <td>:</td>
                      <td><input required="" type="password" name="password" id="password" autocomplete="off" class="input" value="<?= $row['password']; ?>">
                        <i class="far fa-eye" id="togglePassword" style="color:mediumslateblue;"></i>
                      </td>

                    </tr>
                    <tr>
                      <td>Phone</td>
                      <td>:</td>
                      <td><input required="" type="text" name="phone" autocomplete="off" class="input" value="<?= $row['userPhone']; ?>">
                    </tr>


                  </tbody>
                </table>
                <tr>
                  <button name="update"><span>Update</span></button>
                </tr>
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