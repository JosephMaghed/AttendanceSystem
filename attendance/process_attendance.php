<?php
include_once 'db_config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection code here
    // ...

    // Loop through the posted data and update attendance in the database
    foreach ($_POST["attendance"] as $studentId => $value) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO attendance_tracking (student_id, attendance_status, attendance_date) VALUES (?, ?, NOW())");
        $stmt->bind_param("is", $studentId, $value);
        $stmt->execute();
        $stmt->close();
    }

    // Redirect to the attendance page
    header("Location: attendance.php");
    exit();
} else {
    // If the form is not submitted, redirect to the attendance page
    header("Location: attendance.php");
    exit();
}
?>
