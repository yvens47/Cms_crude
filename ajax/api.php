<?php 

$path =  dirname(__DIR__);

//require '../Core/Classes/article.php';
//require '../Core/Classes/User.php';

//require '../Core/Database/database.php';
//require '../config/config.php';

//global $db;


//$db = new Database(DBHOST,DATABASE, USER, PASSWORD,"login");

//$user = new User($db);
//$validator = new Validator();
//$page = new Page("", "");
//$article = new Article($db);

//$article->display_all(30, 0);

class PostApi extends Article{
    protected $sql;

    function __construct($db){

        parent::__construct($db);
        
        //print_r($this->db);

    }
    function find_by_sql($sql){

        return $this->db->query($sql);
    }

    function posts(){
       
            $sql = "SELECT * FROM `articles` LEFT JOIN (categories,login)
         ON (categories.id = articles.category and login.user_id = articles.user_id )";

       // print_r($this->find_by_sql($sql));
      
        
        $result = $this->db->query($sql); 
       //$result = $this->find_by_sql($sql);
       
       $posts = array();
       while($row = $result->fetch_assoc()){

        $posts[] = $row;
       }

       
       
        
        return $posts;
    }

    function delete($id){
        $id  = (int)(intval($id));
        $sql = "delete from articles where articles.article_id = '$id'";
        $result = $this->db->query($sql); 
        return  $result ? 'delete' : "delete fail";

    }


}