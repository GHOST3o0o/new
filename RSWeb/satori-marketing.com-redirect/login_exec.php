<?php
	//echo 'Login_exec line 10 <br />';
	
    //Start session
    session_start();
     
    //Include database connection details
    require_once('connection.php');
	
    //$rswho = mysqli_query($link,"SELECT fname, lname FROM rs_Admin WHERE mem_id = '3'"); 
	//$arrwho = mysqli_fetch_array($rswho); 		
	//$vwhof = $arrwho['fname'];
	//$vwhol = $arrwho['lname'];
	//echo "$vwhof $vwhol";
	 
    //Array to store validation errors
    $errmsg_arr = array();
     
    //Validation error flag
    $errflag = false;
     
    //Function to sanitize values received from the form. Prevents SQL injection
 
	function clean($str) {
    $str = @trim($str);
    if(get_magic_quotes_gpc()) {
    $str = stripslashes($str);
    }
    return mysqli_real_escape_string($str);
    }
 
 	//echo ' Third something <br />';
	 
    //Sanitize the POST values
    $username = $_POST['username'];
    $password = $_POST['password'];
	//$username = clean($_POST['username']);
    //$password = clean($_POST['password']);
    //echo $_POST['username'];
	//echo "<br />";
	//echo "$username <br />";
	  
    //Input Validations
    if($username == '') {
    $errmsg_arr[] = 'Username missing';
    $errflag = true;
    }
    if($password == '') {
    $errmsg_arr[] = 'Password missing';
    $errflag = true;
    }
    //echo $errflag ;
	 
    //If there are input validations, redirect back to the login form
    if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    //session_write_close();
    header('location: AdminSedna.php');
    exit();
    }
     
    //Create query
    $qry="SELECT * FROM rs_Admin WHERE username='$username' AND password='$password'";
    $result=mysqli_query($link, $qry);
     
    //Check whether the query was successful or not
    if($result) {
    if(mysqli_num_rows($result) > 0) {
    //Login Successful
    session_regenerate_id();
    $member = mysqli_fetch_assoc($result);
    $_SESSION['SESS_MEMBER_ID'] = $member['mem_id'];
    $_SESSION['SESS_FIRST_NAME'] = $member['username'];
    $_SESSION['SESS_LAST_NAME'] = $member['password'];
    session_write_close();
    header("location: AdminSednaMenu.php");
    exit();
    }else {
    //Login failed
    $errmsg_arr[] = 'user name and password not found';
    $errflag = true;
    if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: AdminSedna.php");
    exit();
    }
    }
    }else {
    die("Query failed");
    }
    ?>
