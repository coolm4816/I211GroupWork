<?php
/**
 * Author: Matt Cool, Steven Casada, Jawon Winbush
 * Date: 11/17/2022
 * File: car_index_view.class.php
 * Description: parent file for car views
 */

class CarIndexView extends IndexView {

    public static function displayHeader($title) {
        parent::displayHeader($title)
        ?>
        <script>

        </script>
        <!--create the search bar
        <div id="searchbar">
            <form method="get" action="<?= BASE_URL ?>/car/search">
                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search cars by title" autocomplete="off" onkeyup="handleKeyUp(event)">
                <input type="submit" value="Go" />
            </form>
            <div id="suggestionDiv"></div>
        </div>
        -->
        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }

}