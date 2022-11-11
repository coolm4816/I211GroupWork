<?php
/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/8/22
* Name: reset_confirm.class.php
* Description: Define class to display reset password confirmation page
*/

// define resetConfirm class
class resetConfrim extends View
{
    // display HTML page
    public function display()
    {
        // display header from parent
        parent::header();
        ?>
        <!--HTML code-->
        <div class="top-row">Reset password</div>
        <div class="middle-row">
            <p>You have successfully reset your password.</p>
        </div>
        <div class="bottom-row">
            <span style="float: left">
                Want to log out? <a href="index.php?action=logout">Logout</a>            </span>
            <span style="float: right">Don't have an account? <a href="index.php">Register</a></span>
        </div>
        <?php
        // display footer from parent
        parent::footer();
    }
}