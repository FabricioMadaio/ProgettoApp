<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>

<jsp:useBean id="user" class="models.User" scope="session" />
<header>
	<a href="javascript:toHome()">
		<img src="../img/logo.png" class="logo" alt="CheesE-Commerce"/>
	</a>
</header>

<nav>
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
						<a  href="product"> Nuovo Prodotto </a>
					</li>
					<li>
						<a href = "users"> Utenti </a>
					</li>
					<li>
						<a href="database"> Database </a>
					</li>
				</ul>
			  </div>
			
		</li>
		
		<li class = "fullmenu">
			<a href="product"> Nuovo Prodotto </a>
		</li>
		<li class = "fullmenu">
			<a href = "users"> Utenti </a>
		</li>
		<li class = "fullmenu">
			<a href="database"> Database </a>
		</li>
		
		<li style="float:right;overflow:hidden;">
			<a href="javascript:toHome();" class="menubutton">
				<img src="../img/home.png" style="width: 26px;" alt="Home"/>
			</a>
		</li>
		
		<li class="login-dropdown">
			<a id="loginButton" onclick="loginForm();" >Benvenuto ${user.name}! </a>
			<div class="login-content" onclick="blockReset();">
				<form class="form" id="formLogout" action="logout" >
					 <input type="submit" class="submit" value="Logout" style="padding: 8px;"> 	
				</form>
			</div>
		</li>
		
	</ul>
</nav>