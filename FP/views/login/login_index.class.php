<?php
/**
 * Author: Steven Casada
 * Date: 12/8/2022
 * File: login_index.class.php
 * Description: Log in form
 */



class LoginIndex extends IndexView {


    public function display() {
        //display page header
        parent::displayHeader("Log In");
        ?>
        <div id="main-header">Log In</div>

        <div id="login-form">
            <form action="<?= BASE_URL ?>/user/verify" method="post">
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="submit" name="submit" placeholder="Register"><br>
            </form>

        </div>

        <?php
        //display page footer
        parent::displayFooter();
    }

}