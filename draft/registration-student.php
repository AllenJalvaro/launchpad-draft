<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    
</head>
<body>
    <h2>Student Registration</h2>
    <form method="post" action="">
        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" required >
        
        <label for="student_email">Institutional Email:</label>
        <input type="email" id="student_email" name="student_email" required >
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required >
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        
        <label for="student_fname">First Name:</label>
        <input type="text" id="student_fname" name="student_fname" required>
        
        <label for="student_mname">Middle Name:</label>
        <input type="text" id="student_mname" name="student_mname" required>
        
        <label for="student_lname">Last Name:</label>
        <input type="text" id="student_lname" name="student_lname" required>
        
        <label for="course">Course:</label>
        <select id="course" name="course" required>
            <option value="BSIT">BSIT</option>
            <option value="BSArchi">BSArchi</option>
            <option value="BSCompEngineering">BSCompEngineering</option>
            <option value="BSMath">BSMath</option>
            <option value="BSEduc">BSEduc</option>
        </select>
        
        <label for="year">Year:</label>
        <select id="year" name="year" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        
        <label for="block">Block:</label>
        <select id="block" name="block" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>

        <label for="contactno">Contact No:</label>
        <input type="tel" id="contactno" name="contactno" required pattern="^09\d{9}$">
        
        <button type="submit">Register</button>
    </form>
</body>
</html>
