<?php

/**
 * Created by PhpStorm.
 * User: Xulu
 * Date: 20-11-2017
 * Time: 18:42
 */
class Dashboard extends CI_Controller
{
    // -----------------------------------------------------------------------------------------------------------------

    public function __construct()
    {
        parent:: __construct();
        $user_id = $this->session->userdata('user_id');
        if(!$user_id){
            $this->logout();
        }
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function index(){
        $this->load->view('dashboard/templates/header');
        $this->load->view('dashboard/dashboard_view');
        $this->load->view('dashboard/templates/footer');
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function logout(){
        $this->session->unset_userdata('user_id');
        redirect('/');
    }

    // -----------------------------------------------------------------------------------------------------------------
}