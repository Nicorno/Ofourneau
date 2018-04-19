<div class="row justify-content-center">
	<div class="col-sm-6">
		<h3>Éditer la recette</h3>
		<form method="post" enctype="multipart/form-data">
			<?= $form->input('titre', 'Titre de la recette'); ?>
			<?= $form->select('id_categorie', 'Catégorie', $categories); ?>
			<?= $form->select('id_souscategorie', 'Sous-Catégorie', $underCategories); ?>
			<?= $form->select('id_soussouscategorie', 'Sous sous-Catégorie', $underUnderCategories); ?>
			<?= $form->select('id_difficulty', 'Difficulté de la recette', $difficulties); ?>
			<div class="form-row">
				<div class="col">
					<?= $form->input('cout', 'Coût', ['type' => 'number']); ?>
				</div>
				<div class="col">
					<?= $form->input('preparation', 'Temps de préparation', ['type' => 'number']); ?>
				</div>
				<div class="col">
					<?= $form->input('cuisson', 'Temps de cuisson', ['type' => 'number']); ?>
				</div>
			</div>
			<div class="form-row">
				<div class="col">
					<?= $form->input('nb_personnes_min', 'Nombre de personnes minimum', ['type' => 'number']); ?>
				</div>
				<div class="col">
					<?= $form->input('nb_personnes_max', 'Nombre de personnes maximum', ['type' => 'number']); ?>
				</div>
			</div>

			<fieldset>
				<legend>Ingrédients</legend>
				<div class="form-row edit-btn">
					<div class="col col-md-5 offset-md-1">
						<button class="btn btn-primary" id="btn-add-ingredient" type="button">Ajouter un ingrédient</button>
					</div>
					<div class="col">
						<button class="btn btn-danger" id="btn-del-ingredient" type="button">Supprimer un ingrédient</button>
					</div>
				</div>
				<div id="edit-ingredient">
					<?php foreach ($ingredients as $key => $i) : ?>
						<?= $form->input('ingredient_'.($key+1), 'Ingrédient n° '.($key+1)); ?>
					<?php endforeach; ?>
				</div>
			</fieldset>

			<fieldset>
				<legend>Préparation</legend>
				<div class="form-row edit-btn">
					<div class="col col-md-4 offset-md-2">
						<button class="btn btn-primary" id="btn-add-step" type="button">Ajouter une étape</button>
					</div>
					<div class="col">
						<button class="btn btn-danger" id="btn-del-step" type="button">Supprimer une étape</button>
					</div>
				</div>
				<div id="edit-preparation">
					<?php foreach ($steps as $key => $i) : ?>
						<?= $form->input('step_'.($key+1), 'Étape '.($key+1), ['type' => 'textarea']); ?>
					<?php endforeach; ?>
				</div>
			</fieldset>

			<?= $form->input('conseil', 'Conseils de présentation', ['type' => 'textarea']); ?>
			<?= $form->input('photo', 'Photo de la recette', ['type' => 'file']); ?>
			<?= $form->submit('Enregistrer'); ?>
		</form>
	</div>
</div>
