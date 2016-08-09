<%@page import="models.User"%>
<%@page import="models.Product"%>
<%@page import="models.Purchase"%>
<%@page import="database.Database"%>
<%@page import="database.DatabasePurchase"%>
<%@page import="java.util.ArrayList"%>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<%! 

	public String purchaseElement(Purchase p){
	
		float total = 0;
		String element = "<tr><td>"+
			"<div style='width: 100%;display: inline-block;'>"+
			"<h4 style='float:right'>Data: "+p.getDate()+"</h4>" +
			"<h4 style='float:left'>Codice acquisto: "+p.getId_purchase()+"</h4></div>";
			for(Product pr:p.getPurchases()){
				
				float subtotal = pr.getSellingPrice()*pr.getAmount();
				total += subtotal;
				
				element+="<p>"+
							pr.getName()+
							" : "+pr.getAmount()+
							" x "+pr.getSellingPrice()+
							"&euro; = "+subtotal+
						"&euro;</p>";
			}
			
		element+="<h4 style='float:left'>Totale: "+total+"&euro;</h4></td></tr>";
	
	return element;
	}

	public String purchaseTable(String username){
		String table = "";
		Database db = new Database();
		try{
			db.open();
			ArrayList<Purchase> purchases = DatabasePurchase.getUserPurchases(db,username);
			for(Purchase p:purchases)
				table+=purchaseElement(p);
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
					<%
						Object u = request.getParameter("user");
						if(u!=null){
							out.println("<tr><td><h2>Aquisti Utente "+(String)u+"</h2></td></tr>");
							out.println(purchaseTable((String)u));
						}
					%>
				</table>
				<br>
			</section>
				
			<jsp:include page="common/footer.jsp"/>

	</body>

</html>