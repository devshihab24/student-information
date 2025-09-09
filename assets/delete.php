<?php include("dbconn.php");?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM `students` WHERE `id` = '$id'";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("Uncaught error happened: " .mysqli_error($connection));
        }
        else{
            header("Location: ../index.php?delete_msg=You have successfully deleted the data!");
        }
    }

?>