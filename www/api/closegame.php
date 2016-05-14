<?php
	require_once('../../src/Repository.php');

	$repo = new Repository();
	$result = $repo->CloseGame();
	header('HTTP/1.1 200 OK');
	header('Content-type: application/json');
	echo json_encode($result);
?>