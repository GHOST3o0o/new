<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Referral System Administration Menu</title>

<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<link rel="stylesheet" type="text/css" href="RStest.css">

</head>
<body>
<%
	
	user = Session("odpn")        ' should be user name from bber_user table
	tempPass = Session("odp38")   '  should be entryID from user table
	'Response.Write(user & "<br />") 
	'Response.Write(vQueryType & "<br />")
	'Response.Write(tempPass & "<br />")
	If user & "::" = "::" or (tempPass > 2500 or tempPass < 1 ) Then
		response.Redirect("default.asp")
	end if
%>

<% 	
	If Request.Form("First") = "Yes" Then
		'don't do anything
	Else
		'Clear out the form
		'document.form[0].reset()
	End if		
	
	'response.Write(vContent)	
%>
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
<h3>Referral System Administration Menu</h3><br />

	<table cellpadding="5" cellspacing="0" border="0">
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td><%=tMessage%></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        
        <tr>
            <td><a href="/RSTest/RSTestAClient.asp?First=Yes">Add/Edit Clients </a></td>
        </tr>
        <tr>
            <td><a href="/RSTest/RSTestAZip.asp?First=Yes">Add/Edit Zip Code List</a></td>
        </tr>
        <tr>
            <td><a href="/RSTest/RSTestACat.asp?First=Yes">Add/Edit Service Categories</a></td>
        </tr>
        <tr>
            <td><a href="/RSTest/RSTestA.asp?First=Yes">???</a></td>
        </tr>
        <tr>
            <td><a href="RSTest/RSTestA.asp?First=Yes">???</a></td>
        </tr>
        <tr>
        	<td><a href="/admin/logout.asp">Log Out</a></td>
       </tr>
   </table>

    
  <footer>
    <p>This footer contains the declaration position:relative; to give Internet Explorer 6 hasLayout for the footer and cause it to clear correctly. If you're not required to support IE6, you may remove it.</p>
    <address>
      Address Content
    </address>
  </footer>
  <!-- end .container --></div>


</body>
</html>


