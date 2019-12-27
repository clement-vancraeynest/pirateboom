<?php

/**
 * Renvoi la vie du joueur
 * @param int $playerId
 * @return int 
 */
function getLife($playerId) {
    $player = new Player();
    $res = $player->load($playerId);
    if (!$res) return false;
    return $player->getLife();
}
