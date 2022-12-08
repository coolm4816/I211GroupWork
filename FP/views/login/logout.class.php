<?php

/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 12/7/22
* Name: logout.class.php
* Description: Give the user notice of logout
*/
class Logout extends LoginIndex {
    public function display(){
        //display header
        parent::displayHeader("Verify");
        ?>


            <div class="message">
                <p>You have successfully logged out.</p>
            </div>

            <div class="options">
                <span style="float: left"><a href="<?= BASE_URL ?>/car/index">View Inventory</a></span>
            </div>

           <?php
        //display footer
        parent::displayFooter();
    }
}

