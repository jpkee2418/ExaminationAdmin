<?php
session_start();
include "../db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
    // Perform database query to get the total number of students
    $query = "SELECT COUNT(*) AS total_students FROM students"; // Assuming the table name is 'students'
    $result = mysqli_query($conn, $query);

    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);

    // Get the total number of students
    $totalStudents = $row['total_students'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        /* Custom styles for the webpage */
        body {
            background-color: #e0dbdf;
        }
        .navbar {
            background-color: #4b0150;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            color: white;
        }
        .navbar .logo {
            width: 742px; /* Set the desired width */
            height: 197px; /* Set the desired height */
            margin-right: 10px;
        }
        .navbar .nav-link {
            color: white;
            margin-left: 20px;
        }
        .navbar .nav-link:hover {
            color: #d0955e;
        }
        .navbar .dashboard-links {
            display: flex;
            align-items: center;
        }
        .navbar .dashboard-links a {
            color: white;
            margin-right: 20px;
        }
        .navbar .dashboard-links a:hover {
            color: #d0955e;
        }
        .container {
            margin-top: 20px;
        }
        /* Add responsive style for the card */
        .total-students-card {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0 bg-dark">
        <nav class="navbar">
            <a class="navbar-brand" href="#">DEPUTY REGISTRAR</a>
            <div class="dashboard-links">
                <a class="nav-link" href="home.php">Home</a>
                <?php if ($_SESSION['role'] == 'DR' || $_SESSION['role'] == 'Dean' || $_SESSION['role'] == 'HOD') { ?>
                    <a class="nav-link" href="AddStudent.php">Add Student</a>
                    <a class="nav-link" href="manageStudent.php">Manage Students</a>
                <?php } ?>
            </div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="nav-link">
                        Role: <?php echo $_SESSION['role'];?>
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container mt-4">
        <!-- Total Students Card -->
        <div class="total-students-card">
            <h4>Total Students</h4>
            <h2><?php echo $totalStudents; ?></h2>
        </div>
    </div>

</body>
</html>

<?php 
    } else {
        header("Location: ../index.php");
    } 
?>
