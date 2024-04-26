<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.container {
    display: flex;
}

.sidebar {
    width: 250px;
    background-color: #333;
    color: #fff;
    padding: 20px;
}

.sidebar h2 {
    margin-bottom: 20px;
    text-align: center;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    margin-bottom: 10px;
}

.sidebar ul li a {
    color: #fff;
    text-decoration: none;
}

.main-content {
    flex: 1;
    padding: 20px;
}

.main-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.main-header h1 {
    font-size: 24px;
}

.user-actions a {
    color: #333;
    background-color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
}

.user-actions a:hover {
    background-color: #ccc;
}

.table-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.table-container h2 {
    font-size: 20px;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
}

    </style>
</head>
<body>
    <div class="container">
        <nav class="sidebar">
            <h2>ADMIN</h2>
            <ul>
                <li><a href="#">Users</a></li>
                <li><a href="#">Trades</a></li>
                <li><a href="#">Requests</a></li>
            </ul>
            <a href="#">Logout</a>
        </nav>
        <section class="main-content">
            <header class="main-header">
                <h1>Student Management Dashboard</h1>
                <div class="user-actions">
                    <a href="formin.php">Insert</a>
                    <a href="login_rg.php">Logout</a>
                </div>
            </header>
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
        </section>
    </div>
</body>
</html>
