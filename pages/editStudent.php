<?php
// Include the database connection file
include "../db_conn.php"; 

// Initialize variables
$id = $studentName = $regNo = $yearOfStudy = $faculty = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Get the student ID from the query string
    $id = $_GET['id'];

    // Perform database query to get student information
    $query = "SELECT * FROM students WHERE id = '$id'";
    
    // Check if the connection is successful
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $studentName = $row['StudentName'];
        $regNo = $row['RegNo'];
        $yearOfStudy = $row['Year'];
        $faculty = $row['Faculty'];
    } else {
        // Student not found
        $errorMessage = "Student not found.";
    }
}

// Handle form submission for updating student information
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $studentName = $_POST['studentName'];
    $regNo = $_POST['regNo'];
    $yearOfStudy = $_POST['yearOfStudy'];
    $faculty = $_POST['faculty'];

    // Perform database query to update student information
    $query = "UPDATE students SET StudentName = '$studentName', RegNo = '$regNo', Year = '$yearOfStudy', Faculty = '$faculty' WHERE id = '$id'";
    
    // Check if the connection is successful
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    if (mysqli_query($conn, $query)) {
        // Update successful
        header("Location: manageStudent.php");
        exit();
    } else {
        // Update failed
        $errorMessage = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <!-- Add necessary CSS and JavaScript if needed -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Student</h2>
        <?php if (!empty($errorMessage)) { ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php } ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="studentName" class="form-label">Student Name:</label>
                <input type="text" class="form-control" id="studentName" name="studentName" value="<?php echo $studentName; ?>" required>
            </div>
            <div class="mb-3">
                <label for="regNo" class="form-label">Registration Number:</label>
                <input type="text" class="form-control" id="regNo" name="regNo" value="<?php echo $regNo; ?>" required>
            </div>
            <div class="mb-3">
                <label for="yearOfStudy" class="form-label">Year of Study:</label>
                <input type="text" class="form-control" id="yearOfStudy" name="yearOfStudy" value="<?php echo $yearOfStudy; ?>" required>
            </div>
            <div class="mb-3">
                <label for="faculty" class="form-label">Faculty:</label>
                <input type="text" class="form-control" id="faculty" name="faculty" value="<?php echo $faculty; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>


