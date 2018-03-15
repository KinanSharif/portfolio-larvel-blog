<?php

/**
 * Created by PhpStorm.
 * User: Xulu
 * Date: 21-11-2017
 * Time: 20:09
 */
class User extends CI_Controller
{

    //sesson library is autoloaded
    public function login()
    {
        $login = $this->input->post('login');
        $password = $this->input->post('password');

        $result = $this->user_model->get([
            'login' => $login,
            'password' => md5($password)
        ]);

        //result to json whether the login is false or true
        $this->output->set_content_type('application_json');

        if ($result) {
            $this->session->set_userdata([
                'user_id' => $result[0]['user_id']
            ]);

            $this->output->set_output(json_encode([
                'result' => 1
            ]));
            return false;
        }
        $this->output->set_output(json_encode([
            'result' => 0
        ]));

    }
    public function register()
    {
        $this->output->set_content_type('application_json');
        $this->form_validation->set_rules('login','Login','required|min_length[4]|max_length[16]|is_unique[user.login]');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password','Password','required|min_length[2]|max_length[16]');
        $this->form_validation->set_rules("confirm_password", "password confirm", "matches[password]");

        /**
         * you can customize your error messages by using $this->form_validation->set_message()
         */

        if($this->form_validation->run()==false){

            $this->output->set_output(json_encode(['result' => 0,'error'=> $this->form_validation->error_array()]));
            return false;
        }

        $login = $this->input->post('login');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');

        $user_id = $this->user_model->insert([
            'login' => $login,
            'password' => md5($password),
            'email' => $email

        ]);

        //result to json whether the login is false or true
        $this->output->set_content_type('application_json');

        if ($user_id) {
            $this->session->set_userdata([
                'user_id' => $user_id
            ]);

            $this->output->set_output(json_encode([
                'result' => 1
            ]));
            return false;
        }
        $this->output->set_output(json_encode([
            'result' => 0, 'error'=> 'user not created.'
        ]));

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