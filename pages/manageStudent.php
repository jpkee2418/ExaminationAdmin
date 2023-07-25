<?php
// Add error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include "../db_conn.php";

// Check if the database connection is successful
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Student</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        body {
            padding: 20px;
        }

        .student-list {
            margin-top: 20px;
        }

        .student-list th,
        .student-list td {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>Manage Student</h2>
    
    <a href="javascript:history.back()" class="btn btn-secondary mb-2"><i class="fas fa-arrow-left"></i> Back</a>
    <a href="AddStudent.php" class="btn btn-primary mb-2">Add Student</a>
        <table class="table table-bordered student-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Registration Number</th>
                    <th>Year of Study</th>
                    <th>Faculty</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP code to fetch student details from the database and display them in rows -->
                <?php
                // Perform database query to get student information
                $query = "SELECT * FROM students";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $studentId = $row['id'];
                    $studentName = $row['StudentName'];
                    $regNo = $row['RegNo'];
                    $yearOfStudy = $row['Year'];
                    $faculty = $row['Faculty'];
                ?>
                    <tr>
                        <td><?php echo $studentId; ?></td>
                        <td><?php echo $studentName; ?></td>
                        <td><?php echo $regNo; ?></td>
                        <td><?php echo $yearOfStudy; ?></td>
                        <td><?php echo $faculty; ?></td>
                        <td>
                            <a href="editStudent.php?id=<?php echo $studentId; ?>" class="btn btn-info btn-sm">Edit</a>
                            <a href="viewStudent.php?id=<?php echo $studentId; ?>" class="btn btn-success btn-sm">View</a>
                            <a href="deleteStudent.php?id=<?php echo $studentId; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
