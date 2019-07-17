<?php

require_once 'GameManager.php';

class Game {

    private $_id;
    private $_board;
    private $_order;
    private $_state;

    public function getId() {
        return $this->_id;
    }

    public function getBoard() {
        return $this->_board;
    }

    public function getOrder() {
        return $this->_order;
    }

    public function getState() {
        return $this->_state;
    }

    public function setId($id) {
        $this->_id = $id;
        return $this;
    }

    public function setBoard($board) {
        $this->_board = $board;
        return $this;
    }

    public function setOrder($order) {
        $this->_order = $order;
        return $this;
    }

    public function setState($state) {
        $this->_state = $state;
        return $this;
    }

    /**
     * Chargement d'une partie
     * @param int $id
     * @return boolean
     */
    public function load($id) {
        return GameManager::getInstance()->load($this, $id);
    }

    /**
     * Enregistrement d'une partie
     * @return mixed
     */
    public function save() {
        if (!$this->load($this->getId())) {
            return GameManager::getInstance()->insert($user);
        } else {
            return GameManager::getInstance()->update($user);
        }
    }

    /**
     * Suppression d'une partie
     * @return boolean 
     */
    public function delete() {
        return GameManager::getInstance()->delete($this);
    }

}
