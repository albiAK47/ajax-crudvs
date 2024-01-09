<?php

    $id = $_POST['update-id'];
    $name = $_POST['name'];
	$email = $_POST['email'];
	$cell = $_POST['cell'];
	$username = $_POST['username'];

    $file_name = time() . $_FILES['file']['name'];
    $file_tmp_name = $_FILES['file']['tmp_name'];



	$connection = new mysqli('localhost','root','','ajax-crudvs');

	$connection->query("UPDATE students SET name='$name', email='$email', cell='$cell', username='$username', photo='$file_name'  WHERE id='$id'");


    move_uploaded_file($file_tmp_name, '../photos/'. $file_name);
