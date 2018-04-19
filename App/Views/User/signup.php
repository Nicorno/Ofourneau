<?php

    if ($fieldEmpty) { ?>

        <div class="alert alert-danger">
            Veuillez remplir tous les champs svp.
        </div>
    <?php

    } elseif ($emailExists) { ?>

		<div class="alert alert-danger">
			Cet e-mail existe déjà.
		</div>
    <?php

	} elseif ($error) { ?>

        <div class="alert alert-danger">
            Une erreur s'est produite, veuillez recommencer svp.
        </div>
    <?php
    }
?>

<div class="row justify-content-center">
	<div class="col-sm-5">
		<h3>Je crée mon compte Ofourneau</h3>
		<form class="user-login-form" method="post">
			<?= $form->input('last_name', 'Votre Nom'); ?>
			<?= $form->input('first_name', 'Votre Prénom'); ?>
			<?= $form->input('email', 'Votre E-mail', ['type' => 'email']); ?>
			<?= $form->input('password', 'Votre Mot de passe', ['type' => 'password']); ?>
			<?= $form->submit('S\'enregistrer'); ?>
			<p><a href="?p=user.login">J'ai déja un compte Ofourneau</a></p>
		</form>
	</div>
</div>
