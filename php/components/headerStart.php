<header>
	<a href=<?php echo "'".ROOT."'"; ?> >
		<img src=<?php echo "'".ROOT."img/LogoFinal.png'"; ?> class="navbarLogo" alt="Company Inventory" />
		<!--Font logo rockwell-->
	</a>
</header>

<nav>

	<ul class="navbar mobileResize">
		<li class="menu-dropdown">
			
				<div class="menu-icon" onclick="menuMobile();">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</div>
				
				<div class="menu-content" onclick="blockReset();">
				<ul class="navbar">
				
					<li>
						<a href=<?php echo "'".ROOT."profileInfo/'"; ?>> Il tuo profilo </a>
					</li>
					<li>
						<a href=<?php echo "'".ROOT."contacts/'"; ?>> Contatti </a>
					</li>
					<li>
						<a  href=<?php echo "'".ROOT."productList/'"; ?>> Cerca un prodotto </a>
					</li>
					<li>
						<a  href=<?php echo "'".ROOT."php/logout.php'"; ?> > Logout </a>
					</li>
				</ul>
			  </div>
			
		</li>
		<li ><a href=<?php echo "'".ROOT."'"; ?> style="background-color:inherit"class="paragraph-header">Inventarium</p></li>
		

		<li class = "fullmenu">
			<a href=<?php echo "'".ROOT."profileInfo/'"; ?>> Il tuo profilo </a>
		</li>
		<li class = "fullmenu">
			<a href=<?php echo "'".ROOT."contacts/'"; ?>> Contatti </a>
		</li>
		<li class = "fullmenu">
			<a  href=<?php echo "'".ROOT."productList/'"; ?>> Cerca un prodotto </a>
		</li>
	    <li class = "fullmenu" style="float: right;">
			<a  href=<?php echo "'".ROOT."php/logout.php'"; ?> > Logout </a>
		</li>
	</ul>
	