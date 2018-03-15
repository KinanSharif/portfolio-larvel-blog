<?php

/**
 * Created by PhpStorm.
 * User: Xulu
 * Date: 20-11-2017
 * Time: 17:27
 */
class Home extends CI_Controller
{
    // -----------------------------------------------------------------------------------------------------------------

    public function index(){

        $this->load->view('template/header.php');
        $this->load->view('home/home.php');
        $this->load->view('template/footer.php');
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function register(){
        $this->load->view('template/header.php');
        $this->load->view('home/register.php');
        $this->load->view('template/footer.php');
    }

    // -----------------------------------------------------------------------------------------------------------------


}


