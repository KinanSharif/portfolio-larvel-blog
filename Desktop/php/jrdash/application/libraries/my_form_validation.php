<?php
class MY_Form_validation extends CI_Form_validation{

    public function __construct($config = array())
    {
        parent::__construct($config);
    }

    public function error_array(){
        //note _error_array is a private property
        if(count($this->_error_array> 0 )){
            return $this->_error_array;
        }
    }
}