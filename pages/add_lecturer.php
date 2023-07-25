<?php
// Include the database connection file
include "../db_conn.php";

// Initialize variables
$lectNum = $lectName = $yearOfStudy = $faculty = $degree = $email = $contactNo = "";
$successMessage = $errorMessage = "";

if (isset($_POST['submit'])) {
    // Get form data
    $lectNum = $_POST['lectNum'];
    $lectName = $_POST['lectName'];
    $yearOfStudy = $_POST['yearOfStudy'];
    $faculty = $_POST['faculty'];
    $degree = $_POST['degree'];
    $email = $_POST['email'];
    $contactNo = $_POST['contactNo'];

    // Perform database query to insert lecturer information
    $query = "INSERT INTO lecturer (lectNum, lectName, Year, Faculty, degree, Email, contactno) VALUES ('$lectNum', '$lectName', '$yearOfStudy', '$faculty', '$degree', '$email', '$contactNo')";

    if (mysqli_query($conn, $query)) {
        // Insertion successful
        $successMessage = "Lecturer information has been saved successfully.";
    } else {
        // Insertion failed
        $errorMessage = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Lecturer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            padding: 20px;
            background-color: #e0dbdf;
        }

        .navbar {
            background-color: #381030;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: center; /* Center the content horizontally */
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
        }

        .navbar a:hover {
            color: #d0955e;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto; /* Center the container horizontally */
            background-color: white;
            padding: 20px;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .back-icon {
            margin-bottom: 10px;
        }

        .form-container h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Back to Previous Page</a>
       
    </div>

    <div class="container">
        <div class="form-container">
            <h2>Add Lecturer</h2>
        <?php if (!empty($successMessage)) { ?>
            <div class="alert alert-success"><?php echo $successMessage; ?></div>
        <?php } ?>
        <?php if (!empty($errorMessage)) { ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php } ?>
        <form method="post">
            <div class="form-group">
                <label for="lectNum">Lecturer Number:</label>
                <input type="text" class="form-control" id="lectNum" name="lectNum" required>
            </div>
            <div class="form-group">
                <label for="lectName">Lecturer Name:</label>
                <input type="text" class="form-control" id="lectName" name="lectName" required>
            </div>
            <div class="form-group">
                <label for="yearOfStudy">Year of Study:</label>
                <input type="text" class="form-control" id="yearOfStudy" name="yearOfStudy" required placeholder="2018/2019">
            </div>
            <div class="form-group">
                <label for="faculty">Faculty:</label>
                <select class="form-control" id="faculty" name="faculty" required>
                    <option value="">Select Faculty</option>
                    <option value="Technological Studies">Technological Studies</option>
                    <option value="Applied Science">Applied Science</option>
                    <option value="Business Studies">Business Studies</option>
                </select>
            </div>
            <div class="form-group">
                <label for="degree">Degree:</label>
                <input type="text" class="form-control" id="degree" name="degree" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="contactNo">Contact No:</label>
                <input type="text" class="form-control" id="contactNo" name="contactNo" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
    </div>

    <!-- Add other scripts and footer if needed -->

</body>
</html>