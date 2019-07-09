<?php

class CompanyController extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('CompanyModel');
    }

    public function Register(){

        $this->load->view('Register');
    }
}