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
		
			<script src="../javascript/deleteProducts.js"></script>
			
			<script> 

	        	window.onload = function(e){ 
					/* responsiveness*/
					startStylesheet();
					
					 var m = new Modal("myModal",{
						onOpen:null,
						onClose:null
					});
					
					document.closeModal = function(){
						m.close();
					};

					document.deleteElem = function(){
						deleteProduct(<?php echo $item->id; ?>,m);
					}

				}
				
			</script>
			
	</head>

	<body class="fullPage">
		<div class="content">
		
			<?php include "../php/components/headerStart.php" ?>
			<?php include "../php/components/headerEnd.php" ?>
			<br>
		    <!-- The Modal -->
			<div id="myModal" class="modal">
		
			  <!-- Modal content -->
			  <div class="modal-content" style="max-width: 400px;">
				<form class="form" id="formNew" action="javascript:document.deleteElem()" method="POST"> 
				
					<ul class="modal-header">
						<li style="float:right">
							<a class="myModal_close closeButton">×</a>
						</li>
						<li>
							<p>Rimozione Prodotto</p>
						</li>	  
					</ul>
					<div class="modal-body" id="modalBody">
							<div id="message">
								<p>Sei sicuro/a di volerlo cancellare da tutti gli inventari?</p>
							</div>
							<div id="response">
							
							</div>
							<br>
							<br>
							
					</div>
					
					<div  id="footer" class="modal-footer">
							<input type="submit"  name="inventorySubmit" class="submit submitLeftButton" value="Si"/>
							<input type="button" name="cancelButton" class="submit submitRightButton myModal_close " value="No" >
							<input type="button" name="cancelButton" style="display:none;" class="submit submitRightButton myModal_close " value="Chiudi" >
					</div>
					
				</form>

			  </div>
			 </div>
			<section  id="section" class="sectionbox" style="max-width:800px;text-align: center;">	

			<h1 class="title"><?php echo $item->name; ?></h1>
				
				<form class="form" id="formNew" method="POST" action="javascript:void(0);" style="margin: 3px 2%;">	
					<aside class="left">
						<div class="itemImageContainer">
							<img src=<?php echo "'../uploads/".$item->imageUrl."'" ?> id="previewImage" class="itemImage circle" alt="Product" />
						</div>
					</aside>
					<aside>
						<fieldset>
							<ol class="Item">
									<li style="height: 153px">		
									<textarea class="fillrow" style="height: 100%;"  id="description" name="descrizione" readonly>
										<?php echo $item->description; ?>
									</textarea>
								</li>
								<li style="margin-top: 14px;height: auto;">		
									<input type="submit" class="submit submitRightButton myModal_open" value="Cancella" style="background-color:red">
								</li>
							</ol>
						</fieldset>
					</aside>
				</form>		
			</section>
			
			<br>
			<br>	
			
			</div>
		
		<?php include "../php/components/footer.php" ?>

	</body>

</html>