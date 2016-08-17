<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>

<jsp:useBean id="user" class="models.User" scope="session" />
<li class="login-dropdown">
	<a id="loginButton" onclick="loginForm();">
		<%if(user.getName()==null){%>
			Login 
		<%}else{%>
			Benvenuto ${user.name}!
		<%}%>
	</a>
	<div class="login-content" onclick="blockReset();">
	  
		<%Object login = session.getAttribute("login"); %>
		<%if(login==null || login.equals("fail")){%>
			<form class="form" id="formLogin" action="login" method="POST">
				<input class="input-text fillrow" name="username" id="username" type="text" placeholder="Username" style="margin-bottom: 3px;" required> 
				<input class="input-text fillrow" name="password" id="password" type="password" placeholder="Password" style="margin-bottom: 14px;" required>
				<%if(login!=null && login.equals("fail")){%>
					<div class='error-li' style='display:block;margin-bottom: 0px;'>
						<p>username e/o password errati</p>
					</div>
				<%}%>
				<br>
				<input type="submit" class="submit" value="Login" style="padding: 8px;">
			
			</form>
		<%}%> 	
		<%if(user.getUsername()!=null){%>
			<form class="form" id="formLogout" action="logout">
				 <input type="submit" class="submit" value="Logout" style="padding: 8px;"> 	
			</form>
		<%}%>
	</div>
</li>