<?php
	require_once getcwd().'/connection/connection.php';

	try {
	
		$conn = new DB();
		$array_data = $conn->getAll();
	
	} catch (\PDOException $e) {
		echo $e->getMessage();
	}

	$conn->close();
?>

<?php require_once getcwd().'/components/templateHeader.php'; ?>

<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<a href="<?php echo $baseURL.'?pages=list&method=create'; ?>" class="btn btn-sm btn-primary mb-2">Insert New</a>
			<table class="table table-responsive-md table-bordered table-striped">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Kategori</th>
						<th>Konten</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php
						$no = 1; 
						foreach ($array_data as $value) {
					?>
					
						<tr>
							<td class="align-middle"><?php echo $no; ?></td>
							<td class="align-middle">
								<?php 
								
									if ( $value['kategori_permainan'] == 1 ) {
										echo "Truth";
									} else if ( $value['kategori_permainan'] == 2 ) {
										echo "Dare";
									}
									
								?>
							</td>
							<td class="align-middle"><?php echo $value['konten_permainan']; ?></td>
							<td>
								<a href="<?php echo $baseURL.'?pages=list&method=read&id='.$value['id'] ?>" class="btn btn-sm btn-info mr-3 mt-2 mb-2">Edit</a>
								<a href="<?php echo $baseURL.'?pages=list&method=delete&id='.$value['id'] ?>" class="btn btn-sm btn-danger ml-3 mt-2 mb-2">Delete</a>
							</td>
						</tr>

					<?php
						$no++;
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php	require_once getcwd().'/components/templateJavaScript.php'; ?>

<script>

</script>

<?php	require_once getcwd().'/components/templateFooter.php'; ?>