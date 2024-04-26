<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            outline:none;
            border:none;
            text-decoration:none;
            box-sizing:border-box;
            font-family: arial;
        }
        body{
            background: rgb(226, 226, 226);
        }
        nav{
            position:sticky;
            top: 0;
            bottom: 0;
            height:100vh;
            left:0;
            width:250px;
            overflow:hidden;
            text-align:center;
            background-color: rgba(209, 199, 199, 0.445);
    backdrop-filter: blur(20px);
    box-shadow: 0 .4rem .8rem #0005;
        }
       
       nav a{
            position: relative;
            width:220px;
            font-size:14px;
            color :rgb(85, 83,83);
            display:table;
            padding:10px;
            font-size:20px;
            text-align:center;
        }
        a:hover{
            background: #000;
            color:white;
        }
        .container{
            display:flex;
        }
        .main{
            position:relative;
            padding: 20px;
            width:100%;
        }
        .main-top{
            position:absolute;
            right:0;
            color: rgb(110, 109,109);
            cursor:pointer;
        }
        table{
    width: 100%;
    border-collapse: collapse;
}
th,td {
    padding: 0.6rem;
    border-collapse: collapse;
    font-size: 18px;
    text-align: left;
   }
.table{
    width: 80vw;
    height: 90vh;
    background-color: rgba(209, 199, 199, 0.445);
    backdrop-filter: blur(20px);
    box-shadow: 0 .4rem .8rem #0005;
    overflow: hidden;
    border-radius: 10px;
    text-align: center;
    margin-right: 40px;
    margin-left: -220px;
    overflow-y: auto;
    overflow-x: hidden;
}
.theads {
    width: 100%;
    height: 10%;
    background-color: rgba(197, 188, 188, 0.473);
    padding: .8rem 1rem;
}
tbody{
    width: 95%;
    max-height: calc(89% - .8rem);
    background-color: #fffb;
    margin: .8rem auto;
    border-radius: .6rem;
    overflow: auto ;
}
tbody::-webkit-scrollbar-thumb{
    border-radius: .5rem;
    background-color: #0004;
    visibility: hidden;

}
tbody::-webkit-scrollbar-thumb{
    visibility: visible;
}
thead th{
    position: sticky;
    top: 0;
    left: 0;
    background-color: #d5d1defe;
}
td a{
    color: white;
    background-color: black;
    padding: 9px;
    font-size: 10px;
    border-radius: 10px;
    text-decoration: none;
    
}
td a:hover{
    background-color: gray;
    color: blanchedalmond;
}
.navs{
    width:1000px;
    margin-left: -220px;
    
}
.navs   nav{
            position:sticky;
            height:10vh;
            left:0;
            width:1130px;
            background:#000;
            text-align:right;
            padding-top:-30px;
            margin-top:-20px;
    border-radius:10px;
    margin-bottom:20px;
        }

        .navs   nav p{
            position: right;
            font-size:14px;
            color :white;
            padding:20px;
            font-size:20px;
            text-align:right;
        }
       .navs p a:hover{
            background: #000;
            color:white;
        }
        .navs p a{
            display:inline;
            background:white;
            border-radius:10px;
            padding:10px;
            margin:10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <ul><li>
<h2>ADMIN</h2>
            </li>
            <li><a href="">users</a></li>
            <li><a href="">TRADES</a></li>
            <li><a href="">REQUESTS</a></li>
        </ul>
        <a href="">LOGOUT</a>
        </nav>
        <section class="main">
<div class="main-top">
<div class="navs">
    
    <nav>
<ul>
            <li><p><a href="">insert</a><a href="">LOGOUT</a></p></li>
        </ul>
        </nav>
                </div>
                <div class="table">
    <section class="theads">
        <h1>STUDENTS</h1>
    </section>
    <?php
            include 'conn.php';
            $query_select=mysqli_query($connect,"SELECT users.*, trade.name from users INNER JOIN trade on  users.tradeId=trade.id");
        ?>
        <table>
        <thead>
            <tr>
            <th>stu No</th>
            <th>Name</th>
            <th>user_type</th>
            <th>trade</th>
            <th>OPTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($trainees=mysqli_fetch_array($query_select)){
                ?>
                <tr>
                    <td><?php echo $trainees['id'];?></td>
                    <td><?php echo $trainees['username'];?></td>
                     <td><?php echo $trainees['user_type'];?></td>
                     <td><?php echo $trainees['name'];?></td>
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
            </div>
        </section>
    </div>
</body>
</html>