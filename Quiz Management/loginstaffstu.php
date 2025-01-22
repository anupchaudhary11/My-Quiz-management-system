<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In or Create an Account</title>
    <style>
        /* CSS starts here */
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


        .container {
            text-align: center;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 2rem;
            color: #333;
        }

        .cards {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 300px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .icon img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        p {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 20px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
        /* CSS ends here */
    </style>
    <script>
        // JavaScript starts here
        function navigateToPage(page) {
            window.location.href = page;
        }
        // JavaScript ends here
    </script>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <a href="index.php" class="HOME-button">HOME</a>
        <h1>Welcome to Our Quiz Management System</h1>
    </header>

    <div class="container">
        <h1>Sign in or create an account</h1>
        <div class="cards">
            <div class="card">
                <div class="icon">
                    <img src="index ss/image 13.png" alt="Student">
                </div>
                <h2>Student Login</h2>
                <p>Create an account to check your Learning skills</p>
                <button onclick="navigateToPage('signup.php')">Create an account</button>
                <button onclick="navigateToPage('loginstud.php')">Sign in</button>
            </div>
            <div class="card">
                <div class="icon">
                    <img src="index ss/image 14.png" alt="Teacher">
                </div>
                <h2>Staff Login</h2>
                <p>Create an account to give the most difficult question ever</p>
                <button onclick="navigateToPage('signup.php')">Create an account</button>
                <button onclick="navigateToPage('loginstaff.php')">Sign in</button>
            </div>
        </div>
    </div>
</body>
</html>
