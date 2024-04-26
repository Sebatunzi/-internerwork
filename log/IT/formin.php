<?php
    include 'connection.php';
    if(isset($_POST['add'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $clas=$_POST['class'];
        $schl=$_POST['school']; 
        $query="INSERT INTO trainee(Tfname,Tlname,Tclass,schoolId) values('$fname','$lname','$clas','$schl')";

        $in=mysqli_query($connect,$query);
        if(!$in){
            echo"error inserting";
        }
        else{
            header("location: formin.php");
            exit;
        }
    }

    include 'connection.php';
    if(isset($_POST['add2'])){
        $sname=$_POST['schlname'];
        $adrs=$_POST['schladress'];
        $phon=$_POST['schlnumber'];
        $princ=$_POST['principal'];
        $query2="INSERT INTO schools(schoolname,schooladress,schoolphone,schoolprincipal) 
        values('$sname','$adrs','$phon','$princ')";
         $in2=mysqli_query($connect,$query2);
         if(!$in2){
            echo "error inserting";
         }else{
            echo"<p bg-color='green' font-color='white'>SCHOOL INSERTED</P>";
            header("location: formin.php");
         };
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
<div class="table">
    <section class="theads">
        <h1>STUDENTS</h1>
    </section>
    <?php
            include 'connection.php';
            $query_select=mysqli_query($connect,"SELECT trainee.*, schools.schoolname from trainee INNER JOIN schools on  trainee.schoolId=schools.schoolId");
        ?>
        <table>
        <thead>
            <tr>
            <th>stu No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Class</th>
            <th>School</th>
            <th>OPTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($trainees=mysqli_fetch_array($query_select)){
                ?>
                <tr>
                    <td><?php echo $trainees['id'];?></td>
                    <td><?php echo $trainees['Tfname'];?></td>
                     <td><?php echo $trainees['Tlname'];?></td>
                     <td><?php echo $trainees['Tclass'];?></td>
                     <td><?php echo $trainees['schoolname'];?></td>
                     <td>
                        <a href="delete.php?id=<?php  echo $trainees['id']?>">delete</a>
                        <a href="update.php?id=<?php  echo $trainees['id']?>">Update</a>
                     </td>
            </tr>
             <?php
            };
            ?>
            </tbody>
        </table>
    </div>
<div class="container">
    <div class="form1">
        <form action="" method="post">
            <h1>   ENTER STUDENTS</h1>
            <label for="">first name</label>
            <input type="text" name="fname"><br>
            <label for="">last name</label>
            <input type="text" name="lname"><br>
            <label for="">class</label>
            <input type="text" name="class"><br>
            <label for="">school</label>
            <select id="" name="school">
                <option value="">select</option>
                <?php
        include 'connection.php';
        // Fetch schools data from the database
        $query_select_schools = mysqli_query($connect, "SELECT * FROM schools");
        while($school = mysqli_fetch_array($query_select_schools)) {
            echo "<option value='" . $school['schoolId'] . "'>" . $school['schoolname'] . "</option>";
        }
        ?>
            </select>

            <input type="submit" value="enter values" name="add" class="sub">
     </form> 
   </div>
    <div class="form2">
        <form action="" method="post">
            <H1>Enter school</H1>
            <label for="">Name</label>
            <input type="text" name="schlname" required><br>
            <label for="">Address</label>
            <input type="text" name="schladress" required><br>
            <label for="">Phone</label>
            <input type="number" name="schlnumber" required><br>
            <label for="">Principal</label>
            <input type="text" name="principal" required><br>
            <input type="submit" value="add school" name="add2" class="sub">
        </form>
    </div>
</div>
</body>
