<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "your_database");

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "admin" && $password === "admin") {
        // Admin login
        $_SESSION["username"] = $username;
        header("Location: welcome.html");
        exit();
    } else {
        // Check if user exists in database
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // User exists, verify password
            $user = $result->fetch_assoc();
            if ($password === $user["password"]) {
                // Password matches, log in
                $_SESSION["username"] = $username;
                header("Location: scoreapi.html");
                exit();
            } else {
                // Incorrect password
                header("Location: index.html?error=1");
                exit();
            }
        } else {
            // User does not exist
            header("Location: index.html?error=2");
            exit();
        }
    }

    $conn->close();
}
?>
