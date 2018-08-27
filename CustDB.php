<?php

$U_BName = $_POST['uBName'];
$U_CName = $_POST['uCName'];
$U_Address = $_POST['uAddress'];
$U_Email = $_POST['uEmail'];
$U_Phone = $_POST['uPhone'];
$U_AdDuration = $_POST ['uAdDuration']

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO users (U_BName, U_CName, U_Address, U_Email, U_Phone)
    VALUES ('$U_BName', '$U_CName', '$U_Address', '$U_Email', $U_Phone)";
    // use exec() because no results are returned
    $conn->exec($sql);
	
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

	try {
     $conn2 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $stmt = $conn2->prepare("SELECT U_ID FROM users WHERE U_BName='$U_BName'"); 
     $stmt->execute();
     $result = $stmt; 
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}?>
	<html>
	<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="RSTest.css" />
<link rel="icon" href="images/bty.ico"/>
<style>
input.feedback{
	width:50%;
	height:25px;
}
</style>
</head>
<body>
	<header align="middle">
		<a href="index.php" rel="prefetch"><img src="images/bookToYou.png" height="95%"></a>
	</header>
	
	<nav align="middle">
		<a class="navbtn" href="#"></a>
		<a class="navbtn" href="#"></a>
		<a class="navbtn" href="#"></a>
		<a class="navbtn" href="#"></a>
		<a class="navbtn" href="#"></a>
		<a class="navbtn" href="#"></a>
	</nav>
	
		<br><br>

<br><br>



</body>

</html>