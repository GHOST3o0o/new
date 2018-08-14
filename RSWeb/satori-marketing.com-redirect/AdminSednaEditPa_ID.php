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
	$vTitle = "Edit or Delete Partners ";
	$vSQL = "Select ID_Partner, Name FROM rs_Partners ORDER BY ID_Partner";
	//$vSQL = "Select ID_client, Name, rs_Status, BusCardName, BusCardPhone, BusCardTagLine, BusCardImage, PhysicalZip, Phone, Email, Address, City, State, Notes FROM rs_clients ORDER BY ID_client";	
?>

<div class="container">
  <div class="header">
    <a href="#"><img src="" alt="Insert Logo Here" width="180" height="40" id="Insert_logo" style="background: #C6D580; display:block;" /></a>
  </div>
 
  <div class="tallcontent">
    <h1> Referral System Administration Program</h1>
       
     <h2><?=$vTitle?> </h2>
     <h3>(to edit partner details click on the ID number)</h3>
      <form action="AdminSednaEditPostPa.php" name="EditPartner" method="POST" >

	<style type="text/css" >
		 table tr td {border-bottom: 1px solid #060; }
	</style>	
     <table width="100%" align="center" style="padding-left:10px;" >

    	<tr >
        	<td>&nbsp;<b>ID</b></a>&nbsp;</td> <td><b>Name</b></td> <td align="center" ><b>Delete</b></td>
        </tr>
       
     <?php
	 	//Include database connection details
		require_once('connection.php');
		
		$vNumOfRows = 0;
				
		$rsEditList = mysqli_query($link, $vSQL);
		while($row = mysqli_fetch_array($rsEditList))
		 { 
		 	$vID = $row['ID_Partner'];
     		//$vParName = "Name".$row['ID_client'];
			$vDelName = "Del".$row['ID_Partner'];
     ?>
     	<tr>
        	<td><a href="AdminSednaEditPaDetail.php?ID=<?= $vID ?>" ><b><?= $vID ?></b></a></td> 
        	<td><?= $row['Name']; ?> </td> 
            
        	<td align="center"><input type="checkbox" name="<?= $vDelName ?>" > </td>
        </tr>
    <?php
			$vNumOfRows = $vNumOfRows + 1;
			}  // End of While    

   		?>  
 </table>
 <br />
&nbsp;&nbsp;&nbsp;<input type="submit" name="EditPartner" value="Submit Deletions"  />  <input type="button" value="Cancel" onClick="location.href='AdminSednaMenu.php'" />
                <input type="hidden" name="NumOfRows" value="<?= $vNumOfRows ?>"	 />		
 </form>
<br /><br /> 
 
   	<!-- end .content  --></div>	
        <div class="footer">
        	<address>
          		Footer stuff
        	</address>
      <!-- end .footer  --></div>
  
  <!-- end .container  --></div>

</body>

</html>