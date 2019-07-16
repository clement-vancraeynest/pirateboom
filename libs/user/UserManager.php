<?php

class UserManager {

    private static $_manager;

    public static function getInstance() {
        if (isset(self::$_manager)) {
            return self::$_manager;
        } else {
            return new UserManager();
        }
    }

    /**
     * Chargement de l'utilisateur
     * @param User $user
     * @param int $id
     * @return boolean
     */
    public static function load($user, $id) {
        
    }

    /**
     * Sauvegarde la classe 
     * @param User $user
     * @return int Identifiant de l'utilisateur
     */
    public static function save($user) {
        
    }

}
