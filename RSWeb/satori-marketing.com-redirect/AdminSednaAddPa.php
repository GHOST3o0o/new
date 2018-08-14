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

  <div class="tallcontent">
    <h1>Coeur d'Alene Area Referral System Administration Program</h1>
    
     <h2>Add Partners to the system</h2>
      <form action="AdminSednaAddPostPa.php" name="AddPartner" method="POST" >
     <table width="90%" align="center">
    	<tr>
        	<td style="width:30%" >Name: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="ParName" value" " > </td>
        </tr>
      	<tr>
        	<td style="width:30%" >Title: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="ParTitle" value" " > </td>
        </tr>
        <tr>
        	<td style="width:30%" >Contact: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="ParContact" value" " > </td>
        </tr>
        <tr>
        	<td style="width:30%" >Phone1: </td>
            <td style="width:70%"><input type="text" size="21" maxlength="20" name="ParPhone1" value" " > </td>
        </tr>
        <tr>
        	<td style="width:30%" >Phone1: </td>
            <td style="width:70%"><input type="text" size="21" maxlength="20" name="ParPhone2" value" " > </td>
        </tr>
     	<tr>
        	<td style="width:30%" >Email: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="ParEmail" value" " > </td>
        </tr>          
    	<tr>
        	<td style="width:30%" >Address: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="ParAddress" value" " > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >City: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="ParCity" value" " > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >State: </td>
            <td style="width:70%"><input type="text" size="3" maxlength="2" name="ParState" value" " > </td>
        </tr> 
        <tr>
        	<td style="width:30%" >Zip: </td>
            <td style="width:70%"><input type="text" size="6" maxlength="5" name="ParZip" value" " > </td>
        </tr>
    	<tr>
        	<td style="width:30%">Notes: </td>
            <td style="width:70%"><textarea rows="5" cols="76" name="ParNotes" ></textarea></td>
        </tr>               
                <tr>
					<td>&nbsp;</td>
				</tr>                   
 		<table>
    </div>

	<input type="submit" name="AddPartner" value="Submit New Partner"  />  <input type="button" value="Cancel" onClick="location.href='AdminSednaMenu.php'" />	
   		
 </form>
 <br />


   	<!-- end .content  --></div>	
        <div class="footer">
        	<address>
          		Footer stuff
        	</address>
      <!-- end .footer  --></div>
  
  <!-- end .container  --></div>

</body>

</html>