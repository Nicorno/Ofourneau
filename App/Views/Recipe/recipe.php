


<div class="row">

	<div class="col-sm-12">

		<!-- DISPLAY TITRE RECETTE -->
		<h1><a href="<?= $recipe->getUrl(); ?>"><?= $recipe->titre; ?></a></h1>
		<!-- DISPLAY AUTEUR RECETTE -->
		<em>Par: <?= $username; ?></em>

	</div>

</div>



<div class="row">

	<div class="col-sm-auto">
		<!-- PHOTO RECETTE -->
		<img class="img-responsive img-recipe"
			 src="<?= $photoPath; ?>"
			 alt="<?= $recipe->titre; ?>" title="<?= $recipe->titre; ?>"
		>
	</div>

	<div class="col-sm-3">
		<ul class="infos">
			<li>Difficulté: <?= $difficulty; ?></li>
			<li>Coût: <?= $recipe->cout; ?> €</li>
			<li>Préparation: <?= $recipe->preparation; ?> minutes</li>
			<li>Cuisson: <?= $recipe->cuisson; ?> minutes</li>
		</ul>

		<!-- INGRÉDIENTS -->
		<div class="ingredients">
			<h2>Ingrédients</h2>
			<p><b>Pour: <?= $nbPersonnes; ?> personnes</b></p>
			<ul>
				<?php foreach ($ingredients as $i): ?>
					<li><?= $i->information; ?></li>
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
		<?php foreach ($preparations as $p) : ?>
			<p><?= $p->numero . ') ' . $p->instruction ;?></p>
		<?php endforeach; ?>

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
