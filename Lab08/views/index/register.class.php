<?php
/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/8/22
* Name: register.class.php
* Description: Define class to display register page
*/

class Register extends View
{

    public function display()
    {
        parent::header();
        ?>
        <!--HTML code-->
        <div class="top-row">CREATE AN ACCOUNT</div>
        <div class="middle-row">
            <p>Your account has been successfully created.</p>
        </div>
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
            <span style="float: right"></span>
        </div>
        <?php
        parent::footer();
    }
}