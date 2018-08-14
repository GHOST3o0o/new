<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <?php
	require_once('auth.php');
	?>
<html>

<head>
	<meta charset="utf-8">
	<title>Satori Referral System Administration Programs </title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>

<body>
<div class="container">
  <div class="header">
    <a href="#"><img src="" alt="Insert Logo Here" width="180" height="40" id="Insert_logo" style="background: #C6D580; display:block;" /></a>
  </div>

  <div class="content">
    <h1>Welcome to the Coeur d'Alene Area Referral System Administration Program</h1>
    
     <h2>Admin Menu</h2>
     <table Table width="80%" align="center">
       <tr>
        	<td><a href="AdminSednaAddCl.php" >Add Clients</a></td>
            <td><a href="AdminSednaEditCl_ID.php" >Edit/Delete Client Information</a></td>
       </tr>
        <tr>
        	<td><a href="AdminSednaAddPa.php" >Add Partner</a></td>
            <td><a href="AdminSednaEditPa_ID.php" >Edit/Delete Partner Information</a></td>
       </tr>
        <tr>
        	<td>&nbsp;</td>
            <td>&nbsp;</td>
       </tr>              
     	<tr>
        	<td><a href="AdminSednaAddZ.php" >Add Zipcodes</a></td>
            <td><a href="AdminSednaEditZ.php" >Edit/Delete Zipcodes</a></td>
       </tr>
       <tr>
        	<td><a href="AdminSednaAddCa.php" >Add Categories</a></td>
            <td><a href="AdminSednaEditCa.php" >Edit/Delete Categories</a></td>
       </tr>
       <tr>
        	<td><a href="AdminSednaAddII.php" >Add Information Icons</a></td>
            <td><a href="AdminSednaEditII.php" >Edit/Delete Information Icons</a></td>
       </tr>
        <tr>
        	<td>&nbsp;</td>
            <td>&nbsp;</td>
       </tr>  

        <tr>
        	<td><a href="AdminSednaReport.php" >Zip/Category Matrix Report</a></td>
            <td></td>
       </tr>       
       <tr>
        	<td><a href="AdminSednaReport.php" >Client Activity Report</a></td>
            <td></td>
       </tr> 
  </table>
     

   	<!-- end .content  --></div>	
        <div class="footer">
        	<address>
          		Footer stuff
        	</address>
      <!-- end .footer  --></div>
  
  <!-- end .container  --></div>

</body>

</html>