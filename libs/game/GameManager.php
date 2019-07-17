<?php

require_once '../SQL/SQLConnector.php';

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
    public function load($game, $id) {
        $request = SQLConnector::getPDO()->prepare("SELECT * FROM pb_game where id_game = :id");
        $request->bindValue("id", $id);
        $result = $request->execute();
        if (!$result) return false;
        $rows = $request->fetchAll();
        if (count($rows) <= 0) return false;
        $row = $rows[0];
        $game->setId($row["id_game"]);
        $game->setBoard($row["board_game"]);
        $game->setOrder($row["order_game"]);
        $game->setState($row["state_game"]);
        return true;
    }

    /**
     * Création de la partie
     * @param Game $game
     * @return int Identifiant de la partie
     */
    public function insert($game) {
        $pdo = SQLConnector::getPDO();
        $request = $pdo->prepare("
            INSERT INTO pb_game (board_game, order_game, state_game)
            VALUES(:board, :order, :state)");
        $request->bindValue("board", $game->getBoard());
        $request->bindValue("order", $game->getOrder());
        $request->bindValue("state", $game->getState());
        $result = $request->execute();
        if (!$result) return false;
        return $pdo->lastInsertId();
    }

    /**
     * Enregistrement de la partie
     * @param Game $game
     * @return int Identifiant de la partie
     */
    public function update($game) {
        $request = SQLConnector::getPDO()->prepare("
            UPDATE pb_game 
            SET board_game=:board, order_game=:order, state_game=state
            WHERE id_game=:id");
        $request->bindValue("board", $game->getBoard());
        $request->bindValue("order", $game->getOrder());
        $request->bindValue("state", $game->getState());
        $result = $request->execute();
        return $result;
    }

    /**
     * Suppression de la partie
     * @param Game $game
     * @return int Identifiant de la partie
     */
    public function delete($game) {
        $request = SQLConnector::getPDO()->prepare("DELETE FROM pb_game WHERE id_game=:id");
        $request->bindValue("id", $game->getId());
        $result = $request->execute();
        return $result;
    }

}
