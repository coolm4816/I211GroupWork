<?php
/*
 * Author: Louie Zhu
 * Date: 10/20/2021
 * Name: user_error.class.php
 * Description: This class extends the View class. The "display" method displays an error message. 
 *				To create the page header and footer, the display method calls the header and footer 
 *				methods defined in the parent class.	
 */

class UserError extends View {
    public function display($message) {
        
        //call the header method defined in the parent class to add the header
        parent::header();
        ?>
        <!-- page specific content starts -->
        <!-- top row for the page header  --> 
        <div class="top-row">Error</div>  
        
        <!-- middle row -->
        <div class="middle-row">
            <h3>We are sorry, but an error has occurred.</h3>
            <p><?= $message ?></p>
        </div>
        
        <!-- bottom row for links  -->
        <div class="bottom-row">         
            <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
            <span style="float: right">Don't have an account? <a href="index.php">Register</a></span>
        </div>
        <!-- page specific content ends -->
        
        
        <?php
        //call the footer method defined in the parent class to add the footer
        parent::footer();
    }
}