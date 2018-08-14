<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <?php
	require_once('auth.php');
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
    <h1>Referral System Administration Program</h1>
    
     <h2>Add Information (Discount) Icons to the system</h2>
      <form action="AdminSednaAddPostII.php" name="AddII" method="POST" >
     <table Table width="90%" align="center">

    	<tr>
        	<td style="width:20%" >Name</td> <td style="width:30%">Image Name</td><td style="width:50%">Link</td>
        </tr>
        <tr>
        	<td><input type="text" size="20" maxlength="100" name="NewII1" value="" > </td>
            <td><input type="text" size="50" maxlength="200" name="NewDesc1" value="" > </td> 
            <td><input type="text" size="50" maxlength="250" name="Link1" value="" > </td> 
        </tr>
        </tr>
        <tr>
        	<td><input type="text" size="20" maxlength="100" name="NewII2" value="" > </td>
            <td><input type="text" size="50" maxlength="200" name="NewDesc2" value="" > </td>
            <td><input type="text" size="50" maxlength="250" name="Link2" value="" > </td> 
        </tr>
        <tr>
        	<td><input type="text" size="20" maxlength="100" name="NewII3" value="" > </td>
            <td><input type="text" size="50" maxlength="200" name="NewDesc3" value="" > </td> 
            <td><input type="text" size="50" maxlength="250" name="Link3" value="" > </td>
        </tr>
        </tr>
        <tr>
        	<td><input type="text" size="20" maxlength="100" name="NewII4" value="" > </td>
            <td><input type="text" size="50" maxlength="200" name="NewDesc4" value="" > </td>
            <td><input type="text" size="50" maxlength="250" name="Link4" value="" > </td> 
        </tr>
         <tr>
        	<td colspan="4">&nbsp;</td>
        </tr>   
 		<tr>
        	<td colspan="4" >
     			<input type="submit" name="AddII" value="Submit New Information Icons"  />  <input type="button" value="Cancel" onClick="location.href='AdminSednaMenu.php'" />
				
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