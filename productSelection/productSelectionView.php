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
			<link rel="icon" href="../icon.ico" />
			<link rel="stylesheet" type="text/css" href="../css/style.css">
			<link rel="stylesheet" type="text/css" href="../css/singup.css">
			<link rel="stylesheet" type="text/css" href="../css/inventoryGrid.css">
			<link rel="stylesheet" type="text/css" href="../css/inventoryList.css">
			<link rel="stylesheet" type="text/css" href="../css/modal.css">


			<script src="../javascript/common/utils.js"></script>
			<script src="../javascript/common/responsiveStylesheet.js"></script>
			<script src="../javascript/common/modal.js"></script>
			<script src="../javascript/productsListSearch.js"></script>
			<script src="../javascript/productSelection.js"></script>
			
			
			<script> 
				window.onload = function(e){ 
					/* responsiveness*/
					startStylesheet();
					startProductsList(true);
					
					var ps = new Selection(document.getElementById("submit"));
					
					var m = new Modal("modalSubmit",{
						onOpen:function(){
							ps.submit(m,<?php echo $inventory->id ?>);
						},
						onClose:null
					});
					
					document.selectItem = function(item){
						
						var amountCounter = item.nextSibling.childNodes[0].childNodes[0];
	 
						if(item.className != "selectedItem"){	
							item.className = "selectedItem";
							amountCounter.className="itemCounterSelected";
							ps.addItem(item);
						}else{
							item.className = "notSelected";
							amountCounter.className="itemCounter";
							ps.dropItem(item);
						}
					}
					
					document.search = function(){
						startProductsList(true);
					}
				}
				
			</script>
	</head>
	
	<body class="fullPage">
		<div class="content">
		
			<?php include "../php/components/headerStart.php" ?>
				<ul class="navbar" style="background-color: #4d4dcc;border-color:#4d4dcc">
					<li style="float:right">
						<button id="submit" class="inventoryButton modalSubmit_open" style="margin-left:0px" disabled>
									Conferma
						</button>
					</li>
					<li style="float:left">
						<a class="inventoryButton" style="margin-right:0px" href=<?php echo "'".ROOT."/inventoryContent/content.php?inventory=".$inventory->id."'" ?> >
									Indietro
						</a>
					</li>
					<li style="float: none;">
							<span class="inventoryTitle">
									Seleziona
							</span>
					</li>
				</ul>
				
			<?php include "../php/components/headerEnd.php" ?>
			
			<div class="barSpace"></div>
			
			<section class="responsiveGrid">
			
				<span id="elementGrid">

				</span>
			</section>
			
			<div id="modalSubmit" class="modal" style="display: none;">
				<!-- Modal content -->
				<div class="modal-content" style="max-width: 380px;">
					
						<ul class="modal-header">
							<li style="float:right">
								<a class="modalSubmit_close closeButton">×</a>
							</li>
							<li style="float: none;">
								<p class="modalTitle">Selezione</p>
							</li>
						</ul>
						<div class="modal-body">
							<div id="response" style="text-align: center;margin-top: 28px;">
								<p>Caricamento</p>
							</div>
						</div>
					<br>
						
				</div>	
			</div>
		</div>
		
		<?php include "../php/components/footer.php" ?>

	</body>

</html>