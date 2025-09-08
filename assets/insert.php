<?php include('dbconn.php'); ?>

<?php

if (isset($_POST['add_student'])) {
    $firstName = $_POST['f_name'];
    $lastName = $_POST['l_name'];
    $age = $_POST['age'];
    $gpa = $_POST['gpa'];
    if ($firstName == '' || empty($firstName)) {
        header('location: ../index.php?message=You need to fill all input field!');
    } elseif ($lastName == '' || empty($lastName)) {
        header('location: ../index.php?message=You need to fill all input field!');
    } elseif ($age == '' || empty($age)) {
        header('location: ../index.php?message=You need to fill all input field!');
    } elseif ($gpa == '' || empty($gpa)) {
        header('location: ../index.php?message=You need to fill all input field!');
    } else {
        $query = "INSERT INTO `students` (`first_name`, `last_name`, `age`, `gpa`) VALUES ('$firstName', '$lastName', '$age', '$gpa')";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        } else {
            header('location: ../index.php?insert_msg=Data inserted successfully!');
        }
    }
}


?>