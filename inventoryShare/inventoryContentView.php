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
			<script src="../javascript/inventoryContent.js"></script>

			
			<script> 
				window.onload = function(e){ 
					/* responsiveness*/
					startStylesheet();
	
					document.search = function(){
						loadInventoryContent(<?php echo $inventory->id ?>,true);
					}
					
					document.search();
					
				}

			</script>
	</head>

	<body class="fullPage">
		<div class="content">
		
			<header>
				<a href=<?php echo "'".ROOT."'"; ?> >
					<img src=<?php echo "'".ROOT."img/LogoFinal.png'"; ?> class="navbarLogo" alt="Company Inventory" />
					<!--Font logo rockwell-->
				</a>
			</header>

			<nav>				
				<ul class="navbar" style="background-color: #4d4dcc;border-color:#4d4dcc">
					
					<li style="float: none;">
							<span class="inventoryTitle">
									<?php echo $inventory->name;?>
							</span>
					</li>
				</ul>
				
				
			<?php include "../php/components/headerEnd.php" ?>
			
			<div class="barSpace"></div>
			
			<section class="responsiveGrid">
					
					<div id="elementGrid">
						
					</div>
			</section>	
		</div>
		
		
		<?php include "../php/components/footer.php" ?>

	</body>

    <?php include "../php/components/barcodeInsert.php" ?>

</html>