<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the data from the login form
    $username = htmlspecialchars(trim($_POST["username"]));  // Only username for login
    $password = htmlspecialchars(trim($_POST["password"]));

    // Database connection parameters
    $servername = "localhost";
    $db_username = "root";
    $db_password = "root";
    $dbname = "Cyber Roots CTF";

    // Create a new connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user exists
    $check_user_sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($check_user_sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password_hash'])) {
            // Password is correct, start session
            session_start();
            $_SESSION['username'] = $username;

            // Redirect to homepage
            header("Location:  index.php");
            exit();
        } else {
            echo "<h4 style='color: red;'>Incorrect password!</h4>";
        }
    } else {
        echo "<h4 style='color: red;'>User does not exist!</h4>";
    }

    // Close the database connection
    $conn->close();
}
?>
