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
			<link rel="stylesheet" type="text/css" href="../css/singup.css">

			<script src="../javascript/utils.js"></script>
			<script src="../javascript/common/modal.js"></script>
			<script src="../javascript/showcase.js"></script>
			<script src="../javascript/navBar.js"></script>
			<script src="../javascript/ImageUploader.js"></script>
			
			<script> 
				window.onload = function(e){ 
					startNavBar();
					startShowcase();
					
					var uploader = new ImageUploader({
						inputElement : document.getElementById('inputImage'),
						uploadUrl : 'ItemControl.php',
						onProgress : function(event) {
							//$('#progress').text('Completed '+event.done+' files of '+event.total+' total.');
							//$('#progressbar').progressbar({ value: (event.done / event.total) * 100 })
						},
						onFileComplete : function(event, file) {
							//$('#fileProgress').append('Finished file '+file.fileName+' with response from server '+event.target.status+'<br />');    
						},
						onComplete : function(event) {
							//$('#progress').text('Completed all '+event.done+' files!');
							//$('#progressbar').progressbar({ value: (event.done / event.total) * 100 })
						},
						maxWidth: 100,
						quality: 0.90, 
						//timeout: 5000,
						debug : true
					});
					
					var m = new Modal("myModal",{
						onOpen: function(){uploader.tryUpload();}
					});
					
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
						
							<p>Inserisci un nome per il tuo inventario</p>
							<input type="text" class="input-text fillrow"/>
							<br>
							<br>
					</div>
					
					<div class="modal-footer">
							<input type="submit" class="submit submitRightButton" value="Conferma"/>
					</div>
					
				</form>
			  </div>
			 </div>
			  <!-- Modal test End -->
			
			<br>
		
			<section class="sectionbox" style="max-width:800px;text-align: center;">
				
				<form class="form" id="formNew" action="" method="POST" enctype="multipart/form-data">
					<br>
					<div class="productImageContainer">
						<img src="../img/prodotto1.jpg" id="previewImage" class="productImage" alt="Product" />
						<input type="file" id="inputImage" class="inputImage" onchange="loadPreview(this)" name="image">
					</div>
					
					<br>
					<fieldset>
						<ol>
							<li>
								<input class="input-text bigrow" name="nome" style="float: left;" placeholder="Nome" type="text" value="" required="">
							</li>
							
							<li style="height: 128px">		
								<textarea class="fillrow" style="height: 128px" name="descrizione" placeholder="Descrizione" required=""></textarea>
							</li>
							<li style="margin-top: 9px;height: auto;">		
								<input type="submit" class="submit submitRightButton myModal_open" value="Carica">
							</li>
						</ol>
					</fieldset>
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

</html>