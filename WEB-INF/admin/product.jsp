<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<jsp:useBean id="product" class="models.ValidationProduct" scope="request" />
<%!
	public String getError(Object res){
		
		return (res!=null)?(String)res:"";
	}

%>  
<!DOCTYPE html>
<html>
	<head>
			<jsp:include page="common/head.jsp"/>
			<script src="../javascript/product.js"></script>
			<script src="../javascript/navBar.js"></script>
			<script> 
				window.onload = function(e){ 
					startProduct();
				}
			</script>
	</head>

	<body>
	
			<jsp:include page="common/navbar.jsp"/>
			<br>
			<br>	
			<section class="sectionbox" style="max-width:600px">
				<form action="ProductUpdate" method="post" >
					<fieldset>
						<h1 class="title"> Prodotto</h1>
						<ol>
							<li>
								<input class="input-text littlerow" name="id" placeholder="id" type="text" value="${product.id}" required/>
								<input class="input-text bigrow" name="nome" style="float: right;" placeholder="nome" type="text" value="${product.name}" required/>
							</li>
							<%=getError(request.getAttribute("id"))%>
							<%=getError(request.getAttribute("nome"))%>
							
							<li style="height: 78px">		
								<textarea class="fillrow" name="descrizione" placeholder="descrizione" required >${product.description}</textarea>
							</li>
							<%=getError(request.getAttribute("descrizione"))%>
							<li>		
								<input class="input-text midrow-r" name="prezzo-vendita" placeholder="prezzo vendita" type="text" value="${product.sellingPrice}" required/>
								<input class="input-text midrow-l" name="prezzo-acquisto" placeholder="prezzo acquisto" type="text" value="${product.purchasePrice}" required/>
							</li>
							<%=getError(request.getAttribute("prezzo-vendita"))%>
							<%=getError(request.getAttribute("prezzo-acquisto"))%>
							<li class="remark">		
								<div class='littleLineBlock'>
									<label>Quantità : </label>
									<input type="number" class="amount" name="quantita" min="1" value="${product.amount}" style="margin-right:6px" onchange="setAmount(1,this.value);" required>
								</div>
								<div class='littleLineBlock'>
									<label>Scorta minima:</label>
									<input type="number" class="amount" name="quantita-min" min="1" value="${product.minStock}" required>
								</div>
							</li>
							<%=getError(request.getAttribute("quantita"))%>
							<%=getError(request.getAttribute("quantita-min"))%>
						</ol>
						<h4>Immagini</h4>
						<div class="graybox">
						<ol>
							<li>		
								<input class="input-text fillrow" name="immagine1" placeholder="immagine1" value="${product.images[0]}" type="text"/>
							</li>
							<%=getError(request.getAttribute("immagine1"))%>
							<li>		
								<input class="input-text fillrow" name="immagine2" placeholder="immagine2" value="${product.images[1]}" type="text"/>
							</li>
							<%=getError(request.getAttribute("immagine2"))%>
							<li>		
								<input class="input-text fillrow" name="immagine3" placeholder="immagine3" value="${product.images[2]}" type="text"/>
							</li>
							<%=getError(request.getAttribute("immagine3"))%>
							<li>		
								<input class="input-text fillrow" name="immagine4" placeholder="immagine4" value="${product.images[3]}" type="text"/>
							</li>
							<%=getError(request.getAttribute("immagine4"))%>
							
						</ol>
						</div>
						<input type="submit" class="myButton mySubmit" value="Carica Prodotto" > 	
						
					</fieldset>
					<br>
				</form>
			</section>
				
			<jsp:include page="common/footer.jsp"/>

	</body>

</html>