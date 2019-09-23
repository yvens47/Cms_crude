

<?php 

class Tutorial {

    protected $db;
    private $request;


     function __construct($request, $db){

        $this->db = $db;

        $this->request = $request;

     }

     function add_request(){
        $text =  $this->db->safe($this->request);
        $sql ="insert into tutorial_request (id, request) values(NULL, '$text')";
        $result = $this->db->query($sql);
        if($result)
             echo "Your request is received";
         
     }




}