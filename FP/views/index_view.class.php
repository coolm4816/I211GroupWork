<?php
/**
 * Author: Matt Cool, Steven Casada, Jawon Winbush
 * Date: 11/17/2022
 * File: index_view.class.php
 * Description: define a header and footer for use in the rest of the web pages
 */

class IndexView
{

    //this method displays the page header
    static public function displayHeader($page_title)
    {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title> <?php echo $page_title ?> </title>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
            <link rel="icon" href='<?= BASE_URL ?>/www/img/odyssey.ico' type="image/png">
            <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/styles.css'/>
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            <script>
                //create the JavaScript variable for the base url
                var base_url = "<?= BASE_URL ?>";
            </script>
        </head>
        <body>
        <div id='wrapper'>

            <!-- <img src='<?= BASE_URL ?>/www/img/logo.png' style="width: 180px; border: none" /> -->
            <span style=' font-size: 36pt; font-weight: bold; vertical-align: top'>
                                    Car Website
            </span>
            <div style=' font-size: 14pt; font-weight: bold'>Rent a car!</div>
            <br><a href='<?= BASE_URL ?>/car/index'>Home</a>
            <br><br>

            <?php
                if (!isset($_COOKIE['id'])){
                    echo '<div id="login"><a href="'. BASE_URL . '/user/login">Log in</a></div>';
                }
                else{
                    echo '<div id="userName"><h3>Hello, ' . $_COOKIE['fname'] . '</h3></div>';

                }

            ?>
        </div>
        <?php
    }//end of displayHeader function

    //this method displays the page footer
    public static function displayFooter()
    {
        ?>
        <br><br><br>
        <div id="push"></div>
        </div>
        <div id="footer">&copy 2022 Car Website. All Rights Reserved.<br>This website is used for educational
            purposes only.
        </div>
        <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
        </body>
        </html>
        <?php
    } //end of displayFooter function
}
