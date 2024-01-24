<?php
  include '../php/db.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../css/index.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="../css/datatables.min.css"
    />
    <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.3.0/css/scroller.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <title>Admin</title>
  </head>
  <body>
    <nav class="navbar bg-body-tertiary">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="../img/cpsu-logo.png" class="icon me-2" />
          CENTRAL PHILIPPINE STATE UNIVERSITY
        </a>
        <a href="../index.html"><button class="btn btn-success rounded-pill" id='logout'>Logout</button></a>
      </div>
    </nav>
    <div class="container pt-5">
    <h4>Students</h4>
      <table id="myTable" class="display nowrap" style="width:100%;">     
        <thead>
          <tr>
            <th>Image</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Email</th>
            <th>address</th>
            <th>City</th>
            <th>Province</th>
            <th>Zip</th>
            <th>Year</th>
            <th>Department</th>
            <th>Cellno</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = mysqli_query($conn, "SELECT * FROM student");
            while($row = mysqli_fetch_assoc($query)) {
          ?>
          <tr>
            <td><img src="../uploads/<?= $row['image'] ?>" width="50" height="50"></td>
            <td><?= $row['fname'] ?></td>
            <td><?= $row['lname'] ?></td>
            <td><?= $row['bday'] ?></td>
            <td><?= $row['gender'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['address'] ?></td>
            <td><?= $row['city'] ?></td>
            <td><?= $row['province'] ?></td>
            <td><?= $row['zip'] ?></td>
            <td><?= $row['year'] ?></td>
            <td><?= $row['department'] ?></td>
            <td><?= $row['cellno'] ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    
    <script src="../js/jquery.js" ></script>
    <script src="../js/datatables.min.js" ></script>
    <script src="https://cdn.datatables.net/scroller/2.3.0/js/dataTables.scroller.min.js" ></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function () {
        $("#myTable").dataTable({
          responsive: true,
          scrollY: 330,
          // scrollX: true,
          paging: false,
        });
        
      });
      </script>
  </body>
</html>
