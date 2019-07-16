<?php

require_once '../SQL/SQLConnector.php';

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
    public function load($user, $id) {
        $request = SQLConnector::getPDO()->prepare("SELECT * FROM pb_user where id_user = :id");
        $request->bindValue("id", $id);
        $result = $request->execute();
        if (!$result) return false;
        $rows = $request->fetchAll();
        if (count($rows) <= 0) return false;
        $row = $rows[0];
        $user->setId($row["id_user"]);
        $user->setName($row["name_user"]);
        $user->setEmail($row["email_user"]);
        $user->setPassword($row["password_user"]);
        return true;
    }

    /**
     * Sauvegarde la classe 
     * @param User $user
     * @return int Identifiant de l'utilisateur
     */
    public function save($user) {
        
    }

}
