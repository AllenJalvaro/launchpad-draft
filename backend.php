<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "sidebar.php";?>
<div class="content">
<?php
    require "config.php";
    
    $company_name = $_POST['company_name'];
    $company_description = $_POST['company_description'];


    if (isset($_FILES["company_logo"])) {
        $file = $_FILES["company_logo"];
        $file_name = $file["name"];
        $file_tmp_name = $file["tmp_name"];
        $file_error = $file["error"];
        $email = $_SESSION["email"];

        $select = "SELECT * FROM student_registration where Student_email='$email'";
        $result = mysqli_query($conn, $select);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $student_ID = $row['Student_ID'];
            }
        }
        
        if ($file_error === 0) {
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $allowed_extensions = array("jpg", "jpeg", "png");
            
            if (in_array($file_ext, $allowed_extensions)) {
                $picture_path = "images/".uniqid() . "." . $file_ext;
            
                move_uploaded_file($file_tmp_name, $picture_path);
                
                $sql = "INSERT INTO company_registration (Student_ID, Company_name, Company_description, Company_logo, Registration_date) VALUES ('$student_ID', '$company_name', '$company_description', '$picture_path', NOW())";
                
                if (mysqli_query($conn, $sql)) {
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Only JPEG, JPG, and PNG files are allowed.";
            }
             $display = "SELECT * FROM company_registration INNER JOIN student_registration ON company_registration.Student_ID=student_registration.Student_ID WHERE company_registration.Student_ID = '$student_ID'";
        $resultDisplay = mysqli_query($conn, $display);
        if ($resultDisplay) {
            if (mysqli_num_rows($resultDisplay) > 0) {
                $row = mysqli_fetch_assoc($resultDisplay);
                echo "Company name: " . $row['Company_name'] . "<br>";
                echo "Company description: " . $row['Company_description'] . "<br>";
                echo "<td><img src='/launchpad/login/student-dashboard/".$row["Company_logo"]."' alt='Candidate Picture' width='100'></td>";
            }
        }
        } else {
            echo "Error uploading the file.";
        }
       
    } else {
        echo "No file uploaded.";
    }


    
?>
</div>
</body>
</html>


