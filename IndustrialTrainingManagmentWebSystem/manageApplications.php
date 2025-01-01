<?php
require('config.php');


session_start(); // Start up your PHP Session

$userId = $_SESSION['id'];
$username = $_SESSION['username'];
if (isset($_SESSION['id'])) {

  $sql = "SELECT p.*, t.*, a.*
    FROM profiles p
    JOIN users t ON p.username = t.username
   JOIN applications a ON p.username = a.studentUsername";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    foreach ($result as $row) {


?>

      <!DOCTYPE html>
      <html>

      <head>
        <title>Manage Application </title>
        <link rel="stylesheet" href="./CSS/Style.css">

        <link rel="stylesheet" href="./CSS/mainTable.css">




        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />



        <!-- Boxicons CSS -->
        <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />



        <style>
          .search {
            flex: 3;
            display: flex;
            /* justify-content: center; */
          }

          .search input[type=text] {
            border: none;
            /* background: #f1f1f1; */
            border: 1px solid black;
            border-radius: 40px;
            padding: 10px;
            width: 50%;
            margin-bottom: 20px;
            margin-left: 5px;
          }

          .search button {
            width: 40px;
            height: 40px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
          }

          .search button img {
            width: 30px;
            height: 30px;
          }
        </style>

      </head>

      <body>
        <nav>
          <div class="logo">
            <i class="bx bx-menu menu-icon"></i>
            <span class="logo-name">Coordinator</span>


            <div class="sidebar">
              <div class="logo">
                <i class="bx bx-menu menu-icon"></i>
                <span class="logo-name" style="font-size: 20px;">Coordinator view</span>
              </div>

              <div class="sidebar-content">
                <ul class="lists">
                  <li class="list">
                    <a href="coordinator.php" class="nav-link">
                      <i class="bx bx-home-alt icon"></i>
                      <span class="link">Dashboard</span>
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


                </ul>

                <div class="bottom-cotent">
                  <li class="list">
                    <a href="logout.php" class="nav-link">
                      <i class="bx bx-log-out icon"></i>
                      <span class="link">Logout</span>
                    </a>
                  </li>
                </div>
              </div>
            </div>
        </nav>

        <div class="container">
          <div class="table-wrapper" style="border-radius: 30px;">
            <div class="table-title">
              <h1 style="margin-left: 10px;">Add and Manage User list</h1>
            </div>

            <div class="search">
              <input type="text" id="search" onkeyup="myFunction()" placeholder="Search for User's  UserName" title="Type in a name">
            </div>
            <table class="fl-table" id="myTable">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>User Fullname</th>
                  <th>User Email</th>
                  <th>User Phone Number</th>
                  <th>Organization</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                if (mysqli_num_rows($result) > 0) {
                  foreach ($result as $row) {

                    if ($row['level'] != '1') {
                ?>
                      <tr>
                        <td><?php echo $row['studentUsername']; ?></td>
                        <td><?php echo $row['studentName']; ?></td>
                        <td><?php echo $row['studentEmail']; ?></td>
                        <td><?php echo $row['studentPhone']; ?></td>
                        <td><?php echo $row['organization_Name']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <?php if ($row['applicationStatus'] == "Pending") {
                        ?>
                          <td style="color: orange; font-weight: 600"><?php echo $row['applicationStatus']; ?></td>
                        <?php
                        } else if ($row['applicationStatus'] == "Rejected") { ?>
                          <td style="color: red; font-weight: 600"><?php echo $row['applicationStatus']; ?></td>
                        <?php
                        } else if ($row['applicationStatus'] == "Approved") {
                        ?>
                          <td style="color: green; font-weight: 600"><?php echo $row['applicationStatus']; ?></td>
                        <?php
                        } ?>
                        <td>
                          <div class="space">
                            <a href="approveApplication.php?studentUsername=<?= $row['studentUsername']; ?>"><button><span>Approve</span></button></a>
                            <a href="rejectApplication.php?studentUsername=<?= $row['studentUsername']; ?>"><button><span>Reject</span></button></a>
                          </div>
                        </td>
                      </tr>

                <?php



                    }
                  }
                }
                ?>
              </tbody>
            </table>
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



          function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
              td = tr[i].getElementsByTagName("td")[0];
              if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
                } else {
                  tr[i].style.display = "none";
                }
              }
            }
          }




          document.addEventListener('DOMContentLoaded', function() {
            var table = document.getElementById('myTable');
            var ths = table.getElementsByTagName('th');

            for (var i = 0; i < ths.length; i++) {
              ths[i].addEventListener('click', function() {
                var column = this.cellIndex;
                var isAscending = true;

                if (this.classList.contains('asc')) {
                  this.classList.remove('asc');
                  this.classList.add('desc');
                  isAscending = false;
                } else {
                  this.classList.remove('desc');
                  this.classList.add('asc');
                }

                sortTable(table, column, isAscending);
              });
            }
          });

          function sortTable(table, columnIndex, isAscending) {
            var rows = Array.from(table.tBodies[0].rows);

            rows.sort(function(rowA, rowB) {
              var cellA = rowA.cells[columnIndex].textContent.toLowerCase();
              var cellB = rowB.cells[columnIndex].textContent.toLowerCase();

              if (isAscending) {
                return cellA.localeCompare(cellB);
              } else {
                return cellB.localeCompare(cellA);
              }
            });

            for (var i = 0; i < rows.length; i++) {
              table.tBodies[0].appendChild(rows[i]);
            }
          }
          function clearSearch() {
  document.getElementById('search').value = '';
}
        </script>



        <script src="./JS/admin/admin.js"></script>






        <script src="JavaScript files/main.js"></script>
        <script src="JavaScript files/manage-application.js"></script>
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