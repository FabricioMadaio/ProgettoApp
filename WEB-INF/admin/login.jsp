<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<%!

	public String getError(Object res){
		
		return (res!=null)?(String)res:"";
	}
%>    
<!DOCTYPE html>
<html>
	<head>
			<jsp:include page="common/head.jsp"/>
			<script src="../javascript/singup.js"></script>
			<script src="../javascript/comuni.js"></script>
			
			<script>
				window.onload = function(){
					initSignup();
				}
			</script>
	</head>

	<body style="text-align:center">
	
			<header>
				<a href="javascript:toClientHome()">
					<img src="../img/logo.png" class="logo" alt="CheesE-Commerce" />
				</a>
			</header>
			
			<br>
			<br>
			
			<section class="sectionbox">
				<h1 class="title"> Login Gestore </h1>
				<form action="login" method="post">
					<fieldset>
						<ol>
							<li>
								<input class="input-text fillrow" name="username" placeholder="Username" type="text" required >
							</li>
							<li>
								<input class="input-text fillrow" name="password" placeholder="Password" type="password" required>
							</li>
							<%=getError(request.getAttribute("login_attempt"))%>
							
						</ol>
						
						<br>
						<br>
						<input type="submit" class="submit" value="Login" > 	
						
					</fieldset>
					<br>
				</form>
			</section>

	</body>

</html>