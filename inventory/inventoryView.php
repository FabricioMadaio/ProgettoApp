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

			<title>Company inventory</title>
			<link rel="stylesheet" type="text/css" href="../css/style.css">
			<link rel="stylesheet" type="text/css" href="../css/singup.css">
			<link rel="stylesheet" type="text/css" href="../css/inventoryGrid.css">
			<link rel="stylesheet" type="text/css" href="../css/modal.css">


			<script src="../javascript/common/utils.js"></script>
			<script src="../javascript/common/responsiveStylesheet.js"></script>
			<script src="../javascript/common/modal.js"></script>
			<script src="../javascript/inventoryList.js"></script>
			<script src="../javascript/inventoryUtils/inventoryUtils.js"></script>
			
			<script> 
				window.onload = function(e){ 
					/* responsiveness*/
					startStylesheet();
					
					var m = new Modal("myModal",{
						onOpen:null,
						onClose:null
					});
				}
			</script>
	</head>

	<body>
	<?php 
    if(!isset($_SESSION["username"]) && isset($_SESSION["password"]))
    {
    	header('Location:login/');
    }
	 ?>
			<header>
				<a href="javascript:toHome()">
					<img src="../img/LogoFinal.png" class="logo" alt="Company Inventory" />
					<!--Font logo rockwell-->
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
									<a  href="javascript:toHome()"> Info </a>
								</li>
								<li>
									<a href="UserSignupForm"> Il tuo profilo </a>
								</li>
							</ul>
						  </div>
						
					</li>
					
					<li class = "fullmenu">
						<a href="javascript:toHome()"> Info </a>
					</li>
					<li class = "fullmenu">
						<a href="UserSignupForm"> Il tuo profilo </a>
					</li>
					
					<li class="login-dropdown">
						<a id="loginButton" onclick="loginForm();">
								Login 
						</a>
						<div class="login-content" onclick="blockReset();">
						  
								<form class="form" id="formLogin" action="login" method="POST">
									<input class="input-text fillrow" name="username" id="username" type="text" placeholder="Username" style="margin-bottom: 3px;" required> 
									<input class="input-text fillrow" name="password" id="password" type="password" placeholder="Password" style="margin-bottom: 14px;" required>
										<div class='error-li' style='display:block;margin-bottom: 0px;'>
											<p>username e/o password errati</p>
										</div>
									<br>
									<input type="submit" class="submit" value="Login" style="padding: 8px;">
								
								</form>
								<form class="form" id="formLogout" action="logout">
									 <input type="submit" class="submit" value="Logout" style="padding: 8px;"> 	
								</form>
						</div>
					</li>
					
				</ul>
				
				<ul class="searchBar">
					
					<li class="search">
						<div style="margin-left: 12px;">
						<div class="search">
							<a class="search">
								<img src="../img/search.png" class="product-preview" alt="formaggio" />
							</a>
							<div style="overflow: hidden;">
								<input class="search" id="ricerca" onchange="startShowcase()" placeholder="Cerca" type="text" required>
							</div>
						</div>
						</div>
					</li>
				</ul>
			</nav>
			
			

			<!-- The Modal -->
			<div id="myModal" class="modal">
		
			  <!-- Modal content -->
			  <div class="modal-content">
				<form class="form" id="formNew" action="inventoryControl.php" method="POST">
				
					<ul class="modal-header">
						<li style="float:right">
							<a class="myModal_close closeButton">×</a>
						</li>
						<li>
							<p>Nuovo Inventario</p>
						</li>	  
					</ul>
					<div class="modal-body">
						
							<p>Inserisci un nome per il tuo inventario</p>
							<input type="text" name="inventoryName" class="input-text fillrow" onkeydown="showHint(this.value)"/>
							<br>
							<ol id="errorList">
								
							</ol>
							<br>
					</div>
					
					<div class="modal-footer">
							<input type="submit"  name="inventorySubmit" class="submit submitRightButton" value="Conferma"/>
					</div>
					
				</form>
			  </div>
			 </div>
			  <!-- Modal test End -->
			
			<section class="responsiveGrid">
			
				<span id="elementGrid">
	                <div class="inventoryElem">
						<div class="squareBox">
							<div class="circle squareContent">
							</div>
						</div>
						<span class="inventoryName">Vestiti con il nome lungo</span>	
	                </div>
	                <div class="inventoryElem">
						<div class="squareBox">
							<div class="circle squareContent">
							</div>
						</div>
						<span class="inventoryName">Vestiti con il nome lungo</span>	
	                </div>
					<div class="inventoryElem">
						<div class="squareBox">
							<div class="circle squareContent">
							</div>
						</div>
						<span class="inventoryName">Vestiti con il nome lungo</span>	
	                </div>
					
				</span>
				<!-- Trigger/Open The Modal -->
				<div class="inventoryElem">
					<div class="squareBox">
						<div class="circle squareContent myModal_open">
							<img class="imageAdd" src="../img/logoAdd.png" alt="logo aggiungi prodotto">
						</div>
					</div>
					
					<span class="inventoryName" style="visibility: hidden;" >lorem</span><!--This span is for verical allignamet of the div elements-->
					
				</div>
			</section>
			
				
			
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