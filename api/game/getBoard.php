<?php

/**
 * Renvoi le plateau
 * @param int $gameId
 * @return String chaine de représentation du plateau
 */
function getBoard($gameId) {
    $game = new Game();
    $res = $game->load($gameId);
    if (!$res) return false;
    return $game->getBoard();
}
