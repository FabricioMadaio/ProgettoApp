<!DOCTYPE html>
<html>
	<head>
			<jsp:include page="common/head.jsp"/>
			<script src="javascript/navBar.js"></script>
			<script src="javascript/cart.js"></script>
			
			<script> 
				window.onload = function(e){ 
					startNavBar();
					startCart();
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
			</nav>
			
			<section>
				<table class="alternate">
					<tbody id="cartTable">
					</tbody>
				</table>
				<h2 id="totale">Totale:</h2>
				<div class = "buy" style="padding-bottom:35px">
					<form action="CartCheckout">
						<input type="submit" class="myButton" value="Acquista tutto">
					</form>
				</div>
			</section>
			
			<jsp:include page="common/footer.jsp"></jsp:include>
	</body>

</html>