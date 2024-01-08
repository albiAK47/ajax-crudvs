<?php
	
	$id = $_POST['id'];
	
	
	$connection = new mysqli('localhost','root','','ajax-crudvs');

	$data = $connection->query("SELECT * FROM students WHERE id='$id'");

	$edit_data = $data->fetch_object();


	
	
	?>
	
	
	
	
	
	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>Add new Student</h2>
				<div class="msg"></div>
				<form id="student_form_update" method="POST" anctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input value="<?php echo $edit_data->name; ?>" name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input value="<?php echo $edit_data->email; ?>" name="email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input value="<?php echo $edit_data->cell; ?>" name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input value="<?php echo $edit_data->username; ?>" name="username" class="form-control" type="text">
					</div>
					<div class="container">
						<div class="row">
							<div class="col">	
							<div class="form-group">
								<h6>Upload Here</h6>					
									<label for="file"><img style="cursor: pointer;" width="80" data-toggle="tooltip" data-placement="right" title="Profile Photo" src="pic.png" alt=""></label>
									<input style="display: none;" name="file" type="file" id="file">
								</div>
							</div>
							<div class="col">
								<h6>Preview Here</h6>
								<img class="border border-gray rounded-circle" width='75' height="75" id="up_file" src="" alt="">
							</div>
							<div class="col-6">

							</div>
						</div>
					</div>
					
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Update">
					</div>
				</form>
				
			</div>
		</div>
	</div>
	
	
	
	
	