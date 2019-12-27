<?php

require_once '../SQL/SQLConnector.php';

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
    public function load($player, $id) {
        $request = SQLConnector::getPDO()->prepare("SELECT * FROM pb_player where id_player = :id");
        $request->bindValue("id", $id);
        $result = $request->execute();
        if (!$result) return false;
        $rows = $request->fetchAll();
        if (count($rows) <= 0) return false;
        $row = $rows[0];
        $player->setId($row["id_player"]);
        $player->setLife($row["life_player"]);
        $player->setEnergy($row["energy_player"]);
        $player->setPosition($row["position_player"]);
        $player->setOrder($row["order_player"]);
        $player->setGameId($row["idgame_player"]);
        $player->setUserId($row["iduser_player"]);
        return true;
    }

    /**
     * Création d'un joueur
     * @param Player $player
     * @return int Identifiant du joueur
     */
    public function insert($player) {
        $pdo = SQLConnector::getPDO();
        $request = $pdo->prepare("
            INSERT INTO pb_player (life_player, energy_player, position_player, order_player, idgame_player, iduser_player)
            VALUES(:life, :energy, :position, :order, :idgame, :iduser)");
        $request->bindValue("life", $player->getLife());
        $request->bindValue("energy", $player->getEnergy());
        $request->bindValue("position", $player->getPosition());
        $request->bindValue("order", $player->getOrder());
        $request->bindValue("idgame", $player->getGameId());
        $request->bindValue("iduser", $player->getUserId());
        $result = $request->execute();
        if (!$result) return false;
        return $pdo->lastInsertId();
    }

    /**
     * Enregistrement d'un joueur
     * @param Player $player
     * @return boolean 
     */
    public function update($player) {
        $request = SQLConnector::getPDO()->prepare("
            UPDATE pb_player 
            SET life_player=:life, energy_player=:energy, position_player=position, order_player=:order, idgame_player=:idgame, iduser_player=:iduser
            WHERE id_player=:id");
        $request->bindValue("life", $player->getLife());
        $request->bindValue("energy", $player->getEnergy());
        $request->bindValue("position", $player->getPosition());
        $request->bindValue("order", $player->getOrder());
        $request->bindValue("idgame", $player->getGameId());
        $request->bindValue("iduser", $player->getUserId());
        $result = $request->execute();
        return $result;
    }

    /**
     * Supprime un joueur
     * @param Player $player
     */
    public function delete($player) {
        $request = SQLConnector::getPDO()->prepare("DELETE FROM pb_player WHERE id_player=:id");
        $request->bindValue("id", $player->getId());
        $result = $request->execute();
        return $result;
    }

    /**
     * Renvoi les joueurs de la partie
     * @param type $gameId
     * @return Player[]
     */
    public function getPlayersByGame($gameId) {
        $request = SQLConnector::getPDO()->prepare("SELECT * FROM pb_player where idgame_player = :id");
        $request->bindValue("id", $gameId);
        $result = $request->execute();
        if (!$result) return false;
        $rows = $request->fetchAll();
        if (count($rows) <= 0) return false;
        $data = Array();
        foreach ($rows as $row) {
            $player = new Player();
            $player->setId($row["id_player"]);
            $player->setLife($row["life_player"]);
            $player->setEnergy($row["energy_player"]);
            $player->setPosition($row["position_player"]);
            $player->setOrder($row["order_player"]);
            $player->setGameId($row["idgame_player"]);
            $player->setUserId($row["iduser_player"]);
            $data[] = $player;
        }
        return $data;
    }

}
