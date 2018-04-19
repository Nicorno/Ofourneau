
<div class="row">

	<div class="col-sm-12">

		<!-- DISPLAY TITRE RECETTE -->
		<h1><a href="<?= $randomRecipe->getUrl(); ?>"><?= $randomRecipe->titre; ?></a></h1>
		<!-- DISPLAY AUTEUR RECETTE -->
		<em>Par: <?= $username; ?></em>

	</div>

</div>



<div class="row">

	<div class="col-sm-auto">
		<!-- PHOTO RECETTE -->
		<img class="img-responsive img-recipe"
			 src="<?= $photoPath ?>"
			 alt="<?= $randomRecipe->titre; ?>" title="<?= $randomRecipe->titre; ?>"
		>
	</div>

	<div class="col-sm-3">
		<ul class="infos">
			<li>Difficulté: <?= $difficulty; ?></li>
			<li>Coût: <?= $randomRecipe->cout; ?> €</li>
			<li>Préparation: <?= $randomRecipe->preparation; ?> minutes</li>
			<li>Cuisson: <?= $randomRecipe->cuisson; ?> minutes</li>
		</ul>

		<!-- INGRÉDIENTS -->
		<div class="ingredients">
			<h2>Ingrédients</h2>
			<p><b>Pour: <?= $nbPersonnes; ?> personnes</b></p>
			<ul>
				<?php foreach ($ingredients as $i): ?>
					<li><?= $i->ingredient; ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<div class="col-sm-3" style="border:1px solid black">
		<h3>Nouveautés</h3>
		<ul class="infos">
			<li>Difficulté:</li>
		</ul>
	</div>


</div>


	<!-- ############# PREPARATION ############# -->

<div class="row preparation">

	<div class="col-sm-12">

		<h2 class="titre-preparation">Préparation</h2>
		<?php
		if (count($preparations) >= 3) {
			$cnt = 3;
		} else {
			$cnt = count($preparations);
		}
		for ($i = 0; $i < $cnt; $i++) : ?>
			<p><?= $preparations[$i]->numero . ') ' . $preparations[$i]->instruction ;?></p>
		<?php endfor; ?>
		<p><a href="">Voir la suite...</a></p>

	</div>

</div>

	<!-- ############# AUTRES RECETTES DE LA CATÉGORIE ############# -->

<hr>

<h2 class="titre-autres-categories">Autres recettes de la catégorie</h2>

<div class="row">
	<div class="col-sm-12">
		<ul class="list-unstyled">
			<?php foreach ($allRecipesByCategory as $r):
			$prep = $this->Recipe->getPreparation($r->id); ?>
			<li class="media">
				<a href="https://placeholder.com"><img src="http://via.placeholder.com/150x150"></a>
				<div class="media-body">
					<h3 class="mt-0 mb-1"><a href=""><?= $r->titre; ?></a></h3>
					<p><?= $prep[0]->numero . ') ' . $prep[0]->instruction; ?></p>
					<p><?= $prep[1]->numero . ') ' . $prep[1]->instruction; ?></p>
				</div>
			</li>
			<hr>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
