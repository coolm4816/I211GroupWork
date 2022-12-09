<?php
/**
 * Author: Matt Cool, Steven Casada, Jawon Winbush
 * Date: 12/8/2022
 * File: category.class.php
 * Description: define a class that describes category table
 */

class Category {

    //private attributes
    private $id, $category;

    // define constructor
    public function __construct($id, $category) {
        $this->id = $id;
        $this->category = $category;
    }

    // return id
    public function getId() {
        return $this->id;
    }

    // return category
    public function getCategory() {
        return $this->category;
    }
}