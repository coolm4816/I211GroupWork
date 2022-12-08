<?php
/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 12/7/22
* Name: verify_user.class.php
* Description: Display a message about whether the login succeeded or failed
*/
class VerifyUser extends LoginIndex {
    public function display($message){
        //display header
        parent::displayHeader("Verify");
        ?>
        <div class="top-row">Login</div>
        <?php
        //if the login was successful display the corresponding message and links
        if($message == true){
            ?>

            <div class="message">
                <p>You have successfully logged in.</p>
            </div>

            <div class="options">
                <span style="float: left"><a href="<?=BASE_URL?>/user/logout">Logout</a></span>
            </div>

            <?php
            //if the login was unsuccessful display the corresponding message and links
        } else {
            ?>

            <div class="message">
                <p>Your last attempt to login failed. Please try again.</p>
            </div>

            <div class="options">
                <span style="float: left"><a href="<?=BASE_URL?>/user/login">Log in</a></span>
            </div>

            <?php
        }
        //display footer
        parent::displayFooter();
    }
}