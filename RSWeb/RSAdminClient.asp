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

<body>

<div class="container">
  <header>
    <a href="#"><img src="" alt="Insert Logo Here" width="180" height="90" id="Insert_logo" style="background: #C6D580; display:block;" /></a>
  </header>
	
			<%
			vQueryType = "U"
			user = Session("odpn")        ' should be user name from bber_user table
			tempPass = Session("odp38")   '  should be entryID from user table
			'Response.Write(user & "<br />") 
			'Response.Write(vQueryType & "<br />")
			'Response.Write(tempPass & "<br />")

			Set cmd = Nothing

			Set cmd = Server.CreateObject("ADODB.Command")
			Set cmd.ActiveConnection = con
		
			cmd.CommandText = "GetEmail"
			cmd.CommandType = 4   'adCmdStoredProcedure
			cmd.Parameters.Append cmd.CreateParameter("vQueryType", adChar, adParamInput, 1, vQueryType)
			cmd.Parameters.Append cmd.CreateParameter("user", adVarChar, adParamInput, 36, user)
			cmd.Parameters.Append cmd.CreateParameter("tempPass", adVarChar, adParamInput, 20, tempPass)
		
			Set rsResult = cmd.execute
			If rsResult.eof Then
				response.Redirect("admin.asp")
			Else
				'  do rest of page
				vFrom = request.QueryString("From")
response.Write(vFrom & "<br />")
				If vFrom = "Add" Then
					vAddWhat = request.Form("AddWhat")
					
					vHaveChecked = request.Form("confirmAdd")
					if vHaveChecked = "HaveChecked" Then
						'  Don't do anything
					Else
						response.Redirect("PubsMaintQ.asp?Msg=Check to be sure the Article/Report is new.")		'Did not check the box about whether they 
					End if
					If vAddWhat <> "MBQ" AND vAddWhat <> "RPT" Then
						response.Redirect("PubsMaintQ.asp?Msg=Please designate where this is an MBQ Article or BBER publication/report.")
					end if
						
					If vAddWhat = "MBQ" Then
						vMBQOnly = 1
						vAddEditMsg = "Add New MBQ Article"
						vLink = " "
						vImageLink = " " 
					End if
					If vAddWhat = "RPT" Then 
						vMBQOnly = 0
						vAddEditMsg = "Add New Publication/Report"
						vVolume = 0
						vNumber = 0 
					End if
					vEntryID = 0   ' this is a place holder for passing to SQLProceedure
				End if
				If vFrom = "Edit" Then
response.Write("inside Edit <br />")
					vEntryID = request.QueryString("EntryID")
					If vEntryID & "::" = "::" Then
						vEntryID = 0	'  Shouldn't get here
					Else
						vAddEditMsg = "Edit the information for Pubication/MBQ Article ID=" & vEntryID
						'vEntryID = CInt(vEntryID)
					End if
				End if
response.Write("After Edit <br />")
				'  Get the Department Count
				Set cmd = Nothing
				Set cmd = Server.CreateObject("ADODB.Command")
				Set cmd.ActiveConnection = con 
				vGetDeptSQL = "Select * from bber_departments order by EntryID"
				Set rsDept = con.Execute(vGetDeptSQL)
					
				vDeptMax = 1
				Do While NOT rsDept.eof
					vDeptMax = vDeptMax + 1
					rsDept.movenext
				Loop
				ReDim arrDept(2,vDeptMax)		
				
				Set rsDept = Nothing
				vGetDeptSQL = "Select * from bber_departments order by EntryID"
				Set rsDept = con.Execute(vGetDeptSQL)
				
				n = 1
				Do While NOT rsDept.eof
					arrDept(0,n) = rsDept("EntryID")
					arrDept(1,n) = rsDept("Department")
					arrDept(2,n) = " "			' will be selected if marked	
					n = n + 1
					rsDept.movenext
				Loop
				
				'  Get the Category Count
				Set cmd = Nothing
				Set cmd = Server.CreateObject("ADODB.Command")
				Set cmd.ActiveConnection = con
				vGetCatsSQL = "Select * from mbq_categories order by Category"
				Set rsCats = con.Execute(vGetCatsSQL)
				vCatMax = 0 
				Do While NOT rsCats.eof
					vCatMax = vCatMax + 1
					rsCats.movenext
				Loop
				
				ReDim arrCats(2,vCatMax)		
				
				Set rsCats = Nothing
				vGetCatSQL = "Select EntryID, Category from mbq_categories order by EntryID"
				Set rsCats = con.Execute(vGetCatSQL)
				
				n = 1
				Do While NOT rsCats.eof
					arrCats(0,n) = rsCats("EntryID")
					arrCats(1,n) = rsCats("Category")
					arrCats(2,n) = " "			' will be checked if marked	
					n = n + 1
					rsCats.movenext
				Loop

				'  Get the Department Listing for checkboxes
				Set cmd = Nothing
				Set cmd = Server.CreateObject("ADODB.Command")
				Set cmd.ActiveConnection = con 
				vGetDeptSQL = "Select * from bber_departments order by EntryID"
				Set rsDept = con.Execute(vGetDeptSQL)
				
				'  Get the Category Listing for checkboxes
				Set cmd = Nothing
				Set cmd = Server.CreateObject("ADODB.Command")
				Set cmd.ActiveConnection = con 
				vGetCatsSQL = "Select * from mbq_categories order by Category"
				Set rsCats = con.Execute(vGetCatsSQL)
					
				'  Don't get anything
				If vFrom = "Edit" Then
					Set cmd = Nothing
					Set cmd = Server.CreateObject("ADODB.Command")
					Set cmd.ActiveConnection = con 
					vGetPubData = "Select * FROM mbq_articles Where EntryID = " & vEntryID 
					Set rsPubData = con.Execute(vGetPubData)
					vTitle = rsPubData("Title")
					vSubTitle  = rsPubData("SubTitle")
					vAuthors = rsPubData("Authors")
					vkeywords = rsPubData("keywords")
					vMBQOnly = rsPubData("mbqOnly")
					IF vMBQOnly Then
						vVolume = rsPubData("volume")
						vNumber = rsPubData("number")
						' Get the year and determine the season
						Set cmd = Nothing
						Set cmd = Server.CreateObject("ADODB.Command")
						Set cmd.ActiveConnection = con 
						vGetMBQIssueInfo = "Select DISTINCT volYear FROM mbq_voltime Where volume = " & vVolume
						Set rsMBQIssueInfo = con.Execute(vGetMBQIssueInfo)
						vVolumeYear = rsMBQIssueInfo("volYear")
						Select Case vNumber
							Case 1
								vNumberText = "Spring"
							Case 2 
								 vNumberText= "Summer"
							Case 3
								vNumberText = "Autumn"
							Case 4 
								vNumberText = "Winter"
						End Select 
						vMBQOnly = 1
					Else
						vMBQOnly = 0
					End if
					vLink = rsPubData("Link")
					vImageLink = rsPubData("ImageLink")
					vPubDate = rsPubData("PubDate")
					vAbstract = rsPubData("abstract")
					
					'  Get the Department Listing(s) for this particular pub, 
					Set cmd = Nothing
					Set cmd = Server.CreateObject("ADODB.Command")
					Set cmd.ActiveConnection = con 
					vGetPubDeptsSQL = "Select DepartmentID from mbq_pubs_depts Where ArticleID = " & vEntryID & "order by DepartmentID"
					Set rsPubDepts = con.Execute(vGetPubDeptsSQL)
					' Modify array to incorporate the listings 

					Do While NOT rsPubDepts.eof
						For n = 1 to vDeptMax
							If arrDept(0,n) = rsPubDepts("DepartmentID") Then
								arrDept(2,n) = "checked"
							End if
						next
						rsPubDepts.movenext
					Loop					
				 
					'  Get the Category Listings for this particular pub,
					Set cmd = Nothing
					Set cmd = Server.CreateObject("ADODB.Command")
					Set cmd.ActiveConnection = con 
					vGetPubCatsSQL = "Select CategoryID from mbq_pubs_cats Where ArticleID = " & vEntryID & "order by CategoryID"
					Set rsPubCats = con.Execute(vGetPubCatsSQL)
					' Modify array to incorporate the listings 

					Do While NOT rsPubCats.eof
						For n = 1 to vCatMax
							If arrCats(0,n) = rsPubCats("CategoryID") Then
								arrCats(2,n) = "checked"
							End if
						next
						rsPubCats.movenext
					Loop					
											 
					Set cmd = Nothing
					Set cmd = Server.CreateObject("ADODB.Command")
					Set cmd.ActiveConnection = con 
					vGetPubCatsSQL = "Select CategoryID from mbq_pubs_cats Where ArticleID = " & vEntryID & "order by CategoryID"
					Set rsPubCats = con.Execute(vGetPubCatsSQL)
				End if
			%>
						
			<div class="content">
							
							<table width="100%" cellpadding="5" cellspacing="0" border="0" >
							<tr><td width="20%">&nbsp;</td><td width="80%">&nbsp;</td></tr>
							<tr>
								<td colspan="2"><%=tMessage%></td>
							</tr>
                            <tr>
								<td colspan="2"><h3><%=vAddEditMsg%></h3></td>
							</tr>

							<tr><td>&nbsp;</td></tr>
							<form action="PubsPost.asp" method="post" >
                            <input type="hidden" name="IssueArticle" value="Article"  />
							<input type="hidden" name="entryID" value="<%=vEntryID%>"  />
                            <input type="hidden" name="MBQOnly" value="<%=vMBQOnly%>" />
                            <input type="hidden" name="From" value="<%=vFrom%>" />  
                            <input type="hidden" name="DeptMax" value=<%=vDeptMax%> />
                            <input type="hidden" name="CatMax" value=<%=vCatMax%> />
                            <input type="hidden" name="VolumeYear" value=<%=vVolumeYear%> />
                            <% if vMBQOnly = 1 Then %>
                            <tr bgcolor="#D4BFFF"> 
                            	<td colspan="2" >
                                	For MBQ Articles Only: 
                                </td>
                            </tr>
                              
                             <tr bgcolor="#D4BFFF">
                            	<td> Volume:  </td>
                                <td> <input type="text" name="volume" size="10" maxlength="3" value="<%=vVolume%>"  /> &nbsp;&nbsp;&nbsp;<%=vVolumeYear%></td>
                            </tr>
                             <tr bgcolor="#D4BFFF">
                            	<td> Number:  </td>
                                <td><input type="text" name="number" size="10" maxlength="1" value="<%=vNumber%>"  />&nbsp;&nbsp;&nbsp;<%=vNumberText%></td>
                            </tr>        	
                           <% End if %>     	
 
                            <tr>
                            	<td> Title:  </td>
                                <td> <input type="text" name="title" size="50" maxlength="128" value="<%=vTitle%>"  /></td>
                            </tr>
                             <tr>
                            	<td> Subtitle:  </td>
                                <td><input type="text" name="subtitle" size="50" maxlength="128" value="<%=vSubTitle%>"  /></td>
                            </tr>
                            <tr>
                            	<td> Authors:  </td>
                                <td> <input type="text" name="authors" size="50" maxlength="128" value="<%=vAuthors%>"  /></td>
                            </tr>
                             <tr>
                            	<td> Abstract:  </td>
                                <td> <textarea cols="100" rows="6" name="abstract"><%=vAbstract%></textarea></td>
                            </tr>
                             <tr>
                            	<td> Keywords:  </td>
                                <td> <input type="text" name="keywords" size="50" maxlength="128" value="<%=vKeywords%>"  /></td>
                            </tr>
                            <% If vMBQOnly = 0 Then %>
                             <tr>
                            	<td> Publication Date:  </td>
                                <td> <input type="text" name="PubDate" size="10" maxlength="128" value="<%=vPubDate%>"  />  (<i>2012  or  6/2012</i>)</td>
                            </tr>
                             
                            <tr>
                            	<td> Path/FileName to PDF:  </td>
                                <td> <input type="" name="Link" size="50" maxlength="128" value="<%=vLink%>"  /><br />
                                	<i> \pubs\forest\outlook\forestproduct2012.pdf </i></td>
                            </tr>
                           
                            <tr>
                            	<td> Path/FileName to Cover Image:  </td>
                                <td> <input type="" name="ImageLink" size="50" maxlength="128" value="<%=vImageLink%>"  /><br />
                                	<i> \images\covers\somecover.jpg </i></td>
                            </tr>
                            <% End if %>
                            <tr>
                            	<td> Department:  </td>
								<td>
	                                <% n = 1 
									Do While Not rsDept.Eof 
										vDeptName = rsDept("Department")
										vDeptID = rsDept("EntryID")
										vDeptCheckName = "Dept" & vDeptID
'response.Write(arrDept(0,n) & " - " & arrDept(2,n) & "<br />")
										%>
                                    	<input type="checkbox" name="<%=vDeptCheckName%>" value="<%=vDeptID%>" <%=arrDept(2,n)%> /> <%=vDeptName%> <br />
                                    <% n = n + 1 
									rsDept.movenext
									Loop %>
                               </td>
                            </tr>
                            <tr>
                            	<td> Categories:  </td>
                                <td>
                                	<% n = 1 
									Do While Not rsCats.Eof
										vCatName = rsCats("Category")
										vCatID = rsCats("EntryID")
										vCatCheckName = "Cat" & vCatID
										%>
                                    	<input type="checkbox" name="<%=vCatCheckName%>" value="<%=vCatID%>" <%=arrCats(2,n)%> /> <%=vCatName%> <br />
                                    <%  n = n + 1 
									rsCats.movenext
									Loop %>

                                 </td>
                            </tr>                                                                                                                                       
                            <tr>
                            	<td colspan="2" align="center"> <input type="submit" name="PubsMaint" value="Submit New Publication or Changes"  /></td>
                            </tr>
							</form>
							<tr><td colspan="2">&nbsp;</td></tr>
							<tr><td ><a href="logout.asp">Log Out</a></td><td ><a href="menu.asp">Menu</a></td></tr>
							<tr><td colspan="2">&nbsp;</td></tr>
							</table>

	
		</div><!--  END OF CONTENT -->
    <%
	'  what is wrong here
	

	End if
	%>
 <footer>
    <p>This footer contains the declaration position:relative; to give Internet Explorer 6 hasLayout for the footer and cause it to clear correctly. If you're not required to support IE6, you may remove it.</p>
    <address>
      Address Content
    </address>
  </footer>
  <!-- end .container --></div>
</body>
</html>