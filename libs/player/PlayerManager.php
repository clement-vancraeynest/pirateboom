<?php

class PlayerManager {

    private static $_manager;

    public static function getInstance() {
        if (isset(self::$_manager)) {
            return self::$_manager;
        } else {
            return new PlayerManager();
        }
    }

    /**
     * Chargement du joueur
     * @param Player $player
     * @param int $id
     * @return boolean
     */
    public static function load($player, $id) {
        
    }

    /**
     * Sauvegarde la classe 
     * @param Player $player
     * @return int Identifiant du joueur
     */
    public static function save($player) {
        
    }

}
