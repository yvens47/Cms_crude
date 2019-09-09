<?php
class Pagination {

    public $current_page;

    /*  per_page * (current_page -1)*/
    public $per_page;


    public $total_page_count;

    function __construct($per_page, $current_page, $total_count){

        $this->current_page = (int) $current_page;

        $this->per_page = $per_page;

        $this->total_page_count = $total_count;
    }
    /* total pages of record */

    function total_pages(){

        return ceil($this->total_page_count /$this->per_page);
    }

    function offset(){

        return $this->per_page * ($this->current_page-1);

    }

    function next_page(){
        $next = $this->current_page + 1;
        return ($next <= $this->total_pages() ? $next : false);
    }
    function prev_page(){
        $prev = $this->current_page - 1;
        return ($prev <= 0 ? $prev : false);
    }
}

