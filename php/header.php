<header>
	<div class="container">
		<?php
		if ($_COOKIE['user'] == '') :
		?>
			<div class="row">
				<b class="user">Please, log in</b>
				<a href="/web/php/login.php" class="btn btn-login">Log in</a>
				<a href="/web/php/register.php" class="btn btn-register">Register</a>
			</div>
		<?php else : ?>
			<div class="row">
				<b class="user">Account: <?= $_COOKIE['user'] ?></b>
				<a href="/web/functions/logout.php" class="btn btn-login">Log out</a>
			</div>
		<?php endif; ?>
	</div>
</header>