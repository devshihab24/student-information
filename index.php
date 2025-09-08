<?php include('assets/header.php'); ?>
<?php include('assets/dbconn.php'); ?>

<!-- this is for add student form -->
<?php
if (isset($_GET['message'])) {
    echo "<h6 class='text-xl text-[#d20000] font-semibold text-center pt-4'>" . $_GET['message'] . "</h6>";
}
?>
<?php
if (isset($_GET['insert_msg'])) {
    echo "<h6 class='text-xl text-[green] font-semibold text-center pt-4'>" . $_GET['insert_msg'] . "</h6>";
}
?>
<div style="padding-right: 20px;" class="container flex justify-end py-4 ">
    <button class="common-btn" onclick="my_modal_1.showModal()">ADD STUDENT</button>
    <dialog id="my_modal_1" class="modal">
        <form class="w-[700px]" action="assets/insert.php" method="POST">
            <div id="modal" class="modal-box ">
                <div class="flex flex-col justify-between items-center">
                    <div class="input-field">
                        <label for="f_name">Enter first name</label><br>
                        <input name="f_name" type="text">
                    </div>
                    <br>
                    <div class="input-field">
                        <label for="l_name">Enter last name</label><br>
                        <input name="l_name" type="text">
                    </div>
                    <br>
                    <div class="input-field">
                        <label for="age">Enter student's age</label><br>
                        <input name="age" type="text">
                    </div>
                    <br>
                    <div class="input-field"><label for="gpa">Enter student's gpa</label><br>
                        <input name="gpa" type="text">
                    </div>
                </div>
                <div class="modal-action flex gap-10">
                    <!-- if there is a button in form, it will close the modal -->
                    <button type="button" style="background-color: white; color: black;" class="common-btn" onclick="my_modal_1.close()">CLOSE</button>
                    <input type="submit" class="common-btn" name="add_student" value="SUBMIT">
                </div>
            </div>
        </form>
    </dialog>
</div>

<div class="px-4 pb-4">
    <table id="studentTable" class="table border">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>GPA</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM `students`";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("Fatal Error: " . mysqli_error($connection));
            } else {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['gpa']; ?></td>
                        <td><a href="assets/update.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">UPDATE</a></td>
                        <td><a href="assets/delete.php?id=<?php echo $row['id'];?>" class="btn btn-sm btn-error">DELETE</a></td>
                    </tr>
            <?php }
            }
            ?>
        </tbody>
    </table>

</div>

<?php include('assets/footer.php'); ?>