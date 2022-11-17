<?php
/*
* Author: Matt Cool, Steven Casada, Jawon Winbush
* Date: 11/16/22
 * Name: reset.class.php
 * Description: create the form that lets the user reset their password
 */

class Reset extends View {

    public function display() {
        //display header
        parent::header();
        ?>
        <div class="top-row">Reset Password</div>
        <?php
        //check if the user is logged in
        if (isset($_COOKIE["user"])) {
            ?>
            <!--If the user is logged in, let them reset their password and post it-->
            <div class="middle-row">
                <p>Please enter a new password. Username is not changeable.</p>
                <form action="index.php?action=do_reset" method="post">
                    <input type="text" name="username" value="<?php echo $_COOKIE["user"] ?>" readonly><br>
                    <input type="password" name="password" placeholder="Password" required><br>
                    <input type="submit" placeholder="Reset Password">
                </form>    
            </div>

            <?php
         //if the user isnt logged in give them an error and corresponding links
        } else {
            ?>

            <div class="middle-row">
                <p>You are not currently logged in, you need to be logged in to reset your password.</p>
            </div>

            <div class="bottom-row">
                <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
                <span style="float: right">Don't have an account? <a href="index.php">Register</a></span>
            </div>

            <?php
            //display footer
            parent::footer();
        }
    }

}
