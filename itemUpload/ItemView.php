<!DOCTYPE html>
<html>
	<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width">
			<meta name="description" content="Sito E-Commerce">
			<meta name="keywords" content="HTML,CSS,XML,JavaScript">
			<meta name="author" content="Fabricio Nicolas Madaio">

			<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
			</script>
			<![endif]-->

			<title>Sito E-Commerce	</title>
			<link rel="stylesheet" type="text/css" href="../css/style.css">
			<link rel="stylesheet" type="text/css" href="../css/modal.css">
			<link rel="stylesheet" type="text/css" href="../css/inventoryGrid.css">
			<link rel="stylesheet" type="text/css" href="../css/singup.css">
			
			<script src="../javascript/common/utils.js"></script>
			<script src="../javascript/common/responsiveStylesheet.js"></script>
			<script src="../javascript/common/modal.js"></script>
		
			<script src="../javascript/imageUtils/exif.js"></script>
			<script src="../javascript/imageUtils/ImageUploader.js"></script>
			
			<script src="../javascript/inventoryList.js"></script>
			
			<script> 
				function start(){ 
					/* responsiveness*/
					startStylesheet();
					
					var uploader = new ImageUploader({
						inputElement : document.getElementById('inputImage'),
						uploadUrl : 'ItemUpload.php',
						onProgress : function(event) {
							var value = ((event.currentItemDone / event.currentItemTotal) * 99).toFixed() + "%";
							setProgressBar(value);
						},
						onComplete : function(event,xhr) {
							document.getElementById("response").innerHTML = xhr.response;
							var e = document.getElementById("errorResponse");
							if(e!=null){
								document.getElementById("progressBar").className+=" progressError";
								document.getElementById("progressBar").style.width = "100%";
								document.getElementById("progressValue").innerHTML = "0%";
							}else{
								setProgressBar("100%");
							}
						},
						maxWidth: 150,
						quality: 0.90, 
						//timeout: 5000,
						debug : true
					});
					
					var m = new Modal("myModal",{
						onOpen: function(){
							
								document.getElementById("progressBar").className="progressbar";
								document.getElementById("response").innerHTML = "";
								
								var fd = new FormData();
								fd.append("inventory",<?php echo $inventoryId; ?>);
								fd.append("name", document.getElementById("name").value);
								fd.append("description", document.getElementById("description").value);
	
								uploader.tryUpload(fd);
								setProgressBar("0%");
							},
						onClose: function(){uploader.abortUpload()}
					});
					
					document.openModal = function(){
						m.open();
					}
				}
				
				function setProgressBar(value){
					document.getElementById("progressBar").style.width = value;
					document.getElementById("progressValue").innerHTML = value;
				}
			</script>
			
	</head>

	<body>
	
			<header>
				<a href="javascript:toHome()">
					<img src="../img/LogoFinal.png" class="logo" alt="Company Inventory" />
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
									<a  href="javascript:toHome()"> Prodotti </a>
								</li>
								<li>
									<a href = "UserCart"> Carrello </a>
								</li>
								<li>
									<a href="UserSignupForm"> Registrazione </a>
								</li>
							</ul>
						  </div>
						
					</li>
					
					<li class = "fullmenu">
						<a href="javascript:toHome()"> Prodotti </a>
					</li>
					<li class = "fullmenu">
						<a href = "UserCart"> Carrello </a>
					</li>
					<li class = "fullmenu">
						<a href="UserSignupForm"> Registrazione </a>
					</li>
					
				</ul>
				
			</nav>
			
			<!-- The Modal -->
			<div id="myModal" class="modal">
		
			  <!-- Modal content -->
			  <div class="modal-content">
				<form class="form" id="formNew" action="login" method="POST">
				
					<ul class="modal-header">
						<li style="float:right">
							<a class="myModal_close closeButton">×</a>
						</li>
						<li>
							<p>Caricamento</p>
						</li>
					</ul>
					<div class="modal-body">
						
							<div class="progress-container">
							  <div id="progressBar" class="progressbar" style="width:0%">
							  </div>
							</div>

							<p id="progressValue">0%</p>
							
							<div id="response" style="text-align:center">
								
							</div>
							<br>
					</div>
					
				</form>
			  </div>
			 </div>
			  <!-- Modal test End -->
			
			<br>
		
			<section class="sectionbox" style="max-width:800px;text-align: center;">
				
				<h1 class="title"> Nuovo Prodotto </h1>
				
				<form class="form" id="formNew" action="javascript:document.openModal();" method="POST" style="margin: 3px 2%;">	
					<aside class="left">
						<div class="itemImageContainer">
							<img class="imageSpin" src="../img/spin.gif" id="spin" alt="logo aggiungi prodotto" style="display:none">
							<img src="../img/prodotto1.jpg" id="previewImage" class="itemImage circle" alt="Product" />
							<div class="fileUpload">
								<span>Cambia Immagine</span>
								<input type="file" id="inputImage" class="upload" name="file" accept="image/*">
							</div>
						</div>
					</aside>
					<aside>
						<fieldset>
							<ol class="Item">
								<li>
									<input class="input-text bigrow" id="name" name="nome" style="float: left;" placeholder="Nome" type="text" value="" required="">
								</li>
								
								<li style="height: 153px">		
									<textarea class="fillrow" style="height: 100%;"  id="description" name="descrizione" placeholder="Descrizione" required=""></textarea>
								</li>
								<li style="margin-top: 14px;height: auto;">		
									<input type="submit" class="submit submitRightButton" value="Carica">
								</li>
							</ol>
						</fieldset>
					</aside>
				</form>
			</section>
			
			<br>
			<br>	
			
			<footer style="text-align:center">
				<div class="background">
					<div class="wrapper">
					
						<img src="../img/logoFooter.svg" alt="logo"/>
						<label>
							Copyright @ Webmaster
						</label>
					</div>
				</div>
			</footer>

	</body>
	
	<script>
			start();
	</script>

</html>