<hr>
<footer>Copyright 2019
	<?php
	$this->load->view( 'templates/menu',
		isset( $news ) ? $news : null,
		isset( $films ) ? $news : null
	);
	?>
</footer>
</body>
</html>