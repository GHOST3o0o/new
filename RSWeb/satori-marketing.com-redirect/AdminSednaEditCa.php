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
	$vTitle = "Edit or Delete Categories from system";
	$vSQL = "Select ID_category, Category, CatDescrip FROM rs_categories ORDER BY Category";		
?>


<div class="container">
  <div class="header">
    <a href="#"><img src="" alt="Insert Logo Here" width="180" height="40" id="Insert_logo" style="background: #C6D580; display:block;" /></a>
  </div>

  <div class="tallcontent">
    <h1>Coeur d'Alene Area Referral System Administration Program</h1>    
    
     <h2><?=$vTitle?> </h2>
      <form action="AdminSednaEditPostCa.php" name="EditCat" method="POST" >
     <table Table width="90%" align="center">

    	<tr>
        	<td style="width:20%" >Category</td> <td style="width:50%">Description</td><td style="width:10%">&nbsp;</td><td style="width:20%" align="center">Delete</td>
        </tr>
       
     <?php
	 	//Include database connection details
		require_once('connection.php');
		
		$vNumOfRows = 0;
				
		$rsEditList = mysqli_query($link, $vSQL);
		while($row = mysqli_fetch_array($rsEditList))
		 { 
     		$vDescName = "Desc".$row['ID_category'];
			$vDelName = "Del".$row['ID_category'];
     ?>
     	<tr>
        	<td><input type="text" size="101" maxlength="100" name="<?= $row['ID_category']; ?>" value="<?= $row['Category']; ?>" > </td>
            <td><input type="text" size="50" maxlength="200" name="<?= $vDescName ?>" value="<?= $row['CatDescrip']; ?>" > </td> 
     		<td> </td>
        	<td align="center"><input type="checkbox" name="<?= $vDelName ?>" > </td>
        </tr>
        
    <?php
			$vNumOfRows = $vNumOfRows + 1;
			}  // End of While    

   		?>  
         <tr>
        	<td colspan="4">&nbsp;</td>
        </tr>   
 		<tr>
        	<td colspan="4" >
     			<input type="submit" name="EditCat" value="Submit Edits and/or Deletions"  />  <input type="button" value="Cancel" onClick="location.href='AdminSednaMenu.php'" />
                <input type="hidden" name="NumOfRows" value="<?= $vNumOfRows ?>"	 />				
				
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