<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <ul class="menu">
            <li><a href="register.php">Register Students</a></li>
            <li><a href="attendance.php">Mark Attendance</a></li>
                        <li><a href="show_attendance.php">Mark Attendance</a></li>

        </ul>

        <h2>Student Registration</h2>

        <?php
        include_once 'db_config.php';

        // Include database connection code here
        // ...

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $studentName = $_POST["student_name"];
            $phoneNumber = $_POST["phone_number"];

            // Validate and sanitize input
            $studentName = htmlspecialchars(trim($studentName));
            $phoneNumber = htmlspecialchars(trim($phoneNumber));

            // Insert student information into the database
            $insertStudent = $conn->prepare("INSERT INTO student_data (student_name, phone_number) VALUES (?, ?)");
            $insertStudent->bind_param("ss", $studentName, $phoneNumber);
            $insertStudent->execute();

            echo "<p style='color: green;'>Registration successful!</p>";

            // Close the prepared statement
            $insertStudent->close();
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="student_name">Student Name:</label>
            <input type="text" id="student_name" name="student_name" required>

            <label for="phone_number">Phone Number:</label>
            <input type="tel" id="phone_number" name="phone_number" required>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
