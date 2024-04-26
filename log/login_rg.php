<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
 body {
    min-height: 92vh;
    /* background: url(bg1.jpeg) center / cover; */
    backdrop-filter: blur(6px);
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0;
    margin: 0;
}

.form {
    position: relative;
    max-width: 900px;
    width: 20%;
    height: 320px;
    background-color: white;
    padding: 25px;
    background-color: rgba(209, 199, 199, 0.445);
    backdrop-filter: blur(20px);
    box-shadow: 0 .4rem .8rem #0005;
    overflow: hidden;
    border-radius: 10px;
}

.form form {
    font-family: arial;
    text-align: center;
    width: 100%;
    padding-top: 10px;
}

.form form input {
    width: 80%;
    height: 30px;
    margin-top: 5px;
    font-size: 1rem;
    position: relative;
    outline: none;
    border: 1px solid #ddd;
    border-radius: 6px;
    color: #707070;
    padding: 0 15px;
}

.form form .sub {
    color: beige;
    background-color: black;
    cursor: pointer;
}

.form form .sub:hover {
    background-color: gray;
    color: black;
}

.form form p {
    margin-top: 10px;
    font-size: 0.9rem;
}

.form form p a {
    color: blue;
    text-decoration: none;
}

.form form p a:hover {
    color: darkblue;
}

    </style>
</head>
<body><div class="form">
    <form action="" method="POST">
        <h3>Login Here</h3>
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" name="login" class="sub">
        <p>Don't have an account <a href="register.php">Register</a></p>

    </form>
    <?php
    include "conn.php";
    if(isset($_POST['login'])){
        $name=$_POST['username'];
        $password=$_POST['password'];
        $query="SELECT * from users where username='$name' and password='$password'";
        $execute=mysqli_query($connect,$query);
        if(mysqli_num_rows($execute)==0){
            echo "User Not Foumd, TopUp To register!";
        }
        elseif (mysqli_num_rows($execute) == 1) {
            // User found
            $row = $execute->fetch_assoc();
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_type'] = $row['user_type'];
            
            // Redirect based on user type
            if ($row['user_type'] == 'admin') {
                header("Location:attendance.php");
                exit();
            } else {
                header("Location: student_dashboard.php");
                exit();
            }
        }
    }
    ?>
    </div>
</body>
</html>