<?php

	if ($errors) {
		?>
		<div class="alert alert-danger">
			Identifiants incorrects
		</div>
		<?php
	}
?>

<div class="row justify-content-center">
	<div class="col-sm-5">
		<h3>Veuillez saisir vos identifiants</h3>
		<form class="user-login-form" method="post">
			<?= $form->input('email', 'Email', ['type' => 'email']); ?>
			<?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
			<?= $form->submit('Se connecter'); ?>
			<p><a href="">Mot de passe oublié ?</a></p>
		</form>
	</div>
</div>
