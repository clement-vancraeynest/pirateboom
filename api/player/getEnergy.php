<?php

/**
 * Renvoi l'energie du joueur
 * @param int $playerId
 * @return int
 */
function getEnergy($playerId) {
    $player = new Player();
    $res = $player->load($playerId);
    if (!$res) return false;
    return $player->getEnergy();
}
