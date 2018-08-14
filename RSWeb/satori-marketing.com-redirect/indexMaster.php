<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>
	<meta charset="utf-8">
	<title>DG Referral System </title>
	<link rel="stylesheet" type="text/css" href="StyleDisplay.css">
</head>

<body>
<div class="container">
	<!--
  <div class="header">
    <a href="#"><img src="" alt="Insert Logo Here" width="180" height="40" id="Insert_logo" style="background: #C6D580; display:block;" /></a>
  </div>
-->
  <div class="content">
    <h1>Welcome to your Local Area Referral Service</h1>
    

      <p>Select the Service Category then enter the Zip Code where the service will be needed.</p>
    	
 <?php
 	// Get message if there is one
	$msg = " ";
	$msg = $_GET["msg"];

  
	//Include database connection details
	require_once('connection.php');

//$query = 'SELECT zipcode, ID_zipcode, zipDescrip FROM rs_zipcodes ORDER BY zipcode';
//if ($stmt = mysqli_prepare($link, $query)) {
//	mysqli_stmt_execute($stmt);
//}

//$rszipcodes = mysqli_query($link,"SELECT zipcode, ID_zipcode, zipDescrip FROM rs_zipcodes ORDER BY zipcode");
//$rsCats = mysqli_query($link,"SELECT Category, ID_category, CatDescrip FROM rs_categories ORDER BY Category");
$rsCats = mysqli_query($link, "Call p_GetCats()")

/*
while($row = mysqli_fetch_array($rsCats))
  {
  echo $row['Category'] . " " . $row['ID_category'];
  echo "<br>";
  }

mysqli_close($link);
*/
     ?>
     	<Table width="70%" align="center">
        	<tr>
            	<td width="253">  				
				</td>
                <td width="400" >
                </td>
            </tr>
            <tr>
            	<td colspan="2">
     				<h3><?= $msg ?></h3>
                </td>
            </tr>
        	<tr>
            	
                <td ><h3 style align="left" ><font color="#FF0000" >Service Category</font></h3>
                </td>
                <td >
     				<h3 style align="left"><font color="#0000FF">Zip Code</font></h3>
				</td>
          </tr>
          	 <form Name="SelectZipCat" method="post" action="DispBCMaster.php"  >
          <tr>
          		<td valign="bottom">
             	  &nbsp;&nbsp;&nbsp;<select name="Category" >
                  <?php
                  while($row1 = mysqli_fetch_array($rsCats))
				  	{
						
					?>
                   <option value="<?= $row1['ID_category']; ?>"  > <?= $row1['Category']; ?> </option>
                   <?php
					}
                    ?>
  
                </select>
             </td>
          	<td>
                   &nbsp;&nbsp;&nbsp;<input type="text" name="GetZip" id="GetZip" size="5" maxlength="5" value="" />
             </td>
         </tr>
         <tr>
         	<td colspan="2">&nbsp;
         	</td>
        </tr>
               </tr>
         <tr>
         	<td colspan="2">&nbsp;
         	</td>
        </tr>
        <tr>
         	<td colspan="2">
            	&nbsp;&nbsp;&nbsp;<input type="submit" name="GetReferral" value="Display Service Providers"  />
         	</td>
        </tr>
    </form>
    </table>
 
  	<!-- end .content  --></div>	
        <div class="footer">
        	<address>
          		&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:info@satori-marketing.com" >Contact your Local Area Referral Service </a>
        	</address>
        </div>
        <div class="footer2">
        	<span style="float:left" > This website designed and maintained by <a href="mailto:info@satori-marketing.com" >Satori Marketing, Inc. </a></span> <span style="float:right" >Satori Marketing, Inc. &copy;&nbsp;&nbsp; copyright 2013 All rights reserved. </span>
      <!-- end .footer  --></div>
  
  <!-- end .container  --></div>
  	
</body>
</html>