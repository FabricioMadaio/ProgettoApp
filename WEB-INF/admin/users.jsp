<%@page import="models.User"%>
<%@page import="database.Database"%>
<%@page import="database.DatabaseUser"%>
<%@page import="java.util.ArrayList"%>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<%! 

	private String userElement(User user){
		String purchasePage = "purchases?user="+user.getUsername();
		String makeAdminPage = "makeAdmin?user="+user.getUsername();
		String banAdminPage = "banAdmin?user="+user.getUsername();
		
		String element = "<tr><td><h4 style='float:left'>"+user.getUsername()+"</h4>"+
				"<a href="+purchasePage+" class='myButton adminCButton'"+ 
				"style='float: right;margin-left: 15px;'>Acquisti</a>";
				if(user.getName()==null){
					element+="<a href="+makeAdminPage+" class='myButton adminCButton'"+ 
					"style='float: right;margin-left: 15px;'>Rendi Admin</a>";
				}else{
					element+="<a href="+banAdminPage+" class='myButton adminCButton'"+ 
							"style='float: right;margin-left: 15px;background-color:red'>Rendi Utente</a>";
				}
				element+="</td></tr>";
		
		return element;
	}

	public String usersTable(){
		String table = "";
		Database db = new Database();
		try{
			db.open();
			ArrayList<User> users = DatabaseUser.getUserAdmins(db);
			for(User u:users)
				table+=userElement(u);
			db.close();
		} catch (java.sql.SQLException e) {
			e.printStackTrace();
			return "";
		}
		return table;
	}
%>
<!DOCTYPE html>
<html>
	<head>
			<jsp:include page="common/head.jsp"/>
			<script src="../javascript/navBar.js"></script>
			<script> 
				window.onload = function(e){ 
					startNavBar();
				}
			</script>
	</head>

	<body>
			
			<jsp:include page="common/navbar.jsp"/>
			<section>
				<table class="alternate">
					<%=usersTable()%>
				</table>
				<br>
			</section>
				
			<jsp:include page="common/footer.jsp"/>

	</body>

</html>