<?php
session_start();
require_once 'sql.php'; // Make sure this file contains your database credentials

if (isset($_POST['login'])) {
    if (isset($_POST['usertype'], $_POST['username'], $_POST['pass'])) {
        // Database connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            echo "<script>alert('Database error. Please try again later.')</script>";
            exit();
        }

        // Sanitize and fetch input
        $type = mysqli_real_escape_string($conn, $_POST['usertype']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['pass']);

        // Encrypt the input password for comparison
        $hashed_password = crypt($password, 'rakeshmariyaplarrakesh');

        // SQL query
        $sql = "SELECT * FROM `$type` WHERE mail = '$username'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Validate password
            if (hash_equals($row['pw'], $hashed_password)) {
                // Set session variables
                $_SESSION['name'] = $row['name'];
                $_SESSION['type'] = $type;
                $_SESSION['username'] = $row['mail'];

                // Redirect based on user type
                if ($type === 'student') {
                    header("Location: homestud.php");
                } elseif ($type === 'staff') {
                    header("Location: homestaff.php");
                }
                exit();
            } else {
                echo "<script>alert('Incorrect password.');</script>";
            }
        } else {
            echo "<script>alert('Username not found. Please sign up.');</script>";
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "<script>alert('All fields are required.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Management System</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-image: url('images/image.png.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .login-container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
            text-align: center;
            width: 350px;
            color: white;
        }

        .login-container h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            background-color: #f5f5f5;
            color: #333;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }

        .login-container a {
            color: #007bff;
            text-decoration: none;
            font-size: 0.9rem;
            margin: 10px 5px;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        .footer {
            font-size: 0.8rem;
            margin-top: 20px;
            color: #ccc;
        }

        .language-select {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .language-select select {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: white;
        }
    </style>
</head>
<body>
    <!-- Language Selection -->
    <div class="language-select">
        <select>
            <option value="en">English</option>
            <option value="es">Español</option>
            <option value="fr">Français</option>
        </select>
    </div>

    <div class="login-container">
        <h1>Quiz Management System Student</h1>
        <!-- Form to handle login -->
        <form action="" method="POST">
            <!-- User Type (hidden field) -->
            <input type="hidden" name="usertype" value="student">
            <input type="email" name="username" placeholder="Email" required>
            <input type="password" name="pass" placeholder="Password" required>
            <button type="submit" name="login">LOGIN</button>
        </form>
        <div>
            <a href="signup.php">Create an account</a>
        </div>
        <div class="footer">
            <a href="#">Project By</a> | <a href="#">Anup and Sujay</a>
        </div>
    </div>
</body>
</html>
