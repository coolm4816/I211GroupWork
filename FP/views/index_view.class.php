<?php
/**
 * Author: Steven Casada
 * Date: 11/17/2022
 * File: index_view.class.php
 * Description:
 */

class IndexView {

    //this method displays the page header
    static public function displayHeader($page_title) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title> <?php echo $page_title ?> </title>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
            <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>www/css/styles.css' />
            <script>
                //create the JavaScript variable for the base url
                var base_url = "<?= BASE_URL ?>";
            </script>
        </head>
        <body>
        <div id="top"></div>
        <div id='wrapper'>

                   <!-- <img src='<?= BASE_URL ?>/www/img/logo.png' style="width: 180px; border: none" /> -->
                    <span style='color: #000; font-size: 36pt; font-weight: bold; vertical-align: top'>
                                    Car Website
                                </span>
                    <div style='color: #000; font-size: 14pt; font-weight: bold'>Rent a car!</div> <br><br>

        </div>
        <?php
    }//end of displayHeader function

    //this method displays the page footer
    public static function displayFooter() {
        ?>
        <br><br><br>
        <div id="push"></div>
        </div>
        <div id="footer"><br>&copy 2022 Car Website. All Rights Reserved.</div>
        <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
        </body>
        </html>
        <?php
    } //end of displayFooter function
}
