<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"];

    // Define the pattern
    $pattern = "/^(19|20|21|22|23)-UR-\d{4}$/i";

    // Perform the validation using preg_match
    if (preg_match($pattern, $student_id)) {
        echo "Validation successful. Student ID is valid.";
    } else {
        echo "Validation failed. Student ID is not valid.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
<label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" required value="<?php echo  $student_id ?>">
      <input type="submit" value="submit">
    </form>   
</body>
</html>

  