<?php
    include 'conn.php';
    if(isset($_POST['add'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $clas=$_POST['user_type'];
        $schl=$_POST['school']; 
        $query="INSERT INTO users(username,password,user_type,tradeId) values('$fname','$lname','$clas','$schl')";

        $in=mysqli_query($connect,$query);
        if(!$in){
            echo"error inserting";
        }
        else{
            header("location: formin.php");
            exit;
        }
    }


    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="table-container">
                <h2>Students</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Student No</th>
                            <th>Name</th>
                            <th>User Type</th>
                            <th>Trade</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Include database connection
                            include 'conn.php';

                            // Fetch data from database
                            $query_select = mysqli_query($connect, "SELECT users.*, trade.name FROM users INNER JOIN trade ON users.tradeId = trade.id");

                            // Loop through fetched data and display in table rows
                            while ($trainees = mysqli_fetch_array($query_select)) {
                                echo "<tr>";
                                echo "<td>" . $trainees['id'] . "</td>";
                                echo "<td>" . $trainees['username'] . "</td>";
                                echo "<td>" . $trainees['user_type'] . "</td>";
                                echo "<td>" . $trainees['name'] . "</td>";
                                echo "<td>";
                                echo "<a href='delete.php?id=" . $trainees['id'] . "'>Delete</a>";
                                echo "<a href='update.php?id=" . $trainees['id'] . "'>Update</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
<div class="container">
    <div class="form1">
        <form action="" method="post">
            <h1>   ENTER STUDENTS</h1>
            <label for="">Name</label>
            <input type="text" name="fname"><br>
            <label for="">password</label>
            <input type="text" name="lname"><br>
            <label for="">user_type</label>
            <input type="text" name="user_type"><br>
            <select id="" name="school">
                <option value="">select</option>
                <?php
        include 'conn.php';
        // Fetch schools data from the database
        $query_select_schools = mysqli_query($connect, "SELECT * FROM trade");
        while($school = mysqli_fetch_array($query_select_schools)) {
            echo "<option value='" . $school['id'] . "'>" . $school['name'] . "</option>";
        }
        ?>
            </select>

            <input type="submit" value="enter values" name="add" class="sub">
            <p><a href="attendance.php">back to Dashboard</a></p>
     </form> 
   </div>
</div>
</body>
