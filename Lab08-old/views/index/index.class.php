<?php
/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/8/22
* Name: index.class.php
* Description: Define class to display index page
*/

// define class to create index page
class Index extends View // extend View class for formatting
{

    public function display()
    {
        parent::header(); // display page header from parent
        ?>
        <!-- HTML code -->
            <div class="top-row">CREATE AN ACCOUNT</div>
            <div class="middle-row">
                <p>Please complete the entire form. All fields are required.</p>
                <form method="post" action="index.php?action=register">
                    <div><input type="text" name="username" style="width: 99%" required="" placeholder="Username"></div>
                    <div><input type="password" name="password" style="width: 99%" required="" minlength="5"
                                placeholder="Password, 5 characters minimum"></div>
                    <div><input type="email" name="email" style="width: 99%" required="" placeholder="Email"></div>
                    <div><input type="text" name="fname" style="width: 99%" required="" placeholder="First name"></div>
                    <div><input type="text" name="lname" style="width: 99%" required="" placeholder="Last name"></div>
                    <div><input type="submit" class="button" value="register"></div>
                </form>
            </div>
            <div class="bottom-row">
                <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
                <span style="float: right"></span>
            </div>
        <?php
        parent::footer();
    }

}