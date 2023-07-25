<?php 
//login template
   session_start();
   if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html>
<head>
    <title>multi-user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        /* Custom styles for the webpage */
        body {
            background-color:  #e0dbdf;/* Background color */
        }
        .form-bg {
            background-color: #f4f6f8; /* Form background color */
        }
        .navbar {
            background-color: #4b0150; /* Navbar background color */
        }
        .navbar .nav-link {
            color: white; /* Text color in the navbar */
            text-align: center; /* Center align the link in the navbar */
        }
        .navbar .nav-link:hover {
            color: yellow; /* Hover color for the link */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand mx-auto" href="#">LOGIN</a>
    </nav>
    <div class="container d-flex justify-content-center align-items-center"
        style="min-height: 100vh; background-color: #e0dbdf;">
        <!-- Rest of your login form code -->
        <form class="border shadow p-3 rounded form-bg"
            action="check-login.php" 
            method="post" 
            style="width: 450px;">
            <h1 class="text-center p-3">LOGIN</h1>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?=$_GET['error']?>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label for="username" 
                    class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="UOV/___">
            </div>
            <div class="mb-3">
                <label for="password" 
                    class="form-label">Password</label>
                <input type="password" 
                    name="password" 
                    class="form-control" 
                    id="password">
            </div>
            <div class="mb-1">
                <label class="form-label">Role:</label>
            </div>
            <select class="form-select mb-3"
                    name="role" 
                    aria-label="Default select example">
                <option selected value="Student">Student</option>
                <option value="DR">DR</option>
                <option value="Dean">Dean</option>
                <option value="HOD">HOD</option>
                <option value="Lecturer">Lecturer</option>
            </select>
            <button type="submit" 
                    class="btn btn-primary d-block mx-auto">LOGIN</button>
        </form>
    </div>
</body>
</html>
<?php }else{
	header("Location: redirect.php");
} ?>
