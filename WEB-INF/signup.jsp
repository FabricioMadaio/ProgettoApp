<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<jsp:useBean id="user" class="models.User" scope="request" />
<%!

	public String getError(Object res){
		
		return (res!=null)?(String)res:"";
	}

	public String getChecked(boolean val){
		return (val)?"checked":"";
	}
	
	public String getVisible(boolean val){
		return (val)?"block":"none";
	}
%>  

<%
	// controllo sulla visualizzazione del tipo di pagamento
	String iban = "";
	String numCard = "";
	String expire = "";
	boolean ibanSelected = true;
	
	String payType = user.getPaymentType();
	
	if(payType!=null){
		if(payType.equals("iban")){
			iban =((models.payment.IbanPayment)user.getPayment()).getIban();
		}else{
			models.payment.CardPayment card =(models.payment.CardPayment)user.getPayment();
			numCard = card.getCode();
			expire = card.getExpiration();
			ibanSelected = false;
		}
	}
%>  

<!DOCTYPE html>
<html>
	<head>
			<jsp:include page="common/head.jsp"/>
			<script src="javascript/singup.js"></script>
			<script src="javascript/comuni.js"></script>
			
			<script>
				window.onload = function(){
					initSignup();
					
					<%if(user.getComune()!=null){%>
						initComuni("<%=user.getComune().getName()%>",
								"<%=user.getComune().getProvincia().getName()%>");
					<%}else{%>
						initComuni();
					<%}%>
				}
			</script>
	</head>

	<body style="text-align:center">
	
			<header>
				<a href="javascript:toHome()">
					<img src="img/logo.png" class="logo" alt="CheesE-Commerce" />
				</a>
			</header>
			
			<section class="sectionbox">
				<h1 class="title"> Registrazione </h1>
				<form action="UserSignup" method="post">
					<fieldset>
						<ol>
							<% 
								Object error = request.getAttribute("nome");
								if(error=="")
									error = request.getAttribute("cognome");
							%>
							<li>
								<input class="input-text midrow-l" name="nome" placeholder="Nome" type="text" value="${user.name}" required autofocus="autofocus">
								<input class="input-text midrow-r" name="cognome" placeholder="Cognome" value="${user.surname}" type="text" required>
							</li>
							<%=getError(error)%>
							<li>
								<input class="input-text fillrow" name="username" placeholder="Username" value="${user.username}" type="text" required >
							</li>
							<%=getError(request.getAttribute("username"))%>
							<li>
								<input class="input-text fillrow" name="password" placeholder="Password" value="${user.password}" type="password" required>
							</li>
							<%=getError(request.getAttribute("password"))%>
							<li>
								<div style="display: inline-block;width: 100%;">
								
									<label class="littlerow">Data di nascita</label>
									<input class="bigrow" type="date" name="bday" value="${user.birthdate}" required >
									
								 </div>
							</li>
							<%=getError(request.getAttribute("bday"))%>
							<li>
								<input class="input-text fillrow" name="residenza" placeholder="Residenza" value="${user.residence}" type="text" required>
							</li>
							<%=getError(request.getAttribute("residenza"))%>
							<li>
								<select id="provincia" name='provincia' class="midrow-l" onchange="requestComuni(this.value)" required>
								</select>
								<select id="comune" name='comune' class="midrow-r" required>
								</select>
							</li>
							<li>
								<input class="input-text fillrow" name="cf" placeholder="CF" value="${user.cf}" type="text">
							</li>
							<%=getError(request.getAttribute("cf"))%>
							<li>
								<input class="input-text fillrow" name="indirizzo-spedizioni" placeholder="Indirizzo Spedizioni" value="${user.address}" type="text">
							</li>
							<%=getError(request.getAttribute("indirizzo-spedizioni"))%>
						</ol>
						
						<h4>Metodo di Pagamento</h4>
						
						<div class="graybox">
							<input type="radio" name="pagamento" value="iban" onclick="updateSelection(this)" <%=getChecked(ibanSelected)%> ><label> IBAN</label>
							<input type="radio" name="pagamento" value="carta" onclick="updateSelection(this)" <%=getChecked(!ibanSelected)%>><label>Carta di credito</label>
							<br>
							<div id="ibanForm" style="display:<%=getVisible(ibanSelected)%>">
								<ol>
									<li>
									
										<input class="input-text fillrow" name="bonifico" placeholder="Codice bonifico" value="<%= iban %>" type="text">
									</li>
									<%=getError(request.getAttribute("bonifico"))%>
								</ol>
							</div>
							<div id="creditForm" style="display:<%=getVisible(!ibanSelected)%>">
								<ol>
									<li>
										<input class="input-text fillrow" name="numero-carta" placeholder="Numero carta" value="<%= numCard %>" type="text">
									</li>
									
									<%=getError(request.getAttribute("numeroCarta"))%>
									<li>	
										<label class="littlerow">Scadenza</label>
										<input class="input-text bigrow" name="scadenza" type="month" value="<%= expire %>">
									</li>
									<%=getError(request.getAttribute("scadenza"))%>
								</ol>
							</div>
						</div>
						
						<br>
						<br>
						<input type="submit" class="submit" value="Registrati" > 	
						
					</fieldset>
					<br>
				</form>
			</section>

	</body>

</html>