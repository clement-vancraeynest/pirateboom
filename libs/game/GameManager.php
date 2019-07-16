<?php

class GameManager {

    private static $_manager;

    public static function getInstance() {
        if (isset(self::$_manager)) {
            return self::$_manager;
        } else {
            return new GameManager();
        }
    }

    /**
     * Chargement de la partie
     * @param Game $game
     * @param int $id
     * @return boolean
     */
    public static function load($game, $id) {
        
    }

    /**
     * Sauvegarde la classe 
     * @param Game $game
     * @return int Identifiant de la partie
     */
    public static function save($game) {
        
    }

}
