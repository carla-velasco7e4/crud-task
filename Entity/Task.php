<?php

namespace Entity;

class Task {
    private static $counter = 0;
    private $id;
    private $title;
    private $description;
    private $status;
    private $assignedTo;
    private $type;
    private $createdAt;
    private $lastUpdated;

    public function __construct() {
        self::$counter++;
        $this->id = self::$counter;
        $this->createdAt = date('Y-m-d H:i:s');
        $this->lastUpdated = date('Y-m-d H:i:s');
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getAssignedTo() {
        return $this->assignedTo;
    }

    public function getType() {
        return $this->type;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getLastUpdated() {
        return $this->lastUpdated;
    }

    // Setters
    public function setTitle($title) {
        $this->title = $title;
        $this->lastUpdated = date('Y-m-d H:i:s');
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        $this->lastUpdated = date('Y-m-d H:i:s');
        return $this;
    }

    public function setStatus($status) {
        $this->status = $status;
        $this->lastUpdated = date('Y-m-d H:i:s');
        return $this;
    }

    public function setAssignedTo($assignedTo) {
        $this->assignedTo = $assignedTo;
        $this->lastUpdated = date('Y-m-d H:i:s');
        return $this;
    }

    public function setType($type) {
        $this->type = $type;
        $this->lastUpdated = date('Y-m-d H:i:s');
        return $this;
    }
}