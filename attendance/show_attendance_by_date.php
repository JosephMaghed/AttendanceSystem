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
        
            <?php
            include_once 'db_config.php';


                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $dob = $_POST["date"];
                                    echo"<label>Show attendance by date: $dob</label>";

                     $sql = "SELECT  student_name,attendance_status  FROM student_data
inner join attendance_tracking on attendance_tracking.student_id=student_data.student_id where attendance_date='$dob'";
    $result = $conn->query($sql);

             
            // Check if there are records
            if ($result->num_rows > 0) {

                echo"<table>
                <tr>

    <th>Name</th>
    <th>attendance</th>
  </tr>";
                // Loop through the records and generate radio buttons
                while ($row = $result->fetch_assoc()) {
                    $attendance = $row["attendance_status"];
                    $studentName = $row["student_name"];
  
                    echo "  <tr>

                              <td>$studentName</td>";
                              echo "<td>$attendance</td>";

                    echo "</tr>
";
            }}
            else {
                echo "<label style='color:red;'>No attendance found.</label>";
            }}

          

            // Close the database connection
            $conn->close();
            ?>
</tabel>
 <form method="POST" action="show_attendance_by_date.php">
    <input type="date" id="dob" name="date">

    <button type="submit" value="Submit">Submit date</button>
  </form>
    </div>
</body>
</html>