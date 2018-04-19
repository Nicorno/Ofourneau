
<form method="post">
	<?= $form->input('titre', 'Titre de la recette'); ?>
	<?= $form->select('id', 'Catégorie', $categories); ?>
	<?= $form->submit('Sauvegarder'); ?>
</form>