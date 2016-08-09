<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
	<head>
			<jsp:include page="common/head.jsp"/>
			<script src="javascript/showcase.js"></script>
			<script src="javascript/navBar.js"></script>
			<script> 
				window.onload = function(e){ 
					startNavBar();
					startShowcase();
				}
			</script>
	</head>

	<body>
	
			<header>
				<a href="javascript:toHome()">
					<img src="img/logo.png" class="logo" alt="CheesE-Commerce" />
				</a>
			</header>
			
			<nav>

				<jsp:include page="common/navbar.jsp"></jsp:include>
				
				<ul class="searchBar">
					
					<li class="search">
						<div style="margin-left: 12px;">
						<div class="search">
							<a class="search">
								<img src="img/search.png" class="product-preview" alt="formaggio" />
							</a>
							<div style="overflow: hidden;">
								<input class="search" id="ricerca" onchange="startShowcase()" placeholder="Cerca" type="text" required>
							</div>
						</div>
						</div>
					</li>
					
					<li class="search-settings">
						<div>
							<p>Ordina per:</p>
						</div>
					
						<div>
							<select id="ordinamento" class="search-settings" onchange="startShowcase()" style="font-size: 13px;">
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
							<select id="inizioFascia" class="number" onchange="startShowcase()">
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
							<select id="fineFascia" class="number"  onchange="startShowcase()">
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
				</ul>
			</nav>
			
			<section>
				<table class="alternate" id="catalogTable">
				  
				</table>
				<br>
			</section>
				
			<jsp:include page="common/footer.jsp"></jsp:include>

	</body>

</html>