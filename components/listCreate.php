<?php
	require_once getcwd().'/connection/connection.php';
	
	if ( isset( $_POST['submit'] ) ) {

		if ( $kategori != 1 || $kategori != 2 ) {
			header('Location: '.$baseURL.'?pages=list');
		}

		try {
	
			$conn = new DB();
			$array_data = $conn->insert( $_POST['kategori'], $_POST['konten'] );
		
		} catch (\PDOException $e) {
			echo $e->getMessage();
		}
	
		$conn->close();
		header('Location: '.$baseURL.'?pages=list');
		
	}
?>

<?php require_once getcwd() . '/components/templateHeader.php'; ?>

<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<form action="" method="post">
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

						<button type="submit" name="submit" class="btn btn-success col-12">Kirim</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once getcwd() . '/components/templateJavaScript.php'; ?>

<?php require_once getcwd() . '/components/templateFooter.php'; ?>