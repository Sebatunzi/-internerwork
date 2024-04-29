<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: wh;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

header {
    text-align: center;
    margin-bottom: 20px;
}

nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    text-align: center;
    font-size:20px;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: black;
}

nav ul li a:hover {
    color: #0066cc;
}

main {
    margin-bottom: 20px;
}

.assignment {
    background-color: skyblue;
    padding: 10px;
    margin-bottom: 10px;
    border-radius:15px;
    box-shadow:1px 2px 1px 1px gray;
    align-content:center;
}
.assignment button{
    text-decoration:none;
    background:black;
    color:white;
    align:center;
    padding:20px;
    border-radius:12px;

}
.assignment button:hover{
    background-color:whitesmoke;
    color:black;
}
.assignment button a:hover{
    color:black;
}
.assignment button a{
    text-decoration:none;
    color:white;
    font-size:15px;
}


footer {
    text-align: center;
    color: #666;
    padding-top: 20px;
    border-top: 1px solid #ccc;
}

    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to Student Dashboard</h1>
        </header>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Courses</a></li>
                <li><a href="#">Grades</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="login_rg.php">Logout</a></li>
            </ul>
        </nav>
        <main>
            <h2>Upcoming Assignments</h2>
            <div class="assignment">
                <center><button><a href="applicationform.php">APPLY FOR INTERNERSHIP</a></button></button>
                <p>Date of start - Due Date: April 30th</p>
            </div>
            <div class="assignment">
                <p>Science Project - Due Date: May 5th</p>
            </div>
        </main>
    </div><center>
    <div class="request">
    <h1>Internship Requests</h1>
    <table>
        <tr>
            <th>Email</th>
            <th>Trade</th>
            <th>Description</th>
            <th>Status</th>
        </tr>
        <?php
        // Include database connection
        include 'conn.php';

        // Retrieve internship requests from the database
        $query = "SELECT * FROM internship_requests_new";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["trade"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No internship requests found</td></tr>";
        }
        ?>
    </table></center>
</body>
</html>
