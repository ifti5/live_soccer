<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
    $conn = mysqli_connect("localhost", "root", "", "your_database");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get user ID from form
    $userId = $_POST["userId"];

    // Delete user from database
    $sql = "DELETE FROM users WHERE id=$userId";
    if (mysqli_query($conn, $sql)) {
        echo "User deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
    echo '<script>window.location.replace("profile.php");</script>';
}
?>

