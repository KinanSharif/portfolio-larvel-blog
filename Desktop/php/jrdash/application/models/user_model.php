<?php

/**
 * Class User_model (tips)
 * $this->output->enable_profiler(true);
 * shows the whole process of the query
 */
class User_model extends CRUD_Model
{
    protected $_table = 'user';
    protected $_primary_key = 'user_id';

    // -----------------------------------------------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // -----------------------------------------------------------------------------------------------------------------


}