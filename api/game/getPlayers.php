<?php

/**
 * Renvoi les joueurs de la game
 * @param int $gameId
 */
function getPlayers($gameId) {
    $game = new Game();
    $res = $game->load($gameId);
    if (!$res) return false;
    $game->getPlayers();
    $data = Array();
    foreach ($data as $player) {
        $data[] = $player->getRawData();
    }
    return json_encode($data, JSON_PRETTY_PRINT);
}
