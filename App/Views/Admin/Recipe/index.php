
<h1>Administrer les recettes</h1>

<p><a href="?p=admin.recipe.add" class="btn btn-success">Ajouter</a></p>

<table class="table">

	<thead>
		<tr>
			<td>ID</td>
			<td>Titre</td>
			<td>Action</td>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($recipes as $r): ?>
			<tr>
				<td><?= $r->id; ?></td>
				<td><?= $r->titre; ?></td>
				<td>
					<a class="btn btn-primary" href="?p=admin.recipe.edit&id=<?= $r->id; ?>">Editer</a>

					<form action="?p=admin.recipe.delete" method="post" style="display: inline;">
						<input type="hidden" name="id" value="<?= $r->id; ?>">
						<button type="submit" class="btn btn-danger">Supprimer</button>
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>

</table>
