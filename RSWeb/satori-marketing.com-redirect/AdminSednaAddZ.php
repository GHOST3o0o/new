<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <?php
	require_once('auth.php');
	$msg = $_GET["msg"];
	?>
<html>

<head>
	<meta charset="utf-8">
	<title>DG Referral System Administration Programs </title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>

<body>

<div class="container">
  <div class="header">
    <a href="#"><img src="" alt="Insert Logo Here" width="180" height="40" id="Insert_logo" style="background: #C6D580; display:block;" /></a>
  </div>

  <div class="content">
    <h1>Coeur d'Alene Area Referral System Administration Program</h1>    
    
     <h2>Add a Zipcodes to the system</h2>
      <form action="AdminSednaAddPostz.php" name="AddZip" method="POST" >
     <table Table width="90%" align="center">
     	<?php
			If(strlen($msg) > 5) {
				// display error message from AdminSednaAddPostz
				?>
     				<tr>
        				<td colspan="2" ><h3><?= $msg ?></h3> </td>
        			</tr>
     			<?php
					}
				?>
    	<tr>
        	<td style="width:20%" >Zipcode</td> <td style="width:80%">Description</td>
        </tr>
        <tr>
        	<td><input type="text" size="6" maxlength="5" name="NewZip1" value="" > </td>
            <td><input type="text" size="100" maxlength="200" name="NewDesc1" value="" > </td> 
        </tr>
        </tr>
        <tr>
        	<td><input type="text" size="6" maxlength="5" name="NewZip2" value="" > </td>
            <td><input type="text" size="100" maxlength="200" name="NewDesc2" value="" > </td> 
        </tr>
        <tr>
        	<td><input type="text" size="6" maxlength="5" name="NewZip3" value="" > </td>
            <td><input type="text" size="100" maxlength="200" name="NewDesc3" value="" > </td> 
        </tr>
        </tr>
        <tr>
        	<td><input type="text" size="6" maxlength="5" name="NewZip4" value="" > </td>
            <td><input type="text" size="100" maxlength="200" name="NewDesc4" value="" > </td> 
        </tr>
         <tr>
        	<td colspan="4">&nbsp;</td>
        </tr>   
 		<tr>
        	<td colspan="4" >
     			<input type="submit" name="AddZip" value="Submit New Zipcode"  />  <input type="button" value="Cancel" onClick="location.href='AdminSednaMenu.php'" />
				
			</td>
        </tr>
 </table>
 </form>
   	<!-- end .content  --></div>	
        <div class="footer">
        	<address>
          		Footer stuff
        	</address>
      <!-- end .footer  --></div>
  
  <!-- end .container  --></div>

</body>

</html>