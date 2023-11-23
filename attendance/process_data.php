<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Load Confirmation</title>
    <script>
        // Display a confirmation message when the page loads
        window.onload = function() {
            alert("Welcome to this page! Click OK to continue.");
        };
    </script>
</head>
<?php
include_once 'db_config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection code here
    // ...
    $ID= $_POST["studentId"];
    $operation=$_POST['operation'];
        $student_name=$_POST['student_name'];
                $phone=$_POST['phone'];

    if($operation=="Update"){
        echo'<p>update</p>';
        echo '<form method="POST" action="update_data.php">

                 <input type="text" name="student_name" value="'. htmlspecialchars($student_name).'">
                   <input type="hidden" name="ID" value="'. htmlspecialchars($ID).'">
                      <input type="text" name="phone" value='. htmlspecialchars($phone).'>
 
<button type="submit" name="operation" value="Update"> Update</button>
                          </from>';
        
    }else if($operation=="DELETE"){

    echo'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Entry Confirmation</title>
    <script>
        // Display a confirmation message when the page loads
        window.onload = function() {
            var userConfirmed = confirm("Do you want to proceed to this page?");

            // If the user clicks "Cancel" (No), go back to the previous page
            if (!userConfirmed) {
                history.back();
            }
        };
    </script>
</head>
<body>
';
                echo'<p>DELETE</p>';
                   $sql = "DELETE FROM attendance_tracking WHERE student_id = $ID;";
                      $sql1= " DELETE FROM student_data WHERE student_id = $ID;";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    } if ($conn->query($sql1) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
}

    // Redirect to the attendance page
    //header("Location: show_data.php");
    exit();
} else {
    // If the form is not submitted, redirect to the attendance page
    //header("Location: show_data.php");
    exit();
}
?>
