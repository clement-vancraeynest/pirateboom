<?php

class User {

    private $_id;
    private $_name;
    private $_email;
    private $_password;

    public function getId() {
        return $this->_id;
    }

    public function getName() {
        return $this->_name;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function getPassword() {
        return $this->_password;
    }

    public function setId($id) {
        $this->_id = $id;
        return $this;
    }

    public function setName($name) {
        $this->_name = $name;
        return $this;
    }

    public function setEmail($email) {
        $this->_email = $email;
        return $this;
    }

    public function setPassword($password) {
        $this->_password = $password;
        return $this;
    }

    /**
     * Chargement de l'utilisateur
     * @param int $id
     * @return boolean
     */
    public function load($id) {
        
    }

    /**
     * Sauvegarde la classe 
     * @return int Identifiant de l'utilisateur
     */
    public function save() {
        
    }

}
