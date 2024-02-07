<?php
    include 'db.php';

    if(isset($_POST['click_delete_button'])) {
        $id = $_POST['user_id'];

        $query = mysqli_query($conn, "DELETE FROM student WHERE id='$id'");

        if($query) {
            echo 'deleted';
        }
    }