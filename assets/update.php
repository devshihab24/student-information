<?php include('dbconn.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />

</head>

<body>
    <header class="w-full text-center bg-[#333] py-8 text-white">
        <h1 class="text-4xl font-bold">Update Your Student Data</h1>
    </header>

    
    <?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM `students` WHERE id = $id";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die('Result not found: '.mysqli_error($connection));
        }
        else{
            $row = mysqli_fetch_assoc($result);
            // print_r($row);
        }
    }
    
    if(isset($_POST['update_btn'])){
        $id = $_GET['id'];
        $firstName = $_POST['f_name'];
        $lastName = $_POST['l_name'];
        $age = $_POST['age'];
        $gpa = $_POST['gpa'];
        $query = "UPDATE `students` set `first_name` = '$firstName', `last_name` = '$lastName', `age` = '$age', `gpa` = '$gpa' WHERE `id` = $id";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die('Result not found.');
        }
        else{
            header('Location: ../index.php?update_msg=You have successfully updated student data!');
        }
    }
    
    ?>
    <form action="update.php" method="POST" class=" flex justify-center">
        <fieldset class="fieldset w-[600px] flex justify-center">
            <legend class="fieldset-legend">Enter first name</legend>
            <input name="f_name" style="width: 600px;" type="text" class="input" value="<?php echo $row['first_name'];?>" />
            <legend class="fieldset-legend">Enter last name</legend>
            <input name="l_name" style="width: 600px;" type="text" class="input" value="<?php echo $row['last_name']?>" />
            <legend class="fieldset-legend">Enter age</legend>
            <input name="age" style="width: 600px;" type="text" class="input" value="<?php echo $row['age'];?>" />
            <legend class="fieldset-legend">Enter gpa</legend>
            <input name="gpa" style="width: 600px;" type="text" class="input" value="<?php echo $row['gpa'];?>" />
            <div class="h-10 text-end pt-4"><input class="btn btn-primary h-8" name="update_btn" type="submit" value="Update"></div>
        </fieldset>
    </form>
</body>

</html>