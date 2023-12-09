<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor/Teacher Registration</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Mentor/Teacher Registration</h2>
    <form method="post" action="process_mentor_registration.php">
        <label for="instructor_email">Institutional Email:</label>
        <input type="email" id="instructor_email" name="instructor_email" required pattern=".+@psu\.edu\.ph$">
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        
        <label for="instructor_fname">First Name:</label>
        <input type="text" id="instructor_fname" name="instructor_fname" required>
        
        <label for="instructor_mname">Middle Name:</label>
        <input type="text" id="instructor_mname" name="instructor_mname" required>
        
        <label for="instructor_lname">Last Name:</label>
        <input type="text" id="instructor_lname" name="instructor_lname" required>
        
        <label for="department">Department:</label>
        <select id="department" name="department" required>
            <option value="IT dept">IT dept</option>
            <option value="Educ dept">Educ dept</option>
            <option value="Engineering dept">Engineering dept</option>
        </select>
        
        <label for="instructor_contactno">Contact No:</label>
        <input type="tel" id="instructor_contactno" name="instructor_contactno" required pattern="^09\d{9}$">
        
        <button type="submit">Register</button>
    </form>
</body>
</html>
