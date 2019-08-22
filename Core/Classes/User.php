<?php

/**
 * 
 */
class User {

    private $user_name;
    private $user_password;
    private $user_email;
    public $user_first_name;
    public $user_last_name;
    private $user_profile_pic;
    protected $db;

    function __construct($db) { # code...
        $this->db = new Database("cms_crude", "login");
    }

    function login($email, $password) {

        $r = $this->db->query("SELECT * from login where user_email = '$email'
							 And user_password='$password'");
        // check if user exsited 
        if ($r->num_rows ==1) {
            // Log user in , send protected 

            $row = $r->fetch_assoc();

            $_SESSION['logged'] = "yes";

            $_SESSION['user_role'] = ($row['user_role']);

            $username = explode('@', $row['user_email']);

            $_SESSION['user_email'] = $username[0];

            return true;
        } else {

            return False;
        }
    }

    function register($email, $password) {  //
        $r = $this->db->query("SELECT * from login where user_email = '$email'");
        if ($r->num_rows > 0) {
            echo " Email is already registered ";

            sleep(3);

            header("Location:/CMS_Crude/login.php");
        } else {
            // continue iwith user registration insert new user into db
            $sql = "INSERT INTO `login` (`user_id`, `user_email`, `user_password`, `member_since`, `user_role`) 
			VALUES (NULL, '$email', '$password', CURRENT_DATE(), '0')";
            // redirect user to login page to login;
            $q = $this->db->query($sql);

            if ($q) {

                echo "registered successfully";



                // ask user to verified their email address
            }
        }
    }

    function verified_email($email) {
        
    }

    function forgot_password($email) {

        $r = $this->db->query("SELECT * from login where user_email = '$email'");

        print_r($r);
        if ($r->num_rows > 0) {

            // user is a member; email new random password;
            
        }
        
        function upload($param) {
            
            
            
        }
        
        
    }

}
