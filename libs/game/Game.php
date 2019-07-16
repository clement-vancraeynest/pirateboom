<?php

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

    public function load($id) {
        
    }

    public function save() {
        
    }

}
