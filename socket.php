<?php
namespace HomeGame;

require '/Users/jaime_000/vendor/autoload.php';
use Ratchet\Wamp\WampServerInterface;
use Ratchet\ConnectionInterface;


class Socket implements WampServerInterface 
{
	public function onSubscribe(ConnectionInterface $conn, $topic)
	{
		
	}

	public function onUnSubscribe(ConnectionInterface $conn, $topic)
	{
		
	}

	public function onTimerStop($data)
	{
		$timerData = json_decode($data, true);

		$this->broadcast($timerData);
	}

	public function onOpen(ConnectionInterface $conn)
	{
		$result = $this->users->attach($conn);

		echo "New Connection! ({$conn->resourceId})\n";
	}

	public function onClose(ConnectionInterface $conn)
	{
		//Close a connection so that it can no longer recieve info
		$this->users->detach($conn);

		echo "Connection {$conn->resourceId} has disconnected\n";
	}

	public function onCall(ConnectionInterface $conn, $id, $topic, array $params)
	{
		$conn->callError($id, $topic, 'Uh, uh, uh. You didn\'t say the magic word')->close();
	}

	public function onPublish(ConnectionInterface $conn, $topic, $event, array $exclude, array $eligible)
	{
		$conn->close();
	}

	public function onError(ConnectionInterface $conn, Exception $e)
	{
		echo "An error occured: {$e->getMessage()}\n";

		$conn->close();
	}
}

?>