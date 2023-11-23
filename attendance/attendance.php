<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Attendance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <ul class="menu">
            <li><a href="register.php">Register Students</a></li>
            <li><a href="attendance.php">Mark Attendance</a></li>
                        <li><a href="show_attendance.php">View Attendance</a></li>

        </ul>

        <h2>Mark Attendance</h2>

        <form action="process_attendance.php" method="post">
            <?php
            include_once 'db_config.php';


            // Fetch student names from the database
            $result = $conn->query("SELECT student_id, student_name FROM student_data");

            // Check if there are records
            if ($result->num_rows > 0) {
                // Loop through the records and generate radio buttons
                while ($row = $result->fetch_assoc()) {
                    $studentId = $row["student_id"];
                    $studentName = $row["student_name"];

                    echo "<label>$studentName</label>";
                    echo "<input type='radio' name='attendance[$studentId]' value='Present'> Present";
                    echo "<input type='radio' name='attendance[$studentId]' value='Absent'> Absent";
                    echo "<br>";
                }
            } else {
                echo "No students found.";
            }

            // Close the database connection
            $conn->close();
            ?>

            <button type="submit">Submit Attendance</button>
        </form>
    </div>
</body>
</html>
