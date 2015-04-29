<?php
	require_once('../src/Repository.php');

	$repo = new Repository();
	$data = json_decode($_POST['data'], TRUE);
	$result = $repo->UpsertGame($data)
	print json_encode($result);
?>