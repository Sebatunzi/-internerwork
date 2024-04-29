<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Application Form</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="number"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

textarea {
    height: 100px;
}

.btn {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: black;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: gray;
    color:black;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Internship Application Form</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
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
        </select></div>
            <div class="form-group">
                <label for="message">Additional Message:</label>
                <textarea id="message" name="message" rows="4"></textarea>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
    <?php
// Include database connection
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $trade = $_POST["trade"];
    $message = $_POST["message"];

    // Insert data into database
    $query = "INSERT INTO internship_requests_new (email, trade, description) VALUES ('$email', '$trade', '$message')";
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "Internship request submitted successfully!";
        header('location: student_dashboard.php');
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>

</body>
</html>
