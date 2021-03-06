<?php

class CompanyController extends CI_Controller
{

    /*constructor function */
    public function __construct()
    {
        parent::__construct();
        //Load pagination library
        $this->load->library('pagination');
        //Load company model
        $this->load->model('CompanyModel');
        //per page limit
        $this->perPage = 4;

        $this->load->library('ajax');
    }


    /*insert controller function*/
    public function Register()
    {

        if (isset($_POST['name'])) {

            $name = $_POST['name'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $relationship = $_POST['relationship'];
            $phone = $_POST['phone'];

            if (isset($_POST['css'])) {
                $css = 1;
            } else {
                $css = 0;
            }

            if (isset($_POST['html'])) {
                $html = 1;
            } else {
                $html = 0;
            }

            if (isset($_POST['javascript'])) {
                $javascript = 1;
            } else {
                $javascript = 0;
            }

            if (isset($_POST['php'])) {
                $php = 1;
            } else {
                $php = 0;
            }

            $file = $_FILES['upload_image'];
            $ext = pathinfo($file['name']);
            $filename = 'image/'  . time() . '.' . $ext['extension'];
            move_uploaded_file($file['tmp_name'], $filename);

            $email = $_POST['email'];
            $password = $_POST['password'];

            $this->CompanyModel->register_employee($name, $gender, $relationship, $address, $html, $css, $javascript, $php, $phone,$filename, $email ,$password);

        }

        $this->load->view('Register');
    }



    public function EmployeeList(){

        if (isset($_SESSION['user_logged'])&&isset($_SESSION['user_email'])){

            $data =array();

            //get rows count
            $conditions['returnType'] = 'count';
            $totalRec = $this->CompanyModel->getRows($conditions);

            //pagination configuration
            $config['base_url'] = base_url().'CompanyController/EmployeeList';
            $config['uri_segment'] = 3;
            $config['total_rows'] = $totalRec;
            $config['per_page'] = $this->perPage;

            //styling
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Prev';
            $config['next_tag_open'] = '<li class="pg-next">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="pg-prev">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            //initialize pagination library
            $this->pagination->initialize($config);

            //define offset
            $page = $this->uri->segment(3);
            $offset = !$page?0:$page;

            //get rows
            $conditions['returnType'] = '';
            $conditions['start'] = $offset;
            $conditions['limit'] = $this->perPage;
            $data['emp'] = $this->CompanyModel->getRows($conditions);


            $this->load->view('EmployeeList', $data);
            /* redirect('CompanyController/EmployeeList');*/


        }else{
            redirect('login');
        }

    }

    public function delete_employee(){
        if (isset($_POST['delete_id'])) {
            $this->CompanyModel->delete($_POST['delete_id']);

        }

        redirect('EmployeeList');

    }

    /*Edit controller function */
    public function edit_empoyee()
    {

        if (isset($_GET['change_id'])) {

            $data['emp'] = $this->CompanyModel->getData($_GET['change_id']);

            $this->load->view('EditEmployee', $data);
        }
    }

    public function savedata(){

        if (isset($_POST['id'])) {

            $id = $_POST['id'];
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $relationship = $_POST['relationship'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];

            if (isset($_POST['html'])) {
                $html = 1;
            } else {
                $html = 0;
            }

            if (isset($_POST['css'])) {
                $css = 1;
            } else {
                $css = 0;
            }

            if (isset($_POST['javascript'])) {
                $javascript = 1;
            } else {
                $javascript = 0;
            }

            if (isset($_POST['php'])) {
                $php = 1;
            } else {
                $php = 0;
            }

            $file = $_FILES['upload_image'];
            $ext = pathinfo($file['name']);
            $filename = 'image/'  . time() . '.' . $ext['extension'];
            move_uploaded_file($file['tmp_name'], $filename);

            $this->CompanyModel->edit_emp($id, $name, $gender, $relationship, $address, $html, $css, $javascript, $php, $phone,$filename);

            redirect('employee-list');

        }
    }

    public function login(){

        $this->load->view('login');
    }

    public function check_login(){
        if (isset($_POST['email'])&&isset($_POST['password'])){

            $email = $_POST['email'];
            $pass = $_POST['password'];

            $error = $this->CompanyModel->user_login($email,$pass);

            if ($error==1||$error==2){
                $this->session->set_flashdata("error", $error);
                redirect('login');
            }

        }else{
            redirect('login');
        }
    }
    public function logout(){
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
        redirect('login');
    }

/*    public function table_data(){

        $this->load->view('table_data');
    }*/

    /*List view controller function and delete */
        public function table_data()
        {
            if (isset($_POST['delete_id'])) {
                $this->CompanyModel->delete($_POST['delete_id']);
            }

            $data['emp'] = $this->CompanyModel->getEmployees();

            $this->load->view('table_data', $data);
        }


    public function tablelist_data(){

        $data = $this->CompanyModel->get_datatable_data();
        $this->ajax->send($data);
    }

}