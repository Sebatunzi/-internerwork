<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
table {
            width: 100%;
            border-collapse: collapse;
                    }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #fff;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-accept {
            background-color: #4CAF50;
            color: white;
        }
        .btn-accept:hover{
            background: #000;

        }
        
        .btn-reject:hover{
            background: #000;

        }


        .btn-reject {
            background-color: #f44336;
            color: white;
        }
        .tb{
            background:white;
            padding:30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="sidebar">
            <h2>ADMIN</h2>
            <ul>
                <li><a href="attendance.php">Users</a></li>
                <li><a href="#">Trades</a></li>
                <li><a href="#">Requests</a></li>
            </ul>
            <a href="login_rg.php">Logout</a>
        </nav>
        <section class="main-content">
            <header class="main-header">
                <h1>Student Management Dashboard</h1>
                <div class="user-actions">
                    <a href="formin.php">Insert</a>
                    <a href="login_rg.php">Logout</a>
                </div>
            </header>
    <div class="tb">
        <h1>Internship Requests</h1>
                
    <table>
        <tr>
            <th>Email</th>
            <th>Trade</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php

        include 'conn.php';

        $query = "SELECT * FROM internship_requests_new";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["trade"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td>";
                if ($row["status"] == 'pending') {
                    echo "<button class='btn btn-accept' onclick='acceptRequest(" . $row['id'] . ")' type='submit'>Accept</button>";
                    echo "<button class='btn btn-reject' onclick='rejectRequest(" . $row['id'] . ")' type='submit'>Reject</button>";
                }
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No internship requests found</td></tr>";
        }
        ?>
    </table></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function acceptRequest(id) {
        $.post('update_status.php', { id: id, status: 'approved' }, function(data) {
            if (data === 'success') {
                window.location.href = 'attendance.php';
            } else {
                    echo"error";
            }
        });
    }

    function rejectRequest(id) {
        $.post('update_status.php', { id: id, status: 'rejected' }, function(data) {
            if (data === 'success') {
                window.location.href = 'attendance.php';
            } else {
                echo"error";
            }
        });
    }
</script>
</body>
</html>