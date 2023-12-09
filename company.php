<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Information Form</title>
</head>
<body>

    <h2>Company Information Form</h2>

    <form action="backend.php" method="post" enctype="multipart/form-data">
        <label for="company_name">Company Name:</label>
        <input type="text" id="company_name" name="company_name" required>

        <br>

        <label for="company_description">Company Description:</label>
        <textarea id="company_description" name="company_description" rows="4" required></textarea>

        <br>

        <label for="company_logo">Company Logo:</label>
        <input type="file" id="company_logo" name="company_logo" accept="image/*" required>

        <br>

        <button type="submit">Submit</button>
    </form>

</body>
</html>