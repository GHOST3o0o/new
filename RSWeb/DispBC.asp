<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>DG Referral System </title>
<link href="RSTest.css" rel="stylesheet" type="text/css" />
<!-- #include file = "includes/opencon.asp" -->
<!-- #include file = "includes/adovbs.asp" -->
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
</head>
<%
	vZipCodeID = Request.Form("zipcode")
	vCategoryID = Request.Form("Categories")
'response.Write("zipcodeID:  " & vZipcodeID & "   CategoryID:  " & vCategoryID )
'response.Flush()
'response.End()
		vDoWhat = "B"  '  This gets the basic referral list
			'  Not used here
			'  Not used here
				
		Set cmd = Server.CreateObject("ADODB.Command")
		Set cmd.ActiveConnection = con
	
		cmd.CommandText = "GetReferral"
		cmd.CommandType = 4   'adCmdStoredProcedure
		cmd.Parameters.Append cmd.CreateParameter("vDoWhat", adChar, adParamInput, 1, vDoWhat)
		cmd.Parameters.Append cmd.CreateParameter("vCategoryID", adInteger, adParamInput, , vCategoryID)
		cmd.Parameters.Append cmd.CreateParameter("vZipcodeID", adInteger, adParamInput, , vZipCodeID)   
        
		Set rsReferralList = cmd.execute
        If rsReferralList.eof Then
			'  Problem no records came back
		end if
		'Do While Not rsReferralList.eof 
			vClientID1 = rsReferralList("ID_Client")
			vName1 = rsReferralList("Name")
			vStatus1 = rsReferralList("rsStatus")
			vPhone1 = rsReferralList("rsPhone")
			vExt1 = rsReferralList("rsExtension")
			vTagline1 = rsReferralList("rsBCDesc")
			
			rsReferralList.movenext
			vClientID2 = rsReferralList("ID_Client")
			vName2 = rsReferralList("Name")
			vStatus2 = rsReferralList("rsStatus")
			vPhone2 = rsReferralList("rsPhone")
			vExt2 = rsReferralList("rsExtension")
			vTagline2 = rsReferralList("rsBCDesc")
			
			rsReferralList.movenext			
			vClientID3 = rsReferralList("ID_Client")
			vName3 = rsReferralList("Name")
			vStatus3 = rsReferralList("rsStatus")
			vPhone3 = rsReferralList("rsPhone")
			vExt3 = rsReferralList("rsExtension")
			vTagline3 = rsReferralList("rsBCDesc")
			
			rsReferralList.movenext			
			vClientID4 = rsReferralList("ID_Client")
			vName4 = rsReferralList("Name")
			vStatus4 = rsReferralList("rsStatus")
			vPhone4 = rsReferralList("rsPhone")
			vExt4 = rsReferralList("rsExtension")
			vTagline4 = rsReferralList("rsBCDesc")
			

		'Loop
		
        Set cmd = Nothing
%>

<body>

<div class="container">
  <header>
    <a href="#"><img src="" alt="Insert Logo Here" width="180" height="90" id="Insert_logo" style="background: #C6D580; display:block;" /></a>
  </header>
  <div class="sidebar1">
    <nav>
      <ul>
        <li><a href="#">Link one</a></li>
        <li><a href="#">Link two</a></li>
        <li><a href="#">Link three</a></li>
        <li><a href="#">Link four</a></li>
      </ul>
    </nav>
    <aside>
      <p></p> 
    </aside>
  <!-- end .sidebar1 --></div>
  <div class="content">
    <h1>Coeur d'Alene Area Referral System</h1>

     <h2>Your recommeded Providers:</h2>
    
        <div class="BCcontent">
        	<div class="BCard1">
                <h1><%=vName1%></h1>                
                  <center><%=vPhone1%>  Ext: <%=vExt1%></center>
                <h2><%=vTagline1%></h2>	
    		</div>
 
            <div class="BCard2">
              <h1><%=vName2%></h1>
                <center><%=vPhone2%>  Ext: <%=vExt2%></center>
                <h2><%=vTagline2%></h2>	
            </div>
        
            <div class="BCard3">
              <h1><%=vName3%></h1>
                <center><%=vPhone3%>  Ext: <%=vExt3%></center>
                <h2><%=vTagline3%></h2>	
            </div>
          
            <div class="BCard4">
              <h1><%=vName4%></h1>
                <center><%=vPhone4%>   Ext: <%=vExt4%></center>
                <h2><%=vTagline4%></h2>	
            </div>
    	</div>  <!--  End of BCContent  -->           

    </div> <!--  End of Content  -->
  <footer>
    <p>This footer contains the declaration position:relative; to give Internet Explorer 6 hasLayout for the footer and cause it to clear correctly. If you're not required to support IE6, you may remove it.</p>
    <address>
      Address Content
    </address>
  </footer>
  <!-- end .container --></div>
</body>
</html>
