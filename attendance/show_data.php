<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Attendance</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function confirmSubmission() {
            // Display a confirmation dialog
            var confirmed = confirm("Are you sure you want to continue?");

            // If the user clicks "OK," submit the form
            if (confirmed) {
                document.getElementById("myForm").submit();
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <ul class="menu">
            <li><a href="register.php">Register Students</a></li>
            <li><a href="attendance.php">Mark Attendance</a></li>
                        <li><a href="show_attendance.php">View Attendance</a></li>

        </ul>

        <h2>بيانات المخدومين</h2>
     
            <?php
            include_once 'db_config.php';


            // Fetch student names from the database
            $result = $conn->query("SELECT  student_name,phone_number,address,student_id from student_data");

            // Check if there are records
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    $phone = $row["phone_number"];
                    $studentName = $row["student_name"];
                    $Add=$row["address"];
                      $ID=$row["student_id"];
                                       echo '<form  method="POST" action="process_data.php">';

                    echo "<label>$studentName </label><label>$phone </label><label>$Add</label>
                              <input type='hidden' name='studentId' value='". htmlspecialchars($ID)."'>
                                <input type='hidden' name='student_name' value='". htmlspecialchars($studentName)."'>
                                <input type='hidden' name='phone' value='". htmlspecialchars($phone)."'>


                         <button type='submit' name='operation' value='Update'> Update</button>
                         <button type='submit' name='operation' value='DELETE'> DELETE</button>

                                                </from>";

                         echo '<form id="myForm" method="POST" action="process_data.php">';

                    
                          
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