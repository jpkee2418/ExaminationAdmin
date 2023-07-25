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
    <title>Manage Lecturer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
        }

        .navbar a:hover {
            color: #d0955e;
        }

        .lecturer-list th,
        .lecturer-list td {
            text-align: center;
        }

        /* Center the "Manage Lecturer" heading */
        .center-heading {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <a href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Back</a>
            <a href="add_lecturer.php">Add Lecturer</a>
        </div>
        <div>
            <h4 class="center-heading">Manage Lecturer</h4>
        </div>
    </div>

    <div class="container">
        <table class="table table-bordered lecturer-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Lecturer Name</th>
                    <th>Lecturer Number</th>
                    <th>Year of Study</th>
                    <th>Faculty</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP code to fetch lecturer details from the database and display them in rows -->
                <?php
                // Perform database query to get lecturer information
                $query = "SELECT * FROM lecturer";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $lecturerId = $row['id'];
                    $lecturerName = $row['lectName'];
                    $lecturerNumber = $row['lectNum'];
                    $yearOfStudy = $row['Year'];
                    $faculty = $row['Faculty'];
                ?>
                    <tr>
                        <td><?php echo $lecturerId; ?></td>
                        <td><?php echo $lecturerName; ?></td>
                        <td><?php echo $lecturerNumber; ?></td>
                        <td><?php echo $yearOfStudy; ?></td>
                        <td><?php echo $faculty; ?></td>
                        <td>
                            <a href="edit_lecturer.php?id=<?php echo $lecturerId; ?>" class="btn btn-info btn-sm">Edit</a>
                            <a href="view_lecturer.php?id=<?php echo $lecturerId; ?>" class="btn btn-success btn-sm">View</a>
                            <a href="deleteLecturer.php?id=<?php echo $lecturerId; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this lecturer?')">Delete</a>
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
