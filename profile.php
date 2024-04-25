<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Off-white background */
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Admin Panel</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h4>Add User</h4>
                <form action="add_user.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
            <div class="col-md-6">
                <h4>Delete User</h4>
                <form action="delete_user.php" method="POST">
                    <div class="form-group">
                        <label for="userId">User ID:</label>
                        <input type="number" class="form-control" id="userId" name="userId" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Delete User</button>
                </form>
            </div>
        </div>
        <hr>
        <h4 class="mt-4">Current Users</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th> <!-- New column for password -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Connect to database
                $conn = mysqli_connect("localhost", "root", "", "your_database");

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Fetch users from database
                $sql = "SELECT id, username, password FROM users";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"] . "</td><td>" . $row["password"] . "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No users found</td></tr>";
                }

                // Close connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
