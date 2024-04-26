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
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #333;
}

nav ul li a:hover {
    color: #0066cc;
}

main {
    margin-bottom: 20px;
}

.assignment {
    background-color: #f4f4f4;
    padding: 10px;
    margin-bottom: 10px;
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
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
        <main>
            <h2>Upcoming Assignments</h2>
            <div class="assignment">
                <a href="applicationform.php">APPLY FOR INTERNERSHIP</a>
                <p>Math Assignment - Due Date: April 30th</p>
            </div>
            <div class="assignment">
                <p>Science Project - Due Date: May 5th</p>
            </div>
        </main>
        <footer>
            <p>&copy; 2024 Student Dashboard</p>
        </footer>
    </div>
</body>
</html>
