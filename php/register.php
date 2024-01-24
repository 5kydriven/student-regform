<?php
    include 'db.php';

    if(isset($_POST['register'])) {
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $bday = $_POST['bday'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $zip = $_POST['zip'];
        $year = $_POST['year'];
        $department = $_POST['department'];
        $cellno= $_POST['cellno'];

        $image = $_FILES['image']['name'];
        $picture_tmp_name = $_FILES['image']['tmp_name'];

        $dir = "../uploads/".$image;


        $query = mysqli_query($conn, "INSERT INTO student (fname,lname,bday,gender,email,address,city,province,zip,year,department,cellno,image) VALUES ('$fname','$lname','$bday','$gender','$email','$address','$city','$province','$zip','$year','$department','$cellno','$image')");
        if($query) {
            move_uploaded_file($picture_tmp_name, $dir);
            
            echo '<script>alert("Registration successful!");</script>';

            // Redirect after displaying the alert
           header("location: ../index.html");
        }
    }