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
					<a id="profile_id" class="btn btn-primary btn-sm" href="">Profile</a>
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
		$('#add_student').click(function(){

			$.ajax({
				url: 'create.php',
				success: function(ami){
					$('.app').html(ami);

				}
			});


			return false;
		});

		$('#profile_id').click(function(){

				$.ajax({
					url: 'profile.php',
					success: function(ety){
						$('.app').html(ety);

					}
				});

			return false;
		});

		$('#all').click(function(){

			$.ajax({
				url: 'all.php',
				success: function(jan){
					$('.app').html(jan);
					allData();

				}
			});

			return false;			
		});

		$.ajax({
				url: 'all.php',
				success: function(jan){
					$('.app').html(jan);
					

				}
		}); 

		/// Others place load		

		$(document).on('submit','#student_form',function(){
			
			let name = $('#name').val(); 
			let email = $('#email').val(); 
			let cell = $('#cell').val(); 
			let username = $('#username').val(); 

			if( name == '' || email == '' || cell == '' || username == ''){
				swal({
					title: 'Opps!',
					text: 'All fields are required!',
					icon: 'warning',
					button: 'Go',
					button: 'Go'
				});
				
			}else{
				$.ajax({
				url: 'ajax_tem/create.php',
				method: "POST",
				data: {
					name: name,
					email: email,
					cell: cell,
					username: username
				},
				success: function(data){

					swal({
						title: 'Done',
						text: 'Student added successfully',
						icon: 'success'
					});

					$('#name').val(''); 
					$('#email').val(''); 
					$('#cell').val(''); 
					$('#username').val(''); 	


				}
			});

			}

			

			return false;
		});
		
		

		allData();

		function allData(){
			$.ajax({
			url: 'ajax_tem/all_student.php',
			success: function(data){

				$('#all_student_data').html(data);

				}
			});
		}

		
		$(document).on('click','a.delete-btn', function(){

			let id = $(this).attr('delete_id');

			swal({
				title: 'Are you sure ?',
				text: 'You data will be deleted!!',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
			}).then((conf) => {
						if( conf == true){
							$.ajax({
						url: 'ajax_tem/delete.php',
						method: "POST",
						data:{
							id : id
						},
						success: function(data){
							swal({
								title: 'Done',
								text: 'You data has been deleted successfully!',
								icon: 'success',

							});
							allData();

						}

					});
				}else{
					swal({
						title: 'Safe',
						text: 'Your data is safe now',
						icon: 'success'
					});
				}
			});

			

			return false;
				
		})
	


	</script>
	
</body>

</html>