<?php
/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/8/22
* Name: login.class.php
* Description: Define class to display login page
*/

// define Login class
class Login extends View
{
    // display HTML page
    public function display()
    {
        // display header from parent class
        parent::header();
        ?>
        <!--HTML code-->
        <div class="top-row">Login</div>
        <div class="middle-row">
            <p>Please enter your username and password.</p>
            <form method="post" action="index.php?action=verify">
                <div><input type="text" name="username" style="width: 99%" required="" placeholder="Username"></div>
                <div><input type="password" name="password" style="width: 99%" required="" placeholder="Password"></div>
                <div><input type="submit" class="button" value="Login"></div>
            </form>
        </div>
        <div class="bottom-row">
            <span style="float: left">Don't have an account? <a href="index.php?action=index">Register</a></span>
            <span style="float: right"></span>
        </div>
        <?php
        // display footer from parent class
        parent::footer();
    }
}