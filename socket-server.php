<?php
	require_once("socket.php");
	use Ratchet\Server\IoServer;
	use Ratchet\Http\HttpServer;
	use Ratchet\WebSocket\WsServer;
	use React\ZMQ\Context;
	use HomeGame\Socket;

	require '\Users\jaime_000\vendor\autoload.php';

	$loop = React\EventLoop\Factory::create();
	$socket = new Socket();

	$context = new Context($loop);
	$pull = $context->getSocket(ZMQ::SOCKET_PULL);
	$pull->bind('tcp://127.0.0.1:5555');
	$pull->on('message', array($socket, 'onTimerStop'));

	$websock = new React\Socket\Server($loop);
	$websock->listen(8080, '0.0.0.0');
	$webserver = new Ratchet\Server\IoServer(
		new HttpServer(
			new WSServer(
				new Ratchet\Wamp\WampServer(
					$socket
				)
			)
		)
	, $websock);

	$loop->run();

?>