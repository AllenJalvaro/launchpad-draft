<?php
require 'config.php';
// Function to authenticate user
function authenticateUser($email, $password, $conn) {
    // Query to check if the user is a student
    $queryStudent = "SELECT student_ID, student_email, student_password FROM student_registration WHERE student_email = ? AND student_password = ? LIMIT 1";

    // Query to check if the user is a mentor
    $queryMentor = "SELECT instructor_id, instructor_email, instructor_password FROM instructor_registration WHERE instructor_email = ? AND instructor_password = ? LIMIT 1";

    // Prepare and execute the queries for students and mentors
    $stmtStudent = $conn->prepare($queryStudent);
    $stmtStudent->bind_param("ss", $email, $password);
    $stmtStudent->execute();
    $stmtStudent->store_result();

    $stmtMentor = $conn->prepare($queryMentor);
    $stmtMentor->bind_param("ss", $email, $password);
    $stmtMentor->execute();
    $stmtMentor->store_result();

    // Fetch the user from the appropriate table
    $userStudent = [];
    $userMentor = [];

    if ($stmtStudent->num_rows > 0) {
        $stmtStudent->bind_result($userStudent['ID'], $userStudent['email'], $userStudent['password']);
        $stmtStudent->fetch();
    }

    if ($stmtMentor->num_rows > 0) {
        $stmtMentor->bind_result($userMentor['ID'], $userMentor['email'], $userMentor['password']);
        $stmtMentor->fetch();
    }

    if ($userStudent) {
        // User is a student
        return ['role' => 'student', 'user' => $userStudent];
    } elseif ($userMentor) {
        // User is a mentor
        return ['role' => 'mentor', 'user' => $userMentor];
    } else {
        // User not found
        return false;
    }
}

// Usage example
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userData = authenticateUser($email, $password, $conn);

    if ($userData) {
        // Successful login
        $role = $userData['role'];
        $user = $userData['user'];

        // Redirect based on the user's role
        if ($role === 'student') {
            header('Location: student_dashboard.php');
            exit;
        } elseif ($role === 'mentor') {
            header('Location: mentor_dashboard.php');
            exit;
        } else {
            // For roles other than student and mentor, handle accordingly
            echo "Role not supported yet.";
            // or redirect to a generic dashboard
        }
    } else {
        // Invalid login
        echo "Invalid email or password";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="images\logo.svg">
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="login.php">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>
    <p><a href="registration-student.php">REGISTER AS STUDENT</a></p>
    <p><a href="registration-mentor.php">REGISTER AS MENTOR</a></p>
</body>
</html>
