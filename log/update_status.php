<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['status'])) {
        $requestId = mysqli_real_escape_string($connect, $_POST['id']);
        $status = mysqli_real_escape_string($connect, $_POST['status']);

        $query = "UPDATE internship_requests_new SET status = '$status' WHERE id = '$requestId'";
        $result = mysqli_query($connect, $query);

        if ($result) {
            echo 'success';
        } else {
            echo 'Error updating status';
        }
    } else {
        echo 'Invalid parameters';
    }
} else {
    echo 'Invalid request method';
}
?>
