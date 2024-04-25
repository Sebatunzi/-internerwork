<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>

    <?php
    include 'connection.php';

    if(isset($_GET['id'])) {
        $traineesid = $_GET['id'];
        $query_select = mysqli_query($connect, "SELECT * FROM trainee WHERE id = '$traineesid'");
        $trainees = mysqli_fetch_assoc($query_select);
    ?>
<div class="container">
    <form action="" method="post">
    <h2>Update trainee</h2>
        <input type="hidden" name="id" value="<?php echo $trainees['id']; ?>">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" value="<?php echo $trainees['Tfname']; ?>"><br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" value="<?php echo $trainees['Tlname']; ?>"><br>

        <label for="lastname">Class:</label>
        <input type="text" id="lastname" name="class" value="<?php echo  $trainees['Tclass']; ?>"><br>

        <label for="">school</label>
            <select id="" name="school">
                <option value="" >select</option>
                <?php
        include 'connection.php';
        // Fetch schools data from the database
        $query_select_schools = mysqli_query($connect, "SELECT * FROM schools");
        while($school = mysqli_fetch_array($query_select_schools)) {
            echo "<option value='". $school['schoolId']."'>" . $school['schoolname'] . "</option>";
        }
        ?>
            </select><br>
        <!-- Add input fields for other employee information (DepartmentId, Salary, HiredDate) -->

        <input type="submit" value="Update" name="submit" class="sub">
        <a href="formin.php">back</a>
    </form>
    </div>
    <?php } else {
        echo "Employee not found.";
    }
    ?>
    <?php
include 'connection.php';

if(isset($_POST['submit'])) {
    $traineesId = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $deprt=$_POST['class'];
    $salry=$_POST['school'];
    // Retrieve other form data and update as needed

    $query = "UPDATE trainee SET Tfname='$fname', Tlname='$lname', 
    Tclass='$deprt' ,schoolId = '$salry' 
    WHERE id='$traineesId'";
    $result = mysqli_query($connect, $query);

    if($result) {
        header("location: formin.php");
    } else {
        echo "Error updating employee information: " ;
    }
}
?>
</body>
</html>