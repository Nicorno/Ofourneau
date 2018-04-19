<?php
if ($errors) { ?>
	<div class="alert alert-danger">
		Une erreur s'est produite
	</div>
<?php }
?>

<h1>Administrer les recettes</h1>

<p><a href="?p=user.recipe.add" class="btn btn-success">Ajouter</a></p>

<table class="table">

	<thead>
		<tr>
			<td>ID</td>
			<td>Titre</td>
			<td>Action</td>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($recipes as $key => $r): ?>
			<tr>
				<td><?= $key+1; ?></td>
				<td><?= $r->titre; ?></td>
				<td>
					<a class="btn btn-primary" href="?p=user.recipe.edit&id=<?= $r->id; ?>">Editer</a>

					<form action="?p=user.recipe.delete" method="post" style="display: inline;">
						<input type="hidden" name="id" value="<?= $r->id; ?>">
						<button type="submit" class="btn btn-danger" id="del-recipe">Supprimer</button>
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>

</table>
