<?php

/**
 * Created by PhpStorm.
 * User: Xulu
 * Date: 03-12-2017
 * Time: 17:51
 */
class Note_model extends CRUD_Model
{

    protected $_table = 'note';
    protected $_primary_key = 'note_id';

    // -----------------------------------------------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // -----------------------------------------------------------------------------------------------------------------
}