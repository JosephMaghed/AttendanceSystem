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

        <h2>Show Attendance</h2>
        <table>
                <tr>

    <th>Name</th>
    <th>attendance</th>
  </tr>
            <?php
            include_once 'db_config.php';


            // Fetch student names from the database
            $result = $conn->query("SELECT  student_name,COUNT(CASE WHEN attendance_status = 'Present' THEN 1 ELSE NULL END) AS attendance FROM student_data
inner join attendance_tracking on attendance_tracking.student_id=student_data.student_id group by student_data.student_name");

            // Check if there are records
            if ($result->num_rows > 0) {
                // Loop through the records and generate radio buttons
                while ($row = $result->fetch_assoc()) {
                    $attendance = $row["attendance"];
                    $studentName = $row["student_name"];
  
                    echo "  <tr>

                              <td>$studentName</td>";
                              echo "<td>$attendance</td>";

                    echo "</tr>
";
                }
            } else {
                echo "No students found.";
            }

           

            // Close the database connection
            $conn->close();
            ?>
</tabel>
 <form method="POST" action="show_attendance_by_date.php">
    <label for="dob">Show attendance by date:</label>
    <input type="date" id="dob" name="date">

    <button type="submit" value="Submit">Submit by date:</button>
  </form>
    </div>
</body>
</html>