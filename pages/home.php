<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Truth or Dare</title>

	<link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body>

	<!-- Modal -->
	<div class="modal fade" id="modalPermainan" tabindex="-1" role="dialog" aria-labelledby="modalPermainanTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content text-white" id="modalPermainanBackground">
				<div class="modal-header">
					<h5 class="modal-title" id="modalPermainanTitle"></h5>
				</div>
				<div class="modal-body" >
					<h1 >
						<strong id="modalPermainanKonten"></strong>
					</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row" style="height: 100vh">
			<div class="col-12 my-auto">
				<div class="row">
					<div class="col-12">
						<button id="truth" class="btn btn-lg btn-primary col-12 align-middle" style="height: 100px">
							<span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
								<strong>TRUTH</strong> </span>
						</button>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-12">
						<button id="dare" class="btn btn-lg btn-danger col-12 align-middle" style="height: 100px">
							<span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
								<strong>DARE</strong> </span>
						</button>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-12">
						<button id="random" class="btn btn-lg btn-secondary col-12 align-middle" style="height: 100px">
							<span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
								<strong>RANDOM</strong> </span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>

	<script>

		$(document).ready(() => {

			$('#modalPermainan').on('hidden.bs.modal', (e) => {
				$('#modalPermainanBackground').removeClass(function (index, className) {
					return (className.match(/(^|\s)bg-\S+/g) || []).join(' ');
				});
			});

			$('#truth').click(() => {
				$.ajax({
					url: "<?php echo $baseURL.'?pages=api&mode=1'; ?>"
				}).done((data) => {
					let encodedData = jQuery.parseJSON(data);
					$('#modalPermainanBackground').toggleClass('bg-primary');
					$('#modalPermainanTitle').text("TRUTH");
					$('#modalPermainanKonten').text(encodedData.konten_permainan);
					$('#modalPermainan').modal('show');
				});
			});

			$('#dare').click(() => {
				$.ajax({
					url: "<?php echo $baseURL.'?pages=api&mode=2'; ?>"
				}).done((data) => {
					let encodedData = jQuery.parseJSON(data);
					$('#modalPermainanBackground').toggleClass('bg-danger');
					$('#modalPermainanTitle').text("DARE");
					$('#modalPermainanKonten').text(encodedData.konten_permainan);
					$('#modalPermainan').modal('show');
				});
			});

			$('#random').click(() => {
				$.ajax({
					url: "<?php echo $baseURL.'?pages=api'; ?>"
				}).done((data) => {
					let encodedData = jQuery.parseJSON(data);
					if (encodedData.kategori_permainan == 1) {
						$('#modalPermainanBackground').toggleClass('bg-primary');
						$('#modalPermainanTitle').text("TRUTH");
					} else if (encodedData.kategori_permainan == 2) {
						$('#modalPermainanBackground').toggleClass('bg-danger');
						$('#modalPermainanTitle').text("DARE");
					}
					$('#modalPermainanKonten').text(encodedData.konten_permainan);
					$('#modalPermainan').modal('show');
				});
			});

		});
	</script>

</body>

</html>