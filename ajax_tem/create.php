<?php




$name = $_POST['name'];
$email = $_POST['email'];
$cell = $_POST['cell'];
$username = $_POST['username'];

$file_name = time() . $_FILES['file']['name'];
$file_tmp_name = $_FILES['file']['tmp_name'];

$connection = new mysqli('localhost','root','','ajax-crudvs');

$connection->query("INSERT INTO students(name, email, cell, username, photo) VALUES('$name','$email','$cell','$username', '$file_name')");

move_uploaded_file($file_tmp_name, '../photos/'. $file_name);


