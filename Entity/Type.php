<?php

namespace Entity;

class Type {

    private $id;
    private $title;

    public function __construct($id, $title) {

        $this->id = $id;
        $this->title = $title;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    // Setters
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }
}
