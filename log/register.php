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
<body>


<div class="form">
    <form action="" method="post">
        <h3>REGISTER NOW</h3>
        <input type="text" name="name" required placeholder="enter username"><br>
        <input type="password" name="" required placeholder="enter password"><br>
        <input type="password" name="passcode" required placeholder="confirm password"><br>
        <select name="user_type" id="">
            <option value="">Select user</option>
            <option value="admin">admin</option>
            <option value="student">student</option>
        </select><br>
        <input type="submit" name="subm" value="REgister now" class="sub">
        <p>already have an account <a href="login_rg.php">login</a></p>
    </form>
    <?php
    include 'conn.php';
    if(isset($_POST['subm'])){
        $name=$_POST['name'];
        $pass=$_POST['passcode'];
        $user=$_POST['user_type'];
        $query2="INSERT INTO USERS(username,password,user_type) 
        values('$name','$pass','$user')";
         $in2=mysqli_query($connect,$query2);
         if(!$in2){
            echo "error inserting";
         }else{
            header("location: login_rg.php");
         };
    }


    ?>
</div>
    
</body>
</html>