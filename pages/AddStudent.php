<?php
// Include the database connection file
include "../db_conn.php";

// Initialize variables
$regNo = $studentName = $yearOfStudy = $faculty = $email = $contactNo = "";
$successMessage = $errorMessage = "";

if (isset($_POST['submit'])) {
    // Get form data
    $regNo = $_POST['regNo'];
    $studentName = $_POST['studentName'];
    $yearOfStudy = $_POST['yearOfStudy'];
    $faculty = $_POST['faculty'];
    $email = $_POST['email'];
    $contactNo = $_POST['contactNo'];

    // Perform database query to insert student information
    $query = "INSERT INTO students (RegNo, StudentName, Year, Faculty, Email, contactno) VALUES ('$regNo', '$studentName', '$yearOfStudy', '$faculty', '$email', '$contactNo')";

    if (mysqli_query($conn, $query)) {
        // Insertion successful
        $successMessage = "Student information has been saved successfully.";
    } else {
        // Insertion failed
        $errorMessage = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .back-icon {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Arrow icon to go back to the previous page -->
        <div class="back-icon">
            <a href="javascript:history.back()">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>

        <h2>Add Student</h2>
        <?php if (!empty($successMessage)) { ?>
            <div class="alert alert-success"><?php echo $successMessage; ?></div>
        <?php } ?>
        <?php if (!empty($errorMessage)) { ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php } ?>
        <form method="post">
            <div class="form-group">
                <label for="regNo">Registration Number:</label>
                <input type="text" class="form-control" id="regNo" name="regNo" required>
            </div>
            <div class="form-group">
                <label for="studentName">Student Name:</label>
                <input type="text" class="form-control" id="studentName" name="studentName" required>
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
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="contactNo">Contact No:</label>
                <input type="text" class="form-control" id="contactNo" name="contactNo" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Add other scripts and footer if needed -->

</body>
</html>
