<?php

/**
 * 
 */
class User {

    private $user_name;
    private $user_password;
    private $user_email;
    public  $user_first_name;
    public  $user_last_name;
    private  $user_profile_pic;
    protected $db;

    private $is_admin = false;

    function __construct($db) { # code...
        $this->db = $db;
    }


    /**
     * 
     * if user is logged in session will set to true otherwise false
     * is_logged_in
     *
     * @return
     */
    function is_logged_in(){

         return (isset($_SESSION['logged'])) ? true : false;
    }
    /**
     * login
     *
     * @param  mixed $email
     * @param  mixed $password
     *
     * @return void
     */
    function login($email, $password) {

        $r = $this->db->query("SELECT * from login where user_email = '$email'
							 And user_password='$password'");
        // check if user exsited 
        if ($r->num_rows ==1) {
            // Log user in , send protected 

            $row = $r->fetch_assoc();
           //$_SESSION = $row['article_id'];
            $_SESSION['logged'] = "yes";
           // $_SESSION['user_role'] = ($row['user_role']);
            $username = explode('@', $row['user_email']);
            $_SESSION['user_email'] = $username[0];
            return true;

        } else {

            return False;
        }
    }

    function register($email, $password) {  //
        $this->db->connect()->real_escape_string($email);
        $r = $this->db->query("SELECT * from login where user_email = '$email'");
        if ($r->num_rows > 0) {            
            
            $_SESSION['email_registered'] = 'Email is already registered ';  
           

        } else {
            // continue iwith user registration insert new user into db
            $sql = "INSERT INTO `login` (`user_id`, `user_email`, `user_password`, `member_since`, `user_role`,`user_full_name`) 
            VALUES (NULL, '$email', '$password', CURRENT_DATE(), '0','')";   
            echo $sql;     
            $q = $this->db->query($sql);
            if ($q) {

               
                $_SESSION['register_success'] = 'Email is already registered '; 
                // ask user to verified their email address
                header("location: login.php");
            }
        }
    }

    function verified_email($email) {
        
    }

    function forgot_password($email) {

        $r = $this->db->query("SELECT `user_id`,`user_email` from login where user_email = '$email'");

        print_r($r);

        if ($r->num_rows === 1) {

            // user is a member; email new random password;
            $string ='abcdefghijklmnopqrstuvwxyz0123456789';
            $newstring = "";
           

            for($i=0; $i < 8; $i++){
                
                $rand = rand(0, strlen($string)-1);

                $newstring .= strval( $string[$rand]);
            }
           

            $id = $r->fetch_assoc()['user_id'];
            // create a random password  and insert into the user's  account
            $new_password = $newstring; // to be mailed to user;
            $newstring = md5($newstring);


            $sql = "UPDATE `login` SET `user_password` = '$newstring' WHERE `login`.`user_id` = '$id'"; 
            
            if($this->db->query($sql)){

            // email user new password
            $to = $r->fetch_assoc()['user_email'];
            $subject =  "Below is your new password <br/> ".$new_password;
            echo  mail($to, "Updated Password",$subject)==false;

            }
            
            

            

            // redirect to login
            
        }
        else{
            // info email does not exist

        }
        
        
      
        
        
    }
    /* view user full name based on id */

    function view_user($id){
        $sql = "select user_full_name from login where user_id ='$id'";
        
        $result = $this->db->query($sql);
        return  $result->fetch_assoc()['user_full_name'];

    }

}
