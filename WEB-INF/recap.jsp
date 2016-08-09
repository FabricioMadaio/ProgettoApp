<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<jsp:useBean id="user" class="models.User" scope="request" />
<!DOCTYPE html>
<html>
	<head>
			<jsp:include page="common/head.jsp"/>
	</head>

	<body style="text-align:center">
	
			<header>
				<a href="javascript:toHome()">
					<img src="img/logo.png" class="logo" alt="CheesE-Commerce" />
				</a>
			</header>
			
			<section class="sectionbox">
				<h1 class="title"> I tuoi dati </h1>

				<fieldset>
				
					<table id="dataList">
						<tr>
							<td style='font-weight: bold;'>Nome:</td>
							<td>
								<jsp:getProperty name="user" property="name" />
							</td>
						</tr>
						<tr>
							<td style='font-weight: bold;'>Cognome:</td>
							<td>
								<jsp:getProperty name="user" property="surname" />
							</td>
						</tr>
						<tr>
							<td style='font-weight: bold;'>Username:</td>
							<td>
								<jsp:getProperty name="user" property="username" />
							</td>
						</tr>
						<tr>
							<td style='font-weight: bold;'>Password:</td>
							<td>
								<jsp:getProperty name="user" property="password" />
							</td>
						</tr>
						<tr>
							<td style='font-weight: bold;'>Data di Nascita:</td>
							<td>
								<jsp:getProperty name="user" property="birthdate" />
							</td>
						</tr>
						<tr>
							<td style='font-weight: bold;'>Residenza:</td>
							<td>
								<jsp:getProperty name="user" property="residence" />
							</td>
						</tr>
						<tr>
							<td style='font-weight: bold;'>Provincia:</td>
							<td>
								<%=user.getComune().getName()%>
							</td>
						</tr>
						<tr>
							<td style='font-weight: bold;'>Comune:</td>
							<td>
								<%=user.getComune().getProvincia().getName()%>
							</td>
						</tr>
						<tr>
							<td style='font-weight: bold;'>C.F:</td>
							<td>
								<jsp:getProperty name="user" property="cf" />
							</td>
						</tr>
						<tr>
							<td style='font-weight: bold;'>Indirizzo spedizioni:</td>
							<td>
								<jsp:getProperty name="user" property="address" />
							</td>
						</tr>
						<tr>
							<td style='font-weight: bold;'>Pagamento:</td>
							<td>
								<jsp:getProperty name="user" property="paymentType" />
							</td>
						</tr>
						<% if(user.getPaymentType()!=null){ %>
						<% if(user.getPaymentType().equals("iban")){ %>
						<tr>
							<td style='font-weight: bold;'>Iban:</td>
							<td>
								<% out.println(((models.payment.IbanPayment)user.getPayment()).getIban());%>
							</td>
						</tr>	
						<% }else{ %>
						<tr>
							<td style='font-weight: bold;'>Carta di credito:</td>
							<td>
								<%models.payment.CardPayment pay = (models.payment.CardPayment)user.getPayment();%>
								<%=pay.getCode()%>
							</td>
						</tr>
						<tr>
							<td style='font-weight: bold;'>Scadenza:</td>
							<td>
								<%=pay.getExpiration()%>
							</td>
						</tr>
						<%}} %>
					</table>
		
					<br>
					<a href="javascript:toHome()">
						<input type="submit" class="submit" onclick="toHome()" value="Vai alla Home" > 
					</a>
				</fieldset>
				<br>
			</section>

	</body>

</html>