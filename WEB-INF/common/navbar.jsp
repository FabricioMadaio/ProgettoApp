<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<ul>
	<li class="menu-dropdown">
		
			<div class="menu-icon" onclick="menuMobile();">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</div>
			
			<div class="menu-content" onclick="blockReset();">
			<ul>
				<li>
					<a  href="javascript:toHome()"> Prodotti </a>
				</li>
				<li>
					<a href = "UserCart"> Carrello </a>
				</li>
				<li>
					<a href="UserSignupForm"> Registrazione </a>
				</li>
			</ul>
		  </div>
		
	</li>
	
	<li class = "fullmenu">
		<a href="javascript:toHome()"> Prodotti </a>
	</li>
	<li class = "fullmenu">
		<a href = "UserCart"> Carrello </a>
	</li>
	<li class = "fullmenu">
		<a href="UserSignupForm"> Registrazione </a>
	</li>
	
	<li style="float:right;overflow:hidden">
		<a href = "UserCart" class="menubutton"><img src="img/cart.png" style="width: 30px;" alt="cart"></a>
	</li>
	
	<jsp:include page="login.jsp"></jsp:include>
	
</ul>