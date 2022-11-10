<?php
/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/8/22
* Name: logout.class.php
* Description: Define class to display logout page
*/

// define Logout class
class Logout extends View
{

    public function display()
    {
        // display the header from the parent
        parent::header();
        ?>
        <!--HTML code-->
        <div class="top-row">Login</div>
        <div class="middle-row">
            <p>You have successfully logged out.</p>
        </div>
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
            <span style="float: right">Don't have an account? <a href="index.php">Register</a></span>
        </div>
        <?php
        // display the footer from the parent
        parent::footer();
    }
}