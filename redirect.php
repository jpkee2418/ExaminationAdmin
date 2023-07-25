
<?php 
// this code is for redirecting to different pages if the credentials are correct.
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
         //DR
      	if ($_SESSION['role'] == 'DR'){
			header("Location: pages/DR.php");
      	 }
		 //HOD
		 else if ($_SESSION['role'] == 'HOD'){ 
			header("Location: pages/HOD.php");
      	} 
		//student
		  else if ($_SESSION['role'] == 'Student'){ 
			header("Location: pages/Student.php");	
		}
		//Dean
		else if ($_SESSION['role'] == 'Dean'){ 
			header("Location: pages/Dean.php");
		}
		//LEcturer
		else if ($_SESSION['role'] == 'Lecturer'){ 
			header("Location: pages/Lecturer.php");
		}
 }
else{
	header("Location:index.php");
} ?>
