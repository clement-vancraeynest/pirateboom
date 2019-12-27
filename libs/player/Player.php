<?php

require_once 'PlayerManager.php';

class Player {

    private $_id;
    private $_life;
    private $_energy;
    private $_position;
    private $_order;
    private $_gameId;
    private $_userId;

    public function getId() {
        return $this->_id;
    }

    public function getLife() {
        return $this->_life;
    }

    public function getEnergy() {
        return $this->_energy;
    }

    public function getPosition() {
        return $this->_position;
    }

    public function getOrder() {
        return $this->_order;
    }

    public function getGameId() {
        return $this->_gameId;
    }

    public function getUserId() {
        return $this->_userId;
    }

    public function setId($id) {
        $this->_id = $id;
        return $this;
    }

    public function setLife($life) {
        $this->_life = $life;
        return $this;
    }

    public function setEnergy($energy) {
        $this->_energy = $energy;
        return $this;
    }

    public function setPosition($position) {
        $this->_position = $position;
        return $this;
    }

    public function setOrder($order) {
        $this->_order = $order;
        return $this;
    }

    public function setGameId($gameId) {
        $this->_gameId = $gameId;
        return $this;
    }

    public function setUserId($userId) {
        $this->_userId = $userId;
        return $this;
    }

    /**
     * Chargement du joueur
     * @param int $id
     * @return boolean
     */
    public function load($id) {
        return PlayerManager::getInstance()->load($this, $id);
    }

    /**
     * Enregistrement d'un joueur
     * @return mixed Identifiant du joueur
     */
    public function save() {
        if (!$this->load($this->getId())) {
            return PlayerManager::getInstance()->insert($user);
        } else {
            return PlayerManager::getInstance()->update($user);
        }
    }

    /**
     * Suppression d'un joueur
     * @return boolean
     */
    public function delete() {
        return PlayerManager::getInstance()->delete($this);
    }

    /**
     * Renvoi les données brut
     * @return Array
     */
    public function getRawData() {
        $data = Array();
        $data["id"] = $this->getId();
        $data["life"] = $this->getLife();
        $data["energy"] = $this->getEnergy();
        $data["position"] = $this->getPosition();
        $data["order"] = $this->getOrder();
        $data["gameID"] = $this->getGameId();
        $data["userId"] = $this->getUserId();
        return $data;
    }

}
