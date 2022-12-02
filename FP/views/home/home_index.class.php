<?php
/**
 * Author: Steven Casada
 * Date: 11/30/2022
 * File: home_index.class.php
 * Description:
 */

class HomeIndex extends IndexView {

    public function display() {
        //display page header
        parent::displayHeader("Car Website Home");
        ?>
        <div id="main-header">Car Website</div>

        <div>
                <a id="viewInventory" href="<?= BASE_URL ?>/car/index">
                View Inventory
                </a>

        </div>

        <?php
        //display page footer
        parent::displayFooter();
    }

}