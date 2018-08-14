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
    <div class="grid_" >
        <div class="breadcrumb" >&lt;&lt;<a href="indexTest.php" target="_self" >Home</a> </div>
        <br />
    </div>
    <div class="clear" ></div>	
    <div class="grid_2" >
        <p> </p>
    </div>
    <div class="grid_18">
        <h4>Select the Service Category then enter the Zip Code where the service will be needed.</h4>
    </div>
    <div class="clear" ></div>

 <?php
 	// Get message if there is one
	$msg = " ";
	$msg = $_GET["msg"];
	$vMcat = $_GET["MCat"];
	If ($vMcat == "") {
		$vMcat = $_GET["Mcat"];
	}
	$ip_address = $_SERVER["REMOTE_ADDR"];		// user's IP address
  
	//Include database connection details
	require_once('connection.php');

//$query = 'SELECT zipcode, ID_zipcode, zipDescrip FROM rs_zipcodes ORDER BY zipcode';
//if ($stmt = mysqli_prepare($link, $query)) {
//	mysqli_stmt_execute($stmt);
//}

//$rszipcodes = mysqli_query($link,"SELECT zipcode, ID_zipcode, zipDescrip FROM rs_zipcodes ORDER BY zipcode");

$rsPutSite = mysqli_query($link,"INSERT INTO rs_Activity (What, rs_Time, ID, IP) VALUES ('Select', NOW(), '$cat' '$ip_address')");
//$put = mysqli_query($link, "Call p_PutSite($ip_address)");

switch ($vMcat) {
    case "1":
        $catwhere = "LEFT(Category, 7) = 'Auto - '";
        break;
    case "2":
        $catwhere = "LEFT(Category, 18) = 'Health & Beauty - '";
        break;
    case "3":
        $catwhere = "LEFT(Category, 16) = 'Home & Garden - '";
        break;
	case "4":
        $catwhere = "LEFT(Category, 11) = 'Pet Care - '";
        break;
    default:
        $msg = $msg."<h3>A Service Category was not selected.</h3>";
}

$rsCats = mysqli_query($link,"SELECT Category, ID_category, CatDescrip FROM rs_categories WHERE ".$catwhere." ORDER BY Category");
//$rsCats = mysqli_query($link, "Call p_GetCats()");

/*
while($row = mysqli_fetch_array($rsCats))
  {
  echo $row['Category'] . " " . $row['ID_category'];
  echo "<br>";
  }

mysqli_close($link);
*/
     ?>
	<div class="grid_2" >
    	<p> </p>
    </div>
    <div class="grid_20">
     	<h3><?= $msg ?></h3>
    </div>
    <div class="clear" ></div>
	<div class="grid_2" >
    	<p> </p>
    </div>
    <div class="grid_8">       
  		<h2><font color="#FF0000" >Service Category</font></h2>
    </div>
	<div class="grid_2" >
    	<p> </p>
    </div>    
    <div class="grid_8">         
     	<h2><font color="#0000FF">Zip Code</font></h2>
    </div>
	<div class="clear" ></div>
    
	<div class="grid_2" >
    	<p> </p>
    </div>
    <div class="grid_8">
    	 <form Name="SelectZipCat" method="post" action="DispBC1.php"  >  
         <input type="hidden" id="Mcat" name="MCat" value="<?= $vMcat ?>" />     
  		 <select name="Category" >
                  <?php
                  while($row1 = mysqli_fetch_array($rsCats))
				  	{
						
					?>
           <option value="<?= $row1['ID_category']; ?>"  > <?= $row1['Category']; ?> </option>
                   <?php
					}
                    ?>
  
           </select>
    </div>
	<div class="grid_2" >
    	<p> </p>
    </div>    
    <div class="grid_8">         
     	<input type="text" name="GetZip" id="GetZip" size="5" maxlength="5" value="" />
    </div>
	<div class="clear" ></div> 
    <div class="grid_24" >
        <p> </p>
    </div>
   <div class="clear" ></div>   
    <div class="grid_2" >
    	<p> </p>
    </div>
    <div class="grid_13">
    	<?php
        //echo "Major Category:  ".$vMcat." <br />"
		?>
    	<input type="submit" name="GetReferral" value="Display Service Providers"  />
        </form>
    </div>
    <div class="clear" ></div>	
 	 <div class="grid_16" >
        <p> </p>
    </div>
   <div class="clear" ></div>

   <?php include_once("footer.php") ?>


  		
 </div> <!-- end .container_24 -->
  	
</body>
</html>