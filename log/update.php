<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Trainee</title>
    <style>
        /* Styles for update form */
.container {
    width: 50%;
    margin: 0 auto;
    padding: 20px;
}

h2 {
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-top: 10px;
}

input[type="text"],
select {
    margin-bottom: 10px;
    padding: 5px;
}

.sub {
    margin-top: 20px;
    width: 100px;
}

a {
    margin-top: 10px;
    text-align: center;
    display: inline-block;
    text-decoration: none;
    color: blue;
}

a:hover {
    color: darkblue;
}

    </style>
</head>
<body>

<?php
include 'conn.php';

if(isset($_GET['id'])) {
    $traineesid = $_GET['id'];
    $query_select = mysqli_query($connect,  "SELECT * FROM users WHERE id = '$traineesid'");
    $trainees = mysqli_fetch_assoc($query_select);
?>
<div class="container">
    <form action="" method="post">
        <h2>Update Trainee</h2>
        <input type="hidden" name="id" value="<?php echo $trainees['id']; ?>">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" value="<?php echo $trainees['username']; ?>"><br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" value="<?php echo $trainees['user_type']; ?>"><br>

        <label for="trade">Trade:</label>
        <select id="trade" name="trade">
            <option value="">Select</option>
            <?php
            include 'conn.php';
            // Fetch trade options from the database
            $query_select_trades = mysqli_query($connect, "SELECT * FROM trade");
            while($trade = mysqli_fetch_array($query_select_trades)) {
                $selected = ($trade['id'] == $trainees['trade']) ? "selected" : "";
                echo "<option value='". $trade['id']."' $selected>" . $trade['name'] . "</option>";
            }
            ?>
        </select><br>

        <input type="submit" value="Update" name="submit" class="sub">
        <a href="attendance.php">Back</a>
    </form>
</div>
<?php } else {
    echo "Trainee not found.";
}
?>

<?php
include 'conn.php';

if(isset($_POST['submit'])) {
    $traineesId = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $trade = $_POST['trade'];

    // Prepare and execute the update query
    $query = "UPDATE users SET username='$fname', user_type='$lname', trade='$trade' WHERE id='$traineesId'";
    $result = mysqli_query($connect, $query);

    if($result) {
        header("location:attendance.php");
    } else {
        echo "Error updating trainee information.";
    }
}
?>
</body>
</html>
