<?php
/**
 * Author: Steven Casada
 * Date: 11/30/2022
 * File: home_controller.class.php
 * Description:
 */

class HomeController {
    //put your code here
    public function index() {
        $view = new HomeIndex();
        $view->display();
    }
}