<?php

namespace Controller;

class Form {

   

    public function input($type,$name)
    {       
       return '<input class="form-control" type="'.$type.'" name="'.$name.'">' ;
    }
    public function button($name,$btn_text)
    {       
       return '<button class="btn btn-primary mb-4" type="submit" name="'.$name.'" value="submit">'.$btn_text.'</button>' ;
    }

}