<?php

namespace Entity;

class Type {


    private static $counter = 0;
    private $id;
    private $title;

    public function __construct() {
        self::$counter++;
        $this->id = self::$counter;
        var_dump($this->id);
        echo 'typeconstruct2';
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
