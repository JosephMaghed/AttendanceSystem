<?php

            include_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Retrieve data from the form
   $id = $_POST["ID"];
    $new_name = $_POST["student_name"];
    $new_phone = $_POST["phone"];

    // Update data in the database
    $sql = "UPDATE student_data SET student_name='$new_name', phone_number='$new_phone' WHERE student_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Form not submitted!";
}
?>
