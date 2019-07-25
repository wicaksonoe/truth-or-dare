<?php
	require_once getcwd().'/connection/connection.php';

	$id = mysqli_real_escape_string($connection, $_GET['id']);

	$query = "SELECT * FROM permainan WHERE id=$id";

	$query_result = mysqli_query($connection, $query);

	$data = mysqli_fetch_assoc($query_result);

	if ( $data['kategori_permainan'] == 1 ) {
		$kategori = "Truth";
	} else if ( $data['kategori_permainan'] == 2 ) { 
		$kategori = "Dare";
	}

?>

<?php require_once getcwd() . '/components/templateHeader.php'; ?>

<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<form>
						<div class="form-group">
							<label for="kategori">Kategori</label>
							<input class="form-control" value="<?php echo $kategori; ?>" disabled>
						</div>
						<div class="form-group">
							<label for="konten">Konten</label>
							<textarea class="form-control" disabled><?php echo $data['konten_permainan']; ?></textarea>
						</div>
					</form>
				</div>
			</div>
			<div class="card mt-2">
				<div class="card-body">
					<form action="<?php echo $baseURL.'?pages=list&method=update'; ?>" method="post">
						<input type="text" name="id" id="id" value="<?php echo $data['id']; ?>" hidden>
						<div class="form-group">
							<label for="kategori">Kategori</label>
							<select name="kategori" id="kategori" class="form-control" required>
								<option value="" disabled selected>-- Pilih Kategori --</option>
								<option value="1">Truth</option>
								<option value="2">Dare</option>
							</select>
						</div>
						<div class="form-group">
							<label for="konten">Konten</label>
							<textarea type="text" class="form-control" id="konten" name="konten" required></textarea>
						</div>

						<button type="submit" class="btn btn-success col-12">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once getcwd() . '/components/templateJavaScript.php'; ?>

<script>

</script>

<?php require_once getcwd() . '/components/templateFooter.php'; ?>