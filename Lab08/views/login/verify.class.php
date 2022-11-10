<?php
/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/8/22
* Name: verify.class.php
* Description: Define class to display verify page
*/

// define Verify class
class Verify extends View
{
    // display HTML page
    public function display()
    {
        // get the header from parent
        parent::header();
        ?>
        <!--HTML code-->
        <div class="top-row">Login</div>
        <div class="middle-row">
            <p>You have successfully logged in.</p>
        </div>
        <div class="bottom-row">
            <span style="float: left">
                Want to log out? <a href="index.php?action=logout">Logout</a>            </span>
            <span style="float: right">Reset password? <a href="index.php?action=reset">Reset</a></span>
        </div>
        <?php
        // get the footer from the parent
        parent::footer();
    }
}