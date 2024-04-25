<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
    $conn = mysqli_connect("localhost", "root", "", "your_database");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Insert user into database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "User added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
    echo '<script>window.location.replace("profile.php");</script>';
}
?>

