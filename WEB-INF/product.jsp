<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<jsp:useBean id="product" class="models.Product" scope="request" />
<%!

	public String getError(Object res){
		
		return (res!=null)?(String)res:"";
	}
%>   
<!DOCTYPE html>
<html>
	<head>
			<jsp:include page="common/head.jsp"/>
			<script src="javascript/navBar.js"></script>
			<script src="javascript/gallery.js"></script>
			<script src="javascript/cart.js"></script>
			
			<script> 
				window.onload = function(e){ 
					startGallery();
					startNavBar();
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
			
			<aside class="gallery">
				<div style="text-align:center">
					<img id ="view" src="img/prodotto1.jpg" style="width: 80%" alt="formaggio"/>
				</div>
				<div class="gallery" id="images">
					<% String[] images = product.getImages();%>
					<a class="thumbnail" onclick="javascript:setImage(0)"><img src=<%="'img/"+images[0]+"'" %> style ="width: 100%;" alt="thumb1"/></a>
					<a class="thumbnail" onclick="javascript:setImage(1)"><img src=<%="'img/"+images[1]+"'" %> style ="width: 100%;" alt="thumb2"/></a>
					<a class="thumbnail" onclick="javascript:setImage(2)"><img src=<%="'img/"+images[2]+"'" %> style ="width: 100%;" alt="thumb3"/></a>
					<a class="thumbnail" onclick="javascript:setImage(3)"><img src=<%="'img/"+images[3]+"'" %> style ="width: 100%;" alt="thumb4"/></a>
				</div>
				<br>
				<p>
					<jsp:getProperty name="product" property="description" />
				</p>
				<h4>EUR <%=String.format("%.2f", product.getSellingPrice())%></h4>
				
				<div class="buyProduct">
					<div>
						<label>Quantit&agrave; :</label>
						<% 
							int amount = 1;
							String extraClass="";
						
							if(product!=null && product.getAmount() == 0){
								amount = 0;
								extraClass = "disabled";
							}
							
						%>
						<input type='number' class='amount' name="amount" id='amount' min='<%=amount %>' max='${product.amount}' value='<%=amount %>' /> 
					</div>
					<a onclick=<%=(amount==0)?"''":"'addToCart("+product.getId()+")'"%> class="myButton <%=extraClass%>">Aggiungi al carrello</a>
				</div>
				
			</aside>
			
			<aside class="features">
				<table style="width:100%">
					<tr>
							<th colspan=3>Generale</th>
					</tr>
					<tr>
							<td>Peso</td>
							<td>kg</td>
							<td>40</td>
					</tr>
					<tr>
							<td>Stagionatura media</td>
							<td>mesi</td>
							<td>12</td>
					</tr>
					<tr>
							<th colspan=3>Caratteristiche nutrizionali</th>
					</tr>  
					<tr>
							<td>Umidità</td>
							<td>g</td>
							<td>31,4</td>
					</tr>
					<tr >
							<td>Proteine</td>
							<td>g</td>
							<td>32,4</td>
					</tr>
					<tr>
							<td>Amminoacidi liberi su proteina total</td>
							<td>%</td>
							<td>23,3</td>
					</tr>
							<tr>
							<td>Energia</td>
							<td>kcal<br>kJ</td>
							<td>402<br>1671</td>
					</tr>
							<tr>
							<td>Grassi</td>
							<td>g</td>
							<td>29,7</td>
					</tr>
					<tr>
							<td>Acidi grassi saturi</td>
							<td>g</td>
							<td>19,6</td>
					</tr>
					<tr>
							<td>Acidi grassi monoinsaturi</td>
							<td>g</td>
							<td>9,3</td>
					</tr>
					<tr>
							<td>Acidi grassi polinsaturi</td>
							<td>g</td>
							<td>0,8</td>
					</tr>
					<tr>
							<td>Grassi sulla sostanza secca</td>
							<td>% s.s.</td>
							<td>43,3</td>
					</tr>
							<tr>
							<td>Carboidrati</td>
							<td>g</td>
							<td>0</td>
					</tr>
							<tr>
							<td>di cui zuccheri</td>
							<td>g</td>
							<td>0</td>
					</tr>
							<tr>
							<td>Lattosio</td>
							<td>mg</td>
							<td>&lt;1</td>
					</tr>
							<tr>
							<td>Fibre</td>
							<td>g</td>
							<td>0</td>
					</tr>
							<tr>
							<td>Sale</td>
							<td>g</td>
							<td>1,6</td>
					</tr>
							<tr>
							<td>Acido lattico</td>
							<td>g</td>
							<td>1,6</td>
					</tr>
							<tr>
							<td>Calcio</td>
							<td>mg</td>
							<td>1155</td>
					</tr>
							<tr>
							<td>Fosforo</td>
							<td>mg</td>
							<td>691</td>
					</tr>
							<tr>
							<td>Sodio</td>
							<td>mg</td>
							<td>650</td>
					</tr>
							<tr>
							<td>Potassio</td>
							<td>mg</td>
							<td>100</td>
					</tr>
							<tr>
							<td>Magnesio</td>
							<td>mg</td>
							<td>43</td>
					</tr>
							<tr>
							<td>Ferro</td>
							<td>mg</td>
							<td>0,2</td>
					</tr>
							<tr>
							<td>Zinco</td>
							<td>mg</td>
							<td>4</td>
					</tr>
							<tr>
							<td>Colesterolo</td>
							<td>mg</td>
							<td>83</td>
					</tr>
							<tr>
							<td>Vitamina A</td>
							<td>µg</td>
							<td>430</td>
					</tr>
							<tr>
							<td>Tiammina (Vit. B1)</td>
							<td>mg</td>
							<td>0,03</td>
					</tr>
							<tr>
							<td>Riboflavina (Vit. B2)</td>
							<td>mg</td>
							<td>0,35</td>
					</tr>
					<tr>
							<td>Vitamina B6</td>
							<td>mg</td>
							<td>0,060</td>
					</tr>
					<tr>
							<td>Vitamina B12</td>
							<td>µg</td>
							<td>1,7</td>
					</tr>
					<tr>
							<td>Vitamina C</td>
							<td>mg</td>
							<td>0</td>
					</tr>
					<tr>
							<td>Niacina (Vit. PP/B3)</td>
							<td>mg</td>
							<td>0,06</td>
					</tr>
					<tr>
							<td>Vitamina E</td>
							<td>mg</td>
							<td>0,55</td>
					</tr>
					<tr>
							<td>Vitamina K</td>
							<td>µg</td>
							<td>1,6</td>
					</tr>
					<tr>
							<td>Acido pantotenico (Vit. B5)</td>
							<td>mg</td>
							<td>0,320</td>
					</tr>
					<tr>
							<td>Colina</td>
							<td>mg</td>
							<td>40</td>
					</tr>
					<tr>
							<td>Biotina</td>
							<td>µg</td>
							<td>23</td>
					</tr>
				</table>
				
				<br>
				<br>
			</aside>
				
			<jsp:include page="common/footer.jsp"/>

	</body>

</html>