<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Crudvs Spa With Ajax</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>

	<div class="menu">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<a id="all" class="btn btn-primary btn-sm" href="">All Students</a>
					<a id="add_student" class="btn btn-primary btn-sm" href="">Add new student</a>

				</div>
			</div>
		</div>
	</div>


	<div class="app">



	</div>




	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


	<script>
		$('#add_student').click(function() {

			$.ajax({
				url: 'create.php',
				success: function(ami) {
					$('.app').html(ami);

				}
			});


			return false;
		});

		// $('#student_form_update').click(function() {

		// 	$.ajax({
		// 		url: 'create.php',
		// 		success: function(ami) {
		// 			$('.app').html(ami);

		// 		}
		// 	});


		// 	return false;
		// });


		// View Profile Ajax Call

		$(document).on('click', '#profile', function(e) {

			e.preventDefault();



			let id = $(this).attr('view_id');



			$.ajax({
				url: 'profile.php',
				method: "POST",
				data: {
					id: id
				},
				success: function(data) {
					$('.app').html(data);
				}
			});



		});
		
		// View Edit Ajax Call


		$(document).on('click', '#edit', function(e) {

				e.preventDefault();


				
				let id = $(this).attr('edit_id');



				$.ajax({

					url: 'edit.php',
					method: "POST",
					data: {
						
						id: id
					},
					success: function(data) {
						
						$('.app').html(data);
					}


				});

		});

				



		// Data update korar jonno ata 

		$(document).on('submit', '#student_form_update', function(e) {

				e.preventDefault();

				// let id = $('#update-id').val();
				// let name = $('#name').val();
				// let email = $('#email').val();
				// let cell = $('#cell').val();
				// let username = $('#username').val();
				

				$.ajax({
					url: 'ajax_tem/update.php',				
					method: 'POST',
					data: new FormData(this),
					contentType: false,
					processData: false,
					success: function(data) {					
									

						swal({
							title: 'Update',
							text: 'Data Update successfully!',
							icon: 'success'
						});

						

						

					}

					});



		});

		

		$(document).on('click', 'a#back', function(e) {

			e.preventDefault();

			$.ajax({
				url: 'all.php',
				success: function(data) {
					$('.app').html(data);
					allData();
				}

			});



		});

		$('#all').click(function() {

			$.ajax({
				url: 'all.php',
				success: function(jan) {
					$('.app').html(jan);
					allData();

				}
			});

			return false;
		});

		$.ajax({
			url: 'all.php',
			success: function(jan) {
				$('.app').html(jan);


			}
		});

		/// Others place load		

		$(document).on('submit', '#student_form', function() {



			$.ajax({
				url: 'ajax_tem/create.php',
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function(data) {
					swal({
						title: 'Done',
						text: 'Data added successfully!',
						icon: 'success'
					});

					$('#student_form')[0].reset();



				}

			});



			return false;
		});



		allData();

		function allData() {
			$.ajax({
				url: 'ajax_tem/all_student.php',
				success: function(data) {

					$('#all_student_data').html(data);

				}
			});
		}


		$(document).on('click', 'a.delete-btn', function() {

			let id = $(this).attr('delete_id');

			swal({
				title: 'Are you sure ?',
				text: 'You data will be deleted!!',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
			}).then((conf) => {
				if (conf == true) {
					$.ajax({
						url: 'ajax_tem/delete.php',
						method: "POST",
						data: {
							id: id
						},
						success: function(data) {
							swal({
								title: 'Done',
								text: 'You data has been deleted successfully!',
								icon: 'success',

							});
							allData();

						}

					});
				} else {
					swal({
						title: 'Safe',
						text: 'Your data is safe now',
						icon: 'success'
					});
				}
			});



			return false;

		})

		$(document).on('change', 'input[name="file"]', function(e) {
			

			let file_url = URL.createObjectURL(e.target.files[0]);

			$('img#up_file').attr('src', file_url);	
			
			// $('#student_form')[0].reset();


		});
		


	</script>

</body>

</html>