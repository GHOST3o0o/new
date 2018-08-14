<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>
	<meta charset="utf-8">
	<title>My Local Area Business Directory </title>
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="text.css">
    <link rel="stylesheet" type="text/css" href="960_24_col.css">
    <link rel="stylesheet" type="text/css" href="StyleD.css">
</head>

<body>
<div class="container_24">

	<div class="grid_24" >
        <p> </p>
    </div>
    <div class="clear" ></div>	
	<div class="grid_2" >
        <p> </p>
    </div>
    <div class="grid_22">
    	<h1>Welcome My Local Area Business Directory</h1>
    </div>
    <div class="clear" ></div>
    <div class="grid_2" >
        <p> </p>
    </div>
    <div class="grid_16">
        <h4>Select the type of service you need.</h4>
    </div>

    <div class="clear" ></div>	
 <?php
 	// Get message if there is one
	$msg = " ";
	$msg = $_GET["msg"];
	$ip_address = $_SERVER["REMOTE_ADDR"];		// user's IP address
  
	//Include database connection details
	require_once('connection.php');

//$query = 'SELECT zipcode, ID_zipcode, zipDescrip FROM rs_zipcodes ORDER BY zipcode';
//if ($stmt = mysqli_prepare($link, $query)) {
//	mysqli_stmt_execute($stmt);
//}

//$rszipcodes = mysqli_query($link,"SELECT zipcode, ID_zipcode, zipDescrip FROM rs_zipcodes ORDER BY zipcode");

$rsPutSite = mysqli_query($link,"INSERT INTO rs_Activity (What, rs_Time, IP) VALUES ('Site', NOW(), '$ip_address')");
//$put = mysqli_query($link, "Call p_PutSite($ip_address)");

     ?>
	<div class="grid_2" >
    	<p> </p>
    </div>
    <div class="grid_13">
     	<h3><?= $msg ?></h3>
    </div>
    <div class="clear" ></div>
	<div class="grid_2" >
    	<p> </p>
    </div>
    <div class="grid_5">       
  		<a href="Select.php?MCat=1" target="_self" ><img width="190px" src="<?=$imgpath?>/Segments/1Auto.jpg" /></a>
    </div>
    <div class="grid_2" >
    	<p> </p>
    </div>
    <div class="grid_5">       
  		<a href="Select.php?MCat=2" target="_self" ><img width="190px" src="<?=$imgpath?>/Segments/2HealthBeauty.jpg" /></a>
    </div>
    <div class="grid_2" >
    	<p> </p>
    </div>
    <div class="grid_5">       
  		<a href="Select.php?MCat=3" target="_self" ><img width="190px" src="<?=$imgpath?>/Segments/3HomeGarden.jpg" /></a>
    </div>
    <div class="clear" ></div>
    
	<div class="grid_24" >
    	<p><br /><br /> </p>
    </div>
    <div class="clear" ></div>    
	<div class="grid_2" >
    	<p> </p>
    </div>
    <div class="grid_5">       
  		<a href="Select.php?Cat=4" target="_self" ><img width="190px" src="<?=$imgpath?>/Segments/4Pets.jpg" /></a>
    </div>
    <div class="grid_2" >
    	<p> </p>
    </div>
    <div class="grid_5">       
  		<!-- <img width="190px" src="" />  -->
    </div>
    <div class="grid_2" >
    	<p> </p>
    </div>
    <div class="grid_5">       
  		<!--  <img width="190px" src="" /> -->
    </div>
    <div class="clear" ></div>
    
	<div class="grid_24" >
    	<p><br /><br /> </p>
    </div>
    
	<div class="clear" ></div>
    
    <div class="clear" ></div>	
 	 <div class="grid_16" >
        <p> </p>
    </div>
   <div class="clear" ></div>

   <?php include_once("footer.php") ?>


  		
 </div> <!-- end .container_24  -->
  	
</body>
</html>