<header>
	<a href=<?php echo "'".ROOT."'"; ?> >
		<img src=<?php echo "'".ROOT."img/LogoFinal.png'"; ?> class="logo" alt="Company Inventory" />
		<!--Font logo rockwell-->
	</a>
</header>

<nav>

	<ul class="navbar">
		<li class="menu-dropdown">
			
				<div class="menu-icon" onclick="menuMobile();">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</div>
				
				<div class="menu-content" onclick="blockReset();">
				<ul class="navbar">
					<li>
						<a  href=<?php echo "'".ROOT."'"; ?> > Info </a>
					</li>
					<li>
						<a href="UserSignupForm"> Il tuo profilo </a>
					</li>
					<li>
						<a  href=<?php echo "'".ROOT."productList/'"; ?>> Cerca un prodotto </a>
					</li>
				</ul>
			  </div>
			
		</li>
		
		<li class = "fullmenu">
			<a  href=<?php echo "'".ROOT."'"; ?> > Info </a>
		</li>
		<li class = "fullmenu">
			<a href="UserSignupForm"> Il tuo profilo </a>
		</li>
		<li class = "fullmenu">
			<a  href=<?php echo "'".ROOT."productList/'"; ?>> Cerca un prodotto </a>
		</li>
		
	</ul>
	