<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of article
 *
 * @author jeanypierre
 */
class Article {

    //put your code here
    public $title;
    public $content;
    protected $db;
    protected $views;
    
    

    function __construct($db) {
        $this->db = $db;
    }

    function author($id){
        $sql = "select user_full_name from login where user_id ='$id'";
        
        $result = $this->db->query($sql);
        return  $result->fetch_assoc()['user_full_name'];

    }
    
    function views_count(){

    }

  


    function display_all($limit, $offset) {
        
        $sql = "SELECT * FROM `articles` LEFT JOIN categories
         ON categories.id = articles.category  LIMIT {$limit} offset {$offset}";
        
        $query = $this->db->query($sql); 
        $images_placeholder = array(

            "https://cdn.pixabay.com/photo/2019/08/23/20/06/landscape-4426419_960_720.jpg",
            "https://cdn.pixabay.com/photo/2019/08/25/13/34/dogs-4429513_960_720.jpg",
            "https://cdn.pixabay.com/photo/2019/03/19/19/54/polyommatus-icarus-4066785_960_720.jpg",
            'https://cdn.pixabay.com/photo/2019/08/23/16/00/landscape-4425963_960_720.jpg',
            'https://cdn.pixabay.com/photo/2019/08/24/22/21/child-4428504_960_720.jpg',

        );

        while($row = mysqli_fetch_assoc($query)){
            $int = rand(0,count($images_placeholder)-1);

            $title =substr($row['article_title'],0,30);
            $content = substr($row['article_content'], 0, 300);
            $date = $row['article_date_posted'];
            $id = $row['article_id'];
            $categoy = $row['name'];
            
            $author_name = $this->author($row['user_id']);

           
            
            echo "<div class='post'> 
            <h1 class='ptitle'><a href='view.php?id=$id'>$title</a></h1>
            <p class='pdate'>".$author_name." ".$date.
            "<span class='badge badge-pill badge-success'>35 views</span>
            <span class='badge badge-pill badge-info'>19 comments</span>"."</p>"."
            
           
            <a href='view.php?id=$id'>
            <img src='$images_placeholder[$int]' class='pimg img-fluid img-thumbnail float-left'>". 
            "</a>".
            "<div class='pwra'>".
           
            
            "<p> $content  <a href='view.php?id=$id' class='btn-link'>
            
            <img src='Images/chevron.png'/></a></p>".

            "</div></div>";
     
     
        }
        

        
    }
    function update( $id, $title, $category, $content, $updated){
        

        $content = addslashes( $content);

        $sql ="update articles 
        set article_title='$title',
        category='$category',
        article_content ='$content'
        where article_id ='$id';";  
        echo "<code>". $sql ."<code>";

    
        $query = $this->db->query($sql);  
        if($query){                      
            header('location: http://localhost:8080/CMS_Crude/home.php');
            exit();
        }

       // return $query->fetch_assoc();


    }

    function edit($id){

         $sql = "Select * from articles where article_id ='$id'"; 
         $query = $this->db->query($sql); 
         return $query->fetch_assoc();

    }



    function view($article_id) {   
         
       $article_id = $this->db->safe_string($article_id);  
       echo $article_id;     
        if (is_int((int)intval($article_id))) {     
         
            $id = (int) intval($article_id)   ;            
            // send query to db for article
            $sql = "Select * from articles where article_id ='$id'";             

            $query = $this->db->query($sql);             
            
            if ($query->num_rows == 1) {               
                $row = mysqli_fetch_assoc($query);     
                
                return $row;
                
            }else{

                return  "Article is not found";
            }

        }else{
            header('location: 404.php');
        }
        
       
        
    }

    // display all categories 

    function categories(){

        $sql = "select * from categories";
       
        $query = $this->db->query($sql);  
       
        
        while( $row = $query->fetch_assoc()){

            echo "<a href='index.php?category={$row['id']}' class='scan.business btn btn-warning'><span class='cat'> {$row['name']} </span></a> ";
        }




    }

    function latest($num){

        $sql = "Select * from articles limit {$num}";      
        $query = $this->db->query($sql);
        $rows = array();
        while($row = $query->fetch_assoc()){            
            $rows[] = $row;
        }
        return $rows;      

    }

    function add($title, $category, $image, $content){

        $this->title= $this->db->safe_string($title);
        $this->content= $this->db->safe_string($content);
        $category= $this->db->safe_string($category);
        $image  = $image;
       
        
        //insert post into articles
        $sql ="INSERT INTO `articles` (`article_id`, `user_id`, `article_title`, 
                    `article_content`, `category`, `article_date_posted`, `images`)
                    values(NULL, '1','$this->title','$this->content','$category', Now(),'$image')";

        $result = $this->db->query($sql);
        echo $sql;
       
        if($result){
           echo 'Post added';

        }

        $this->db->connect()->close();

    }

    function display_by_category($cat){
        $sql = "    SELECT * FROM `articles` 
                    join categories on category = categories.id
                    where categories.name = '$cat'";    

        $result = $this->db->query($sql);
        
        if($result->num_rows ==  0){

            echo "<h3> No post in this category yet. Be the first to add an article</h3>";
             
        }
        else if($result  == 1){
            $row =  $result->fetch_assoc();

            $output =" <div class='post'>  
                     <h1 class='ptitle'>  {$row['article_title']} </h1> </div>";
           
            
        }else{

           
        }


    }

    

}
