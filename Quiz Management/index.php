<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #E6F7FF;
            color: #333;
        }

        /* Header Section */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background: #007BFF;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .header h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        .login-button {
            text-decoration: none;
            color: #007BFF;
            background: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            transition: background 0.3s, color 0.3s;
        }

        .login-button:hover {
            background: #0056b3;
            color: white;
        }

        /* Content Section */
        .content {
            text-align: center;
            margin: 40px 20px;
        }

        .content h2 {
            font-size: 3rem;
            color: #007BFF;
        }

        .content p {
            font-size: 1.5rem;
            color: #555;
        }

        /* Carousel Section */
        .carousel {
            position: relative;
            max-width: 800px;
            margin: 20px auto;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .carousel img {
            width: 100%;
            display: none;
            transition: opacity 0.5s ease-in-out;
        }

        .carousel img.active {
            display: block;
            opacity: 1;
        }

        .carousel .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 123, 255, 0.8);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 1.5rem;
            z-index: 10;
        }

        .carousel .arrow.left {
            left: 10px;
        }

        .carousel .arrow.right {
            right: 10px;
        }

        /* Team Section */
        .team-section {
            text-align: center;
            margin: 40px 20px;
        }

        .team-section img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 10px;
            border: 3px solid #007BFF;
            transition: transform 0.3s ease;
        }

        .team-section img:hover {
            transform: scale(1.1);
        }

        .team-section h3 {
            color: #007BFF;
        }

        /* Footer Section */
        .footer {
            background: #007BFF;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>Quiz Management System</h1>
        <a href="loginstaffstu.php" class="login-button">Login</a>
    </div>

    <!-- Content -->
    <div class="content">
        <h2>Welcome to Our Quiz Management System</h2>
        <p>Your Gateway to Seamless Quiz Success!</p>

        <!-- Carousel Section -->
        <div class="carousel">
            <button class="arrow left" onclick="prevSlide()">&#8592;</button>
            <img src="index ss/img 15.png" class="active" alt="Slide 1">
            <img src="index ss/img 1.png" alt="Slide 2">
            <img src="index ss/img 2.png" alt="Slide 3">
            <img src="index ss/img 3.png" alt="Slide 4">
            <img src="index ss/img 4.png" alt="Slide 5">
            <img src="index ss/img 6.png" alt="Slide 6">
            <img src="index ss/img 7.png" alt="Slide 7">
            <img src="index ss/img 8.png" alt="Slide 8">
            <img src="index ss/img 9.png" alt="Slide 9">
            <img src="index ss/img 10.png" alt="Slide 10">
            <button class="arrow right" onclick="nextSlide()">&#8594;</button>
        </div>

        <h3>About Our Project</h3>
    <p style="
    border: 2px solid #007BFF; /* Blue border */
    padding: 15px; /* Space inside the border */
    border-radius: 8px; /* Rounded corners */
    background-color: rgba(0, 123, 255, 0.1); /* Light bluish background */
    text-align: justify; /* Neat text alignment */">
    Making quiz management simple, intuitive, and efficient. A Quiz Management System is a systems application to create, edit, administer and evaluate quizzes in an efficient way. This concerns roles such as admins, staff/teachers, students; it has benefits such as user authentication, choice of quizzes, grading automation, and performance tracking. This system makes learning easier and saves time and is fair in its assessment because questions can be randomized and time can be kept track of. Championed across the education sector, organizations for e-learning, and recruitment drives for effectiveness, efficiency, scalability, and interactiveness.
    </p>

        <!-- Team Section -->
        <div class="team-section">
            <h3>Meet Our Team</h3>
            <div>
                <img src="index ss/img 12.png" alt="Anup">
                <img src="index ss/img 13.jpg" alt="Sujay">
            </div>
            <p>Anup and Sujay</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; 2024 Quiz Management System. Designed by Anup and Sujay.
    </div>

    <script>
        // JavaScript for Carousel Functionality
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel img');

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('active');
                if (i === index) slide.classList.add('active');
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        // Auto-slide functionality
        setInterval(() => {
            nextSlide();
        }, 5000); // Change slide every 5 seconds
    </script>
</body>
</html>
