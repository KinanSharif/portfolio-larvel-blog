<?php


class Test extends CI_Controller
{

    //session library is autoloaded

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {

        //$result = $this->user_model->get(array(
        /*'user_id' => 1,
        'login !=' => 'peggy'*/
        //'login !=' => 'peggy'
        //));


        //$result = $this->user_model->insert(['login' => 'Jonny']);

        //$result = $this->user_model->delete(3);

        /*$result = $this->user_model->update(
            ['login' => 'John'],
            ['login' => 'Jonny']
        );*/

        $result = $this->user_model->insertUpdate([
            'login' => 'John'
        ], 5);

        echo '<pre>';
        print_r($result);
        $this->output->enable_profiler(true);
    }


    public function get()
    {

        var_dump($this->user_model->get(1));
    }

    public function insert()
    {

        $result = $this->user_model->insert([
            'login' => 'Jethro'
        ]);
        print_r($result);
    }

    public function update($user_id)
    {

        $result = $this->user_model->update([
            'login' => 'Peggy'
        ], $user_id);

        print_r($result);

    }

    public function delete($user_id)
    {

        $result = $this->user_model->delete($user_id);
        print_r($result);

    }
}