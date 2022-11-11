<?php
/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/8/22
* Name: register.class.php
* Description: display a message about whether account creation was successful
*/
class Register extends View{
    public function display($message){
        //display header
        parent::header();
        ?>
        <div class="top-row">Create an account</div>
        <?php
        //if account creation was successful display the corresponding message and links
        if($message == true){
            ?>
            <div class="middle-row">
                <p>Your account has been successfully created.</p>
            </div>
            <div class="bottom-row">
                <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
            </div>
            <?php
        //if account creation was unsuccessful display the corresponding message and links
        } else {
            ?>
            <div class="middle-row">
                <p>Your last attempt for creating an account failed. Please try again.</p>
            </div>
            <div class="bottom-row">
                <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
            </div>            
            <?php
        }
        //display footer
        parent::footer();
    }
}
