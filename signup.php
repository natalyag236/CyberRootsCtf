<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Start the session at the beginning
    session_start();

    // Collect the data from the signup form
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format. Please enter a valid email address.";
        header("Location: signup.php"); // Redirect back to the signup page
        exit();
    }

    // Password hashing for security
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Use the current date and time for last_login
    $last_login = date("Y-m-d H:i:s");

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

    // Check if the username or email already exists in the users table
    $check_user_sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($check_user_sql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Username or email already exists. Please choose a different username or email.";
        header("Location: signup.php"); // Redirect back to the signup page
        exit();
    } else {
        // Username and email are unique, proceed with the insertion

        // First, insert into the users table
        $user_sql = "INSERT INTO users (username, email, password_hash, last_login) 
                     VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($user_sql);
        $stmt->bind_param("ssss", $username, $email, $password_hash, $last_login);

        if ($stmt->execute()) {
            // Get the user_id of the newly inserted user
            $user_id = $conn->insert_id;

            // Insert into signup table using the user_id
            $signup_sql = "INSERT INTO signup (user_id, username, email, password_hash, last_login) 
                           VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($signup_sql);
            $stmt->bind_param("issss", $user_id, $username, $email, $password_hash, $last_login);

            if ($stmt->execute()) {
                // Set session variable to keep the username after login
                $_SESSION['username'] = $username;

              
                header("Location: index.php");
            // Replace this with:
            echo "Redirecting to index.php";
            exit();

            } else {
                $_SESSION['error'] = "Error in signup table: " . $stmt->error;
            }
        } else {
            $_SESSION['error'] = "Error in users table: " . $stmt->error;
        }
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
