## Ajax crudvs with simple page application

<img src="readme.png">


=== AJAX === 
1. What is AJAX ? 
2. How ajax works ? 
3. Ajax syntax 
4. Get output from any PHP  file by ajax 
5. Get data from a form 
	- Manual 
	- serialize
	- new FormData()

6. Uplaod a image by ajax 
7. CRUD projects 
8. instant data search 
9. live username/email/etc validation 


#5cbcbc + #96D4D4
#FFC0C7 + #ff808e
#D9EEE1 + #b9dfc7


#### We have create a ajax crudvs with no loading system
#### We have use sweetalert
        
        
        
        
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


#### Data add by serialize 


