<?php 
	 	//This is the connection code for satori-marketing.com
		//  This also contains any parameters that are specifice to satori-marketing.com
		//  The plan is to make it so that each piece of the system is identical between
		//		satori-marketing and mylabd.com  except this piece of code
		//  Rignt now the only parameter that changes is the path to images
		//		it is not yet fully implemented.
		
		
		//echo 'Second something <br />';
		
		$link = mysqli_connect('satori1.dotstermysql.com', 'webuser', 'webuser1', 'refsys'); 
	
		if (mysqli_connect_errno()) {
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  	}
		else
	  {  //echo "Supposedly connected to MySQL: <br />";
	  }
	  $imgpath = "/Images/";
	  ?>