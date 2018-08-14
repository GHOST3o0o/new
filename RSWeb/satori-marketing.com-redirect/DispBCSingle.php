<?php
	// get the client ID from the URL
	$vClientID = $_GET["ID"];
	$vCat = $_GET["Cat"];
	$vZip = $_GET["Zip"];
	$vMcat = $_GET["Mcat"];
	// reGet the ip of user
	$ip_address = $_SERVER["REMOTE_ADDR"];		// user's IP address
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta charset="utf-8">
	<title>My Local Area Business Directory </title>
        <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="text.css">
    <link rel="stylesheet" type="text/css" href="960_24_col.css">
    <link rel="stylesheet" type="text/css" href="StyleD.css" >

</head>
<?php

	//Include database connection details
	require_once('connection.php');
	
	$rsPutSingle = mysqli_query($link,"INSERT INTO rs_Activity (What, rs_Time, IP, ID) VALUES ('Single', NOW(), '$ip_address', '$vClientID')");
	
	$rsRefs = mysqli_query($link,"SELECT rs_clients.ID_client, rs_clients.Name, rs_clients.PhysicalAddress, rs_clients.PhysicalZip, rs_clients.BusCardImage, rs_clients.BCOrientation, rs_clients.Contact, rs_clients.Phone, rs_clients.Email, rs_clients.Link, rs_clients.City, rs_clients.State, rs_clients.Pitch, rs_clients.Facebook, rs_clients.Twitter FROM rs_clients 
	WHERE rs_clients.ID_client = $vClientID");
	
	$rsIcons = mysqli_query($link, "SELECT rs_Clients_Discounts.ID_discounts FROM rs_Clients_Discounts JOIN rs_Discounts ON rs_Clients_Discounts.ID_discounts = rs_Discounts.ID_discounts WHERE ID_client = $vClientID ORDER BY LEFT(rs_Discounts.discount, 2) ");
	
		$rs90 = mysqli_query($link,"SELECT rs_clients.ID_client, rs_clients.Name, rs_clients.rs_Status, rs_clients.BusCardImage, rs_clients.Link FROM rs_clients WHERE rs_clients.rs_Status > 95 AND rs_clients.rs_Status < 100 AND (DATE(NOW()) > rs_clients.startdate AND DATE(NOW()) < rs_clients.enddate) ORDER BY rs_clients.rs_Status");
	
?>

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
    	<h1>Welcome to My Local Area Business Directory</h1>
    </div>  	
    <div class="clear" ></div>
	<div class="grid_2" >
        <p> </p>
    </div>  
    <div class="grid_14">
        <div  class="breadcrumb" >&lt;&lt;<a href="indexTest.php" target="_self" >Home</a> | <a href="Select.php?Mcat=<?= $vMcat ?>" target="_self" >Select Category & Zip Code</a> | <a href="DispBC1.php?Mcat=<?= $vMcat ?>&Cat=<?= $vCat ?>&Zip=<?= $vZip ?>" target="_self" >Category Ads</a> </div>
    </div>
    <div class="clear" ></div>
    <div class="grid_24" >
        <p> </p>
    </div>
    <div class="clear" ></div>

    	<div class="grid_7" >
        	&nbsp;
    	</div>
        <div class="grid_12" >
        	
            <?php
                while($row = mysqli_fetch_array($rsRefs)){
                $vImage = $row['BusCardImage'];
                $vImageDisplay = "/Images/".$vImage;
                $vLink = $row['Link'];
				$vPitch = $row['Pitch'];
				$vName = $row['Name'];
				$vContact = $row['Contact'];
				$vAddress = $row['PhysicalAddress'];
				$vCity = $row['City'];
				$vState = $row['State'];
				$vZip = $row['PhysicalZip'];
				$vPhone = $row['Phone'];
				$vEmail = $row['Email'];
				$vFacebook = $row['Facebook'];
				$vTwitter = $row['Twitter'];
				
                If (empty($row['Link'])) {
                        $vLink = "Skip" ;
                    }
                    else {
                        $vLink = $row['Link'];
                    }

			if ($row['BCOrientation'] == "V") {
					$V = "Yes";
				
						 If ($vLink == "Skip") {
					 ?> 
                     	<div class="BCardV" align="center" >
								<img width="202px" src="<?= $vImageDisplay ?>" />
					 <?php
					   }
						Else
						{
					?>
                    	<div class="BCardV" align="center" >
								<a href="<?= $vLink ?>" target="_blank" ><img width="202px" src="<?= $vImageDisplay ?>" /></a>
  		  			<?php
						}
			}
			else {
					$V = "No";
					   If ($vLink == "Skip") {
					 ?> 
                     	<div class="BCard1I" align="center" >
								<img width="350px" src="<?= $vImageDisplay ?>" />
					 <?php
					   }
						Else
						{
					?>
                    	<div class="BCard1I" align="center" >
								<a href="<?= $vLink ?>" target="_blank" ><img width="350px" src="<?= $vImageDisplay ?>" /></a>
 		  			<?php
						}
					}
				}	
						//  echo $vImageDisplay;
					?>
            </div><!-- end .BCard1I  or .BCardV--> 
        </div>
    
    <div class="clear" ></div>
    <div class="grid_24" >
        <p> </p>
    </div>
    <div class="clear" ></div>
    
    <!--  Do the Icons  -->
    	<?php    // Build a string of icon images and then center it under the BC
			//$IconRow = "";
			//  First step through the list of Icons for the particular client
			while($rowI = mysqli_fetch_array($rsIcons)){
				//  Now for each Icon get the individual info for it		
				$rsrowIcon = mysqli_query($link, "SELECT discount, icon, ID_discounts FROM rs_Discounts WHERE ID_discounts = ".$rowI['ID_discounts']);
				while($rsrowIcon = mysqli_fetch_array($rsrowIcon)){
					
					$IconTitle = substr($rsrowIcon['discount'],3);		// Get the text of what the Icon is about
					$IconG = $rsrowIcon['icon'];						// Get the image the Icon uses
					$IconG = "/Images/icons/".$IconG;					// Create the path for displaying the icon
					
					//  Construct the three rows of Icons 
					
					//  Add phone link if there is one
					if (substr($rsrowIcon['discount'],0, 2) == 11 && strlen($vPhone) > 5) {
							
						$IconRow1 = $IconRow1."<a href='tel:".$vPhone."' target='_blank' ><img width='70px' src='".$IconG."' title='".$IconTitle."' /></a><img width='10px' src='/Images/blank.gif' >";
						break;
					}
										
					//  Add email Link if there is one
					elseif (substr($rsrowIcon['discount'],0, 2) == 12  && strlen($vEmail) > 5) {
							
						$IconRow1 = $IconRow1."<a href='mailto:".$vEmail."' target='_blank' ><img width='70px' src='".$IconG."' title='".$IconTitle."' /></a><img width='10px' src='/Images/blank.gif' >";
						break;
					}
					
					//  Add website if there is one
					elseif (substr($rsrowIcon['discount'],0, 2) == 13  && strlen($vLink) > 5) {		
						$IconRow1 = $IconRow1."<a href='".$vLink."' target='_blank' ><img width='70px' src='".$IconG."' title='".$IconTitle."' /></a><img width='10px' src='/Images/blank.gif' >";
						break;
					}
					
					//  Add Facebook link if there is one
					elseif (substr($rsrowIcon['discount'],0, 2) == 14  && strlen($vFacebook) > 5) {		
						$IconRow1 = $IconRow1."<a href='".$vFacebook."' ><img width='70px' src='".$IconG."' title='".$IconTitle."' /></a><img width='10px' src='/Images/blank.gif' >";
						break;
					}
					
					//  Add Twitter link if there is one
					elseif (substr($rsrowIcon['discount'],0, 2) == 15  && strlen($vTwitter) > 5) {		
						$IconRow1 = $IconRow1."<a href='".$vTwitter."' ><img width='70px' src='".$IconG."' title='".$IconTitle."' /></a><img width='10px' src='/Images/blank.gif' >";
						break;
					}
					If (substr($rsrowIcon['discount'],0, 2) > 29 && (substr($rsrowIcon['discount'],0, 2) < 40 )) {
							
						$IconRow2 = $IconRow2."<img width='70px' src='".$IconG."' title='".$IconTitle."' /><img width='10px' src='/Images/blank.gif' >";
						break;
					}
					If (substr($rsrowIcon['discount'],0, 2) > 49 && (substr($rsrowIcon['discount'],0, 2) < 100 )) {
							
						$IconRow3 = $IconRow3."<img width='70px' src='".$IconG."' title='".$IconTitle."' /><img width='10px' src='/Images/blank.gif' >";
						break;
					}
					
					//else {
						//$IconRow = $IconRow."<img width='70px' src='".$IconG."' title='".$IconTitle."' />";
						//break;
					//}
								
				}
			}
			
			If (strlen($IconRow1) > 2 ) {
				$IconRow1 = "<div class='grid_2' ><p> </p></div><div class='grid_20>".$IconRow1."</div><div class='clear' ></div><div class='grid_2' ><p> </p></div><div class='clear' ></div>";
			}
			
			If (strlen($IconRow2) > 2 ) {
				$IconRow2 = "<div class='grid_2' ><p> </p></div><div class='grid_20>".$IconRow2."</div><div class='clear' ></div><div class='grid_2' ><p> </p></div><div class='clear' ></div>";
			}
			If (strlen($IconRow3) > 2 ) {
				$IconRow3 = "<div class='grid_2' ><p> </p></div><div class='grid_20>".$IconRow3."</div><div class='clear' ></div><div class='grid_2' ><p> </p></div><div class='clear' ></div>";
			}
			
    	?>
      <div class="clear" ></div>	
        	<?php
        	//echo "Something";
        	echo $IconRow1;
		
        	//echo "Something";
        	echo $IconRow2;

        	//echo "Something";
        	echo $IconRow3;
			?>
   
    <div class="grid_2" >
    	&nbsp;   	
    </div>
       <div class="grid_20" >        
            <br />
            <table width="100%" >
            	<tr>
                	<td colspan="2">
                    	<center><u><h3><?= $vName ?></h3></u></center>
            		</td>
               </tr>
            	<tr>
                	<td colspan="2">
                    	<center><h4><?= $vPitch ?></h4></center>
            		</td>
               </tr>
               <tr>
                	<td>
                    	<?php 
							If (strlen($vContact) > 5) {
						?>
                    	<h3>Contact:	</h3>
            		</td>
                    <td>
                    	<h4><?= $vContact ?></h4>	
            		</td>
                    	<?php
                    		}
							Else {
						?>
                        &nbsp;</td><td>&nbsp;</td>
                        <?php
							}
						?>				
               </tr>
               <tr>
                	<td>
                    	<?php 
							If (strlen($vPhone) > 5) {
						?>
                    	<h3>Phone:	</h3>
            		</td>
                    <td>
                    	<h4><?= $vPhone ?></h4>	
            		</td>
                    	<?php
                    		}
							Else {
						?>
                        &nbsp;</td><td>&nbsp;</td>
                        <?php
							}
						?>
               </tr>
                                           
            </table>       
        </div>
 
        <div class="clear" ></div> 
        <div class="grid_24">
        	<div class="Goldbar" > 
           		<img src="Images/goldLine.jpg" width="940" height="6" align="absmiddle" /> 
        	</div>
        </div>
        <div class="clear" ></div> 
        <div class="grid_24" >
        	<p> </p>
    	</div>
    <!--  start of cards for sponsors -->    
<?php
		while($row = mysqli_fetch_array($rs90)) {
			$V = "No";
 ?>		
		<div class="grid_2" >
        	&nbsp;	
    	</div>

            	<?php 
					$vLinkSingle = "DispBCSingle.php?ID=".$row['ID_client'];
					$vImageDisplay = $row['BusCardImage'];
					$vLinkSingle = $vLinkSingle."&Cat=".$vCat."&Zip=".$vZip."&Mcat=".$vMcat;
					
					if ($row['ID_client'] == 80) {
						$V = "Yes";
				?>
                	<div class="grid_2" >
                        &nbsp;	
                    </div>
                	<div class="grid_7" >
                	<div class="BCardV" >
						<a href="<?= $vLinkSingle ?>" target="_self" ><img height = "350px" src="<?= "/Images/".$vImageDisplay ?>" /></a>
					</div>
                    </div>
                     
				<?php 
					}
					else {
						$V = "No";	
				?>
                <div class="grid_9" >
                	<div class="BCard1I">
            			<a href="<?= $vLinkSingle ?>" target="_self" ><img width="350px" src="<?= "/Images/".$vImageDisplay ?>" /></a>
					</div>
                </div>
               
                <?php
					}
				?>
     
	<!--   space between cards should be 90px  -->
     <div class="grid_2" >
     		<p> </p>  <!-- Space between cards  -->
     </div>   
            <?php
					$row = mysqli_fetch_array($rs90);
					if (!empty($row['ID_client'])) {
					$vLinkSingle = "DispBCSingle.php?ID=".$row['ID_client'];
					$vLinkSingle = $vLinkSingle."&Cat=".$vCat."&Zip=".$vZip."&Mcat=".$vMcat;
					$vImageDisplay = $row['BusCardImage'];
            ?> 
            	<div class="grid_9" >
            		<div class="BCard1I">            		
                		<a href="<?= $vLinkSingle ?>" target="_self" ><img width="350px" src="<?= "/Images/".$vImageDisplay ?>" /></a>
					</div>	
                </div>  
			<?php
					}  //  end of if there is a BC to display
			?>
		<div class="clear" ></div>
        <div class="grid_24" >
            	<p> </p>		<!-- space between rows of cards  -->
    	</div>
        <div class="clear" ></div>
        <?php			
		}  // end of while loop
	?> 
        <div class="clear" ></div> 
            <div class="grid_24" >
        <p> </p>
    </div>





    <div class="clear" ></div>  

	   <?php include_once("footer.php") ?>
  
  </div> <!-- end .container_24  -->
  
</body>
</html>