<?php

require_once('../src/Repository.php');

$repo = new Repository();

$game = $repo->GetActiveGame();
echo '<p>'.var_dump($game).'</p>';

$chips = $repo->GetChips();
echo '<p>'.var_dump($chips).'</p>';

$blinds = $repo->GetBlinds();
echo '<p>'.var_dump($blinds).'</p>';

$players = $repo->GetPlayers(1);
echo '<p>'.var_dump($players).'</p>';

?>