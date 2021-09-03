<?php

class Calculator{
    public $_num1;
    public $_oper;
    public $_num2;

    function __construct($num1,$oper,$num2){
        $this->_num1 = $num1;
        $this->_oper = $oper;
        $this->_num2 = $num2;
    }

    public function do_calc(){
        switch ($this->_oper) {
            case 'add':
               $result = $this->_num1 + $this->_num2;
               return $result;
                break;
            case 'sub':
               $result = $this->_num1 - $this->_num2;
               return $result;
                break;
            case 'div':
               $result = $this->_num1 / $this->_num2;
               return $result;
                break;
            case 'mul':
               $result = $this->_num1 * $this->_num2;
               return $result;
                break;
            
            default:
                echo "error";
                break;
        }
    }
   
}


