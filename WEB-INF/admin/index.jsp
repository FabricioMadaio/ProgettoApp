<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
	<head>
			<jsp:include page="common/head.jsp"/>
			<script src="../javascript/catalogo.js"></script>
			<script src="../javascript/navBar.js"></script>
			<script> 
				window.onload = function(e){ 
					startNavBar();
					startCatalog();
				}
			</script>
	</head>

	<body>
	
			<header>
				<a href="javascript:toClientHome()">
					<img src="../img/logo.png" class="logo" alt="CheesE-Commerce" />
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
					
					<li class="login-dropdown">
						<a id="loginButton" onclick="loginForm();" >Benvenuto ${user.name}! </a>
						<div class="login-content" onclick="blockReset();">
							<form class="form" id="formLogout" action="logout" >
								 <input type="submit" class="submit" value="Logout" style="padding: 8px;"> 	
							</form>
						</div>
					</li>
					
				</ul>
				<ul class="searchBar">
					
					<li class="search">
						<div style="margin-left: 12px;">
						<div class="search">
							<a class="search">
								<img src="../img/search.png" class="product-preview" alt="formaggio" />
							</a>
							<div style="overflow: hidden;">
								<input class="search" id="ricerca" onchange="startCatalog()" placeholder="Cerca" type="text" required>
							</div>
						</div>
						</div>
					</li>
					
					<li class="search-settings">
						<div>
							<p>Ordina per:</p>
						</div>
					
						<div>
							<select id="ordinamento" class="search-settings" onchange="startCatalog()" style="font-size: 13px;">
								<option value="DESC">Prezzo decrescente</option>
								<option value="ASC">Prezzo crescente</option>
							</select>
						</div>
					</li>
					<li class="search-settings">
						<div>
							<p>Prezzo da:</p>
						</div>
						<div style="margin:8px">
							<select id="inizioFascia" class="number" onchange="startCatalog()">
								<option value=""></option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="4">4</option>
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="40">40</option>
								<option value="50">50</option>
							</select>
							<span>a:</span>
							<select id="fineFascia" class="number"  onchange="startCatalog()">
								<option value=""></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="4">4</option>
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="40">40</option>
								<option value="50">50</option>
							</select>
						</div>
					</li>
					<li class="search-settings" id="esaurimento" style="display:none">
						<div>
							<p style="color: red">*In esaurimento*:</p>
						</div>
					
						<div>
							<input type="checkbox" id="checkStock" onchange="startCatalog()" style="margin-top: 18px;"/>
						</div>
					</li>
				</ul>
			</nav>
			
			<section>
				<table class="alternate" id="catalogTable">
				</table>
				  <p id="noElements">
				  		Non sono presenti elementi nel catalogo, aggiungere nuovi elementi dalla schermata 
				  		<a href="database">Database</a> oppure da <a href="nuovoProdotto">Nuovo Prodotto</a>
				   </p>
				<br>
			</section>
				
			<jsp:include page="common/footer.jsp"/>

	</body>

</html>