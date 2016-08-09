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
				}
			</script>
	</head>

	<body>
	
			<jsp:include page="common/navbar.jsp"/>
			<br>
			<br>	
			<section class="sectionbox" style="max-width:800px">
				
					<fieldset>
						<h1 class="title"> Database Import/Export</h1>
						<ol class="databaseIO">
							<li>
								<p>Inserisci un file XML con la lista dei prodotti da importare</p>
								<form action="DatabaseImport" method="post" enctype="multipart/form-data">
									<div class="fileUploadInput">	
										<input class="input-text fillrow" id="file-text" placeholder="Scegli file" type="text" disabled="disabled" >
									</div>
									<div class="myButton fileUpload">
									    <span>Browse..</span>
									    <input type="file" class="upload" onchange="updateInputFile(this,'file-text')" name="file"/>
									</div>
									<br>
									<input type="submit" class="myButton mySubmit" value="Upload" > 	
								</form>
								<br>
							</li>
							<li>
								<p>Scarica un file XML con la lista dei prodotti nel catalogo</p>
								<a href="DatabaseDownload" class="myButton" style="margin:0px;">Download</a>
							</li>
							
						</ol>
						
						<br>
						
						<div class="graybox">
							<form action="DatabaseCreation" method="GET">
								<h4>Crea un nuovo database se non è ancora stato creato</h4>
								<input type="submit" class="myButton mySubmit" value="Crea Database" > 	
							</form>
						</div>
					</fieldset>
					<br>
				
			</section>
				
			<jsp:include page="common/footer.jsp"/>

	</body>

</html>