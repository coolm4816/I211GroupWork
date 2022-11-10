<?php
/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/8/22
* Name: register.class.php
* Description: Define class to display register page
*/

/*
 * Page success text:
 *      Your account has been successfully created.
 * Page fail text:
 *      Your last attempt for creating an account failed. Please try again.
 */

// define register class
class Register extends View
{
    // display HTML page
    // pass a boolean value to tell the page if the login was successful or not
    public function display($message)
    {
        // display header from parent
        parent::header();
        ?>
        <!-- HTML code -->
        <div class="top-row">CREATE AN ACCOUNT</div>
        <div class="middle-row">
            <p>
                <?php
                // php block for custom message
                $message
                ?>
            </p>
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