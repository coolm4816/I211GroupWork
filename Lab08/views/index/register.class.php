<?php
/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/8/22
* Name: register.class.php
* Description: Define class to display register page
*/

// define register class
class Register extends View
{
    // display HTML page
    public function display()
    {
        // display header from parent
        parent::header();
        ?>
        <!-- HTML code -->
        <div class="top-row">CREATE AN ACCOUNT</div>
        <div class="middle-row">
            <p>Your account has been successfully created.</p>
        </div>
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
            <span style="float: right"></span>
        </div>
        <?php
        // display header from parent
        parent::footer();
    }
}