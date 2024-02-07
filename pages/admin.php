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
    <!-- <link
      rel="stylesheet"
      href="../css/datatables.min.css"
    /> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.3.0/css/scroller.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css"> -->
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
    <div class="container pt-5" id="admin-container">
    <h4>Students</h4>
      <table id="myTable" class="display nowrap table table-bordered" style="width:100%;">     
        <thead>
          <tr>
            <th>id</th>
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
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = mysqli_query($conn, "SELECT * FROM student");
            while($row = mysqli_fetch_assoc($query)) {
          ?>
          <tr>
            <td class="user_id"><?= $row['id'];?></td>
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
            <td class="d-flex gap-2">
              <button type="button" class="btn btn-success edit-button"  data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
              <button type="button" class="btn btn-danger delete_btn" >Delete</button>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form class="modal-content" action="../php/update.php" method="post" enctype="multipart/form-data">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Info</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body row g-3">
          <div class="input-group flex-nowrap">                                
            <input type="hidden" class="form-control" id="user_id" name="id">
          </div>
          <div class="col-md-6">
            <label for="inputFirstname" class="form-label">First Name</label>
            <input
              type="text"
              class="form-control"
              id="inputFirstname"
              name="firstName"
              required
            />
          </div>
          <div class="col-md-6">
            <label for="inputLastname" class="form-label">Last Name</label>
            <input
              type="text"
              class="form-control"
              id="inputLastname"
              name="lastName"
              required
            />
          </div>
          <div class="col-md-6">
            <label for="birthday" class="form-label">Date of birth</label>
            <input
              type="date"
              class="form-control"
              id="birthday"
              name="bday"
              required
            />
          </div>
          <div class="col-md-6">
            <label for="gender" class="form-label">Gender</label>
            <select id="gender" class="form-select" name="gender" required>
              <option selected>Choose</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="col-12">
            <label for="email" class="form-label">Email Address</label>
            <input
              type="email"
              class="form-control"
              id="email"
              name="email"
              required
            />
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input
              type="text"
              class="form-control"
              id="inputAddress"
              placeholder="1234 Main St"
              name="address"
              required
            />
          </div>
          <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input
              type="text"
              class="form-control"
              id="inputCity"
              name="city"
              required
            />
          </div>
          <div class="col-md-4">
            <label for="inputProvince" class="form-label">Province</label>
            <input
              type="text"
              class="form-control"
              id="inputProvince"
              name="province"
              required
            />
          </div>
          <div class="col-md-2">
            <label for="inputZip" class="form-label">Zip</label>
            <input
              type="text"
              class="form-control"
              id="inputZip"
              name="zip"
              required
            />
          </div>
          <div class="col-md-4">
            <label for="level" class="form-label">Year Level</label>
            <select id="level" class="form-select" name="year" required>
              <option selected>Choose</option>
              <option value="I">FIRST YEAR</option>
              <option value="II">SECOND YEAR</option>
              <option value="III">THIRD YEAR</option>
              <option value="IV">FOURTH YEAR</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="department" class="form-label">Department</label>
            <select
              id="department"
              class="form-select"
              name="department"
              required
            >
              <option selected>Choose</option>
              <option value="CCS">College of Computer Studies</option>
              <option value="CAF">College of Agriculture Forestry</option>
              <option value="CBM">College of Bussiness Management</option>
              <option value="COTED">College of Teacher Education</option>
              <option value="CCJE">College of Criminal Justice</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="cellnumber" class="form-label">Cellphone Number</label>
            <input
              type="number"
              class="form-control"
              id="cellnumber"
              name="cellno"
              required
            />
          </div>
          <div class="col-4">
            <label for="inputGroupFile02" class="form-label">Student Image</label>
            <input
              type="text"
              class="form-control"
              id="imageFileName"
              name="currentImage"
              readonly
            />
          </div>
          <div class="col-8">
            <label for="inputGroupFile02" class="form-label">Choose a new image</label>
            <input
              type="file"
              class="form-control"
              id="inputGroupFile02"
              name="image"
            />
          </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="update_data">Save changes</button>
          </div>
        </form>
      </div>
    </div>
    
    <script src="../js/jquery.js" ></script>
    <!-- <script src="../js/datatables.min.js" ></script>
    <script src="https://cdn.datatables.net/scroller/2.3.0/js/dataTables.scroller.min.js" ></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script> -->
    <script src="../js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function () {
        $('.edit-button').click(function(e) {
          e.preventDefault();
          // Get the user ID from the data-id attribute
          var userId = $(this).closest('tr').find('.user_id').text();

          // Ajax request to fetch user details based on the user ID
          $.ajax({
            method: 'POST',
            url: '../php/update.php', // replace with your server-side script to fetch user details
            data: { 
              'click_edit_button': true,
              'user_id': userId
            },           
            success: function(response) {
              console.log(response);
              // Populate modal fields with retrieved user details
              
              $.each(response, function (key, value) {
                $('#user_id').val(value.id);
                $('#inputFirstname').val(value.fname);
                $('#inputLastname').val(value.lname);
                $('#birthday').val(value.bday);
                $('#gender').val(value.gender);
                $('#email').val(value.email);
                $('#inputAddress').val(value.address);
                $('#inputCity').val(value.city);
                $('#inputProvince').val(value.province);
                $('#inputZip').val(value.zip);
                $('#level').val(value.year);
                $('#department').val(value.department);
                $('#cellnumber').val(value.cellno);
                $('#inputGroupFile02').val('');
                $('#imageFileName').val(value.image); 
              });

              $('#editModal').modal('show');
            }
          });
        });
      });
      
      
      $(document).ready(function () {
        $('.delete_btn').click(function (e) {
          e.preventDefault();
          
          var user_id = $(this).closest('tr').find('.user_id').text();
          $.ajax({
            method: 'POST',
            url: '../php/delete.php',
            data: {
              'click_delete_button': true,
              'user_id': user_id,
            },
            success: function (response) {
              console.log(response)
              window.location.reload();
            }
          });
        });
      });

      // $(document).ready(function () {
      //   $("#myTable").dataTable({
      //     scrollY: 330,
      //     // scrollX: true,
      //     paging: false,
      //   });
      // });
      </script>
  </body>
</html>
