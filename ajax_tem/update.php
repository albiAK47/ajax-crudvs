<?php

    $id = $_POST['id'];
    $name = $_POST['name'];
	$email = $_POST['email'];
	$cell = $_POST['cell'];
	$username = $_POST['username'];



	$connection = new mysqli('localhost','root','','ajax-crudvs');

	$connection->query("UPDATE students SET name='$name', email='$email', cell='$cell', username='$username' WHERE id='$id'");
