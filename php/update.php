<?php
    include 'db.php';

    if(isset($_POST['click_edit_button'])) {
        $id = $_POST['user_id'];
        $arrResult = [];

        $query = mysqli_query($conn, "SELECT * FROM student WHERE id='$id'");

        if(mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {
                array_push($arrResult, $row);
            }
            header('content-type: application/json');
            echo json_encode($arrResult);
        }
    }

    if(isset($_POST['update_data'])) {
        $id = $_POST['id'];
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $birthday = $_POST['bday'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $zip = $_POST['zip'];
        $level = $_POST['year'];
        $department = $_POST['department'];
        $cellnumber = $_POST['cellno'];
        $currentImg = $_POST['currentImage'];

        $image = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $dir = '../uploads/'.$image;

        if(empty($image)) {
            mysqli_query($conn, "UPDATE student SET `fname`='$firstname', `lname`='$lastname', `bday`='$birthday',`gender`='$gender',`email`='$email',`address`='$address',`city`='$city',`province`='$province',`zip`='$zip',`year`='$level',`department`='$department',`cellno`='$cellnumber',`image`='$currentImg' WHERE id='$id'");
            header('location: ../pages/admin.php');
        } else {
            mysqli_query($conn, "UPDATE student SET `fname`='$firstname', `lname`='$lastname', `bday`='$birthday',`gender`='$gender',`email`='$email',`address`='$address',`city`='$city',`province`='$province',`zip`='$zip',`year`='$level',`department`='$department',`cellno`='$cellnumber',`image`='$image' WHERE id='$id'");
            move_uploaded_file($image_tmp_name,$dir);
            header('location: ../pages/admin.php');
        }  
    }