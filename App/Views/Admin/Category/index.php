
<h1>Administrer les catégories</h1>

<p><a href="?p=admin.category.add" class="btn btn-success">Ajouter</a></p>

<table class="table">
	
	<thead>
		<tr>
			<td>ID</td>
			<td>Nom</td>
			<td>Action</td>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($categories as $c): ?>
			<tr>
				<td><?= $c->id; ?></td>
				<td><?= $c->nom; ?></td>
				<td>
					<a class="btn btn-primary" href="?p=admin.category.edit&id=<?= $c->id; ?>">Editer</a>

					<form action="?p=admin.category.delete" method="post" style="display: inline;">
						<input type="hidden" name="id" value="<?= $c->id ?>">
						<button class="btn btn-danger">Supprimer</button>
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>

</table>