<?php

$id = $_POST['id'];

$connection = new mysqli('localhost','root','','ajax-crudvs');

$connection->query("DELETE FROM students WHERE id='$id'");