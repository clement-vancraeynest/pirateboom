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
     * Création d'un utilisateur
     * @param User $user
     * @return int Identifiant de l'utilisateur ou false si erreur
     */
    public function insert($user) {
        $pdo = SQLConnector::getPDO();
        $request = $pdo->prepare("INSERT INTO pb_user (name_user, email_user, password_user) VALUES (:name, :email, :password)");
        $request->bindValue("name", $user->getName());
        $request->bindValue("email", $user->getEmail());
        $request->bindValue("password", $user->getPassword());
        $result = $request->execute();
        if (!$result) return false;
        return $pdo->lastInsertId();
    }

    /**
     * Enregistrement d'un utilisateur
     * @param User $user
     * @return boolean
     */
    public function update($user) {
        $request = SQLConnector::getPDO()->prepare("UPDATE pb_user SET name_user=:name, email_user=:email, password_user=:password WHERE id_user=:id");
        $request->bindValue("id", $user->getId());
        $request->bindValue("name", $user->getName());
        $request->bindValue("email", $user->getEmail());
        $request->bindValue("password", $user->getPassword());
        $result = $request->execute();
        return $result;
    }

}
