<?php


class Form {

    public $_input_type;
    public $_input_name;
    
    public function __construct($input_type, $input_name)
    {
        $this->_input_name = $input_name;
        $this->_input_type = $input_type;
    }
   

    public function input()
    {       
       return ' <input class="form-control" type="'.$this->input_type .'" name="'.$this->_input_name.'"' ;
    }

}