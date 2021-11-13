<?php

require "./config/database.php";
require "./models/db.php";
require "./models/products.php";
require "./models/manufactures.php";
require "./models/protypes.php";

?>
<nav id="navigation">
	<!-- container -->
	<div class="container">
		<!-- responsive-nav -->
		<div id="responsive-nav">

			<!-- NAV -->
			<ul class="main-nav nav navbar-nav">
				<li class="active"><a href="index.php">Home</a></li>
				<?php

				$manufactures = new Manufactures;
				$getallmanufactures = $manufactures->getAllManu();

				foreach ($getallmanufactures as $value) {

				?>
					<li><a href="productsbymanu_id.php?manu_ID=<?php echo $value['manu_ID'] ?>"><?php echo $value['manu_name'] ?></a></li>

				<?php } ?>
			</ul>
			<!-- /NAV -->
		</div>
		<!-- /responsive-nav -->
	</div>
	<!-- /container -->
</nav>