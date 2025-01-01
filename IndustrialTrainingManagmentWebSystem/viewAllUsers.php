<?php
require('config.php');


session_start(); // Start up your PHP Session

$userId = $_SESSION['id'];
if (isset($_SESSION['id'])) {
?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Users</title>
    <link rel="stylesheet" href="./CSS/admin.css">
    <link rel="stylesheet" href="./CSS/mainTable.css">

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


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
         

          <div class="bottom-content">
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
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

    $query2 = "SELECT * FROM profiles";
    $result2 = mysqli_query($conn, $query2);
    ?>

    <div class="container">
      <div class="table-wrapper" >
        <div class="table-title">
          <h1 >Search and  manage user list</h1>
        </div>

        
        <div class="search">
  <input type="text" id="search" onkeyup="myFunction()" placeholder="Search for User Name" title="Type in a name">
  <i class="bx bx-x delete-icon" onclick="clearSearch()"></i>
</div>

        <table class="fl-table" id="myTable">
          <thead>
            <tr>
              <th>Username</th>
              <th>User Fullname</th>
              <th>User Email</th>
              <th>User Phone Number</th>
              <th>User Type</th>
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
                    <td><?php echo $row['username']; ?></td>

                    <?php
                    if ($row['level'] == '2') {
                      $level = "Student";
                    } else if ($row['level'] == '3') {
                      $level = "Coordinator";
                    }

                    if (mysqli_num_rows($result2) > 0) {
                      foreach ($result2 as $row2) {

                        if ($row['username'] == $row2['username']) {
                    ?>
                          <td><?php echo $row2['userFullName']; ?></td>
                          <td><?php echo $row2['userEmail']; ?></td>
                          <td><?php echo $row2['userPhone']; ?></td>
                          <td><?php echo $level; ?></td>
                          <td>
                            <div class="space">
                              <a href="Update-user.php?username=<?= $row['username']; ?>"><button><span>Update</span></button></a>
                              <a href="delete-user.php?username=<?= $row['username']; ?>"><button><span>Delete</span></button></a>
                            </div>
                          </td>
                  </tr>

      <?php
                        }
                      }
                    }
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
      const navBar = document.querySelector("nav");
      const menuBtns = document.querySelectorAll(".menu-icon");
      const overlay = document.querySelector(".overlay");

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

    <script src="./JS/admin.js"></script>
  </body>

  </html>

<?php
} else {
  header('Location: signUp.html');
  exit();
}
?>