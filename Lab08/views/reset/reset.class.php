<?php
/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/8/22
* Name: reset.class.php
* Description: Define class to display reset password page
*/

// define Reset class
class Reset extends View
{
    // display HTML page
    public function display($username) // pass username of the account
    {
        // display header from parent
        parent::header();
        ?>
        <!--HTML code-->
        <div class="top-row">Reset password</div>
        <div class="middle-row">
            <p>Please enter a new password. Username is not changeable.</p>
            <form method="post" action="index.php?action=do_reset">
                <div><input type="text" name="username" style="width: 99%" required="" value="<?php echo $username ?>"
                            readonly="readonly"></div>
                <div><input type="password" name="password" style="width: 99%;" required="" minlength="5"
                            placeholder="Password, 5 characters minimum"></div>
                <div><input type="submit" class="button" value="Reset Password"></div>
            </form>
        </div>
        <div class="bottom-row">
            <span style="float: left">Cancel password reset? <a href="index.php?action=login">Cancel Reset</a></span>
            <span style="float: right"></span>
        </div>
        <?php
        // display footer from parent
        parent::footer();
    }
}