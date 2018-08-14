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
<?php 

$vID = $_GET['ID'];

require_once('connectionSedna.php');

$vSQLPar = "Select ID_Partner, Name, Title, Contact, Phone1, Phone2, Email, Address, City, State, Zip, Notes FROM rs_Partners Where ID_Partner = '".$vID."'";

//echo $vSQLPar."<br />";

$GetPar = mysqli_query($link, $vSQLPar);

 		while($row = mysqli_fetch_array($GetPar))
   			{
?>

<div class="container">

 	<h1>Referral System Administration Program</h1>
	 <h2>Edit Partner Information for Partner ID:  <?= $vID ?>, <?= $row['Name']; ?> </h2> 

     <form action="AdminSednaEditPaDetailPost.php" name="EditPartner" method="POST" >

     <table width="90%" align="center">
    	<tr>
        	<td style="width:30%" >Name: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="ParName" value="<?= $row['Name']; ?>" > </td>
        </tr>
        <tr>
        	<td style="width:30%" >Title: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="ParTitle" value="<?= $row['Title']; ?>" > </td>
        </tr>
        <tr>
        	<td style="width:30%" >Contact: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="ParContact" value="<?= $row['Contact']; ?>" > </td>
    	</tr>
    	<tr>
        	<td style="width:30%" >Phone1: </td>
            <td style="width:70%"><input type="text" size="21" maxlength="20" name="ParPhone1" value="<?= $row['Phone1']; ?>" > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >Phone2: </td>
            <td style="width:70%"><input type="text" size="21" maxlength="20" name="ParPhone2" value="<?= $row['Phone2']; ?>" > </td>
        </tr>        
    	<tr>
        	<td style="width:30%" >Email: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="ParEmail" value="<?= $row['Email']; ?>" > </td>
        </tr>
               
    	<tr>
        	<td style="width:30%" >Address: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="ParAddress" value="<?= $row['Address']; ?>" > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >City: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="ParCity" value="<?= $row['City']; ?>" > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >State: </td>
            <td style="width:70%"><input type="text" size="3" maxlength="2" name="ParState" value="<?= $row['State']; ?>" > </td>
        </tr> 
        <tr>
        	<td style="width:30%" >Zip: </td>
            <td style="width:70%"><input type="text" size="6" maxlength="5" name="ParZip" value="<?= $row['Zip']; ?>" > </td>
        </tr>
    	<tr>
        	<td style="width:30%">Notes: </td>
            <td style="width:70%"><textarea rows="5" cols="76" name="ParNotes" ><?= $row['Notes']; ?> </textarea></td>
        </tr>
        </table>
        
        <input type="submit" name="EditPartnerDetail" value="Update Partner"  />  <input type="button" value="Cancel" onClick="location.href='AdminSednaMenu.php'" />
    
    	<input type="hidden" name="ID" value="<?= $vID ?>" >
   	
 </form>
	<?php
			}
	?>

</div>	<!-- container -->

</body>
</html>
